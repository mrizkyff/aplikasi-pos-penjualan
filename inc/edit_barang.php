<?php
$id_brg = @$_GET['id'];
$sql2 = mysql_query("select * from tb_barang where kode_barang = '$id_brg'") or die (mysql_error());
$data2 = mysql_fetch_array($sql2);
?>
<title>Edit Data Barang</title>
<fieldset>
   	<legend>Edit Data Barang</legend>
    <table>
        <tr>
        	<td>Kode Barang</td>
	        <td>:</td>
            <td><input type="text" id="kd_brg" value="<?php echo $data2['kode_barang']; ?>" disabled="disabled" /></td>
        </tr>
		<tr>
        	<td>Nama Barang</td>
	        <td>:</td>
            <td><input type="text" id="nm_brg" value="<?php echo $data2['nama_barang']; ?>" /></td>
        </tr>
        <tr>
        	<td>Satuan</td>
	        <td>:</td>
            <td><input type="text" id="satuan" value="<?php echo $data2['satuan']; ?>" /></td>
        </tr>
        <tr>
        	<td>Harga Beli</td>
	        <td>:</td>
            <td><i>Rp. </i><input type="text" id="hb" value="<?php echo $data2['harga_beli']; ?>" style="width:177px;" /></td>
        </tr>
        <tr>
        	<td>Harga Jual</td>
	        <td>:</td>
            <td><i>Rp. </i><input type="text" id="hj" value="<?php echo $data2['harga_jual']; ?>" style="width:177px;" /></td>
        </tr>
        <tr>
        	<td>Stok Awal</td>
	        <td>:</td>
            <td><input type="text" id="s_awal" value="<?php echo $data2['stok_awal']; ?>" /></td>
        </tr>
        <tr>
        	<td>Tanggal Terakhir Masuk</td>
	        <td>:</td>
            <td><input type="text" id="tgl" class="datepicker" value="<?php echo $data2['tanggal']; ?>" /></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
            <td><button id="edit">Edit</button></td>
        </tr>
	</table>
	<script>

		$(window).load(function() {
        	$("#hb").number(true, 2);
        	$("#hj").number(true, 2);
        });

		$("#edit").click(function(){
			var kd_brg = $("#kd_brg").val();
			var nm_brg = $("#nm_brg").val();
			var satuan = $("#satuan").val();
			var hb = $("#hb").val();
			var hj = $("#hj").val();
			var s_awal = $("#s_awal").val();
			var tgl = $("#tgl").val();
			var s_terjual = <?php echo $data2['stok_terjual']; ?>;
			if(kd_brg == '')
			{
				alert("Kode Barang tidak boleh kosong");
				$("#kd_brg").focus();
			}
			else if(nm_brg == '')
			{
				alert("Nama Barang tidak boleh kosong");
				$("#nm_brg").focus();
			}
			else if(satuan == '')
			{
				alert("Satuan tidak boleh kosong");
				$("#satuan").focus();
			}
			else if(hb == '')
			{
				alert("Harga beli tidak boleh kosong");
				$("#hb").focus();
			}
			else if(hj == '')
			{
				alert("Harga jual tidak boleh kosong");
				$("#hj").focus();
			}
			else if(s_awal == '')
			{
				alert("Stok awal jual tidak boleh kosong");
				$("#s_awal").focus();
			}
			else if(tgl == '')
			{
				alert("Tanggal terakhir barang masuk tidak boleh kosong");
				$("#tgl").focus();
			}
			else
			{
				$.ajax({
					type : 'post',
					url : 'inc/proses_edit_barang.php',
					data : 'kd_brg='+kd_brg+'&nm_brg='+nm_brg+'&satuan='+satuan+'&hb='+hb+'&hj='+hj+'&s_awal='+s_awal+'&s_terjual='+s_terjual+'&tgl='+tgl,
					success : function(msg){
						$("#hasil_edit").html(msg);
					}
				});
			}
		});

	</script>
	<div id="hasil_edit"></div>
</fieldset>