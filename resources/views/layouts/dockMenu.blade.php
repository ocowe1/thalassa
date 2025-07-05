<div class="toggle-dockmenu-button" title="Esconder Menu">☰</div>

<div class="dockmenu">
    <div class="dockmenu-section">


        <a class="dockmenu-item" style="display: none"></a>

    </div>

</div>




@section('javascripts')
    @parent
    <script>

        document.addEventListener("DOMContentLoaded", function () {

            const dockmenu = document.querySelector('.dockmenu');
            let dropdownOpen = false;
            let dockmenuShow = false;
            let dockmenuToggleHidden = false;
            let hideTimeout;

            // Função para esconder a dockmenu
            function hidedockmenu() {
                if (!dropdownOpen && !dockmenuShow) {
                    dockmenuShow = false;
                    dockmenu.classList.add('hidden');
                }
            }

            // Função para mostrar a dockmenu
            function showdockmenu() {
                clearTimeout(hideTimeout);
                dockmenu.classList.remove('hidden');
            }

            $(document).on('click', '.toggle-dockmenu-button', function () {
                if (dockmenuToggleHidden) {
                    $('.dockmenu').removeClass('hiddenToggle');
                    dockmenuToggleHidden = false;
                } else {
                    $('.dockmenu').addClass('hiddenToggle');
                    dockmenuToggleHidden = true;
                }
            });

            // Detecta a proximidade da parte inferior da tela e exibe a dockmenu
            document.addEventListener('mousemove', function (event) {
                const distanceFromBottom = window.innerHeight - event.clientY;

                if (dockmenuToggleHidden) {
                    return;
                }

                if (distanceFromBottom < 80) {
                    dockmenuShow = true;
                    showdockmenu();
                } else {
                    // Define um tempo para esconder a dockmenu se não houver dropdown aberto
                    if (!dropdownOpen) {
                        hideTimeout = setTimeout(hidedockmenu, 5000);
                    }
                }
            });

            // Manter a dockmenu visível ao interagir com dropdowns
            document.querySelectorAll('.dockmenu-item').forEach(item => {
                item.addEventListener('click', function (event) {
                    if (item.querySelector('.dropdown-menu')) {
                        dropdownOpen = true;
                        dockmenuShow = true;
                        showdockmenu();
                    }
                });
            });

            // Fechar a dockmenu ao clicar fora dela
            document.addEventListener('click', function (event) {
                if (!dockmenu.contains(event.target) && !dropdownOpen) {
                    dockmenuShow = false;
                    hidedockmenu();
                } else if (!dockmenu.contains(event.target)) {
                    dockmenuShow = false;
                    dropdownOpen = false;
                    hidedockmenu();
                }
            });

            // Manter a dockmenu visível quando o mouse está sobre ela
            dockmenu.addEventListener('mouseenter', function () {
                clearTimeout(hideTimeout);
                dockmenuShow = true;
                showdockmenu();
            });

            dockmenu.addEventListener('mouseleave', function () {
                if (!dropdownOpen) {
                    dockmenuShow = false;
                    hideTimeout = setTimeout(hidedockmenu, 5000);
                }
            });

            const dockmenuItems = document.querySelectorAll('.dockmenu-item');

            dockmenuItems.forEach(item => {
                item.addEventListener('mouseenter', function () {
                    // Fecha todos os dropdowns e remove a classe 'hovered' de todos os itens
                    dockmenuItems.forEach(i => {
                        if (i !== item) {
                            i.classList.remove('open');
                        }
                    });
                });

                item.addEventListener('mouseleave', function () {
                    if (!item.classList.contains('open')) {
                        item.classList.remove('open');
                    }
                });

            });

            // Fecha o dropdown quando clicar fora da dockmenu
            document.addEventListener('click', function (e) {
                if (!e.target.closest('.dockmenu-item')) {
                    dockmenuItems.forEach(item => {
                        item.classList.remove('open');
                    });
                }
            });
        });
    </script>

@endsection
