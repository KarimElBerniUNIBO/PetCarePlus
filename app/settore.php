<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO Settore (Nome, TipoSpecializzazione)
            VALUES ('{$_POST['nome']}', '{$_POST['tipo']}')";
    $alert = $conn->query($sql) ? ['ok', "Settore aggiunto!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Nuovo settore";
$page_heading  = "Aggiungi nuovo settore";
$page_subtitle = "Aggiungi un settore clinico.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="field">
            <label for="nome">Nome settore</label>
            <input id="nome" type="text" name="nome" placeholder="Es. Riabilitazione" required>
        </div>
        <div class="field">
            <label for="tipo">Tipo specializzazione</label>
            <input id="tipo" type="text" name="tipo" placeholder="Es. Fisioterapia" required>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Aggiungi settore</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
