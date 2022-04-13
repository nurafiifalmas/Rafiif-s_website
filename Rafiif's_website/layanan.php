<section>             
    <div class="form">
        <h1>FORM HITUNG BMI</h1>
            <div class="content">
                <div class="form-input">
                    <form action="index.php?p=layanan" method="POST"> 
                        <div class="form-group">
                            <input name="nama" type="text" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <input name="tinggi" type="number" placeholder="Masukkan tinggi badan" required>
                        </div>
                        <div class="form-group">
                            <input name="berat" type="number" placeholder="Masukkan berat badan" required>
                        </div>
                        <div class="submit">
                            <input type="submit" name="submit" value="Hitung Total">
                        </div>
                    </form>
                </div>
                    <div class="refrensi">
                        <a>Referensi : </a><a class="link" href="https://hellosehat.com/nutrisi/cara-menghitung-indeks-massa-tubuh/">
                        https://hellosehat.com/nutrisi/cara-menghitung-indeks-massa-tubuh/
                        </a>
                    </div>
            </div>
    </div>
    <div class="hasil">
        <h1>HASIL HITUNG BMI</h1>
            <div class="content">
                    <?php
                    if (isset($_POST['submit'])) {
                        $nama = $_POST['nama'];
                        $tinggi = $_POST['tinggi'];
                        $berat = $_POST['berat']; 
                        
                        //perhitngan BMI
                        $a = $tinggi / 100;
                        $bmi = $berat / ($a * $a);

                        if ($bmi >= 30) {
                            $keterangan = "Obesitas";
                        } elseif ($bmi >= 23 && $bmi <= 29.9) {
                            $keterangan = "Berat badan berlebih";
                        } elseif ($bmi >= 18.5 && $bmi <= 22.9) {
                            $keterangan = "Berat badan normal";
                        } else {
                            $keterangan = "Berat badan kurang";
                        }
                        
                        echo"   <p> Nama  : "."$nama"." </p>
                                <p> Tinggi  : "."$tinggi"."cm </p>
                                <p> Berat  : "."$berat"."Kg </p>
                                <p> BMI  : "."$bmi"." </p>
                                <h4>Keterangan : <strong>"." $keterangan"."</strong></h4>
                                <script>alert('Data tersimpan, tampilkan hasil')</script>
                        ";
                    }
                    ?>
                                    
            </div>
    </div>
</section>
