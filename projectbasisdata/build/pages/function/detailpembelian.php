<?php
require "koneksi.php";

$detail = $_GET['supplier'];

$data1 = mysqli_query($conn,"SELECT * FROM obat WHERE id_supplier='$detail'");
$num = 1;
$obt = '';
while ($obat = mysqli_fetch_array($data1)) {
    $obt .= '<tr class="bg-white">
            <td class="py-2 px-4 border border-gray-200">' . $num++ . '</td>

            <td class="py-2 px-4 border border-gray-200">
            <input type="text" name="id_obat[]" value=' . $obat['id_obat'] . ' class="form-control  bg-gray-100" readonly> </td>

            <td class="py-2 px-4 border border-gray-200">' . $obat['nama_obat'] . '</td>

            <td class="py-2 px-4 border border-gray-200">
            <input type="number" min="0" name="jumlah[]" class="form-control bg-gray-100" value="0" required></td>

            <td class="py-2 px-4 border border-gray-200">
            <input type="number" name="harga_satuan[]" class="form-control bg-gray-100" value=' . $obat['harga'] . ' readonly></td>
            </tr>';
    }
echo $obt;
