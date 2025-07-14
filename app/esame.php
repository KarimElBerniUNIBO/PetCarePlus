<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Esame</title></head>
<body>
<h2>Inserisci Esame</h2>
<form method="post">
    ID Laboratorio: <input type="number" name="id_lab" required><br>
    ID Cartella: <input type="number" name="id_cartella" required><br>
    Tipo: <input type="text" name="tipo" required><br>
    Data: <input type="date" name="data" required><br>
    Referto: <input type="text" name="referto" required><br>
    <input type="submit" name="submit" value="Inserisci">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Esame (IDLaboratorio, IDCartella, Tipo, Data, Referto)
            VALUES ({$_POST['id_lab']}, {$_POST['id_cartella']}, '{$_POST['tipo']}', '{$_POST['data']}', '{$_POST['referto']}')";
    echo $conn->query($sql) ? "Esame registrato!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
