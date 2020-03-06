<?php
include "koneksi.php";
$kodebarang = @mysql_real_escape_string($_POST['kodebarang']);
$namabarang = @mysql_real_escape_string($_POST['namabarang']);
$hargasatuan = @mysql_real_escape_string($_POST['hargasatuan']);
$jumlahjual = @mysql_real_escape_string($_POST['jumlahjual']);
$hargaakhir = @mysql_real_escape_string($_POST['hargaakhir']);
$nonota = @mysql_real_escape_string($_POST['nonota']);

mysql_query("insert into tb_barang_terjual values('', '$kodebarang', '$namabarang', '$hargasatuan', '$jumlahjual', '$hargaakhir', '$nonota')") or die (mysql_error());

?>