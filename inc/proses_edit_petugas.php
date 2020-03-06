<?php
include "koneksi.php";

$id = @mysql_real_escape_string($_POST['id']);
$nm = @mysql_real_escape_string($_POST['nm']);
$user = @mysql_real_escape_string($_POST['user']);
$pass = @mysql_real_escape_string($_POST['pass']);
$jk = @mysql_real_escape_string($_POST['jk']);
$alamat = @mysql_real_escape_string($_POST['alamat']);
$tlp = @mysql_real_escape_string($_POST['tlp']);
$ket = @mysql_real_escape_string($_POST['ket']);
mysql_query("update tb_user set username = '$user', password = md5('$pass'), pass = '$pass', nama_lengkap = '$nm', jenis_kelamin = '$jk', alamat = '$alamat', no_telepon = '$tlp', keterangan = '$ket' where kode_user = '$id'") or die (mysql_error());

if(@$_SESSION['admin']) {
	echo "admin";
}