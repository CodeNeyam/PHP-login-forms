<?php 
include "dbconnection.php";
session_start(); 

// -----------------------------------------INSERT STUDENT FUNCTION----------------------------------------
function insertStudent() {
    // session_start();
    // if($row = $result->fetch_assoc()){
    //     $idStudent = $row['student_id']; 
    // }
    global $conn;
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     // Protect  webPage From Injections
     $fname = mysqli_real_escape_string($conn, $fname);
     $lname = mysqli_real_escape_string($conn, $lname);
     $birthday = mysqli_real_escape_string($conn, $birthday);
     $sex = mysqli_real_escape_string($conn, $sex);
     $email = mysqli_real_escape_string($conn, $email);
     $password = mysqli_real_escape_string($conn, $password);

    //  Protect the password
    // Let Protect the Password 
    $hashFormat = "$2y$10$";
    // Create salt 
    $salt = "iusesomecrazystrings22";
    // Combine them 
    $hash_and_salt = $hashFormat . $salt;
    // Encrypt password 
    $encrypt_password = crypt($password, $hash_and_salt);

    $query = "INSERT INTO student (first_name, last_name, birth_date, sex, email, password_st)";
        $query .= "VALUES ('$fname', '$lname', '$birthday', '$sex', '$email', '$password')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('QUERY FAILED' . mysqli_error());
     }

     header ("location:loginPage.php");
}


//------------------------------------LOGIN STUDENT----------------------------------------------

function LoginStudent() {
    global $conn;

    if (isset($_POST['email']) && isset($_POST['password'])) {


        function validate($data){

            $data = trim($data);
     
            $data = stripslashes($data);
     
            $data = htmlspecialchars($data);
     
            return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: field.php?error=Email is required");
        exit();
    }
    elseif (empty($password)) {
        header("Location: field.php?error=Password is required");
        exit();
    }

    else {
        $query = "SELECT * FROM student WHERE email='$email' AND password_st='$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password_st'] === $password) {
                $_SESSION['fname'] = $row['first_name'];

                $_SESSION['lname'] = $row['last_name'];

                $_SESSION['id'] = $row['student_id'];

                header ("location:field.php?id=" .$_SESSION['id'] . '+' .$_SESSION['lname']);

                exit();
            }
        }
        else {
            header("Location: loginPage.php?error=Incorrect email or password");
            exit();
        }
    }

}
else {
    header("Location: loginPage.php");
    exit();
}

}


//---------------------------------------------CHOOSE FIELD----------------------------------------

// We will have three functions cause we have 3 field to choose
function chooseFieldWeb() {
    global $conn;
    $idStudent = $_SESSION['id'];
    $query = "UPDATE student set student_field = 'Web Development'";
        $query .= "WHERE student_id='$idStudent'";

    $result = mysqli_query($conn, $query);
        if (!$result) {
            die('QUERY FAILED' . mysqli_error());
        }

    header ("location:webdev.php?id=" .$_SESSION['id'] . '+' .$_SESSION['lname']);    
}

function chooseFieldApp() {
    global $conn;
    $idStudent = $_SESSION['id'];
    $query = "UPDATE student set student_field = 'Mobile App'";
        $query .= "WHERE student_id='$idStudent'";

    $result = mysqli_query($conn, $query);
        if (!$result) {
            die('QUERY FAILED' . mysqli_error());
        }

    header ("location:webdev.php?id=" .$_SESSION['id'] . '+' .$_SESSION['lname']);    
}

function chooseFieldDesk() {
    global $conn;
    $idStudent = $_SESSION['id'];
    $query = "UPDATE student set student_field = 'Desktop'";
        $query .= "WHERE student_id='$idStudent'";

    $result = mysqli_query($conn, $query);
        if (!$result) {
            die('QUERY FAILED' . mysqli_error());
        }

    header ("location:webdev.php?id=" .$_SESSION['id'] . '+' .$_SESSION['lname']);    
}

// ------------------------------------------------------LOGIN STUDENT------------------------------------------------------------------

function LoginTeacher() {
    global $conn;

    if (isset($_POST['email']) && isset($_POST['password'])) {


        function validate($data){

            $data = trim($data);
     
            $data = stripslashes($data);
     
            $data = htmlspecialchars($data);
     
            return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: field.php?error=Email is required");
        exit();
    }
    elseif (empty($password)) {
        header("Location: field.php?error=Password is required");
        exit();
    }

    else {
        $query = "SELECT * FROM teacher WHERE email='$email' AND password_tc='$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password_tc'] === $password) {
                $_SESSION['fname'] = $row['first_name'];

                $_SESSION['lname'] = $row['last_name'];

                $_SESSION['field'] = $row['field_teached'];

                $_SESSION['id'] = $row['teacher_id'];

                header ("location:teacherPage.php?id=" .$_SESSION['id'] . '/' .$_SESSION['lname']);

                exit();
            }
        }
        else {
            header("Location: loginPage.php?error=Incorrect email or password");
            exit();
        }
    }

}
else {
    header("Location:LoginPageTeacher.php");
    exit();
}

}