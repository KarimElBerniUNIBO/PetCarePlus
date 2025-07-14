SELECT T.Data, T.OrarioInizio, T.OrarioFine, P.Nome, P.Cognome, P.Specializzazione
FROM Turno T
JOIN Personale P ON T.IDPersona = P.IDPersona
ORDER BY T.Data;
