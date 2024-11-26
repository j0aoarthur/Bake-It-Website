<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../config/auth.php';
require __DIR__ . '/../config/config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    try {
        $sql = "DELETE FROM cakes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $delete_id]);
        header('Location: admin.php');
        exit;
    } catch (PDOException $e) {
        $error = "Erro ao deletar bolo: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_url = $_POST['edit_url'];
    try {
        $sql = "UPDATE cakes SET name = :name, imagem_url = :url WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $edit_name, 'url' => $edit_url, 'id' => $edit_id]);
        header('Location: admin.php');
        exit;
    } catch (PDOException $e) {
        $error = "Erro ao editar bolo: " . $e->getMessage();
    }
}


try {
    $sqlCakes = "SELECT * FROM cakes";
    $sqlEmployees = "SELECT id, username FROM employees";
    $stmtCakes = $pdo->query($sqlCakes);
    $cakes = $stmtCakes->fetchAll(PDO::FETCH_ASSOC);
    $stmtEmployees = $pdo->query($sqlEmployees);
    $employees = $stmtEmployees->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Erro ao buscar dados: " . $e->getMessage();
}

ob_start();
?>
    <section class="text-center section section-title" data-aos="fade-up">
        <h1 class="fw-bold">Página de Administrador</h1>
        <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-center">
                <a href="<?= BASE_URL ?>pages/register-cake.php" type="button" class="btn btn-outline-primary px-4 gap-3">Adicionar Bolo</a>
                <a href="<?= BASE_URL ?>pages/register-employee.php" type="button" class="btn btn-outline-secondary px-4">Registrar Funcionário</a>
            </div>
        </div>
    </section>

    <section id="cake-list" class="blog-posts section" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Lista de Bolos</h2>
                <p>Gerencie os bolos cadastrados no sistema.</p>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <?php foreach ($cakes as $cake): ?>
                        <div class="col-lg-4">
                            <article class="align-content-center">
                                <div class="post-img">
                                    <img src="<?= htmlspecialchars($cake['imagem_url'] ?: 'https://placehold.co/600x400') ?>" alt="" class="img-fluid">
                                </div>
                                <h3 class="title"><?= htmlspecialchars($cake['name']) ?></h3>
                                <div class="">
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $cake['id'] ?>" data-name="<?= htmlspecialchars($cake['name']) ?>" data-url="<?= htmlspecialchars($cake['imagem_url']) ?>"> <i class="bi bi-pencil-square"></i> </button>
                                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $cake['id'] ?>"> <i class="bi bi-trash3-fill"></i> </button>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="employee-list" class="blog-posts section" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Lista de Funcionários</h2>
                <p>Gerencie os funcionários cadastrados no sistema.</p>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?= htmlspecialchars($employee['id']) ?></td>
                                <td><?= htmlspecialchars($employee['username']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php include __DIR__ . '/../templates/delete-modal.php'; ?>
<?php include __DIR__ . '/../templates/edit-modal.php'; ?>

<script src="<?= BASE_URL ?>/assets/js/admin.js"></script>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
?>