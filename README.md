# PetCare+ 
Sistema informativo per la gestione clinica di ospedali veterinari  
Elaborato per il corso di **Basi di Dati** – A.A. 2024/2025

## Gruppo
- Luca Dellasantina – DB Designer
- Karim El Berni – Sviluppatore App
- Giorgia Ceccaroni – Coordinatore

## Descrizione del progetto
PetCare+ è un sistema per la gestione digitale delle attività cliniche, amministrative e logistiche di un ospedale veterinario.  
Il progetto include:
- Modellazione concettuale (E/R), logica e relazionale del database
- Applicazione funzionante con interfaccia utente
- Script SQL con dati di esempio e query reali
- Relazione tecnica completa

## Struttura del progetto

```text
PetCare+/
├── app/                 # Applicazione PHP
│   ├── css/             # Foglio di stile (style.css)
│   ├── partials/        # Header e footer condivisi
│   ├── index.php        # Dashboard
│   ├── admin.php        # Area amministratore
│   └── *.php            # Pagine delle 18 operazioni + db.php
├── sql/                 # petcare_schema.sql, petcare_dati.sql e le query (query_*.sql)
└── README.md            # Questo file
```

## Guida alla corretta esecuzione del software gestionale
- Estrarre la cartella PetCare+ dall archivio nella directory htdocs di xampp: C:\xampp\htdocs
- Aprire XAMPP e cliccare su start sia su MySQL che su Apache
- Aprire un browser e andare su http://localhost/PetCare+/app/index.php
- Il software è pronto per l'uso
