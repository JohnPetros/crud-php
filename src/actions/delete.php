<?php
session_start();
$_SESSION["flash-message"] = array("msg" => "", "type" => "");

require_once '../db/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $connect->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("s", $id);
    if (!$stmt->execute()) {
        print_r($stmt->error);

        $_SESSION["msg"] = "Erro interno no sistema!";
        $_SESSION["type"] = "error";
    } else {
        $_SESSION["msg"] = "Usuário deletado com successo!";
        $_SESSION["type"] = "success";
    }
    header('location: ../../index.php');
}
