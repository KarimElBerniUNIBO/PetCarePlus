SELECT B.IDBox, B.Tipo, B.StatoOccupazione, S.Nome AS Settore
FROM Box B
JOIN Settore S ON B.IDSettore = S.IDSettore;
