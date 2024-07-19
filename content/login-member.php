<?php
//print_r($_SESSION);
//die;
if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user.email = '$email'");
    if (mysqli_num_rows($query) > 0) {
        $dataUser = mysqli_fetch_assoc($query);
        if ($dataUser['password'] == $password) {
            $_SESSION['id_member'] = $dataUser['id'];
            $_SESSION['id_session'] = session_id();

            header('location: index.php');
        }
    }
}
?>
<div class="untree_co-section">
    <div class="container">

        <div class="block">
            <div class="row justify-content-center">


                <div class="col-md-8 col-lg-8 pb-4">

                    <?php if (!isset($_GET['$id_member'])) : ?>
                        Selamat Datang di Website Ecommerce
                    <?php else : ?>

                        <form method="post">
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-black" for="lname">Email</label>
                                        <input name="email" type="email" class="form-control" id="lname">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="text-black" for="email">Password</label>
                                    <input name="password" type="password" class="form-control" id="email">
                                </div>



                                <button name="simpan" type="submit" class="btn btn-primary-hover-outline mt-3 me-3">Login</button>
                                <a href="?pg=member">Register</a>
                        </form>
                    <?php endif ?>

                </div>

            </div>

        </div>

    </div>


</div>