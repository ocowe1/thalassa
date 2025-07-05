<div>

    <!-- Header -->
    <header class="header">
        <nav class="nav-container">
            <div class="nav-content">
                <div class="nav-left">
                    <h1 class="logo-text">Thalassa</h1>
                </div>

                <div class="nav-menu">
                    <button class="nav-button" data-section="races">Raças</button>
                    <button class="nav-button" data-section="spells">Magias</button>
                    <button class="nav-button" data-section="weapons">Armas</button>

                    <button disabled style="opacity: 0.2">|</button>

                    <button class="nav-button">Login</button>

                </div>
            </div>
        </nav>
    </header>

    <script>
        // Navigation functionality
        document.querySelectorAll('.nav-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.nav-button').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

</div>
