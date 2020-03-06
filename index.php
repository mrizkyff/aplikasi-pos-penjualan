<?php @session_start(); include "inc/koneksi.php"; ?>
<!-- Created by yukcoding.blogspot.com -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/jquery-ui.css" />
</head>
<body>
	<nav>
    	<ul>
        <?php if(@$_SESSION['admin'] || @$_SESSION['kasir']) { ?>
        	<li class="utama"><a href="">Master</a>
            	<ul>
                	<li><a href="?page=barang&action=view">Barang</a></li>
                    <?php
					if(@$_SESSION['admin']) {
						?> <li><a href="?page=petugas&action=view">Petugas</a></li> <?php
					} ?>
                </ul>
            </li>
            <li class="utama"><a href="">Transaksi</a>
            	<ul>
                	<li><a href="?page=penjualan&action=input">Penjualan</a></li>
                </ul>
            </li>
            <li class="utama"><a href="">Utility</a>
                <ul>
                    <?php
                    if(@$_SESSION['admin']) {
                        $sesi = @$_SESSION['admin'];
                    } else if(@$_SESSION['kasir']) {
                        $sesi = @$_SESSION['kasir'];
                    } ?>
                    <li><a href="?page=akun&id=<?php echo $sesi; ?>">Edit Akun</a></li>
                </ul>
            </li>
            <li class="utama" style="float:right;"><a href="?page=logout">Keluar</a></li>
        <?php } else {
				?> <li class="utama"><a href="?page=login">Silahkan login terlebih dahulu</a></li>
			<?php } ?>
        </ul>
    </nav>
	<script src="inc/jquery.js"></script>
    <script src="inc/jquery-ui.js"></script>
    <script src="inc/jquery-number.js"></script>
    <script>
    $(function(){
        $(".datepicker").datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:'dd-mm-yy',
            yearRange:'-25:+10'
        });
    });

    </script>
    <main>
    	<?php
		if(@$_GET['page'] == '') {
			if(@$_SESSION['admin'] || @$_SESSION['kasir']) {
				?> <title>Halaman Utama</title>
                <div style="text-align:center; font-size:30px;">
                	<div style="font-size:50px; font-family:impact;">TOSERBA YUKCODING</div>
                    Jl. Panunggulan 17B Pati Jawa Tengah<br>
                    Hp. 085 786 447 406
                </div> <?php
			} else {
				?><script>window.location.href="?page=login";</script<?php
			}
		} else if(@$_GET['page'] == "logout") {
			include "inc/logout.php";
		} else if(@$_GET['page'] == "barang") {
			include "inc/barang.php";
		} else if(@$_GET['page'] == "petugas") {
            if(@$_SESSION['admin']) {
    			include "inc/petugas.php";
            } else {
                echo "Akses hanya untuk admin !";
            }
		} else if(@$_GET['page'] == "penjualan") {
			include "inc/penjualan.php";
		} else if(@$_GET['page'] == "login") {
            include "inc/login.php";
        } else if(@$_GET['page'] == "akun") {
            include "inc/akun.php";
        } ?>
    </main>
    
    <footer>
    	&copy; Copyright 2015 - All Right Reserved | Code by yukcoding.blogspot.com | Support by mohnurfawaiq.blogspot.com
    </footer>
</body>
</html>