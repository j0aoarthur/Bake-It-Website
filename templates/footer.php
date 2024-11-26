<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
        <div class="row gy-4 justify-content-between">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="<?= BASE_URL ?>index.php" class="logo d-flex align-items-center">
                    <span class="sitename">Bake It</span>
                </a>
                <p>Na Bake It, oferecemos bolos artesanais feitos com os melhores ingredientes. Cada fatia é uma explosão de sabor e qualidade, perfeita para qualquer ocasião especial.</p>
                <div class="social-links d-flex mt-4">
                    <a href="https://joaoarthur.com"><i class="bi bi-linkedin"></i></a>
                    <a href="https://joaoarthur.com"><i class="bi bi-instagram"></i></a>
                    <a href="https://joaoarthur.com"><i class="bi bi-github"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Links</h4>
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php">Home<br></a></li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <li><a href="<?= BASE_URL ?>pages/admin.php">Página do Administrador</a></li>
                        <li><a href="<?= BASE_URL ?>config/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="<?= BASE_URL ?>pages/login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact">
                <h4>Contate-Nos</h4>
                <p>Rua Exemplo, 123</p>
                <p>São Paulo, SP 01234-567</p>
                <p>Brasil</p>
                <p class="mt-4"><strong>Telefone:</strong> <span>+55 11 1234-5678</span></p>
                <p><strong>Email:</strong> <span>contato@exemplo.com</span></p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>©<span>Copyright</span> <strong class="px-1 sitename">Bake It</strong> <span>Todos direitos Reservados</span></p>
    </div>

</footer>