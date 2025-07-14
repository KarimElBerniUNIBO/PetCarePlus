<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Assegna Personale</title></head>
<body>
<h2>Assegna Personale a Settore</h2>
<form method="post">
    ID Persona: <input type="number" name="id_persona" required><br>
    ID Settore: <input type="number" name="id_settore" required><br>
    <input type="submit" name="submit" value="Assegna">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO AssegnatoA (IDPersona, IDSettore)
            VALUES ({$_POST['id_persona']}, {$_POST['id_settore']})";
    echo $conn->query($sql) ? "Assegnazione completata!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
