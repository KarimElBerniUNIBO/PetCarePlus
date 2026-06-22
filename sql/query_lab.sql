SELECT L.TipoAnalisi, COUNT(E.IDEsame) AS NumeroEsami
FROM Laboratorio L
LEFT JOIN Esame E ON L.IDLaboratorio = E.IDLaboratorio
GROUP BY L.TipoAnalisi;
