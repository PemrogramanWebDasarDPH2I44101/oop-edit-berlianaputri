<?php 
require_once('class.php');
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $kalkulator->ambildata($id);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $nim = $row['nim'];
            $nama = $row['nama'];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="class.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Masukan angka 1<input type="text" name="input1" value="<?php echo $nama; ?>"><br>
        Masukan angka 2<input type="text" name="input2" value="<?php echo $nim; ?>"><br>
        <br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>