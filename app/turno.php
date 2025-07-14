<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Inserisci Turno</title></head>
<body>
<h2>Inserisci Turno</h2>
<form method="post">
    ID Persona: <input type="number" name="id_persona" required><br>
    Data: <input type="date" name="data" required><br>
    Orario Inizio: <input type="time" name="inizio" required><br>
    Orario Fine: <input type="time" name="fine" required><br>
    <input type="submit" name="submit" value="Inserisci">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Turno (IDPersona, Data, OrarioInizio, OrarioFine)
            VALUES ({$_POST['id_persona']}, '{$_POST['data']}', '{$_POST['inizio']}', '{$_POST['fine']}')";
    echo $conn->query($sql) ? "Turno aggiunto!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
