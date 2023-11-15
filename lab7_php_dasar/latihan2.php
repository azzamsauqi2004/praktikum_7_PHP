<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form </h1>
<?php

function hitungUmur($tanggal_lahir) {
    $tanggal_lahir = new DateTime($tanggal_lahir);
    $today = new DateTime('today');
    $umur = $today->diff($tanggal_lahir)->y;
    return $umur;
}


function hitungGaji($pekerjaan) {
    switch ($pekerjaan) {
        case 'Pegawai':
            return 5000000;
        case 'Karyawan':
            return 7000000;
        case 'Manajer':
            return 10000000;
        default:
            return 0;
    }
}


$nama = $tanggal_lahir = $pekerjaan = '';
$umur = $gaji = 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];

    
    $umur = hitungUmur($tanggal_lahir);


    $gaji = hitungGaji($pekerjaan);
}
?>

<!-- Form input -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>"><br>
    Pekerjaan:
    <select name="pekerjaan">
        <option value="Pegawai" <?php if ($pekerjaan == 'Pegawai') echo 'selected'; ?>>Pegawai</option>
        <option value="Karyawan" <?php if ($pekerjaan == 'Karyawan') echo 'selected'; ?>>Karyawan</option>
        <option value="Manajer" <?php if ($pekerjaan == 'Manajer') echo 'selected'; ?>>Manajer</option>
    </select><br>
    <input type="submit" value="Submit">
</form>

<!-- Output -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<h2>Output:</h2>';
    echo 'Nama: ' . $nama . '<br>';
    echo 'Umur: ' . $umur . ' tahun<br>';
    echo 'Pekerjaan: ' . $pekerjaan . '<br>';
    echo 'Gaji: Rp ' . number_format($gaji, 0, ',', '.') . '<br>';
}
?>
</body>
</html>