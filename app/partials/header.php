<?php
/* Header condiviso — richiede opzionalmente:
   $page_title, $page_heading, $page_subtitle, $show_back, $active, $alert, $wide */
$page_title = $page_title ?? 'PetCare+';
$active     = $active ?? '';
function navcls($k, $active) { return $k === $active ? ' class="is-active"' : ''; }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($page_title) ?> · PetCare+</title>
    <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
</head>
<body>
<header class="topbar">
    <div class="topbar-inner">
        <a class="brand" href="index.php">
            <span class="brand-mark" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                    <ellipse cx="6.5" cy="9" rx="1.8" ry="2.4"/>
                    <ellipse cx="11" cy="6.6" rx="1.9" ry="2.6"/>
                    <ellipse cx="16" cy="7.2" rx="1.9" ry="2.5"/>
                    <ellipse cx="19" cy="11" rx="1.7" ry="2.2"/>
                    <path d="M12.4 11.4c2.2 0 4 1.7 4.5 3.6.4 1.7-.9 3-2.6 3-1 0-1.4-.4-1.9-.4s-.9.4-1.9.4c-1.7 0-3-1.3-2.6-3 .5-1.9 2.3-3.6 4.5-3.6Z"/>
                </svg>
            </span>
            <span class="brand-name">PetCare<span class="brand-plus">+</span></span>
        </a>
        <nav class="topnav">
            <a href="index.php"<?= navcls('dashboard', $active) ?>>Dashboard</a>
            <a href="lista_animali.php"<?= navcls('animali', $active) ?>>Animali</a>
            <a href="admin.php"<?= navcls('admin', $active) ?>>Amministrazione</a>
        </nav>
    </div>
</header>
<main class="container<?= !empty($wide) ? ' wide' : '' ?>">
    <?php if (!empty($show_back)): ?>
    <a class="back-link" href="index.php">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        Torna alla dashboard
    </a>
    <?php endif; ?>

    <?php if (!empty($page_heading)): ?>
    <div class="page-head">
        <h1><?= htmlspecialchars($page_heading) ?></h1>
        <?php if (!empty($page_subtitle)): ?><p class="page-sub"><?= htmlspecialchars($page_subtitle) ?></p><?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($alert)): ?>
    <div class="alert alert-<?= $alert[0] === 'ok' ? 'ok' : 'err' ?>"><?= htmlspecialchars($alert[1]) ?></div>
    <?php endif; ?>
