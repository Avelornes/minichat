<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mini-chat</title>
</head>
<body>

<form action="session.php" method="post">
    <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo']; ?>"/><br/>
        <label for="message">Message</label> : <input type="text" name="message" id="pseudo"/><br/>

        <input type="submit" value="Envoyer"/>
    </p>
</form>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT `pseudo`, `message`, `date` FROM `chat` ORDER BY ID DESC LIMIT 0, 10');

while ($donnees = $reponse->fetchObject()) {
    $dateDisplay = new DateTime($donnees->date);
    echo '<p><strong>' .  $dateDisplay->format('d-m-Y H:i') . ' ' . htmlspecialchars($donnees->pseudo) . '</strong>: ' . htmlspecialchars($donnees->message) . '</p>';
}

$reponse->closeCursor();

?>
</body>
</html>