SELECT P.Nome, P.Cognome, P.Specializzazione, S.Nome AS Settore
FROM AssegnatoA A
JOIN Personale P ON A.IDPersona = P.IDPersona
JOIN Settore S ON A.IDSettore = S.IDSettore;
