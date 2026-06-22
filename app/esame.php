<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Esame (IDLaboratorio, IDCartella, Tipo, Data, Referto)
            VALUES ({$_POST['id_lab']}, {$_POST['id_cartella']}, '{$_POST['tipo']}', '{$_POST['data']}', '{$_POST['referto']}')";
    $alert = $conn->query($sql) ? ['ok', "Esame registrato!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Esame diagnostico";
$page_heading  = "Inserisci esame";
$page_subtitle = "Registra un esame di laboratorio collegandolo alla cartella clinica e al referto.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_lab">ID Laboratorio</label>
                <input id="id_lab" type="number" name="id_lab" required>
            </div>
            <div class="field">
                <label for="id_cartella">ID Cartella</label>
                <input id="id_cartella" type="number" name="id_cartella" required>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="tipo">Tipo</label>
                <input id="tipo" type="text" name="tipo" placeholder="Es. Radiografia toracica" required>
            </div>
            <div class="field">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
        </div>
        <div class="field">
            <label for="referto">Referto</label>
            <textarea id="referto" name="referto" placeholder="Esito dell'esame" required></textarea>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Registra esame</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
