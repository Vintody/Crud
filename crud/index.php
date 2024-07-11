<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tzuchi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, kegiatan FROM kegiatan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Kegiatanmu Hari ini</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>List Kegiatanmu Hari ini</h1>
    <a href="tambah.php"><button>Tambah Kegiatan</button></a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["kegiatan"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada kegiatan</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
