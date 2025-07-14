<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuovo Animale</title>
</head>
<body>
    <h2>Inserisci un nuovo animale</h2>
    <form method="post" action="">
        Specie: <input type="text" name="specie"><br>
        Razza: <input type="text" name="razza"><br>
        Età: <input type="number" name="eta"><br>
        Nome: <input type="text" name="nome"><br>
        <input type="submit" name="submit" value="Salva">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $specie = $_POST['specie'];
        $razza = $_POST['razza'];
        $eta = $_POST['eta'];
        $nome = $_POST['nome'];

        $sql = "INSERT INTO Animale (Specie, Razza, Eta, Nome) VALUES ('$specie', '$razza', $eta, '$nome')";
        if ($conn->query($sql) === TRUE) {
            echo "Animale inserito correttamente!";
        } else {
            echo "Errore: " . $conn->error;
        }
    }
    ?>
</body>
</html>
