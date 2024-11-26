<?php
require __DIR__ . '/../config/db.php';

$username = "admin";
$password = "admin1234";
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

try {
    // Verifica se há funcionários registrados
    $sqlCheck = "SELECT COUNT(*) FROM employees";
    $stmtCheck = $pdo->query($sqlCheck);
    $count = $stmtCheck->fetchColumn();

    if ($count == 0) {
        // Adiciona o funcionário padrão
        $sqlInsert = "INSERT INTO employees (username, password) VALUES (:username, :password)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([':username' => $username, ':password' => $password_hashed]);
        echo "Funcionário padrão adicionado com sucesso!";
    } else {
        echo "Já existem funcionários registrados no sistema.";
    }
} catch (PDOException $e) {
    echo "Erro ao verificar/adicionar funcionário padrão: " . $e->getMessage();
}
?>