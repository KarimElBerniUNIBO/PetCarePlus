<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Elenco Animali</title></head>
<body>
<h2>Elenco Animali</h2>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Specie</th><th>Razza</th><th>Età</th></tr>
<?php
$result = $conn->query("SELECT * FROM Animale");
if (!$result) {
    echo "<tr><td colspan='5'>Errore nella query: " . $conn->error . "</td></tr>";
} elseif ($result->num_rows === 0) {
    echo "<tr><td colspan='5'>Nessun animale presente.</td></tr>";
} else {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['IDAnimale']}</td>
            <td>{$row['Nome']}</td>
            <td>{$row['Specie']}</td>
            <td>{$row['Razza']}</td>
            <td>{$row['Eta']}</td>
        </tr>";
    }
}
?>
</table>
</body>
</html>
