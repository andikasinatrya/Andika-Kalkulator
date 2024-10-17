<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Kalkulator Andika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
    <?php 
    $pesan = '';
    $hasil = 0;

    if (isset($_POST['hitung'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];

        if (!is_numeric($bil1) || !is_numeric($bil2)) {
            $pesan = "Yang anda masukkan bukan angka!";
        } else {
            switch ($operasi) {
                case 'tambah':
                    $hasil = $bil1 + $bil2;
                    break;
                case 'kurang':
                    $hasil = $bil1 - $bil2;
                    break;
                case 'kali':
                    $hasil = $bil1 * $bil2;
                    break;
                case 'bagi':
                    if ($bil2 != 0) {
                        $hasil = $bil1 / $bil2;
                    } else {
                        $pesan = "Pembagian dengan nol tidak Boleh!";
                    }
                    break;            
            }
        }
    }
    ?>
    <div class="w-[335px] bg-blue-500 mx-auto my-24 p-5 rounded shadow-lg">
        <h2 class="text-center text-gray-100 text-xl font-normal mb-2">KALKULATOR</h2>
        <form method="post" action="index.php">            
            <input type="text" name="bil1" class="w-[300px] m-1 border-none rounded-lg text-lg p-2" placeholder="Masukkan Angka Pertama" value="<?php echo isset($bil1) ? htmlspecialchars($bil1) : ''; ?>">
            <input type="text" name="bil2" class="w-[300px] m-1 border-none rounded-lg text-lg p-2" placeholder="Masukkan Bilangan Kedua" value="<?php echo isset($bil2) ? htmlspecialchars($bil2) : ''; ?>">
            <select class="w-[215px] m-1 border-none rounded-lg text-lg p-2" name="operasi">
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="kali">x</option>
                <option value="bagi">/</option>
            </select>
            <input type="submit" name="hitung" value="Hitung" class="bg-[#ec5159] text-gray-100 text-lg rounded-lg py-2 px-5 border-b-4 border-[#bf3d3d] hover:bg-[#d43d3d] cursor-pointer mt-2">                                            
        </form>
        
        <?php if ($pesan): ?>
            <p class="text-red-500 text-center mt-2"><?php echo htmlspecialchars($pesan); ?></p>
        <?php else: ?>
            <input type="text" value="<?php echo isset($hasil) ? htmlspecialchars($hasil) : '0'; ?>" class="w-[300px] m-1 border-none rounded-lg text-lg p-2" readonly>
        <?php endif; ?>
    </div>
</body>
</html>
