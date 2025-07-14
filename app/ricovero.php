<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Ricovero</title></head>
<body>
<h2>Registra Ricovero</h2>
<form method="post">
    ID Cartella: <input type="number" name="id_cartella" required><br>
    Settore: <input type="number" name="id_settore" required><br>
    Data Ingresso: <input type="date" name="data_ingresso" required><br>
    Diagnosi Iniziale: <input type="text" name="diagnosi" required><br>
    <input type="submit" name="submit" value="Registra">
</form>
<?php
if (isset($_POST['submit'])) {
    $box = $conn->query("SELECT IDBox FROM Box WHERE StatoOccupazione='Libero' AND IDSettore={$_POST['id_settore']} LIMIT 1")->fetch_assoc();
    if ($box) {
        $id_box = $box['IDBox'];
        $sql1 = "INSERT INTO Ricovero (IDCartella, IDBox, DataIngresso, DiagnosiIniziale)
                VALUES ({$_POST['id_cartella']}, $id_box, '{$_POST['data_ingresso']}', '{$_POST['diagnosi']}')";
        $sql2 = "UPDATE Box SET StatoOccupazione='Occupato' WHERE IDBox = $id_box";
        echo ($conn->query($sql1) && $conn->query($sql2)) ? "Ricovero registrato!" : "Errore: " . $conn->error;
    } else {
        echo "Nessun box disponibile!";
    }
}
?>
</body>
</html>
