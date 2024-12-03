<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $harga_sewa = $_POST['harga_sewa'];

    if (empty($id) || empty($harga_sewa)) {
        echo "ID dan Harga Sewa wajib diisi!";
    } else {
        $query = "UPDATE kendaraan SET harga_sewa = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("di", $harga_sewa, $id);

        if ($stmt->execute()) {
            echo "Harga sewa berhasil diubah.";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
    }
}

$query = "SELECT * FROM kendaraan";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Harga Sewa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Harga Sewa</h2>

    <form method="POST">
        <label for="id">Pilih Kendaraan (ID):</label>
        <select name="id" id="id" required>
            <option value="">-- Pilih Kendaraan --</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id']; ?>"><?= $row['id'] . " - " . $row['merek']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="harga_sewa">Harga Sewa Baru:</label>
        <input type="number" name="harga_sewa" id="harga_sewa" required>

        <button type="submit">Update Harga</button>
    </form>

    <h2>Daftar Kendaraan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Jenis</th>
                <th>Harga Sewa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['merek']; ?></td>
                    <td><?= $row['jenis']; ?></td>
                    <td><?= $row['harga_sewa']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="index.html">logout</a>
</body>
</html>
<?php
$conn->close();
?>
