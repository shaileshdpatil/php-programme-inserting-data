
<?php include 'nav.php';?>
<?php
if (isset($_POST['submit']) && $_POST['submit'] != '') {
    
    require_once 'db.php';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';
    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $course = (!empty($_POST['course'])) ? $_POST['course'] : '';
   
    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `students` SET first_name='" . $first_name . "', last_name='" . $last_name . "',gender='" . $gender . "',email= '" . $email . "', course='" . $course . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `students` (first_name, last_name, gender,email, course) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $email . "', '" . $course . "' )";
        $msg = "add";
    }
      
    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/collagedb/index.php?msg=' . $msg);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<body>


   <?php include "aleart.php";?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-7">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="">
                </div>
            </div>
            <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
            <label for="course" class="col-sm-3 col-form-label">Course</label>
            <div class="col-sm-7">
                <select class="form-control" name="course" id="course">
                <option value="">Select Course</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                </select>
                </div>
            </div>
                
                <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href = 'http://localhost/collagedb/index';">Dashboard</button>
                <input type="submit" name="submit" class="btn btn-secondary btn-lg btn-block" value="SUBMIT" />
            
        </form>
    </div>
</div>
</body>
</html>