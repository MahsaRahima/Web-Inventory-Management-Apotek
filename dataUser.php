<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Data User</title>
    </head> 
    <body>
        <div class="topnav"> 
            <b><a href="home.php">Home</a></b> 
            <b><a href="#">User</a></b>
            <b><a href="dataObat.php">Obat</a></b>
            <b><a href="dataTrans.php">Transaksi</a></b> 
            <b><a href="logout.php">Logout</a></b> 
        </div> 
        <center> 
            <div class="panjang"> 
                <h3 align="left" style="margin-bottom:30px">Daftar User</h3> 
                <?php 
                    include "koneksi.php"; 
                    $sql = "SELECT * from user ORDER BY id"; 
                    $hasil = $conn->query($sql); 
                    if ($hasil->num_rows>0) { 
                        echo "<table class='table table-dark table-hover cols-6 rows-6'> 
                            <tr> 
                                <th>ID</th> 
                                <th>Nama</th>
                                <th>Username</th>  
                                <th>Email</th> 
                                <th>No Hp</th> 
                                <th>password</th> 
                                <th>jabatan</th>
                                <th>Alamat</th>  
                                <th>Edit</th> 
                                <th>Hapus</th> 
                            </tr>"; 
                    while ($row=$hasil->fetch_assoc()){ 
                        $teks="<tr>"; 
                        $teks.="<td>".$row["id"]."</td>"; 
                        $teks.="<td>".$row["nama"]."</td>";
                        $teks.="<td>".$row["username"]."</td>";  
                        $teks.="<td>".$row["email"]."</td>";
                        $teks.="<td>".$row["telepon"]."</td>"; 
                        $teks.="<td>".$row["password"]."</td>"; 
                        $teks.="<td>".$row["jabatan"]."</td>";
                        $teks.="<td>".$row["alamat"]."</td>";  
                        $teks.="<td><a href='editUser.php?id=".$row["id"]."'>Edit</a></td>"; 
                        $teks.="<td><a href='delUser.php?id=".$row["id"]."'>Hapus</a></td>"; 
                        $teks.="</tr>"; 
                        echo $teks; 
                    } 
                    echo "</table>"; 
                    echo "<br><table border=1 cellpadding=10 cellspacing=0 align='left'>"; 
                    echo " <tr> 
                    <td bgcolor='lighyellow'>
                    <a style='text-decoration: none; color:black;' href='addUser.php''>Tambah</a></td> </tr>"; 
                    echo "</table>"; 
                    }else{ 
                        echo "Jumlah Record: 0";
                        echo "<br><table border=1 cellpadding=10 cellspacing=0 align='left'>"; 
                        echo " <tr> <td bgcolor='lighyellow'><a style='text-decoration: none; color:black;' href='addUser.php''>Tambah</a></td> </tr>"; 
                        echo "</table>"; 
                    } 
                    $conn->close(); 
                ?> 
            </div> 
        </center> 
    </body> 
</html>