<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];

    $insert = mysqli_query($koneksi, "INSERT INTO testimoni (nama,jabatan,deskripsi) VALUES ('$nama','$jabatan','$deskripsi')");
    header("location:?pg=testimoni&insert=berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT*FROM testimoni WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}
if (isset($_POST["edit"])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];
    $update = mysqli_query($koneksi, "UPDATE testimoni SET nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id='$id'");
    header("location:?pg=testimoni&update=berhasil");
}

?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Nama Level</label>
        <input type="text" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>" type="text" class="form-control" name="nama" placeholder="Masukkan Nama Testimoner">
        <!-- tanda tanya pada code diatas "?" berarti "maka" dan titik 2 ":" berarti data   -->

        <div class="mb-3">
            <label for="">Jabatan</label>
            <input type="text" value="<?php echo isset($_GET['edit']) ? $rowEdit['jabatan'] : '' ?>" type="text" class="form-control" name="jabatan" placeholder="Masukkan Nama Testimoner">
        </div>
        <div class="mb-3">
            <label for="">Deskripsi</label>
            <textarea type="text" name="keterangan" id="" class="form-control"><?php echo isset($_GET['edit']) ? $rowEdit['deskripsi'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" value="Simpan" class="btn btn-primary">

            <!-- Action Short hand diatas berguna untuk menggunakan 2 action dalam satu syntax dimana ketika 
            action pertama tidak terpenuhi maka action kedua akan terpenuhi. -->


            <a href="?pg=testimoni">Kembali</a>
        </div>
    </div>

</form>