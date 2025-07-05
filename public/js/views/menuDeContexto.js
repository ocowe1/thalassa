window.ContextMenuApp = {
    $contextMenu: null,
    $copyOption: null,
    $searchOption: null,

    currentSelectedText: '',
    currentDocumentUID: null,

    init: function () {
        this.$contextMenu = $("#context-menu");
        this.$copyOption = $("#copy-option");
        this.$searchOption = $("#search-google-option");

        this.bindEvents();
    },

    bindEvents: function () {
        const self = this;

        $(document).on("contextmenu", function (event) {
            event.preventDefault();
            self.currentSelectedText = window.getSelection().toString().trim();

            const $targetElement = $(event.target);
            const $targetContext = $targetElement.closest('.targetContext');

            const $uuidDependentOptions = self.$contextMenu.find('[data-searchuuid="true"]');

            if ($targetContext.length) {
                self.currentDocumentUID = $targetContext.data('contextuuid');
                $uuidDependentOptions.removeClass('disabled');
            } else {
                $uuidDependentOptions.addClass('disabled');
                self.currentDocumentUID = null;
            }

            if (self.currentSelectedText) {
                self.$copyOption.removeClass('disabled');
                self.$searchOption.removeClass('disabled');
            } else {
                self.$copyOption.addClass('disabled');
                self.$searchOption.addClass('disabled');
            }

            const menuWidth = self.$contextMenu.outerWidth();
            const menuHeight = self.$contextMenu.outerHeight();
            const windowWidth = $(window).width();
            const windowHeight = $(window).height();
            const scrollLeft = $(window).scrollLeft();
            const scrollTop = $(window).scrollTop();

            let left = event.pageX;
            let top = event.pageY;

            if (left + menuWidth > windowWidth + scrollLeft) {
                left = event.pageX - menuWidth;
                if (left < scrollLeft) left = scrollLeft;
            }
            if (top + menuHeight > windowHeight + scrollTop) {
                top = event.pageY - menuHeight;
                if (top < scrollTop) top = scrollTop;
            }

            self.$contextMenu.css({
                display: "block",
                left: left + "px",
                top: top + "px"
            });
        });

        $(document).on("mousedown", function (event) {
            if (!self.$contextMenu.is(event.target) && self.$contextMenu.has(event.target).length === 0) {
                self.$contextMenu.hide();
                self.currentSelectedText = '';
                self.currentDocumentUID = null;
            }
        });

        self.$copyOption.on("click", function () {
            if ($(this).hasClass('disabled')) return;
            if (self.currentSelectedText) {
                navigator.clipboard.writeText(self.currentSelectedText).then(r => function(){console.warn('Copy =)')}).catch(e => function(){console.error('Oops :( ' + e)});
            }
            self.$contextMenu.hide();
            self.currentSelectedText = '';
        });

        self.$searchOption.on("click", function () {
            if ($(this).hasClass('disabled')) return;
            if (self.currentSelectedText) {
                const searchUrl = `https://www.google.com/search?q=${encodeURIComponent(self.currentSelectedText)}`;
                window.open(searchUrl, '_blank');
            }
            self.$contextMenu.hide();
            self.currentSelectedText = '';
        });

        self.$contextMenu.on("contextmenu", function (event) {
            event.preventDefault();
            event.stopPropagation();
        });

        if (typeof ContextMenuActions !== "undefined" && typeof ContextMenuActions.init === "function") {
            ContextMenuActions.init();
        }
    }
};

$(document).ready(function () {
    ContextMenuApp.init();
});
