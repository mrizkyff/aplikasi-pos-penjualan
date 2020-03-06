<?php
$id = @$_GET['id'];
mysql_query("delete from tb_penjualan where no_nota = '$id'") or die (mysql_error());
?>

<script>
	alert("Data penjualan telah dihapus");
	window.location.href='?page=penjualan&action=view';
</script>