<!DOCTYPE html>

<?php
    include 'koneksi_art.php';
        
        $nama = '';
        $jenkel = '';
        $tanggal_lahir = '';
        $alamat = '';
        $no_telpn = '';
        $pengalaman = '';
        $keahlian = '';
        $berkendara = '';

    if(isset($_GET['ubah'])){
        $id_art = $_GET['ubah'];
        
        $query = "SELECT * FROM si_art WHERE id_art = '$id_art';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nama = $result['nama'];
        $jenkel = $result['jenkel'];
        $tanggal_lahir = $result['tanggal_lahir'];
        $alamat = $result['alamat'];
        $no_telpn = $result['no_telpn'];
        $pengalaman = $result['pengalaman'];
        $keahlian = $result['keahlian'];
        $berkendara = $result['berkendara'];

        //var_dump($result);

        //die();
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js" ></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">


        <title>Asisten Rumah Tangga</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light mb-4">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                Tambah Data Asisten Rumah Tangga</a>
            </div>
        </nav>
        <div class="container">
            <form method="POST" action="proses.php">
                <div class="mb-4 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label><td>:</td>
                    <div class="col-sm-2">
                    <input required type="text" name="nama" class="form-control" id="nama" placeholder="ex: Rafly">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenkel" class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label><td>:</td>
                    <div class="col-sm-5">
                        <input type="radio" id="jenis_kelamin_l" name="jenkel" value="Laki-laki" required>
                        <label for="jenis_kelamin_l">Laki-laki</label>
                        <input type="radio" id="jenis_kelamin_p" name="jenkel" value="Perempuan" required>
                        <label for="jenis_kelamin_p">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label><td>:</td>
                    <div class="col-sm-2">
                    <input required value="<?php echo $tanggal_lahir; ?>" type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label" >Alamat</label><td>:</td>
                    <div class="col-sm-6">
                        <textarea required class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_telpn" class="col-sm-2 col-form-label">No Heandphone</label><td>:</td>
                    <div class="col-sm-2">
                    <input required type="text" name="no_telpn" class="form-control" id="no_telpn" placeholder="ex: 08xxxxxxxxxx">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pengalaman" class="col-sm-2 col-form-label">Pengalaman</label><td>:</td>
                    <div class="col-sm-3">
                        <select required id="pengalaman" name="pengalaman" class="form-select" aria-label="Default select example">
                            <option value="pernah bekerja">Pernah Bekerja</option>
                            <option value="tidak pernah bekerja">Tidak Pernah Bekerja</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="keahlian" class="col-form-label col-sm-2 pt-0">Keahlian</label><td>:</td>
                    <div class="col-sm-9">
                        <input type="checkbox" name="keahlian[]" value="setrika"> Setrika
                        <input type="checkbox" name="keahlian[]" value="ngasuh anak"> Ngasuh anak
                        <input type="checkbox" name="keahlian[]" value="masak"> Masak
                        <input type="checkbox" name="keahlian[]" value="cuci baju"> Cuci baju 
                        <input type="checkbox" name="keahlian[]" value="tukang kebun"> Tukang kebun
                        <input type="checkbox" name="keahlian[]" value="antar jemput"> Antar jemput
                        <input type="checkbox" name="keahlian[]" value="pengasuh lansia"> Pengasuh lansia
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="berkendara" class="col-sm-2 col-form-label">Berkendara</label><td>:</td>
                    <div class="col-sm-3">
                        <select required id="berkendara" name="berkendara" class="form-select" aria-label="Default select example">
                            <option value="tidak bisa berkendara">Tidak Bisa Berkendara</option>
                            <option value="bisa bawa motor">Bisa Bawa Motor</option>
                            <option value="bisa bawa mobil">Bisa Bawa Mobil</option>
                            <option value="bisa keduanya">Bisa Keduanya</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row mt-4">
                    <div class="col">
                        <?php
                            if(isset($_GET['ubah'])){
                        ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-success">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Simpan Perubahan
                            </button>
                        <?php
                            } else {
                        ?>
                            <button type="submit" name="aksi" value="add" class="btn btn-success">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Tambahkan
                            </button>
                        <?php
                            }
                        ?>
                        <a href="read.php" type="button" class="btn btn-danger">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Batal
                        </a>
                    </div>
                </div>

            </from>
        </div>
    </body>
</html>