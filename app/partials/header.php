<?php
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="topbar">
    <div class="topbar-inner">
        <a class="brand" href="index.php">
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
    <a class="back-link" href="index.php">&larr; Torna alla dashboard</a>
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
