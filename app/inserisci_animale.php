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
            // Apertura automatica della cartella clinica per il nuovo animale (Op. 13)
            $id_animale = $conn->insert_id;
            $sql2 = "INSERT INTO CartellaClinica (IDAnimale) VALUES ($id_animale)";
            if ($conn->query($sql2) === TRUE) {
                echo "Animale e cartella clinica creati correttamente!";
            } else {
                echo "Animale inserito ma errore nella cartella clinica: " . $conn->error;
            }
        } else {
            echo "Errore: " . $conn->error;
        }
    }
    ?>
</body>
</html>
