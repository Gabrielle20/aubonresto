<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture Au bon resto</title>
</head>
<body>
    <style>
        table{
            border-collapse: collapse;
        }
        th{
            border: 1px solid black;
        }
        td{
            border: 1px solid black;
        }
    </style>
    <h1>Au bon resto</h1>
    <br>
    <p>Facture de <?php ?></p>
    <table>
    <thead>
        <tr>
            <th>Description</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Burger</td>
            <td>2</td>
            <td>10 €</td>
            <td>20 €</td>
        </tr>
    </tbody>
    </table>
</body>
</html>