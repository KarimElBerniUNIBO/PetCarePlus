<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Inserisci Trattamento</title></head>
<body>
<h2>Inserimento Trattamento</h2>
<form method="post">
    Tipo: <input type="text" name="tipo" required><br>
    Descrizione: <input type="text" name="descrizione" required><br>
    Data: <input type="date" name="data" required><br>
    ID Cartella: <input type="number" name="id_cartella" required><br>
    ID Visita: <input type="number" name="id_visita" required><br>
    <input type="submit" name="submit" value="Inserisci">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Trattamento (Tipo, Descrizione, Data, IDCartella, IDVisita)
            VALUES ('{$_POST['tipo']}', '{$_POST['descrizione']}', '{$_POST['data']}', {$_POST['id_cartella']}, {$_POST['id_visita']})";
    echo $conn->query($sql) ? "Trattamento inserito!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
