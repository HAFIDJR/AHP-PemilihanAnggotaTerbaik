<?php

include "../includes/config.php";
$config = new Config();
$db = $config->getConnection();

//  make Query

$password = "admin";
$user = "admin";

$hashPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "UPDATE `ahp_pengguna` SET `username`='$user',`password`='$hashPassword' WHERE `id_pengguna` = 1 ";
$stmt = $db->prepare($query);
if ($stmt->execute()) {
    echo "succes";
} else {
    echo "gagal";
}
