<?php
$page_title = 'Dashboard';
$active = 'dashboard';

$icons = [
    'paw'    => '<path d="M12.4 11.4c2.2 0 4 1.7 4.5 3.6.4 1.7-.9 3-2.6 3-1 0-1.4-.4-1.9-.4s-.9.4-1.9.4c-1.7 0-3-1.3-2.6-3 .5-1.9 2.3-3.6 4.5-3.6Z" fill="currentColor" stroke="none"/><ellipse cx="6.5" cy="9" rx="1.6" ry="2.1" fill="currentColor" stroke="none"/><ellipse cx="10.6" cy="6.8" rx="1.7" ry="2.2" fill="currentColor" stroke="none"/><ellipse cx="15" cy="7" rx="1.7" ry="2.2" fill="currentColor" stroke="none"/><ellipse cx="18.4" cy="10" rx="1.5" ry="2" fill="currentColor" stroke="none"/>',
    'list'   => '<path d="M8 6h12M8 12h12M8 18h12M3.5 6h.01M3.5 12h.01M3.5 18h.01"/>',
    'cal'    => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/>',
    'bed'    => '<path d="M3 7v12M3 14h18a0 0 0 0 1 0 0v5M21 19v-5a4 4 0 0 0-4-4H9v4"/><circle cx="6" cy="11" r="1.6"/>',
    'pill'   => '<rect x="3" y="9" width="18" height="6" rx="3" transform="rotate(45 12 12)"/><path d="M8.5 8.5l7 7"/>',
    'lab'    => '<path d="M9 3h6M10 3v6l-5 9a2 2 0 0 0 1.8 3h10.4A2 2 0 0 0 19 18l-5-9V3"/><path d="M7.5 14h9"/>',
    'clock'  => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
    'users'  => '<circle cx="9" cy="8" r="3.2"/><path d="M3.5 20a5.5 5.5 0 0 1 11 0"/><path d="M16 5.2a3.2 3.2 0 0 1 0 5.6M17 14.4a5.5 5.5 0 0 1 3.5 5.6"/>',
    'layers' => '<path d="M12 3l9 5-9 5-9-5 9-5Z"/><path d="M3 13l9 5 9-5"/>',
    'box'    => '<path d="M21 8l-9-5-9 5 9 5 9-5Z"/><path d="M3 8v8l9 5 9-5V8M12 13v8"/>',
    'shield' => '<path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6l8-3Z"/><path d="M9 12l2 2 4-4"/>',
    'steth'  => '<path d="M4.5 3v4.5a4.5 4.5 0 0 0 9 0V3"/><path d="M9 16v.5a5.5 5.5 0 0 0 11 0V12"/><circle cx="20" cy="10" r="2"/>',
    'clip'   => '<rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4V3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1"/><path d="M12 10v6M9 13h6"/>',
    'exit'   => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/>',
];

$tiles = [
    ['inserisci_animale.php', 'paw',   'Nuovo animale',        'Registra un paziente e apri la sua cartella clinica.'],
    ['lista_animali.php',     'list',  'Elenco animali',       'Consulta tutti i pazienti registrati nel sistema.'],
    ['prenotazione.php',      'cal',   'Prenota visita',       'Pianifica una visita per un animale paziente.'],
    ['visita.php',            'steth', 'Registra visita',      'Registra una visita collegata a cartella, veterinario e settore.'],
    ['trattamento.php',       'clip',  'Trattamento',          'Inserisci un trattamento eseguito durante una visita.'],
    ['prescrizione.php',      'pill',  'Prescrizione',         'Prescrivi un farmaco con calcolo automatico del prezzo.'],
    ['esame.php',             'lab',   'Esame diagnostico',    'Registra un esame di laboratorio e il referto.'],
    ['ricovero.php',          'bed',   'Nuovo ricovero',       'Apri un ricovero assegnando un box disponibile.'],
    ['dimissione.php',        'exit',  'Dimissione',           'Dimetti un animale ricoverato e libera il box.'],
    ['turno.php',             'clock', 'Turno personale',      'Inserisci un turno orario per un membro del personale.'],
    ['assegnazione.php',      'users', 'Assegna personale',    'Collega un veterinario al settore di competenza.'],
    ['settore.php',           'layers','Nuovo settore',        'Aggiungi un reparto o una specializzazione clinica.'],
    ['box_update.php',        'box',   'Disponibilità box',    'Aggiorna manualmente lo stato di occupazione di un box.'],
];

include "partials/header.php";
?>
<section class="hero">
    <span class="eyebrow">Gestione clinica</span>
    <h1>Benvenuto in PetCare<span style="color:var(--accent)">+</span></h1>
    <p>Tutto il flusso di lavoro della struttura veterinaria in un unico posto: pazienti, ricoveri, terapie e organizzazione del personale.</p>
</section>

<div class="tile-grid">
    <?php foreach ($tiles as $t): ?>
    <a class="tile" href="<?= $t[0] ?>">
        <span class="tile-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?= $icons[$t[1]] ?></svg>
        </span>
        <h3><?= $t[2] ?></h3>
        <p><?= $t[3] ?></p>
    </a>
    <?php endforeach; ?>

    <a class="tile is-admin" href="admin.php">
        <span class="tile-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?= $icons['shield'] ?></svg>
        </span>
        <h3>Area amministratore</h3>
        <p>Visione completa: turni, ricoveri attivi, laboratori e box.</p>
    </a>
</div>
<?php include "partials/footer.php"; ?>
