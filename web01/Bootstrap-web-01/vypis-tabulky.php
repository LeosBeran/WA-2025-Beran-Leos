<?php
require_once "Database.php";

$db = new Database();
$conn = $db->getConnection();

$sql = "SELECT id, jmeno, email FROM users"; // přizpůsob podle názvu tabulky
$stmt = $conn->prepare($sql);
$stmt->execute();

echo '<table class="table table-striped table-info">';
echo '<thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Jméno</th>
            <th>klub</th>
            <th>pozice</th>
            <th>narození</th>
            <th>cena</th>
            <th>národnost</th>




        </tr>
      </thead>';
echo '<tbody>';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['jmeno']}</td>
            <td>{$row['klub']}</td>
            <td>{$row['pozice']}</td>
            <td>{$row['narození']}</td>
            <td>{$row['cena']}</td>
            <td>{$row['národnost']}</td>

          </tr>";
}

echo '</tbody></table>';
?>
