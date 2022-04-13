<script>alert("Ini Halaman Daftar Teman")</script>
        <section>
            <div class="form_list">
                <div>
                    <h1>Tabel Daftar Teman Anda</h1>
                </div>

                <div>
                    <table  width="100%" cellspacing="0">
						<tr>
							<th>No</th> 
							<th>Nama Teman</th>
							<th>Prodi</th>
							<th>Hobi</th>
							<th>Jenis Kelamin</th>
                        	<th>Tanggal Lahir</th>
							<th>Nomor Telepon</th>
							<th>Foto</th>
                	        <th>Opsi</th>
						</tr>
							<?php 
								$no=1;
								$query = mysqli_query($koneksi,"SELECT * FROM tb_list_teman ORDER BY id ASC");
								while ($row = mysqli_fetch_assoc($query)) {
							?>
						<tr>
							<td class"center"><?php echo $no++; ?></td>
							<td><?php echo $row['nama_teman']; ?></td>
							<td><?php echo $row['prodi']; ?></td>
							<td><?php echo $row['hobi']; ?></td>
							<td><?php echo $row['jenis_kelamin']; ?></td>
							<td><?php echo $row['tanggal_lahir']; ?></td>
							<td><?php echo $row['no_tlp']; ?></td>
							<td class"center"><?php 
								if($row['foto']=="kosong"){ ?>
									<img src="assets/img/foto_teman/kosong.jpg" width="50">
						<?php	}else{ 
						?>
									<img width="150" src="assets/img/foto_teman/<?php echo $row['foto']; ?>"> 
						<?php 	}
				 		?>
							</td>
							<td class"center">						
								<a class="btn btn-primary" href="index.php?p=update_list&id=<?php echo $row['id'] ?>">Edit</a>
 			                	<a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_list&id=<?php echo $row['id'] ?>">Delete</a>	
				    		</td>
						</tr>
							<?php  
								}
             				?>
			    	</table>
			   		<a class="btn btn-success" href="index.php?p=tambah_list">Tambah Data</a>
 			 	</div>
            </div>
</section>