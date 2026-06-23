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

## Guida all'esecuzione

Servono **XAMPP** (con Apache e MySQL) e un browser. L'archivio consegnato si chiama
`Gruppo2855_Elaborato.zip`.

### 1. Estrarre i file
Estrarre `Gruppo2855_Elaborato.zip` dentro la cartella `htdocs` di XAMPP. L'archivio contiene
la cartella `PetCare+`, quindi si deve ottenere:

```text
C:\xampp\htdocs\PetCare+\
```

### 2. Avviare i servizi
Aprire il **pannello di controllo di XAMPP** e premere **Start** sia su **Apache** sia su **MySQL**.

### 3. Creare e importare il database
L'applicazione si collega a un database chiamato **`PetCare`** (utente `root`, password vuota:
sono i valori di default di XAMPP, già impostati in `app/db.php`).

1. Aprire il browser su <http://localhost/phpmyadmin>
2. Creare un nuovo database chiamato esattamente **`PetCare`**
3. Selezionarlo, andare nella scheda **Importa** e importare **prima** il file
   `sql/petcare_schema.sql` (crea le tabelle)
4. Sempre nella scheda **Importa**, importare poi `sql/petcare_dati.sql` (inserisce i dati di esempio)

> Questo passaggio è obbligatorio: senza il database `PetCare` le pagine che mostrano elenchi
> (es. *Elenco animali*) restituiscono un errore di connessione/query.

### 4. Aprire l'applicazione
Andare su:

```text
http://localhost/PetCare+/app/index.php
```

Si apre la dashboard di PetCare+ ed è possibile usare tutte le funzioni.
