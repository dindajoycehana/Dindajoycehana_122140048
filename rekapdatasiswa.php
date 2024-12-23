<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";

$dbname = "datasiswa";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
$sql = "select id, Nama, NIS, TTL, Kelas from siswa";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $datarow = array();
        foreach ($row as $key => $value) {
            $datarow[] = $value;
        }
        $data[] = $datarow;
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="rekap.css">
  <title>Database Siswa</title>
</head>
<body>
<header>
        <nav class="navbar">
            <div class="nav-left">
                <a class="navbar-brand" href="#">Hogwart School</a>
            </div>
            <div class="nav-right">
                <a href="index.php">Home</a>
                <a href="rekapdatasiswa.php">Data Siswa</a>
                <a href="logout.php">Logout</a>
            </div>
            </div>
        </nav>
    </header>

  <table id="myTable" class="display ">
    <thead>
      <th>id</th>
      <th>Nama</th>
      <th>NIS</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Kelas</th>
      <th>Update</th>
    </thead>

<?php 
while ($row = $result->fetch_assoc()) {
    echo "<tbody>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["Nama"] . "</td>";
    echo "<td>" . $row["NIS"] . "</td>";
    echo "<td>" . $row["TTL"] . "</td>";
    echo "<td>" . $row["Kelas"] . "</td>";
    echo "<td> <button> Delete </button> </td>";
    echo "</tbody>";
}
;
?>  

  </table>
  <button style=>
  <a href="inputdatasiswa.php">Tambah Data</a>
  </button>

</body>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
  $(document).ready( function () {
    var data=
    <?php
echo json_encode($data);
?>;

 data.forEach(element => {
     element.push(
       `
       <a href="edit.php?id=${element[0]}">Edit</a>
       <form method="POST" action="delete.php" style="display:inline;">
         <input type="hidden" name="id" value="${element[0]}">
         <button type="submit">Delete</button>
       </form>
       `
     );
   })
     $('#myTable').DataTable(
         {
             paging : true,
             searching : true,
             ordering : false,
             data : data,
         }
     );
     console.log(data);
} );
</script>
</html>