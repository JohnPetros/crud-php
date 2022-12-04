<?php

function clear($input)
{
    $data = trim($input);
    $data = stripslashes($input);
    $data = htmlspecialchars($input);
    return $data;
}
