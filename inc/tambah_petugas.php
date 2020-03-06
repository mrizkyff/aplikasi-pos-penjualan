<title>Tambah Petugas</title>

<fieldset>
<legend>Tambah Petugas</legend>
    <table>
    <tr>
    	<td>Nama Lengkap</td>
        <td>:</td>
        <td><input type="text" id="nm" /></td>
    </tr>
	<tr>
    	<td>Username</td>
        <td>:</td>
        <td><input type="text" id="user" /></td>
    </tr>
    <tr>
    	<td>Password</td>
        <td>:</td>
        <td><input type="text" id="pass" /></td>
    </tr>
    <tr>
    	<td>Jenis Kelamin</td>
        <td>:</td>
        <td>
        	<select id="jk">
        		<option value="">-- Pilih --</option>
        		<option value="Laki-laki">Laki-laki</option>
        		<option value="Perempuan">Perempuan</option>
        	</select>
        </td>
    </tr>
    <tr>
    	<td valign="top">Alamat</td>
        <td valign="top">:</td>
        <td><textarea id="alamat"></textarea></td>
    </tr>
    <tr>
    	<td>No. Telepon</td>
        <td>:</td>
        <td><input type="text" id="tlp" /></td>
    </tr>
    <tr>
    	<td valign="top">Keterangan</td>
        <td valign="top">:</td>
        <td><textarea id="ket"></textarea></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><button id="tambah">Tambah</button></td>
    </tr>
    <tr>
	    <td></td>
    </tr>
    </table>

<script>

	$("#tambah").click(function() {
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
				url : 'inc/proses_tambah_petugas.php',
				data : 'nm='+nm+'&user='+user+'&pass='+pass+'&jk='+jk+'&alamat='+alamat+'&tlp='+tlp+'&ket='+ket,
				success : function(msg){
					$("#hasil_tambah").html(msg);
				}
			});
		}
	});
	</script>

    <div id="hasil_tambah"></div>
</fieldset>