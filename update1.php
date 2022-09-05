<?php
require_once "config.php";
$RollNo = $StudentsName = $LMSmail = "";
$RollNo_err = $StudentsName_err = $LMSmail_err = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
$id = $_POST["id"];
$input_rollno = "5CS1";
// trim($_POST["Roll No"]);
    // if (empty($input_rollno)){
    //     $RollNo_err = "Please enter a roll no.";
    // } elseif (!filter_var($input_rollno, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $RollNo_err = "Please enter a valid name.";
    // } else{
    //     $RollNo = $input_rollno;
    // }    

$input_students = "Zar chi";
//  trim($_POST["Students Name"]);
    if (empty($input_students)) {
        $StudentsName_err = "Please enter a name.";
    } elseif (!filter_var($input_students, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $StudentsName_err = "Please enter a valid name.";
    } else {
        $StudentsName = $input_students;
    }

$input_lms = "ucst";
// trim($_POST["major"]);
    if (empty($input_lms)) {
        $LMSmail_err = "Please enter your lms mail.";     
    } else {
        $LMSmail = $input_lms;
    }
    
  
    
    if (empty($RollNo_err) && empty($StudentsName_err) && empty($LMSmail_err)) {
        $sql = "UPDATE studentsdata SET Roll_No=?, Students_Name=?, LMS_mail=? WHERE Roll_No=?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssssss",$param_fathername, $param_name,$param_major);
            $param_fathername = $RollNo;
            $param_name = $StudentsName;
            $param_major = $LMSmail;
           
        if ($stmt->execute()){
            header("location: studentstable.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }
        $stmt->close();
    }
    $mysqli->close();
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM studentsdata WHERE Roll_No = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $param_id);
            $param_id = $id;
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $RollNo = $row ["Roll No"];
                    $StudentsName = $row["Stuents Name"];
                    $LMSmail = $row ["LMS mail"];
                   
                } else {
                    header ("location: error.php");
                    exit();
                }
                
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
        $mysqli->close();
    echo"error desu in sles";
    }  else {
        // error"error.php";
        header("location: error.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student information</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="tutorial8.css">
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Update Student Information</h2>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                    <div class="form-group">
                        <label>Roll No</label>
                        <input type="text" name="Roll_No" class="form-control <?php echo (!empty($RollNo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $RollNo; ?>">
                        <span class="invalid-feedback"><?php echo $RollNo_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Student name</label>
                        <input type="text" name="Students_Name" class="form-control <?php echo (!empty($StudentsName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $StudentsName; ?>">
                        <span class="invalid-feedback"><?php echo $StudentsName_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Lms mail</label>
                        <input type="text" name="LMS_mail" class="form-control <?php echo (!empty($LMSmail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $LMSmail; ?>">
                        <span class="invalid-feedback"><?php echo $LMSmail_err;?></span>
                    </div>
                   
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="update.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>        
    </div>
</div>
</body>
</html>