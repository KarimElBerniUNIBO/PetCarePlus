<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Gestione Box</title></head>
<body>
<h2>Aggiorna Stato Box</h2>
<form method="post">
    ID Box: <input type="number" name="id_box" required><br>
    Nuovo Stato:
    <select name="stato">
        <option value="Libero">Libero</option>
        <option value="Occupato">Occupato</option>
    </select><br>
    <input type="submit" name="submit" value="Aggiorna">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "UPDATE Box SET StatoOccupazione='{$_POST['stato']}' WHERE IDBox={$_POST['id_box']}";
    echo $conn->query($sql) ? "Box aggiornato!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
