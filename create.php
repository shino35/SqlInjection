<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// $_POST['Roll_No']="";
// $_POST['Student_Name']="";
// $_POST['LMS_mail']="";
// error_reporting(0);
// if($_POST['Roll_No'] == ''){

// }else{}

try {
  
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO studentsdata (Roll_No,Students_Name,LMS_mail) VALUES ('" . $_POST['Roll_No'] . "', '" . $_POST['Students_Name'] . "', '" . $_POST['LMS_mail'] . "')";
  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
}

$conn = null;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Student Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="inj.css">
</head>
<body>
<h2 class="mt-5" style="text-align:center;">Create Students Record</h2>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table class="table1"><tr> <div class="form-group"><td width="150px"><label>Roll No</label></td><td><input type="text" name="Roll_No" ></div></td></tr>
                <tr><div class="form-group"><td width="150px"><label>Student name</label></td><td><input type="text" name="Students_Name"></div></td></tr>
                <tr><div class="form-group"><td width="150px"><label>Lms mail</label></td><td><input type="text" name="LMS_mail" ></div></td></tr>
                <tr><div class="form-group"><td  id="updsub"><input type="submit" class="btn btn-primary" value="Submit"></td><td id="updsub"> <a href="studentstable.php" class="btn btn-secondary ml-2">Back</a></div></td></tr>
            
            </table>
                   
                       
                       
                        
                    
                    
                        
                        
                   
                        
                   
           
                
               
                </form>
                </form>
            </div>
        </div>        
    </div>
</div>
</body>
</html>