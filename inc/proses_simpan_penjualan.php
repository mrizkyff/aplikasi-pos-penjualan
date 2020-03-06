<?php
include "koneksi.php";

$nonota = @mysql_real_escape_string($_POST['nonota']);
$tgljual = @mysql_real_escape_string($_POST['tgljual']);
$pelanggan = @mysql_real_escape_string($_POST['pelanggan']);
$kasir = @mysql_real_escape_string($_POST['kasir']);
$subtotal = @mysql_real_escape_string($_POST['subtotal']);
$diskonpersen = @mysql_real_escape_string($_POST['diskonpersen']);
$diskonharga = @mysql_real_escape_string($_POST['diskonharga']);
$totalharga = @mysql_real_escape_string($_POST['totalharga']);

mysql_query("insert into tb_penjualan values('$nonota', '$tgljual', '$pelanggan', '$kasir', '$subtotal', '$diskonpersen', '$diskonharga', '$totalharga')") or die (mysql_error());

?>