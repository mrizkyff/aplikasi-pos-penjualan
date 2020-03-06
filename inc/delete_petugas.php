<?php
$id = @$_GET['id'];
mysql_query("delete from tb_user where kode_user = '$id'") or die (mysql_error());
?>

<script>
	alert("Data petugas telah dihapus");
	window.location.href='?page=petugas&action=view';
</script>