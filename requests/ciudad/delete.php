<?php
session_start();
include "../../config/connexion.php";

$id = $_GET['id'];
$delete = "DELETE FROM ciudad where id = '$id'";

if (mysqli_query($connexion, $delete)) {
    header("Location: ../../views/ciudad/lista.php");
    $_SESSION['response'] = 'success,Registro eliminado correctamente';
} else {
    header("Location: ../../views/ciudad/lista.php");
    $_SESSION['response'] = "danger," . mysqli_error($connexion);
}