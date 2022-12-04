<?php
if (!empty($_SESSION["msg"]))
    echo '
      <div class="message ' . $_SESSION["type"] . '">
        ' . $_SESSION["msg"] . '
      </div>
      ';
?>