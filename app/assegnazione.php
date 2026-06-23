<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO AssegnatoA (IDPersona, IDSettore)
            VALUES ({$_POST['id_persona']}, {$_POST['id_settore']})";
    $alert = $conn->query($sql) ? ['ok', "Assegnazione completata!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Assegna personale";
$page_heading  = "Assegna personale a settore";
$page_subtitle = "Assegna un veterinario a un settore.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_persona">Membro del personale</label>
                <?= render_select($conn, 'id_persona',
                    "SELECT IDPersona, Nome, Cognome, Specializzazione FROM Personale ORDER BY Cognome",
                    'IDPersona', fn($r) => "{$r['Nome']} {$r['Cognome']} ({$r['Specializzazione']})") ?>
            </div>
            <div class="field">
                <label for="id_settore">Settore</label>
                <?= render_select($conn, 'id_settore',
                    "SELECT IDSettore, Nome, TipoSpecializzazione FROM Settore ORDER BY Nome",
                    'IDSettore', fn($r) => "{$r['Nome']} ({$r['TipoSpecializzazione']})") ?>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Assegna</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
