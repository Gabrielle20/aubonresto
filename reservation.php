<?php include('nav.php'); ?>
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver</title>
</head>
<body>
    <h1>Réserver une table</h1>
    <form action="" method="POST">
        <label for="debut">Date de début de la réservation : </label>
        <input type="datetime-local" name="debut">
        <label for="fin">Date de fin de réservation : </label>
        <input type="datetime-local" name="fin">
        <label for="table">Table que vous souhaitez réserver </label>
        <select name="table" id="table">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">1</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <button type="submit">Réserver</button>
    </form>
</body>
</html>