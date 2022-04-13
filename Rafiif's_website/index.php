<!DOCTYPE html>
<?php 
    $koneksi=mysqli_connect("localhost","root","","db_rafiif's_website");
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/styles.css" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <ul>
                <h2>
                    <b>Rafiif's Website</b>
                </h2>
                    <li><a href="index.php?p=beranda">Beranda</a></li>
                    <li><a href="index.php?p=kampusku">Kampusku</a></li>
                    <li><a href="index.php?p=kotaku">Kotaku</a></li>
                    <li><a href="index.php?p=profile">Profile</a></li>
                    <li><a href="index.php?p=list">Daftar Teman</a></li>
                    <li><a href="index.php?p=layanan">Layanan</a></li>
            </ul>
        </nav>
    </header>
    <?php
		if(@$_GET['p']==""){
			include_once 'beranda.php';
		}
		elseif(@$_GET['p']=="beranda"){
			include_once 'beranda.php';
        }
        elseif(@$_GET['p']=="kampusku"){
			include_once 'kampus.php';
        }
        elseif(@$_GET['p']=="kotaku"){
			include_once 'kota.php';
        }
        elseif(@$_GET['p']=="profile"){
			include_once 'profile.php';
        }
        elseif(@$_GET['p']=="list"){
			include_once 'daftar_list/list_daftar_teman.php';
        }
        elseif(@$_GET['p']=="tambah_list"){
			include_once 'daftar_list/tambah_data.php';
        }
		elseif(@$_GET['p']=="update_list"){
			$query = mysqli_query($koneksi,"SELECT * FROM tb_list_teman WHERE id='".$_GET['id']."'");
			while ($row = mysqli_fetch_assoc($query)) {
                $hobi = explode(", ", $row['hobi']);
				include_once 'daftar_list/edit_data.php';
			}
        }
        elseif(@$_GET['p']=="delete_list"){
            $query=mysqli_query($koneksi,"SELECT * FROM tb_list_teman WHERE id='".$_GET['id']."'");
			$foto_lama=mysqli_fetch_array($query);
            unlink('assets/img/foto_teman/'.$foto_lama['foto']);
            
			$query = mysqli_query($koneksi,"DELETE FROM tb_list_teman WHERE id='".$_GET['id']."'");
			if ($query) {
                echo "<script>alert('Data telah dihapus')</script>";
				echo "<script>location='index.php?p=list'</script>";
			}else{
                echo "<script>alert('erorr')</script>";
            }
            
		}
        elseif(@$_GET['p']=="layanan"){
			include_once 'layanan.php';
        }
    ?>
    <footer>
        <div>
            <a>@copyrightRafiif's_WebDeveloper</a>
        </div>
    </footer>
</body>
</html>