<?php
$page_title = 'Dashboard';
$active = 'dashboard';

$tiles = [
    ['inserisci_animale.php', 'Nuovo animale',     'Registra un animale e apri la sua cartella clinica.'],
    ['lista_animali.php',     'Elenco animali',    'Tutti i pazienti registrati.'],
    ['prenotazione.php',      'Prenota visita',    'Prenota una visita per un animale.'],
    ['lista_prenotazioni.php', 'Elenco prenotazioni', 'Le visite prenotate.'],
    ['visita.php',            'Registra visita',   'Registra una visita effettuata.'],
    ['trattamento.php',       'Trattamento',       'Inserisci un trattamento di una visita.'],
    ['prescrizione.php',      'Prescrizione',      'Prescrivi un farmaco a un animale.'],
    ['esame.php',             'Esame diagnostico', 'Registra un esame e il referto.'],
    ['ricovero.php',          'Nuovo ricovero',    'Apri un ricovero e assegna un box.'],
    ['dimissione.php',        'Dimissione',        'Dimetti un animale e libera il box.'],
    ['turno.php',             'Turno personale',   'Inserisci un turno del personale.'],
    ['assegnazione.php',      'Assegna personale', 'Assegna un veterinario a un settore.'],
    ['settore.php',           'Nuovo settore',     'Aggiungi un settore clinico.'],
    ['box_update.php',        'Disponibilità box', 'Aggiorna lo stato di un box.'],
];

include "partials/header.php";
?>
<section class="hero">
    <span class="eyebrow">Gestione clinica</span>
    <h1>Benvenuto in PetCare+</h1>
    <p>Gestionale per ospedali veterinari: animali, ricoveri, terapie e personale.</p>
</section>

<div class="tile-grid">
    <?php foreach ($tiles as $t): ?>
    <a class="tile" href="<?= $t[0] ?>">
        <h3><?= $t[1] ?></h3>
        <p><?= $t[2] ?></p>
    </a>
    <?php endforeach; ?>

    <a class="tile is-admin" href="admin.php">
        <h3>Area amministratore</h3>
        <p>Turni, ricoveri attivi, laboratori e box.</p>
    </a>
</div>
<?php include "partials/footer.php"; ?>
