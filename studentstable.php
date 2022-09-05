<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inj.css">
    <title>Students Information</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-2 mb-5 clearfix">
                <h2 class="pull-left">Students Information</h2>
                <a href="createemptyquery.php" class="btn btn-success pull-right" id="addnews"><i class="fa fa-plus"></i> Add New Students</a>
            </div>
            </div>
        </div>        
    </div>
</div>
<!-- <div style="text-align: center"> <a href="data.php"> <input type="button" value="View Age Chart"> </a></div> -->
</body>
</html>

<?php
session_start();

require_once "config.php";
$sql = "SELECT * FROM studentsdata";
if ($result = $mysqli->query($sql)) {
    if($result->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Roll_No</th>";
        echo "<th>Students_Name</th>";
        echo "<th>LMS_mail</th>";
        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                    echo "<td>" . $row['Roll_No'] . "</td>";
                    echo "<td>" . $row['Students_Name'] . "</td>";
                    echo "<td>" . $row['LMS_mail'] . "</td>";
                    
                    echo "<td>";
                    // echo '<a href="read.php?id='. $row['Roll_No'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                    
                    echo '<a href="update.php?id='. $row['Roll_No'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                    echo '<a href="delete1.php?id='. $row['Roll_No'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                    echo "</td>";
                echo "</tr>";
                }
              
        echo "</tbody>";                            
        echo "</table>";                    
    $result->free(); } else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
      }  } else {
            echo "Oops! Something went wrong. Please try again later.";
          }
    $mysqli->close();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    You are admin of this page <a href="logout.php">Click here</a> to Logout.
</body>
</html>