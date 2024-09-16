<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "login_register";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $gender = $_POST['gender'];
    $pin_code = $_POST['pin_code'];
    $phone = $_POST['phone'];
    $institute = $_POST['institute'];
    $mobile = $_POST['mobile'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $university = $_POST['university'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $instituteEmail = $_POST['instituteEmail'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];
    $idMark = $_POST['idMark'];
    $idProofNumber = $_POST['idProofNumber'];
    $chargeableCategory = $_POST['chargeable_category']; 
    $numberOfWeeks = $_POST['numberOfWeeks'];
    $trainingType = $_POST['trainingType']; 

    $sql = "INSERT INTO forms (name, gender, pin_code, phone_num, institute_name, mobile_num, father_name, mother_name, university_name, address, city, state, institute_email_id, branch, semester, year, id_mark, id_proof_num, chargeable_category, no_of_weeks,  training_type)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssssssssssssssssss", $name, $gender, $pin_code, $phone, $institute, $mobile, $fatherName, $motherName, $university, $address, $city, $state, $instituteEmail, $branch, $semester, $year, $idMark, $idProofNumber, $chargeableCategory, $numberOfWeeks, $trainingType);
        
        if ($stmt->execute()) {
            // echo "Data inserted successfully!";
            header("Location: ty.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}

// Logout code
session_start();
session_destroy();
header("Location: login.php");
?>
