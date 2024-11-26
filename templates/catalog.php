<?php
require __DIR__ . '/../config/db.php';

try {
    $sql = "SELECT * FROM cakes";
    $stmt = $pdo->query($sql);
    $cakes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Erro ao buscar bolos: " . $e->getMessage();
}
?>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Bolos da Bake It</h2>
        <p>Explore nossos deliciosos e lindamente elaborados bolos, perfeitos para qualquer ocasião.</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <?php foreach ($cakes as $cake): ?>
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <a href="<?= htmlspecialchars($cake['imagem_url']) ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="<?= htmlspecialchars($cake['imagem_url']) ?>" class="img-fluid" alt="">
                            </a>
                            <div class="portfolio-info">
                                <h4><a class="text-capitalize text-black" title="Mais Detalhes"><?= htmlspecialchars($cake['name']) ?></a></h4>
                                <p><?= htmlspecialchars($cake['description']) ?></p>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                <?php endforeach; ?>

            </div><!-- End Portfolio Container -->
        </div>
    </div>

</section><!-- /Portfolio Section -->