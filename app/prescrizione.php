<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Prescrizione</title></head>
<body>
<h2>Inserisci Prescrizione</h2>
<form method="post">
    ID Farmaco: <input type="number" name="id_farmaco" required><br>
    ID Cartella: <input type="number" name="id_cartella" required><br>
    Quantità: <input type="number" name="quantita" required><br>
    Prezzo Finale: <input type="number" step="0.01" name="prezzo" required><br>
    Data: <input type="date" name="data" required><br>
    <input type="submit" name="submit" value="Inserisci">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Prescrizione (IDFarmaco, IDCartella, Quantita, PrezzoFinale, Data)
            VALUES ({$_POST['id_farmaco']}, {$_POST['id_cartella']}, {$_POST['quantita']}, {$_POST['prezzo']}, '{$_POST['data']}')";
    echo $conn->query($sql) ? "Prescrizione salvata!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
