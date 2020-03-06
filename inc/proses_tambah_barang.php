<?php
include "koneksi.php";
$kd_brg = @mysql_real_escape_string($_POST['kd_brg']);
$nm_brg = @mysql_real_escape_string($_POST['nm_brg']);
$satuan = @mysql_real_escape_string($_POST['satuan']);
$hb = @mysql_real_escape_string($_POST['hb']);
$hj = @mysql_real_escape_string($_POST['hj']);
$s_awal = @mysql_real_escape_string($_POST['s_awal']);
$tgl = @mysql_real_escape_string($_POST['tgl']);
mysql_query("insert into tb_barang values ('$kd_brg', '$nm_brg', '$satuan', '$hb', '$hj', '$s_awal', '0', '$s_awal', '$tgl')") or die (mysql_error());
?>
<script>
alert("Penambahan data barang sukses");
window.location.href='?page=barang&action=view';
</script>