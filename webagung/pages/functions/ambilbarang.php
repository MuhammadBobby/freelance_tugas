<?php
require "function.php";

$id = $_GET['id'];

$sql = "SELECT * FROM barang WHERE supplier='$id'";
$hasil = $conn->query($sql);
$nom = 1;

$brg = '';
while ($row = $hasil->fetch_assoc()) {
    $brg .= '<tr><td width="5%">' . $nom++ . '</td>
  <td><input type="text" name="barang_id[]" value=' . $row['barang_id'] . ' class="form-control" readonly></td>
        <td>' . $row['nama_barang'] . '</td>
        <td><input type="number" min="0" name="jumlah[]" class="form-control" value="0" required></td>
        <td><input type="number" name="harga_satuan[]" class="form-control" value=' . $row['harga_barang'] . ' readonly></td>
      </tr>';
}
echo $brg;
$conn->close();
