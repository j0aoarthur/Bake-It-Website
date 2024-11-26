<?php
ob_start();
?>

<section id="hero" class="hero section accent-background">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2><span>Bem-vindo à </span><span class="accent">Bake It</span></h2>
                <p>Descubra os melhores bolos artesanais. Cada fatia é uma experiência única e deliciosa.</p>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
                <img src="assets/img/cake-shop.svg" alt="">
            </div>
        </div>
    </div>
</section>

<?php include  __DIR__ . '/templates/catalog.php'; ?>
<?php include  __DIR__ . '/templates/contact.php'; ?>

<?php
$content = ob_get_clean();
include 'templates/layout.php';
?>