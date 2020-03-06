<?php
if(@$_SESSION['admin']) { ?>
	<a href="?page=barang&action=input"><button style="border-top-left-radius:7px; border-bottom-left-radius:7px;">Input Barang Masuk</button></a> 
<?php } ?>
<a href="?page=barang&action=view"><button style="border-top-right-radius:7px; border-bottom-right-radius:7px;">Lihat Data Barang</button></a>
<div style="margin-top:10px;">
<?php
if(@$_GET['action'] == 'input')
{
	include "tambah_barang.php";
}
else if(@$_GET['action'] == 'view')
{
	?>
	<!-- Created by yukcoding.blogspot.com -->
	<title>Master Barang</title>
    <fieldset class="utama">
    <legend>Data Barang</legend>
    	
    	<b>Pencarian data barang :</b> <?php include "cari_barang_dgn_tgl.php"; ?> <input type="text" class="pencarian" id="pencarianbarang" placeholder="Masukkan nama barang..." /><button class="cari" id="caribarang">Cari</button>

        <table class="data" style="margin-top:10px;">
        <thead>
        <tr>
        	<th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th colspan="2">Harga Beli</th>
            <th colspan="2">Harga Jual</th>
            <th>Stok Awal</th>
            <th>Stok Terjual</th>
            <th>Stok Sisa</th>
            <th>Tgl Barang Masuk</th>
            <?php if(@$_SESSION['admin']) { ?>
	            <th>Opsi</th>
	        <?php } ?>
        </tr>
        </thead>
        <tbody id="barang">
        <?php
		$sql = mysql_query("select * from tb_barang") or die (mysql_error());
		$cek = mysql_num_rows($sql);
		if($cek < 1)
		{
			?>
            <tr>
            	<td colspan="12" style="padding:10px;">Data tidak ditemukan</td>
            </tr>
            <?php
		}
		else
		{
			while($data = mysql_fetch_array($sql))
			{
			?>
			<tr>
				<td><?php echo $data['kode_barang']; ?></td>
				<td><?php echo $data['nama_barang']; ?></td>
				<td><?php echo $data['satuan']; ?></td>
				<td>Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($data['harga_beli'], 2, ".", ","); ?></td>
				<td>Rp. </td><td align="right" style="border-left:0;"><?php echo number_format($data['harga_jual'], 2, ".", ","); ?></td>
				<td align="right"><?php echo $data['stok_awal']; ?></td>
				<td align="right"><?php echo $data['stok_terjual']; ?></td>
				<td align="right"><?php echo $data['stok_sisa']; ?></td>
				<td align="center"><?php echo $data['tanggal']; ?></td>
				<?php if(@$_SESSION['admin']) { ?>
					<td><a href="?page=barang&action=edit&id=<?php echo $data['kode_barang']; ?>"><button>Edit</button></a> <a onclick="return confirm('Yakin ingin menghapus data ?');" href="?page=barang&action=hapus&id=<?php echo $data['kode_barang']; ?>"><button>Hapus</button></a></td>
				<?php } ?>
			</tr>
			<?php
			}
		}
		?>
        </tbody>
		</table>
    </fieldset>
    <script>
	function cari() {
		var masukan = $("#pencarianbarang").val();
		var tgl = $("#cari_barang_dgn_tgl").val();
		$.ajax({
			data : 'masukanpencarian='+masukan+'&tglpencarian='+tgl,
			type : 'post',
			url : 'inc/proses_cari_barang.php',
			success : function(msg){
				$("tbody#barang").html(msg);
			} 
		});
	};
	
	$("#caribarang").click(function(){
		cari();
	});
	$("#pencarianbarang").keyup(function(e){
		if(e.keyCode == 13) {
			cari();
		}
	});
	</script>
    <?php
}
else if(@$_GET['action'] == 'edit')
{
	include "edit_barang.php";
}
else if(@$_GET['action'] == "hapus")
{
	include "delete_barang.php";
}
?>
</div>
	