<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../config/auth.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirmar_senha = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    if ($username && $senha && $confirmar_senha) {
        if ($senha === $confirmar_senha) {
            try {
                $sqlCheck = "SELECT COUNT(*) FROM employees WHERE username = :username";
                $stmtCheck = $pdo->prepare($sqlCheck);
                $stmtCheck->execute([':username' => $username]);
                $count = $stmtCheck->fetchColumn();

                if ($count > 0) {
                    $erro = "O username já está em uso.";
                } else {
                    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO employees (username, password) VALUES (:username, :password)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':username' => $username, ':password' => $senha_hashed]);
                    $sucesso = "Funcionário registrado com sucesso!";
                }
            } catch (PDOException $e) {
                $erro = "Erro ao registrar funcionário: " . $e->getMessage();
            }
        } else {
            $erro = "As senhas não coincidem.";
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<?php
ob_start();
?>
    <section id="register-employee" class="register-employee section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Registrar Funcionário</h2>
                <p>Registre um novo funcionário no sistema.</p>
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
                    <form id="register-employee-form" method="POST" action="register-employee.php" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Digite o username do funcionário" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirme a senha" required>
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