<?php

session_start();

$pseudo = $_POST['pseudo'];
$_SESSION['pseudo'] = $pseudo;

header('Location: mc_post.php');

?>