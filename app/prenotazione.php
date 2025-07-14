<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Prenota Visita</title></head>
<body>
<h2>Prenotazione Visita</h2>
<form method="post">
    ID Animale: <input type="number" name="id_animale" required><br>
    ID Persona: <input type="number" name="id_persona" required><br>
    Data: <input type="date" name="data" required><br>
    <input type="submit" name="submit" value="Prenota">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Prenotazione (IDAnimale, IDPersona, Data)
            VALUES ({$_POST['id_animale']}, {$_POST['id_persona']}, '{$_POST['data']}')";
    echo $conn->query($sql) ? "Visita prenotata!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
