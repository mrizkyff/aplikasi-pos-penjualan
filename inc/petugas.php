<a href="?page=petugas&action=input"><button style="border-top-left-radius:7px; border-bottom-left-radius:7px;">Tambah Petugas</button></a> <a href="?page=petugas&action=view"><button style="border-top-right-radius:7px; border-bottom-right-radius:7px;">Data Petugas</button></a>
<div style="margin-top:10px;">
<?php if(@$_GET['action'] == 'input') {
	include "tambah_petugas.php";
} else if(@$_GET['action'] == 'view') {
	?>
	<title>Master Petugas</title>
	<fieldset class="utama">
	<legend>Data Petugas</legend>
		<table class="data">
        <thead>
        <tr>
        	<th>No.</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Password</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Keterangan</th>
            <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
        <?php
		$sql = mysql_query("select * from tb_user where level = 'kasir'") or die (mysql_error());
		$cek = mysql_num_rows($sql);
		$no = 1;
		if($cek < 1) { ?>
            <tr>
            	<td colspan="9" style="padding:10px;">Data tidak ditemukan</td>
            </tr> <?php
		} else {
			while($data = mysql_fetch_array($sql)) {
			?>
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td><?php echo $data['nama_lengkap']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['pass']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['no_telepon']; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
				<td><a href="?page=petugas&action=edit&id=<?php echo $data['kode_user']; ?>"><button>Edit</button></a> <a onclick="return confirm('Yakin ingin menghapus petugas ?');" href="?page=petugas&action=delete&id=<?php echo $data['kode_user']; ?>"><button>Hapus</button></a></td>
			</tr> <?php
			}
		} ?>
        </tbody>
		</table>
	</fieldset> <?php
} else if(@$_GET['action'] == 'edit') {
	include "edit_petugas.php";
} else if(@$_GET['action'] == "delete") {
	include "delete_petugas.php";
} ?>
</div>