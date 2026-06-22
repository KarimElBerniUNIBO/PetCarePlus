<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Registra Visita</title></head>
<body>
<h2>Registrazione Visita</h2>
<form method="post">
    Data: <input type="date" name="data" required><br>
    Tipo Visita: <input type="text" name="tipo_visita" required><br>
    ID Persona: <input type="number" name="id_persona" required><br>
    ID Settore: <input type="number" name="id_settore" required><br>
    ID Cartella: <input type="number" name="id_cartella" required><br>
    <input type="submit" name="submit" value="Registra">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Visita (Data, TipoVisita, IDPersona, IDSettore, IDCartella)
            VALUES ('{$_POST['data']}', '{$_POST['tipo_visita']}', {$_POST['id_persona']}, {$_POST['id_settore']}, {$_POST['id_cartella']})";
    echo $conn->query($sql) ? "Visita registrata!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
