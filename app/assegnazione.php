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
$page_subtitle = "Collega un veterinario o tecnico al settore clinico in cui opera stabilmente.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_persona">ID Persona</label>
                <input id="id_persona" type="number" name="id_persona" required>
            </div>
            <div class="field">
                <label for="id_settore">ID Settore</label>
                <input id="id_settore" type="number" name="id_settore" required>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Assegna</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
