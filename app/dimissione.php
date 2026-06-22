<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Dimissione Ricovero</title></head>
<body>
<h2>Dimissione da Ricovero</h2>
<form method="post">
    ID Ricovero: <input type="number" name="id_ricovero" required><br>
    Data Uscita: <input type="date" name="data_uscita" required><br>
    Diagnosi Dimissione: <input type="text" name="diagnosi_dimissione" required><br>
    <input type="submit" name="submit" value="Dimetti">
</form>
<?php
if (isset($_POST['submit'])) {
    $id_ricovero = (int)$_POST['id_ricovero'];

    $res = $conn->query("SELECT IDBox FROM Ricovero WHERE IDRicovero=$id_ricovero");
    if ($res && $row = $res->fetch_assoc()) {
        $id_box = $row['IDBox'];

        $sql_ricovero = "UPDATE Ricovero SET DataUscita='{$_POST['data_uscita']}', DiagnosiDimissione='{$_POST['diagnosi_dimissione']}' WHERE IDRicovero=$id_ricovero";
        $sql_box      = "UPDATE Box SET StatoOccupazione='Libero' WHERE IDBox=$id_box";

        if ($conn->query($sql_ricovero) && $conn->query($sql_box)) {
            echo "Dimissione effettuata e box liberato!";
        } else {
            echo "Errore: " . $conn->error;
        }
    } else {
        echo "Ricovero non trovato.";
    }
}
?>
</body>
</html>
