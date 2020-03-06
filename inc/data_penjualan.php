<title>Data Penjualan</title>
<fieldset class="utama">
<legend>Data Penjualan</legend>

	<b>Pencarian data penjualan :</b> 
	<select id="caripenjualan">
		<option value="">-- Pilih tanggal --</option>
		<?php $sql_tgl = mysql_query("select distinct(tgl_jual) from tb_penjualan") or die (mysql_error());
		while($data_tgl = mysql_fetch_array($sql_tgl)){
			?><option value="<?php echo $data_tgl[0]; ?>"><?php echo $data_tgl[0]; ?></option><?php
		} ?>
	</select>

	<table class="data" style="margin-top:10px;">
		<thead>
			<tr>
				<th>No Nota</th>
				<th>Tanggal Jual</th>
				<th>Pelanggan</th>
				<th>Kasir</th>
				<th>Barang</th>
				<th colspan="2">Sub Total</th>
				<th>Diskon Persen</th>
				<th colspan="2">Diskon Harga</th>
				<th colspan="2">Total Harga</th>
				<?php if(@$_SESSION['admin']) { ?>
					<th>Opsi</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody id="penjualan">
		<?php
		$sql = mysql_query("select * from tb_penjualan") or die (mysql_error());
		$cek = mysql_num_rows($sql);
		if($cek < 1) {
			?><tr>
				<td colspan="13" style="padding:10px;">Data tidak ditemukan</td>
			</tr><?php
		} else {
			$no = 1;
			while($data = mysql_fetch_array($sql)) {
				?><tr>
					<td><?php echo $data['no_nota']; ?></td>
					<td><?php echo $data['tgl_jual']; ?></td>
					<td><?php echo $data['pelanggan']; ?></td>
					<td><?php echo $data['kasir']; ?></td>
					<td style="width:60px; text-align:center;"><button id="lihatbarang" no="<?php echo $data['no_nota']; ?>">Lihat</button></td>
					<td>Rp.</td><td align="right" style="border-left:0;"><?php echo number_format($data['sub_total'], 2, ".", ","); ?></td>
					<td><?php echo $data['diskon_persen']." %"; ?></td>
					<td>Rp.</td><td align="right" style="border-left:0;"><?php echo number_format($data['diskon_total'], 2, ".", ","); ?></td>
					<td>Rp.</td><td align="right" style="border-left:0;"><?php echo number_format($data['total_harga'], 2, ".", ","); ?></td>
					<?php if(@$_SESSION['admin']) { ?>
						<td><a onclick="return confirm('Yakin ingin menghapus data ?');" href="?page=penjualan&action=delete&id=<?php echo $data['no_nota']; ?>"><button>Hapus</button></a></td>
					<?php } ?>
				</tr><?php
			}
		} ?>
		</tbody>
	</table>
</fieldset>

<div id="bg-popup">
	<div style="margin-top:170px; margin-left:23%;">
		<div id="popup">
			<div style="overflow:auto; max-height:400px; width:700px;" >
			<table class="data">
		        <thead>
			        <tr>
			        	<th>Kode Barang</th>
			            <th>Nama Barang</th>
			            <th colspan="2">Harga Satuan</th>
			            <th>Jumlah Jual</th>
			            <th colspan="2">Harga Akhir</th>
			            <th>No Nota</th>
			        </tr>
		        </thead>
		        <tbody id="barangterjual">
		        
		        </tbody>
			</table>
			</div>
		</div>
    </div>
    <button style="border-radius:10px; margin-left:20.5%; position:absolute; z-index:5; margin-top:-20px;" id="keluar">Keluar</button>
</div>

<script type="text/javascript">
	$("#caripenjualan").click(function(){
		var tgl_penjualan = $(this).val();
		$.ajax({
			url : 'inc/proses_cari_penjualan.php',
			type : 'post',
			data : 'tgl='+tgl_penjualan,
			success : function(msg) {
				$("tbody#penjualan").html(msg);
			}
		});
	});

	$("#penjualan").on("click", "#lihatbarang", function() {
		var no = $(event.target).attr("no");
		$.ajax({
			data : 'no='+no,
			url : 'inc/lihat_barang_dijual.php',
			type : 'post',
			success : function(msg) {
				$("#barangterjual").html(msg);
			}
		});
		$("#bg-popup").fadeIn(700, function() {
			$("#popup").fadeIn(600);
		});
	});

	$("#keluar").click(function() {
		$("#popup").fadeOut(400, function() {
			$("#bg-popup").fadeOut(600);
		});
	});
</script>