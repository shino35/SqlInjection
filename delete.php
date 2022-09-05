<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";



// if(isset($_POST['Roll_No'])) {
//     $new_value=$_GET['variable_name'];
// }
// echo $new_value;
// error_reporting(0);
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  


  $sql = "Delete studentsdata where Roll_No='" . $_POST['Roll_No'] . "'";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="inj.css">
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h2 class="mt-5 mb-3">Delete Student Information</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-danger">
                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                 <p>Are you sure you want to delete this employee record?</p>
                 <p>
                    <input type="submit" value="Yes" name="submit" class="btn btn-danger">
                    <a href="delete.php" class="btn btn-secondary ml-2">No</a>
                </p>
                </div>
            </form>
            </div>
        </div>        
    </div>
</div>
</body>
</html>