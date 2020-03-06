<?php
include "koneksi.php";

$nm = @mysql_real_escape_string($_POST['nm']);
$user = @mysql_real_escape_string($_POST['user']);
$pass = @mysql_real_escape_string($_POST['pass']);
$jk = @mysql_real_escape_string($_POST['jk']);
$alamat = @mysql_real_escape_string($_POST['alamat']);
$tlp = @mysql_real_escape_string($_POST['tlp']);
$ket = @mysql_real_escape_string($_POST['ket']);
mysql_query("insert into tb_user values ('', '$user', md5('$pass'), '$pass', '$nm', '$jk', '$alamat', '$tlp', '$ket', 'kasir')") or die (mysql_error());
?>

<script>
	alert("Petugas baru berhasil ditambahkan");
	window.location.href='?page=petugas&action=view';
</script>