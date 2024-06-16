<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form
$user_input = $_GET['user_input'];

// Query SQL yang rentan terhadap SQL Injection
$sql = "SELECT * FROM users WHERE username = '$user_input'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nama: " . $row["username"]. "<br>";
    }
} else {
    echo "0 hasil";
}
$conn->close();
?>
