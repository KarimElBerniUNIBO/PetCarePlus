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
    Data: <input type="date" name="data" required><br>
    <input type="submit" name="submit" value="Inserisci">
</form>
<?php
if (isset($_POST['submit'])) {
    $id_farmaco = (int)$_POST['id_farmaco'];
    $quantita = (int)$_POST['quantita'];

    // PrezzoFinale calcolato automaticamente = PrezzoUnitario × Quantità (Op. 6, sez. 3.4)
    $res = $conn->query("SELECT PrezzoUnitario FROM Farmaco WHERE IDFarmaco = $id_farmaco");
    if ($res && $row = $res->fetch_assoc()) {
        $prezzo_finale = $row['PrezzoUnitario'] * $quantita;
        $sql = "INSERT INTO Prescrizione (IDFarmaco, IDCartella, Quantita, PrezzoFinale, Data)
                VALUES ($id_farmaco, {$_POST['id_cartella']}, $quantita, $prezzo_finale, '{$_POST['data']}')";
        echo $conn->query($sql) ? "Prescrizione salvata! Prezzo finale: € $prezzo_finale" : "Errore: " . $conn->error;
    } else {
        echo "Farmaco non trovato.";
    }
}
?>
</body>
</html>
