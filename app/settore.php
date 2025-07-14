<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Aggiungi Settore</title></head>
<body>
<h2>Aggiungi Nuovo Settore</h2>
<form method="post">
    Nome Settore: <input type="text" name="nome" required><br>
    Tipo Specializzazione: <input type="text" name="tipo" required><br>
    <input type="submit" name="submit" value="Aggiungi">
</form>
<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Settore (Nome, TipoSpecializzazione)
            VALUES ('{$_POST['nome']}', '{$_POST['tipo']}')";
    echo $conn->query($sql) ? "Settore aggiunto!" : "Errore: " . $conn->error;
}
?>
</body>
</html>
