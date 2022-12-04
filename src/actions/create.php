<?php
require_once '../db/connect.php';
require_once '../helpers/clear.php';

if (isset($_POST["submit"])) {
    $name = clear($_POST["name"]);
    $email = clear($_POST["email"]);
    $phone = clear($_POST["phone"]);

    include_once '../helpers/validate.php';

    $stmt = $connect->prepare("INSERT INTO user VALUES (null, ?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
    if (!$stmt->execute()) {
        
        $_SESSION["msg"] = "Erro interno no sistema!";
        $_SESSION["type"] = "error";

        if (strpos($stmt->error, "Duplicate") !== false) {
            $_SESSION["msg"] = "E-mail ou Telefone já cadastrado";
            $_SESSION["type"] = "error";

            $_SESSION["user-info"] = array("name" => $name, "email" => $email, "phone" => $phone);
        }
    } else {
        $_SESSION["msg"] = "Usuário inserido com successo!";
        $_SESSION["type"] = "success";
    }
    header('location: ../../index.php');
}
