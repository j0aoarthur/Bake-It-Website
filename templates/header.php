<?php
session_start();
?>

<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="home" class="logo d-flex align-items-center">
                <h1 class="sitename">Bake It</h1>
                <span>.</span>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php">Home<br></a></li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <li><a href="<?= BASE_URL ?>pages/admin.php">Página do Administrador</a></li>
                        <li><a href="<?= BASE_URL ?>config/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="<?= BASE_URL ?>pages/login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>