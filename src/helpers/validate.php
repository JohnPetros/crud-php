<?php
session_start();
$_SESSION["flash-message"] = array("msg" => "", "type" => "");

if (empty($name) || empty($email) || empty($phone)) {
    $_SESSION["msg"] = "Nenhum campo pode estar vazio";
    $_SESSION["type"] = "error";
    $_SESSION["user-info"] = array("name" => $name, "email" => $email, "phone" => $phone);
    header('location: ../../index.php');
    exit();
}

if (!preg_match("/[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/", $name)) {
    $_SESSION["msg"] = "Somente é permitido letras e espaços em branco para o campo nome";
    $_SESSION["type"] = "error";
    $_SESSION["user-info"] = array("name" => $name, "email" => $email, "phone" => $phone);
    header('location: ../../index.php');
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["msg"] = "Formato de email inválido";
    $_SESSION["type"] = "error";
    $_SESSION["user-info"] = array("name" => $name, "email" => $email, "phone" => $phone);
    header('location: ../../index.php');
    exit();
}

if (!is_numeric($phone)) {
    $_SESSION["msg"] = "Somente é permitido números para o campo telefone";
    $_SESSION["type"] = "error";
    $_SESSION["user-info"] = array("name" => $name, "email" => $email, "phone" => $phone);
    header('location: ../../index.php');
    exit();
}

if (strlen($phone) != 11) {
    $_SESSION["msg"] = "Telefone deve possuir 11 dígitos";
    $_SESSION["type"] = "error";
    $_SESSION["user-info"] = array("name" => $name, "email" => $email, "phone" => $phone);
    header('location: ../../index.php');
    exit();
}
