<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="style2.css" type="text/css">
  <title>Register Form</title>
  <style>
    body {
      background-image: url('plant.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .form-container {
      backdrop-filter: blur(10px);
      width: 600px;
      text-align: center;
      padding: 20px;
      border-radius: 15px;
      font-family: 'Poppins', sans-serif;
      color: white;
      font-size: 16px;
      background-color: rgba(0, 0, 0, 0.6);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
      position: relative;
      border: 1px solid white;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .column {
      flex: 0 0 calc(33.33% - 10px);
      width: calc(33.33% - 10px);
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      border-radius: 5px;
      /* background-color: rgba(255, 255, 255, 0.1); */
      /* padding: 5px; */
      font-size: 15px; /* Adjust the font size to make it smaller */
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="number"],
    select,
    textarea {
      width: 100%;
      padding: 3px; /* Adjust the padding to make it smaller */
      border: none;
      border-radius: 3px;
      margin-bottom: 10px;
      font-size: 15px; /* Adjust the font size to make it smaller */
    }

    .submit-button {
      margin-top: 20px;
      width: 100%;
    }

    .submit-button input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s; /* Added transform property for movement */
    }

    .submit-button input[type="submit"]:hover {
      background-color: #45a049;
      transform: translateY(-5px); /* Move button 5 pixels up on hover */
    }

    .logout-button {
      background-color: red;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      color: white;
      font-weight: bold;
      position: absolute;
      top: 10px; 
      right: 10px; 
    }
  </style>
</head>

<body>
  <form action="in.php" method="POST" class="form-container">
    <div class="column">
      <label for="username">Name :</label>
      <input type="text" name="username" required>
    </div>
    <div class="column">
      <label for="institute">Institute Name :</label>
      <input type="text" name="institute" required>
    </div>
    <div class="column">
      <label for="mobile">Mobile Number :</label>
      <input type="tel" name="mobile" required>
    </div>
    <div class="column">
      <label for="fatherName">Father's Name :</label>
      <input type="text" name="fatherName" required>
    </div>
    <div class="column">
      <label for="university">University Name :</label>
      <input type="text" name="university" required>
    </div>
    <div class="column">
      <label for="phone">Phone Number :</label>
      <input type="tel" name="phone" required>
    </div>
    <div class="column">
      <label for="motherName">Mother's Name :</label>
      <input type="text" name="motherName" required>
    </div>
    <div class="column">
      <label for="instituteEmail">Institute Email id :</label>
      <input type="email" name="instituteEmail" required>
    </div>
    <div class="column">
      <label for="address">Address :</label>
      <textarea name="address" rows="3" required></textarea>
    </div>
    <div class="column">
      <label>Gender :</label>
      <input type="radio" name="gender" value="m" required>Male
      <input type="radio" name="gender" value="f" required>Female
    </div>
    <div class="column">
      <label for="branch">Branch :</label>
      <input type="text" name="branch" required>
    </div>
    <div class="column">
      <label for="city">City :</label>
      <input type="text" name="city" required>
    </div>
    <div class="column">
      <label for="idProofNumber">ID Proof Number :</label>
      <input type="text" name="idProofNumber" required>
    </div>
    <div class="column">
      <label for="semester">Semester :</label>
      <input type="number" name="semester" required>
    </div>
    <div class="column">
      <label for="state">State :</label>
      <input type="text" name="state" required>
    </div>
    <div class="column">
      <label for="pin_code">PIN Code :</label>
      <input type="text" name="pin_code" required>
    </div>
    <div class="column">
      <label for="year">Year :</label>
      <input type="number" name="year" required>
    </div>
    <div class="column">
      <label for="idMark">ID Mark :</label>
      <input type="text" name="idMark" required>
    </div>
    <div class="column">
      <label for="chargeable_category">Chargeable Category :</label>
      <select name="chargeable_category" required>
        <option value="Ward of BSL On-Roll/Ex-Employee">Ward of BSL On-Roll/Ex-Employee</option>
        <option value="Others">Others</option>
      </select>
    </div>
    <div class="column">
      <label for="numberOfWeeks">No. of Weeks:</label>
      <input type="number" name="numberOfWeeks" required>
    </div>
    <div class="column">
      <label for="trainingType">Type of training:</label>
      <select name="trainingType" required>
        <option value="project-based">Project-based</option>
        <option value="non-project-based">Non-project-based</option>
      </select>
    </div>
    <div class="submit-button">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
  <div class="logout-button-container">
    <div class="logout-button">
      <a href="login.php">Logout</a>
    </div>
  </div>
</body>

</html>