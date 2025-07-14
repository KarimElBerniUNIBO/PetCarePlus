SELECT A.Nome, A.Specie, B.IDBox, B.Tipo
FROM Ricovero R
JOIN CartellaClinica C ON R.IDCartella = C.IDCartella
JOIN Animale A ON C.IDAnimale = A.IDAnimale
JOIN Box B ON R.IDBox = B.IDBox
WHERE R.DataUscita IS NULL;
