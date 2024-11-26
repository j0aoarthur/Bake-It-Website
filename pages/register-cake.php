<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../config/auth.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $imagem_url = filter_input(INPUT_POST, 'imagem_url', FILTER_SANITIZE_URL);

    if ($nome && $imagem_url) {
        try {
            $sql = "INSERT INTO cakes (name, imagem_url) VALUES (:name, :imagem_url)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':name' => $nome, ':imagem_url' => $imagem_url]);
            $sucesso = "Bolo registrado com sucesso!";
        } catch (PDOException $e) {
            $erro = "Erro ao registrar bolo: " . $e->getMessage();
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<?php
ob_start();
?>
    <section id="register-cake" class="register-cake section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Adicionar Bolo</h2>
                <p>Adicione um novo bolo no catálogo</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($erro)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($erro) ?>
                        </div>
                    <?php elseif (isset($sucesso)): ?>
                        <div class="alert alert-success" role="alert">
                            <?= htmlspecialchars($sucesso) ?>
                        </div>
                    <?php endif; ?>
                    <form id="register-cake-form" method="POST" action="register-cake.php" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do bolo" required>
                        </div>
                        <div class="mb-3">
                            <label for="imagem_url" class="form-label">URL da Imagem</label>
                            <input type="url" class="form-control" id="imagem_url" name="imagem_url" placeholder="Digite a URL da imagem" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
?>