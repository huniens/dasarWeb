<?php
include('../lib/Session.php'); 
include('../lib/Connection.php');

$session = new Session();
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Persiapkan statement (Pastikan $db adalah instance dari mysqli)
    $query = $db->prepare('SELECT * FROM m_user WHERE username = ?');
    if ($query === false) {
        die('Query preparation failed: ' . $db->error);
    }

    $query->bind_param('s', $username);
    $query->execute();

    // Ambil data hasil query
    $result = $query->get_result();
    $data = $result->fetch_assoc();

    // Cek password
    if ($data && password_verify($password, $data['password'])) {
        $session->set('is_login', true);
        $session->set('username', $data['username']);
        $session->set('name', $data['nama']);
        $session->set('level', $data['level']);
        $session->commit();

        header('Location: ../index.php', false);
    } else {
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username dan password salah.');
        $session->commit();

        header('Location: ../login.php', false);
    }
} else if ($act == 'logout') {
    $session->deleteAll();
    header('Location: ../login.php', false);
}
