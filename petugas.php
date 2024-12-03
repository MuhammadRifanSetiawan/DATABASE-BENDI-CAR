<?php
include 'koneksi.php';

$sql = "SELECT * FROM kendaraan";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data dari Database</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <h2>Data dari Database</h2>
    <table>
        <thead>
            <tr>
                <th>Harga Sewa</th>
                <th>Jenis</th>
                <th>Merek</th>
                <th>No Polisi</th>
            </tr>
        </thead>
        <tbody>
<?php

        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['harga_sewa'] . "</td>";
            echo "<td>" . $row['jenis'] . "</td>";
            echo "<td>" . $row['merek'] . "</td>";
            echo "<td>" . $row['no_polisi'] . "</td>";
            echo "</tr>";
        }
        } else {
        echo "<tr><td colspan='3'>Tidak ada data ditemukan</td></tr>";
        }
?>
        </tbody>
    </table>

    <a href="edit.php">edit</a>
    <br>
    <a href="index.html">logout</a>
</body>
</html>

<?php
$conn->close();
?>