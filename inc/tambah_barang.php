<title>Tambah Barang</title>
<fieldset>
	<legend>Input Data Barang</legend>
    <?php
    $tanggal = date('d-m-Y');

	$carikode = mysql_query("select max(kode_barang) from tb_barang") or die (mysql_error());
	$datakode = mysql_fetch_row($carikode);
	if($datakode)
	{
		$nilaikode = substr($datakode[0], 2);
		$kode = (int) $nilaikode;
		$kode = $kode+1;
		$hasilkode = "B".str_pad($kode, 4 , "0", STR_PAD_LEFT);
	}
	else
	{
		$hasilkode = "B001";
	}
	?>
    <table>
    <tr>
    	<td>Kode Barang</td>
        <td>:</td>
        <td><input type="text" id="kd_brg" value="<?php echo $hasilkode; ?>" /></td>
    </tr>
	<tr>
    	<td>Nama Barang</td>
        <td>:</td>
        <td><input type="text" id="nm_brg" /></td>
    </tr>
    <tr>
    	<td>Satuan</td>
        <td>:</td>
        <td><input type="text" id="satuan" /></td>
    </tr>
    <tr>
    	<td>Harga Beli</td>
        <td>:</td>
        <td><i>Rp. </i><input type="text" id="hb" style="width:177px;" /></td>
    </tr>
    <tr>
    	<td>Harga Jual</td>
        <td>:</td>
        <td><i>Rp. </i><input type="text" id="hj" style="width:177px;" /></td>
    </tr>
    <tr>
    	<td>Stok Awal</td>
        <td>:</td>
        <td><input type="text" id="s_awal" /></td>
    </tr>
    <tr>
    	<td>Tanggal Barang Masuk</td>
        <td>:</td>
        <td><input type="text" id="tgl" class="datepicker" value="<?php echo $tanggal; ?>" /></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><button id="tambah">Tambah</button></td>
    </tr>
    </table>
    <script>
    $(window).load(function() {
    	$("#hb").number(true, 2);
    	$("#hj").number(true, 2);
    });

	$("#tambah").click(function(){
		var kd_brg = $("#kd_brg").val();
		var nm_brg = $("#nm_brg").val();
		var satuan = $("#satuan").val();
		var hb = $("#hb").val();
		var hj = $("#hj").val();
		var s_awal = $("#s_awal").val();
		var tgl = $("#tgl").val();
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
			alert("Tanggal treakhir barang masuk tidak boleh kosong");
			$("#tgl").focus();
		}
		else
		{
			$.ajax({
				type : 'post',
				url : 'inc/proses_tambah_barang.php',
				data : 'kd_brg='+kd_brg+'&nm_brg='+nm_brg+'&satuan='+satuan+'&hb='+hb+'&hj='+hj+'&s_awal='+s_awal+'&tgl='+tgl,
				success : function(msg){
					$("#hasil_tambah").html(msg);
				}
			});
		}
	});
	</script>
    <div id="hasil_tambah"></div>
</fieldset>