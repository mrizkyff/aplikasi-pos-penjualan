<title>Edit Akun Admin</title>

<fieldset>
<legend>Edit Akun Admin</legend>

    <?php
    $id = @$_GET['id'];
    $sql = mysql_query("select * from tb_user where kode_user = '$id'") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>
    <table>
    <tr>
    	<td>Nama Lengkap</td>
        <td>:</td>
        <td><input type="text" id="nm" value="<?php echo $data['nama_lengkap']; ?>" /></td>
    </tr>
	<tr>
    	<td>Username</td>
        <td>:</td>
        <td><input type="text" id="user" value="<?php echo $data['username']; ?>" /></td>
    </tr>
    <tr>
    	<td>Password</td>
        <td>:</td>
        <td><input type="text" id="pass" value="<?php echo $data['pass']; ?>" /></td>
    </tr>
    <tr>
    	<td>Jenis Kelamin</td>
        <td>:</td>
        <td>
        	<select id="jk">
        		<?php
                if($data['jenis_kelamin'] == "Laki-laki") { ?>
                    <option value="Laki-laki" selected="selected">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option> <?php
                } else if($data['jenis_kelamin'] == "Perempuan") { ?>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan" selected="selected">Perempuan</option> <?php
                }
                ?>
        	</select>
        </td>
    </tr>
    <tr>
    	<td valign="top">Alamat</td>
        <td valign="top">:</td>
        <td><textarea id="alamat"><?php echo $data['alamat']; ?></textarea></td>
    </tr>
    <tr>
    	<td>No. Telepon</td>
        <td>:</td>
        <td><input type="text" id="tlp" value="<?php echo $data['no_telepon']; ?>" /></td>
    </tr>
    <tr>
    	<td valign="top">Keterangan</td>
        <td valign="top">:</td>
        <td><textarea id="ket"><?php echo $data['keterangan']; ?></textarea></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><button id="edit">Edit</button></td>
    </tr>
    <tr>
	    <td></td>
    </tr>
    </table>

<script>

	$("#edit").click(function() {
		var nm = $("#nm").val();
		var user = $("#user").val();
		var pass = $("#pass").val();
		var jk = $("#jk").val();
		var alamat = $("#alamat").val();
		var tlp = $("#tlp").val();
		var ket = $("#ket").val();
		if(nm == '') {
			alert("Nama Lengkap tidak boleh kosong");
			$("#nm").focus();
		} else if(user == '') {
			alert("Username tidak boleh kosong");
			$("#user").focus();
		} else if(pass == '') {
			alert("Password tidak boleh kosong");
			$("#pass").focus();
		} else if(jk == '') {
			alert("Jenis kelamin harus dipilih");
			$("#jk").focus();
		} else if(alamat == '') {
			alert("Alamat tidak boleh kosong");
			$("#alamat").focus();
		} else if(tlp == '') {
			alert("Nomor telepon belum diisi");
			$("#tlp").focus();
		} else {
			$.ajax({
				type : 'post',
				url : 'inc/proses_edit_petugas.php',
				data : 'nm='+nm+'&user='+user+'&pass='+pass+'&jk='+jk+'&alamat='+alamat+'&tlp='+tlp+'&ket='+ket+'&id=<?php echo $id; ?>',
				success : function(msg){
					if(msg == 'admin') {
                        alert("Data akun berhasil di edit");
                        window.location.href='?page=petugas&action=view';
                    } else {
                        alert("Data akun berhasil di edit");
                    }
				}
			});
		}
	});
	</script>

    <div id="hasil_edit"></div>
</fieldset>