<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/database.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit;
}

$isAjax = !empty($_POST['ajax']) || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

$email = trim(strtolower($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';
$redirect = !empty($_POST['redirect']) ? $_POST['redirect'] : (!empty($_GET['redirect']) ? $_GET['redirect'] : '../profile.php');

if (empty($email) || empty($password)) {
    $msg = 'Please enter both email and password.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../login.php');
    exit;
}

$stmt = $conn->prepare("SELECT id, name, email, password, role FROM `users` WHERE `email` = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        $stmt->close();

        // Password verification (bcrypt with fallback)
        $passwordValid = false;
        if (password_verify($password, $user['password'])) {
            $passwordValid = true;
        } elseif ($password === $user['password']) {
            $passwordValid = true;
            // Upgrade legacy plain text password to bcrypt
            $newHash = password_hash($password, PASSWORD_BCRYPT);
            $upg = $conn->prepare("UPDATE `users` SET `password` = ? WHERE `id` = ?");
            $upg->bind_param("si", $newHash, $user['id']);
            $upg->execute();
            $upg->close();
        }

        if ($passwordValid) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'] ?? 'customer';
            $_SESSION['flash_success'] = 'Welcome back, ' . htmlspecialchars($user['name']) . '!';

            if ($isAjax) {
                header('Content-Type: application/json');
                echo json_encode(['status' => true, 'message' => 'Login successful!']);
                exit;
            }
            header('Location: ' . $redirect);
            exit;
        }
    } else {
        $stmt->close();
    }
}

$failMsg = 'Invalid email address or password.';
if ($isAjax) {
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => $failMsg]);
    exit;
}
$_SESSION['flash_error'] = $failMsg;
header('Location: ../login.php');
exit;
?>
