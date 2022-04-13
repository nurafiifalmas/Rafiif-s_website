<section>
        <div class="form_data">
            <div>
                <h1>Form Tambah Data Teman</h1>
            </div>

            <div class="content">
                <div class="form-input">

                    <form method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="input" name="nama" type="text" required>
                        </div>
                        <div class="form-group">
                        <label>Prodi</label><br><br>
                        <select name="prodi" required>
									<option  selected disabled="">--- Pilih Prodi ---</option>
									<option  value="Teknik Informatika">Teknik Informatika</option>
									<option  value="THP">THP</option>
                                    <option  value="Akuntansi">Akuntansi</option>
						</select>
                        </div>
                        <div class="form-group">
                            <label>Hobi</label><br><br>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Hangout"> Hangout
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
                            </div>
                            <div class="checkbox">
	                            <input type="checkbox" name="hobi[]" value="Nonton"> Nonton
                            </div>
                            <div class="checkbox">
	                            <input type="checkbox" name="hobi[]" value="Bermain alat musik"> Bermain alat musik
                            </div>
                            <div class="checkbox">
	                            <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
                            </div>
                            <div class="checkbox">
	                            <input type="checkbox" name="hobi[]" value="Otomotif"> Otomotif
                            </div>
                            <div class="checkbox">
	                            <input type="checkbox" name="hobi[]" value="Mendengarkan musik"> Mendengarkan musik
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br><br>
                            <div class="radio">
                                <input name="gender" type="radio" value="Laki - laki" required>Laki - laki
                            </div>
                            <div class="radio">
                                <input name="gender" type="radio" value="Perempuan" required>Perempuan
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="input" name="tgl_lahir" type="Date" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <input class="input" name="no_tlp" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="input">
                        </div>
                        <div>
                            <input class="btn btn-success submit" type="submit" name="submit" value="Submit">
                        </div>
                    </form>

                </div>
            </div>

        </div>
</section>

<?php 
	if(isset($_POST['submit'])){
        $hobi = implode(", ", $_POST['hobi']);
        $foto = $_FILES["foto"]["name"];
	 	$tmp = $_FILES["foto"]["tmp_name"];
        $path = "assets/img/foto_teman/";

        if ($foto != "") {
            move_uploaded_file($tmp, $path.$foto);
            $query = mysqli_query($koneksi,"INSERT INTO tb_list_teman 
            VALUES (NULL,'".$_POST['nama']."','".$_POST['prodi']."','".$_POST['gender']."','".$hobi."','".$_POST['tgl_lahir']."','".$_POST['no_tlp']."','".$foto."')");
            
            if($query){
                echo "<script>alert('Data berhasil ditambahkan')</script>";
				echo "<script>location='index.php?p=list'</script>";
				}
        }else {
            $query = mysqli_query($koneksi,"INSERT INTO tb_list_teman 
            VALUES (NULL,'".$_POST['nama']."','".$_POST['prodi']."','".$_POST['gender']."','".$hobi."','".$_POST['alamat']."','".$_POST['no_tlp']."','kosong')");
            
            if($query){
                echo "<script>alert('Data berhasil ditambahkan')</script>";
				echo "<script>location='index.php?p=list'</script>";
				}
        }
	}
?>