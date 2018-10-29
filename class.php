<?php
class Kalkulator{
    private $conn;

    public function Kalkulator(){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $db         = "WebDasar";       
        $this->conn = mysqli_connect($servername, $username, 
                           $password, $db);                        
    }    

    public function tambah(){
        $angka1 = $_POST['input1'];
        $angka2 = $_POST['input2'];
        $sql    = "INSERT INTO siswa(nama, nim) 
                    VALUES ('$angka1','$angka2')";
        mysqli_query($this->conn, $sql);
        echo "Data Berhasil disimpan";        
    }    
    public function kurang(){        
        $angka1 = $_POST['input1'];
        $angka2 = $_POST['input2'];
        $sql    = "DELETE FROM siswa WHERE nim=$angka2";        
        mysqli_query($this->conn, $sql);
        echo "Hapus Data Berhasil";
    }
    public function bagi(){
        $sql    = "SELECT * FROM siswa";        
        return mysqli_query($this->conn, $sql);

    }

    public function ambildata($id){
    	$sql = "SELECT * FROM siswa WHERE id='$id'";
    	return mysqli_query($this->conn, $sql);
    }

    public function update(){
    	$angka1 = $_POST['input1'];
        $angka2 = $_POST['input2'];
        $id = $_POST['id'];
    	$sql = "UPDATE siswa SET nama='$angka1', nim='$angka2' WHERE id='$id'";
    	if(mysqli_query($this->conn, $sql)){
    		echo "Berhasil";
    	}else{
    		echo "Error" . $sql . "<br>" . mysqli_error($this->conn);
    	}
	}
}
@$operasi = $_POST["operasi"];
$kalkulator = new Kalkulator();
if($operasi == "+")
    $kalkulator->tambah();
if($operasi == "-")
    $kalkulator->kurang();
if($operasi == "/"){
    $result = $kalkulator->bagi();
    require_once("data.php");
}
if (isset($_POST['update'])) {
	$kalkulator->update();
}
    

?>