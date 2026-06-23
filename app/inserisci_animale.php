<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $specie = $_POST['specie'];
    $razza  = $_POST['razza'];
    $eta    = $_POST['eta'];
    $nome   = $_POST['nome'];

    $sql = "INSERT INTO Animale (Specie, Razza, Eta, Nome) VALUES ('$specie', '$razza', $eta, '$nome')";
    if ($conn->query($sql) === TRUE) {
        // creo anche la cartella clinica
        $id_animale = $conn->insert_id;
        $sql2 = "INSERT INTO CartellaClinica (IDAnimale) VALUES ($id_animale)";
        if ($conn->query($sql2) === TRUE) {
            $alert = ['ok', "Animale e cartella clinica creati correttamente!"];
        } else {
            $alert = ['err', "Animale inserito ma errore nella cartella clinica: " . $conn->error];
        }
    } else {
        $alert = ['err', "Errore: " . $conn->error];
    }
}

$page_title    = "Nuovo animale";
$page_heading  = "Inserisci un nuovo animale";
$page_subtitle = "Aggiungi un animale al sistema.";
$show_back = true;
$active = 'animali';
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="specie">Specie</label>
                <input id="specie" type="text" name="specie" placeholder="Es. Cane" required>
            </div>
            <div class="field">
                <label for="razza">Razza</label>
                <input id="razza" type="text" name="razza" placeholder="Es. Labrador" required>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="nome">Nome</label>
                <input id="nome" type="text" name="nome" placeholder="Es. Fido" required>
            </div>
            <div class="field">
                <label for="eta">Età</label>
                <input id="eta" type="number" name="eta" min="0" placeholder="Anni" required>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Salva animale</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
