<?php
include 'db.php';  // Koneksi ke database

// Cek apakah ada ID yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pengunjung berdasarkan ID
    $query = "SELECT * FROM pengunjung WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

// Function Update data pengunjung
if (isset($_POST['update'])) {
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $asal = $_POST['asal'];
    $kesan_pesan = $_POST['kesan_pesan'];

    // Update data pengunjung
    $query = "UPDATE pengunjung 
              SET nomor = '$nomor', nama = '$nama', no_telepon = '$no_telepon', asal = '$asal', kesan_pesan = '$kesan_pesan' 
              WHERE id = '$id'";
    mysqli_query($conn, $query);

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengunjung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-cyan-500 to-blue-500 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <a href="index.php" class="inline-block mb-4 text-blue-500 hover:underline"><button>← Kembali</button></a>
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Pengunjung</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="post" class="space-y-4">
            <!--Nomor-->
            <div class="flex item-center">
                <label for="nomor" class="w-1/3 text-gray-700 font-medium">Nomor:</label>
                <input type="number" id="nomor" name="nomor" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" value="<?php echo $row['nomor']; ?>" required>
            </div>

            <!--Nama Pengunjung-->
            <div class="flex item-center">
                <label for="nama" class="w-1/3 text-gray-700 font-medium">Nama Pengunjung:</label>
                <input type="text" id="nama" name="nama" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" value="<?php echo $row['nama']; ?>" required>
            </div>
            
            <!--Nomor Telepon-->
            <div class="flex item-center">
                <label for="no_telepon" class="w-1/3 text-gray-700 font-medium">Nomor Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" value="<?php echo $row['no_telepon']; ?>" required>
            </div>
            
            <!--Asal Pengunjung-->
            <div class="flex item-center">
                <label for="asal" class="w-1/3 text-gray-700 font-medium">Asal Pengunjung:</label>
                <select name="jurusan" id="jurusan" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">Pengembangan Perangkat Lunak & Gim</option>
                    <option value="">Teknik Komputer Jaringan</option>
                    <option value="">Teknik Kendaraan Ringan & Otomotif</option>
                    <option value="">Desain Komunikasi Visual</option>
                    <option value="">Desain Produksi Busana</option>
                    <option value="">Teknik Pengelasan</option>
                    <option value="">Teknik Permesinan</option>
                    <option value="">Akuntansi Keuangan Lembaga</option>
                    <option value="">Luar Sekolah</option>
                </select>
            </div>

            <!--Kesan dan pesan-->
            <div class="flex item-center">
                <label for="kesan_pesan" class="w-1/3 text-gray-700 font-medium">Kesan dan Pesan:</label>
                <textarea id="kesan_pesan" name="kesan_pesan" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" required><?php echo $row['kesan_pesan']; ?></textarea>
            </div>

            <!--Tombol Submit-->
            <div class="text-center">
                <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
