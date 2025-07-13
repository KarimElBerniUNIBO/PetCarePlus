
CREATE DATABASE IF NOT EXISTS PetCare;
USE PetCare;

-- ANIMALE
CREATE TABLE Animale (
    IDAnimale INT AUTO_INCREMENT PRIMARY KEY,
    Specie VARCHAR(30) NOT NULL,
    Razza VARCHAR(30) NOT NULL,
    Eta INT NOT NULL,
    Nome VARCHAR(50) NOT NULL
);

-- CARTELLA CLINICA
CREATE TABLE CartellaClinica (
    IDCartella INT AUTO_INCREMENT PRIMARY KEY,
    IDAnimale INT NOT NULL,
    FOREIGN KEY (IDAnimale) REFERENCES Animale(IDAnimale)
);

-- PERSONALE
CREATE TABLE Personale (
    IDPersona INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    Specializzazione VARCHAR(50)
);

-- SETTORE
CREATE TABLE Settore (
    IDSettore INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50),
    TipoSpecializzazione VARCHAR(50)
);

-- VISITA
CREATE TABLE Visita (
    IDVisita INT AUTO_INCREMENT PRIMARY KEY,
    Data DATE NOT NULL,
    TipoVisita VARCHAR(50),
    IDPersona INT NOT NULL,
    IDSettore INT NOT NULL,
    IDCartella INT NOT NULL,
    FOREIGN KEY (IDPersona) REFERENCES Personale(IDPersona),
    FOREIGN KEY (IDSettore) REFERENCES Settore(IDSettore),
    FOREIGN KEY (IDCartella) REFERENCES CartellaClinica(IDCartella)
);

-- ASSEGNATOA
CREATE TABLE AssegnatoA (
    IDPersona INT NOT NULL,
    IDSettore INT NOT NULL,
    PRIMARY KEY (IDPersona, IDSettore),
    FOREIGN KEY (IDPersona) REFERENCES Personale(IDPersona),
    FOREIGN KEY (IDSettore) REFERENCES Settore(IDSettore)
);

-- TURNO
CREATE TABLE Turno (
    IDTurno INT AUTO_INCREMENT PRIMARY KEY,
    Data DATE NOT NULL,
    OrarioInizio TIME NOT NULL,
    OrarioFine TIME NOT NULL,
    IDPersona INT NOT NULL,
    FOREIGN KEY (IDPersona) REFERENCES Personale(IDPersona)
);

-- BOX
CREATE TABLE Box (
    IDBox INT AUTO_INCREMENT PRIMARY KEY,
    Tipo VARCHAR(50),
    StatoOccupazione VARCHAR(30),
    IDSettore INT NOT NULL,
    FOREIGN KEY (IDSettore) REFERENCES Settore(IDSettore)
);

-- RICOVERO
CREATE TABLE Ricovero (
    IDRicovero INT AUTO_INCREMENT PRIMARY KEY,
    DataIngresso DATE NOT NULL,
    DataUscita DATE,
    DiagnosiIniziale TEXT,
    DiagnosiDimissione TEXT,
    IDCartella INT NOT NULL,
    IDBox INT NOT NULL,
    FOREIGN KEY (IDCartella) REFERENCES CartellaClinica(IDCartella),
    FOREIGN KEY (IDBox) REFERENCES Box(IDBox)
);

-- FARMACO
CREATE TABLE Farmaco (
    IDFarmaco INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50),
    PrezzoUnitario DECIMAL(6,2)
);

-- PRESCRIZIONE
CREATE TABLE Prescrizione (
    IDPrescrizione INT AUTO_INCREMENT PRIMARY KEY,
    Quantita INT,
    PrezzoFinale DECIMAL(6,2),
    Data DATE,
    IDFarmaco INT NOT NULL,
    IDCartella INT NOT NULL,
    FOREIGN KEY (IDFarmaco) REFERENCES Farmaco(IDFarmaco),
    FOREIGN KEY (IDCartella) REFERENCES CartellaClinica(IDCartella)
);

-- TRATTAMENTO
CREATE TABLE Trattamento (
    IDTrattamento INT AUTO_INCREMENT PRIMARY KEY,
    Tipo VARCHAR(50),
    Descrizione TEXT,
    Data DATE,
    IDCartella INT NOT NULL,
    IDVisita INT NOT NULL,
    FOREIGN KEY (IDCartella) REFERENCES CartellaClinica(IDCartella),
    FOREIGN KEY (IDVisita) REFERENCES Visita(IDVisita)
);

-- LABORATORIO
CREATE TABLE Laboratorio (
    IDLaboratorio INT AUTO_INCREMENT PRIMARY KEY,
    TipoAnalisi VARCHAR(50)
);

-- ESAME
CREATE TABLE Esame (
    IDEsame INT AUTO_INCREMENT PRIMARY KEY,
    Tipo VARCHAR(50),
    Data DATE,
    Referto TEXT,
    IDLaboratorio INT NOT NULL,
    IDCartella INT NOT NULL,
    FOREIGN KEY (IDLaboratorio) REFERENCES Laboratorio(IDLaboratorio),
    FOREIGN KEY (IDCartella) REFERENCES CartellaClinica(IDCartella)
);

-- PRENOTAZIONE
CREATE TABLE Prenotazione (
    IDPrenotazione INT AUTO_INCREMENT PRIMARY KEY,
    Data DATE NOT NULL,
    IDAnimale INT NOT NULL,
    IDPersona INT NOT NULL,
    FOREIGN KEY (IDAnimale) REFERENCES Animale(IDAnimale),
    FOREIGN KEY (IDPersona) REFERENCES Personale(IDPersona)
);
