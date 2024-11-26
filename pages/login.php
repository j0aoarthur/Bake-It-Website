<?php
require __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/setup.php';

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if ($username && $password) {
        try {
            $sql = "SELECT * FROM employees WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':username' => $username]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['loggedin'] = true;
                header("Location: admin.php");
                exit;
            } else {
                $error = "Usuário ou senha inválidos!";
            }
        } catch (PDOException $e) {
            $error = "Erro ao realizar login: " . $e->getMessage();
        }
    } else {
        $error = "Por favor, preencha todos os campos.";
    }
}
?>

<?php
ob_start();
?>
    <section id="login" class="login section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Login</h2>
                <p>Entre na sua conta para acessar a área de administração.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                    <form id="login-form" method="POST" action="login.php" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuário</label>
                            <input type="username" class="form-control" id="username" name="username" placeholder="Digite seu usuário" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
?>