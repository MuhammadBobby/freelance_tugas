<?php
function encryptPassword($password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    return $hashedPassword;
}

function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}
?>
