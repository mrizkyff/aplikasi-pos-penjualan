<?php
include "koneksi.php";
$kd_brg = @mysql_real_escape_string($_POST['kd_brg']);
$nm_brg = @mysql_real_escape_string($_POST['nm_brg']);
$satuan = @mysql_real_escape_string($_POST['satuan']);
$hb = @mysql_real_escape_string($_POST['hb']);
$hj = @mysql_real_escape_string($_POST['hj']);
$s_awal = @mysql_real_escape_string($_POST['s_awal']);
$s_terjual = @mysql_real_escape_string($_POST['s_terjual']);
$tgl = @mysql_real_escape_string($_POST['tgl']);
$sisa = $s_awal-$s_terjual;

mysql_query("update tb_barang set nama_barang = '$nm_brg', satuan = '$satuan', harga_beli = '$hb', harga_jual = '$hj', stok_awal = '$s_awal', stok_sisa = '$sisa', tanggal = '$tgl' where kode_barang = '$kd_brg'") or die (mysql_error());
?>
<script>
	alert("Edit data barang sukses");
	window.location.href='?page=barang&action=view';
</script>