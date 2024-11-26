<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
</head>
<body>
    <h2>Formulir Pennyewaan</h2>
    <form action="proses.php" method="POST">

    <label for="Alamat">Alamat : </label><br>
        <input type="text" id="alamat" name="alamat" required><br><br>
        
        <label for="Nama">Nama : </label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="Nama">No KTP : </label><br>
        <input type="text" id="NoKTP" name="NoKTP" required><br><br>
        
        <label for="Nama">No Telp : </label><br>
        <input type="text" id="NoTelp" name="NoTelp" required><br><br>

        <label for="pilihan">Pilih Merek Kendaraan :</label><br>
        <select id="pilihan" name="pilihan">
            <option value="Alphard">Alphard</option>
            <option value="Angkot">Angkot</option>
            <option value="Aila">Aila</option>
            </select><br><br>
            
        <label for="tglpengembalian">Tanggal Pengembalian : </label><br>
        <input type="text" id="tglpengembalian" name="tglpengembalian" required><br><br>


        <button type="submit">Submit</button>
    </form>
</body>
</html>
