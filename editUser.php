<?php 
include 'konekLogin.php'; 
    if(isset($_GET['id'])){ 
        $kode = $_GET['id']; 
        $query="SELECT * FROM user WHERE id='$kode'"; 
        $sql=mysqli_query($conn, $query);
        while ($hasil = mysqli_fetch_array ($sql)){ 
            $username = $hasil['nama_user']; 
            $email = $hasil['email']; 
            $telepon = $hasil['telepon']; 
            $password = $hasil['password']; 
            $login_status = $hasil['peran']; 
        } 
    }else{ 
        die ("Error. NO Id Selected! "); 
    } 
    if(isset($_POST['sub'])){ 
        $username = htmlspecialchars($_POST['nama']); 
        $email = htmlspecialchars($_POST['email']); 
        $telepon = htmlspecialchars($_POST['telepon']); 
        $password = htmlspecialchars($_POST['password']); 
        $encryptedpassword = password_hash($password, PASSWORD_DEFAULT); 
        $login_status = htmlspecialchars($_POST['peran']); 
        $query = "UPDATE user SET nama_user='$username', 
                                email='$email', 
                                telepon='$telepon', 
                                password='$password', 
                                peran='$login_status'
                                WHERE id='$kode'";
        $sql=mysqli_query($conn, $query); 
        if($sql){ 
            header("location:user.php"); 
            }else{
                header("location:user.php"); 
                } 
    } 
?> 
<html> 
    <head> 
        <title>Tambah Barang</title> 
    </head> 
    <body>
        <div class="topnav">
            <b><a href="home.php">Home</a></b> 
            <b><a href="login.php">Login</a></b> 
            <b><a href="logout.php">Logout</a></b> 
        </div> 
        <center> 
            <div class="panjang"> 
                <h2 align="left" style="margin-bottom:30px">
                <b>Edit Data User</b></h2> 
                <form action="" method="POST"> 
                    <div> 
                        <label for="nama">Username: </label><br> 
                        <input type="text" name="nama" readonly value="<?php echo $username;?>"><br> 
                    </div> 
                    <div> 
                        <label for="email">Email: </label><br> 
                        <input type="email" name="email" value="<?php echo $email;?>"><br> 
                    </div> 
                    <div> 
                        <label for="telepon">Telepon: </label><br> 
                        <input type="text" name="telepon" value="<?php echo $telepon;?>"><br> 
                    </div> 
                    <div> 
                        <label for="password">Password:</label><br> 
                        <input type="password" name="password" value="<?php echo $password;?>"><br> 
                    </div> 
                    <div> 
                        <label for="Peran">Peran: </label><br> 
                        <input type="text" name="peran" id="peran" value="<?php echo $login_status;?>"> 
                    </div> 
                    <div> 
                        <input type="submit" name="sub" value="Update" class="tombol"> 
                        <input type="submit" name="reset" value="Reset" class="tombol"> 
                    </div> 
                </form> 
            </div> 
        </center> 
    </body> 
</html>