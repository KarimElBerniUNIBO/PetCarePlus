
USE PetCare;

-- ANIMALE
INSERT INTO Animale (Specie, Razza, Eta, Nome) VALUES
('Cane', 'Labrador', 4, 'Fido'),
('Gatto', 'Siamese', 2, 'Lester'),
('Pappagallo', 'Ara di Spix', 2, 'Blu'),
('Coniglio', 'Nano', 1, 'Bunny'),
('Cane', 'Beagle', 3, 'Rocky'),
('Gatto', 'Persiano', 5, 'Mia'),
('Cane', 'Bulldog', 6, 'Bruno'),
('Gatto', 'Siamese', 2, 'Travis'),
('Cane', 'Golden Retriever', 3, 'Luna'),
('Gatto', 'Siamese', 2, 'Milena'),
('Cane', 'Barboncino', 4, 'Pippo'),
('Gatto', 'Siamese', 2, 'Dubi'),
('Cane', 'Pastor Tedesco', 5, 'Rex');


INSERT INTO Farmaco (Nome, PrezzoUnitario) VALUES
('Antibiotico A', 12.50),
('Cortisone B', 8.90),
('Vaccino X', 20.00);



-- PERSONALE
INSERT INTO Personale (Nome, Cognome, Specializzazione) VALUES
('Mario', 'Rossi', 'Ortopedia'),
('Laura', 'Verdi', 'Oncologia'),
('Francesca', 'Neri', 'Dermatologia'),
('Giulia', 'Bianchi', 'Medicina Interna'),
('Andrea', 'Conti', 'Terapia Intensiva'),
('Luca', 'Russo', 'Tecnico di laboratorio'),
('Elisa', 'Ferrari', 'Tecnico veterinario');

-- SETTORE
INSERT INTO Settore (Nome, TipoSpecializzazione) VALUES
('Ortopedia', 'Ortopedia'),
('Oncologia', 'Oncologia'),
('Dermatologia', 'Dermatologia'),
('Medicina Interna', 'Generale'),
('Terapia Intensiva', 'Emergenza'),
('Riabilitazione', 'Fisioterapia');

-- ASSEGNATOA
INSERT INTO AssegnatoA (IDPersona, IDSettore) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- CARTELLA CLINICA
INSERT INTO CartellaClinica (IDAnimale) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13);

-- VISITA
INSERT INTO Visita (Data, TipoVisita, IDPersona, IDSettore, IDCartella) VALUES
('2025-07-10', 'Controllo generale', 1, 1, 1),
('2025-07-11', 'Vaccinazione', 2, 2, 2),
('2025-07-12', 'Visita pre-operatoria', 3, 1, 1),
('2025-07-13', 'Visita post-operatoria', 1, 1, 1),
('2025-07-14', 'Esame specialistico', 2, 3, 3),
('2025-07-15', 'Controllo follow-up', 3, 4, 4),
('2025-07-16', 'Visita di emergenza', 4, 5, 5),
('2025-07-17', 'Controllo terapia intensiva', 5, 6, 6),
('2025-07-18', 'Visita di routine', 6, 1, 7),
('2025-07-19', 'Controllo post-ricovero', 1, 2, 8),
('2025-07-20', 'Visita di follow-up', 2, 3, 9),
('2025-07-21', 'Controllo dermatologico', 3, 4, 10),
('2025-07-22', 'Visita di riabilitazione', 4, 5, 11);


-- BOX
INSERT INTO Box (Tipo, StatoOccupazione, IDSettore) VALUES
-- Ortopedia
('Post-Operatorio', 'Occupato', 1),
('Post-Operatorio', 'Occupato', 1),

-- Oncologia
('Singolo', 'Occupato', 2),
('Isolamento', 'Occupato', 2),

-- Dermatologia
('Singolo', 'Occupato', 3),

-- Medicina Interna
('Singolo', 'Occupato', 4),
('Degenza', 'Occupato', 4),

-- Terapia Intensiva
('Isolamento', 'Occupato', 5),
('Isolamento', 'Libero', 5),

-- Riabilitazione
('Post-Operatorio', 'Libero', 6),
('Post-Operatorio', 'Libero', 6);

-- RICOVERO
INSERT INTO Ricovero (DataIngresso, DataUscita, DiagnosiIniziale, DiagnosiDimissione, IDCartella, IDBox) VALUES
('2025-06-20', '2025-06-25', 'Frattura zampa', 'In guarigione', 1, 1),
('2025-06-21', NULL, 'Chemioterapia', NULL, 2, 2),
('2025-06-22', '2025-06-23', 'Dermatite acuta', 'Pelle migliorata', 3, 3),
('2025-06-24', NULL, 'Anemia', NULL, 4, 4),
('2025-06-25', '2025-06-28', 'Colpo di calore', 'Stabilizzato', 5, 5),
('2025-06-26', NULL, 'Riabilitazione motoria', NULL, 6, 6),
('2025-06-27', NULL, 'Neuropatia acuta', NULL, 7, 7),
('2025-06-28', NULL, 'Polmonite infettiva', NULL, 8, 8);


-- PRESCRIZIONE
INSERT INTO Prescrizione (Quantita, PrezzoFinale, Data, IDFarmaco, IDCartella) VALUES
(1, 12.50, '2025-07-01', 1, 1),
(2, 17.80, '2025-07-02', 2, 2),
(1, 20.00, '2025-07-03', 3, 3),
(3, 25.00, '2025-07-04', 1, 4),
(1, 8.90, '2025-07-05', 2, 5),
(2, 40.00, '2025-07-06', 3, 6);

-- LABORATORIO
INSERT INTO Laboratorio (TipoAnalisi) VALUES
('Ematologia'),
('Radiologia');

-- ESAME
INSERT INTO Esame (Tipo, Data, Referto, IDLaboratorio, IDCartella) VALUES
('Esame sangue', '2025-07-02', 'Valori nella norma', 1, 1),
('Radiografia', '2025-07-03', 'Frattura visibile', 2, 1),
('Esame urine', '2025-07-04', 'Segni di infezione', 1, 4),
('Tac addome', '2025-07-05', 'Tutto regolare', 2, 5);

-- TRATTAMENTO
INSERT INTO Trattamento (Tipo, Descrizione, Data, IDCartella, IDVisita) VALUES
('Intervento', 'Riduzione frattura', '2025-07-01', 1, 1),
('Chemioterapia', 'Prima seduta', '2025-07-02', 2, 2),
('Laser terapia', 'Applicata a zampa posteriore', '2025-07-05', 5, 5),
('Terapia antibiotica', 'Somministrazione orale 7gg', '2025-07-06', 6, 6);

-- TURNO
INSERT INTO Turno (Data, OrarioInizio, OrarioFine, IDPersona) VALUES
('2025-07-01', '08:00:00', '14:00:00', 1),
('2025-07-02', '14:00:00', '20:00:00', 2),
('2025-07-03', '08:00:00', '14:00:00', 3),
('2025-07-04', '08:00:00', '14:00:00', 4),
('2025-07-05', '14:00:00', '20:00:00', 5),
('2025-07-06', '08:00:00', '14:00:00', 6),
('2025-07-06', '08:00:00', '14:00:00', 7);
-- PRENOTAZIONE
INSERT INTO Prenotazione (Data, IDAnimale, IDPersona) VALUES
('2025-06-30', 1, 1),
('2025-07-01', 2, 2),
('2025-07-02', 3, 3),
('2025-07-03', 4, 4),
('2025-07-04', 5, 5),
('2025-07-05', 6, 6),
('2025-07-06', 7, 7);