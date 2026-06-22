<?php
include "db.php";
$alert = null;
if (isset($_POST['submit'])) {
    $id_farmaco = (int)$_POST['id_farmaco'];
    $quantita   = (int)$_POST['quantita'];

    // PrezzoFinale calcolato automaticamente = PrezzoUnitario × Quantità (Op. 6, sez. 3.4)
    $res = $conn->query("SELECT PrezzoUnitario FROM Farmaco WHERE IDFarmaco = $id_farmaco");
    if ($res && $row = $res->fetch_assoc()) {
        $prezzo_finale = $row['PrezzoUnitario'] * $quantita;
        $sql = "INSERT INTO Prescrizione (IDFarmaco, IDCartella, Quantita, PrezzoFinale, Data)
                VALUES ($id_farmaco, {$_POST['id_cartella']}, $quantita, $prezzo_finale, '{$_POST['data']}')";
        $alert = $conn->query($sql)
            ? ['ok', "Prescrizione salvata! Prezzo finale: € " . number_format($prezzo_finale, 2)]
            : ['err', "Errore: " . $conn->error];
    } else {
        $alert = ['err', "Farmaco non trovato."];
    }
}

$page_title    = "Prescrizione";
$page_heading  = "Inserisci prescrizione";
$page_subtitle = "Il prezzo finale viene calcolato automaticamente come prezzo unitario del farmaco × quantità.";
$show_back = true;
include "partials/header.php";
?>
<section class="card">
    <form class="form" method="post">
        <div class="form-row">
            <div class="field">
                <label for="id_farmaco">ID Farmaco</label>
                <input id="id_farmaco" type="number" name="id_farmaco" required>
            </div>
            <div class="field">
                <label for="id_cartella">ID Cartella</label>
                <input id="id_cartella" type="number" name="id_cartella" required>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label for="quantita">Quantità</label>
                <input id="quantita" type="number" name="quantita" min="1" required>
            </div>
            <div class="field">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn" type="submit" name="submit">Inserisci prescrizione</button>
        </div>
    </form>
</section>
<?php include "partials/footer.php"; ?>
