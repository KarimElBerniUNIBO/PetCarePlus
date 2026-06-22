<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $sql = "UPDATE Box SET StatoOccupazione='{$_POST['stato']}' WHERE IDBox={$_POST['id_box']}";
    $alert = $conn->query($sql) ? ['ok', "Box aggiornato!"] : ['err', "Errore: " . $conn->error];
}

$page_title    = "Disponibilità box";
$page_heading  = "Aggiorna stato box";
$page_subtitle = "Imposta manualmente lo stato di occupazione di un box (manutenzione, sanificazione, ecc.).";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_box">ID Box</label>
                <input id="id_box" type="number" name="id_box" required>
            </div>
            <div class="field">
                <label for="stato">Nuovo stato</label>
                <select id="stato" name="stato">
                    <option value="Libero">Libero</option>
                    <option value="Occupato">Occupato</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Aggiorna</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
