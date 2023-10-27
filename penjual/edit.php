<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
   
    $nama=$_POST['nama_penjual'];
    $noHp=$_POST['noHp'];
    $alamat=$_POST['alamat'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjual SET nama_penjual='$nama',noHp='$noHp',alamat='$alamat' WHERE id_p=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id_p=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_penjual'];
    $noHp = $user_data['noHp'];
    $alamat = $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit data penjual</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_penjual" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama_penjual" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>telepon</td>
                <td><input type="text" name="noHp" value=<?php echo $noHp;?>></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>