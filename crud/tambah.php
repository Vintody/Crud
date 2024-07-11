<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tzuchi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kegiatan = $_POST["kegiatan"];
    
    $sql = "INSERT INTO kegiatan (kegiatan) VALUES ('$kegiatan')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kegiatan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Tambah Data Kegiatan</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nama Kegiatan: <input type="text" name="kegiatan">
        <br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>
