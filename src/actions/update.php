<?php
require_once '../db/connect.php';
require_once '../helpers/clear.php';

if (isset($_POST['submit-update'])) {
    $id = clear($_POST["update-id"]);
    $name = clear($_POST["update-name"]);
    $email = clear($_POST["update-email"]);
    $phone = clear($_POST["update-phone"]);

    include_once '../helpers/validate.php';

    $stmt = $connect->prepare("UPDATE user SET name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssss", $name, $email, $phone, $id);
    if (!$stmt->execute()) {
        print_r($stmt->error);

        $_SESSION["msg"] = "Erro interno no sistema!";
        $_SESSION["type"] = "error";
    } else {
        $_SESSION["msg"] = "Usuário editado com successo!";
        $_SESSION["type"] = "success";
    }
    header('location: ../../index.php');
}
