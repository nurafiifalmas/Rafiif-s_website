<section>
        <div class="form_data">
            <div>
                <h1>Form Edit Data Teman</h1>
            </div>

            <div class="content">
                <div class="form-input">

                    <form method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="input" name="nama" type="text" value="<?php echo $row['nama_teman'];?>" require>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label><br><br>
                            <select name="prodi" required>
                                <option  selected disabled="">Prodi</option>
                                <option  value="Teknik Informatika" <?php if ( $row['prodi'] == 'Teknik Informatika') echo '
                                selected="selected"'; ?>>Teknik Informatika</option>
                                <option  value="THP" <?php if ( $row['prodi'] == 'THP') echo '
                                selected="selected"'; ?>>THP</option>
                                <option  value="Akuntansi" <?php if ( $row['prodi'] == 'Akuntansi') echo '
                                selected="selected"'; ?>>Akuntansi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hobi</label><br><br>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Hangout" <?php if (in_array("Hangout", $hobi)) echo "checked";?> > Hangout
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Membaca" <?php if (in_array("Membaca", $hobi)) echo "checked";?> > Membaca
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Nonton" <?php if (in_array("Nonton", $hobi)) echo "checked";?> > Nonton
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Bermain alat musik" <?php if (in_array("Bermain alat musik", $hobi)) echo "checked";?> > Bermain alat musik
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Olahraga" <?php if (in_array("Olahraga", $hobi)) echo "checked";?> > Olahraga
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Otomotif" <?php if (in_array("Otomotif", $hobi)) echo "checked";?> > Otomotif
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="hobi[]" value="Mendengarkan musik" <?php if (in_array("Mendengarkan musik", $hobi)) echo "checked";?> > Mendengarkan musik
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br><br>
                            <div class="radio">
                                <input name="gender" type="radio" value="Laki - laki" <?php if($row['jenis_kelamin']=='Laki - laki') echo 'checked'?> required >Laki - laki
                            </div>
                            <div class="radio">
                                <input name="gender" type="radio" value="Perempuan" <?php if($row['jenis_kelamin']=='Perempuan') echo 'checked'?> required>Perempuan
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="input" name="tgl_lahir" type="date" value="<?php echo $row['tanggal_lahir'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <input class="input" name="no_tlp" type="text" value="<?php echo $row['no_tlp'];?>" required>
                        </div>  
                        <div class="form-group">
                            <label>Foto</label>
                            : <?php echo $row['foto'];?>
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

        if(empty($foto)){
            $query = mysqli_query($koneksi,"UPDATE tb_list_teman SET nama_teman='".$_POST['nama']."',prodi='".$_POST['prodi']."',jenis_kelamin='".$_POST['gender']."',hobi='$hobi',tanggal_lahir='".$_POST['tgl_lahir']."',no_tlp='".$_POST['no_tlp']."' 
                WHERE id='".$row['id']."'");
            
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=list'</script>";
                }else{
                    echo "<script>alert('Data gagal diubah')</script>";
                }
        }else {
            $query=mysqli_query($koneksi,"SELECT * FROM tb_list_teman 
            WHERE id='".$_GET['id']."'");
			$foto_lama=mysqli_fetch_array($query);
            unlink('assets/img/foto_teman/'.$foto_lama['foto']);

            if ($foto != "") {
                move_uploaded_file($tmp, $path.$foto);
                $query = mysqli_query($koneksi,"UPDATE tb_list_teman SET nama_teman='".$_POST['nama']."',prodi='".$_POST['prodi']."',jenis_kelamin='".$_POST['gender']."',hobi='$hobi',tanggal_lahir='".$_POST['tgl_lahir']."',no_tlp='".$_POST['no_tlp']."',foto='$foto' 
                WHERE id='".$row['id']."'");
                
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=list'</script>";
                }else {
                    echo "<script>alert('Data gagal diubah')</script>";
                }
            }
        }
	}
?>