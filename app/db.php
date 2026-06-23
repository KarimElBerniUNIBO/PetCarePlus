<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "PetCare";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// crea una <select> a partire da una query
function render_select($conn, $name, $sql, $valueCol, callable $label, $placeholder = '— Seleziona —') {
    $html  = "<select id=\"" . htmlspecialchars($name) . "\" name=\"" . htmlspecialchars($name) . "\" required>";
    $html .= "<option value=\"\" disabled selected>" . htmlspecialchars($placeholder) . "</option>";
    if ($res = $conn->query($sql)) {
        while ($row = $res->fetch_assoc()) {
            $html .= "<option value=\"" . htmlspecialchars($row[$valueCol]) . "\">"
                   . htmlspecialchars($label($row)) . "</option>";
        }
    }
    $html .= "</select>";
    return $html;
}
?>
