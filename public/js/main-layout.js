document.addEventListener('livewire:init', () => {

    Livewire.on('Alerta', (data) => {
        Swal.fire({
            title: data[0].titulo || 'Info',
            html: data[0].mensagem || '',
            icon: data[0].icone || 'info',
            allowOutsideClick: !data[0].travar,
            allowEscapeKey: !data[0].travar
        });
    });

    Livewire.on('bloqueia-pagina', (data) => {
        let Bloquear = data[0].Bloquear;
        window.bloqueiaPagina(Bloquear);
    });

});

window.retornaBlob = function (base64){
    const binaryData = atob(base64);
    const byteArray = new Uint8Array(binaryData.length);

    for (let i = 0; i < binaryData.length; i++) {
        byteArray[i] = binaryData.charCodeAt(i);
    }

    const blob = new Blob([byteArray], {type: 'application/pdf'});
    const blobUrl = URL.createObjectURL(blob);

    return $('<embed>')
        .attr('src', blobUrl)
        .attr('type', 'application/pdf')
        .css({
            width: '100%',
            height: '1000px'
        });
}


window.bloqueiaPagina = function (Bloquear)
{
    window.paginaBloqueadaCount = window.paginaBloqueadaCount || 0;

    const svgIconNavio = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"><path d="M192 32c0-17.7 14.3-32 32-32L352 0c17.7 0 32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 128 44.4 14.8c23.1 7.7 29.5 37.5 11.5 53.9l-101 92.6c-16.2 9.4-34.7 15.1-50.9 15.1c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-16.2 0-34.7-5.7-50.9-15.1l-101-92.6c-18-16.5-11.6-46.2 11.5-53.9L96 240l0-128c0-26.5 21.5-48 48-48l48 0 0-32zM160 218.7l107.8-35.9c13.1-4.4 27.3-4.4 40.5 0L416 218.7l0-90.7-256 0 0 90.7zM306.5 421.9C329 437.4 356.5 448 384 448c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 501.7 417 512 384 512c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 437.2 165.1 448 192 448c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z"/></svg>`;

    const svgIconAviao = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"><path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z"/></svg>`;

    const svgIconTrem = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M96 0C43 0 0 43 0 96L0 352c0 48 35.2 87.7 81.1 94.9l-46 46C28.1 499.9 33.1 512 43 512l39.7 0c8.5 0 16.6-3.4 22.6-9.4L160 448l128 0 54.6 54.6c6 6 14.1 9.4 22.6 9.4l39.7 0c10 0 15-12.1 7.9-19.1l-46-46c46-7.1 81.1-46.9 81.1-94.9l0-256c0-53-43-96-96-96L96 0zM64 96c0-17.7 14.3-32 32-32l256 0c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32L96 224c-17.7 0-32-14.3-32-32l0-96zM224 288a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>`;

    if (Bloquear === true) {
        if (window.paginaBloqueadaCount === 0) {

            let $div = $('<div />', { id: 'bloqueio' })
                .css({
                    'display': 'none',
                    'position': 'fixed',
                    'top': 0,
                    'left': 0,
                    'width': '100%',
                    'height': '100%',
                    'background-color': 'rgba(0, 0, 0, 0.8)',
                    'z-index': '99999999',
                    '-webkit-backdrop-filter': 'blur(3px)',
                    'backdrop-filter': 'blur(3px)',
                });

            let containerWidth = 150;
            let containerHeight = 180;
            let $loaderContainer = $('<div />')
                .addClass('cssload-container')
                .css({
                    'position': 'absolute',
                    'width': containerWidth + 'px',
                    'height': containerHeight + 'px',
                    'top': '50%',
                    'left': '50%',
                    'margin-left': -(containerWidth / 2) + 'px',
                    'margin-top': -(containerHeight / 2) + 'px'
                });

            let $iconSpinner = $('<div />').addClass('cssload-icon-spinner');

            let $iconContainer1 = $('<div />')
                .addClass('icon-item icon1')
                .html(svgIconNavio);

            let $iconContainer2 = $('<div />')
                .addClass('icon-item icon2')
                .html(svgIconAviao);

            let $iconContainer3 = $('<div />')
                .addClass('icon-item icon3')
                .html(svgIconTrem);

            // Adiciona os CONTAINERS dos SVGs e o ANEL ao spinner
            $iconSpinner.append($iconContainer1);
            $iconSpinner.append($iconContainer2);
            $iconSpinner.append($iconContainer3);
            $iconSpinner.append('<div class="spinner-ring"></div>');

            let $loaderImage = $('<img />', {
                src: '',
                alt: 'Thalassa'
            }).css({
                'display': 'block',
                'max-width': '80px',
                'height': 'auto',
                'margin-top': '15px',
                'margin-left': 'auto',
                'margin-right': 'auto'
            });

            $loaderContainer.append($iconSpinner);
            $loaderContainer.append($loaderImage);
            $div.append($loaderContainer);

            $('body').prepend($div);
            $('body').css('overflow', 'hidden');
            $div.fadeIn(200);
        }

        window.paginaBloqueadaCount++;

    } else {
        if (window.paginaBloqueadaCount > 0) {
            window.paginaBloqueadaCount--;

            if (window.paginaBloqueadaCount === 0) {
                $('#bloqueio').fadeOut(200, function () {
                    $(this).remove();
                    $('body').css('overflow', '');
                });
            }

        }
    }
}
