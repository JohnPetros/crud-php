<?php
require_once("./src/db/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/src/favicon_io/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="src/css/global.css?=<?= time() ?>">
  <link rel="stylesheet" href="src/css/table.css?=<?= time() ?>">
  <link rel="stylesheet" href="src/css/message.css?=<?= time() ?>">
  <link rel="stylesheet" href="src/css/update-modal.css?=<?= time() ?>">
  <link rel="stylesheet" href="src/css/delete-modal.css?=<?= time() ?>">
  <script defer src="./src/js/script.js?=<?= time() ?>"></script>
  <title>CRUD - PHP</title>
</head>

<body>
  <form method="post" class="container">
    <?php include "./src/includes/message.php"; ?>

    <?php include "./src/includes/table.php"; ?>
  </form>

  <?php include "./src/includes/aside.php"; ?>

  <?php include "./src/includes/update-modal.php"; ?>

  <?php include "./src/includes/delete-modal.php"; ?>

  <div class="fade hidden"></div>

  <?php session_destroy() ?>
</body>

</html>