<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="style.css" type="text/css">
  <title>Confirmation Page</title>
  <style>
    /* Same CSS styles as your registration form */
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

    /* Additional style for the confirmation message */
    .confirmation-message {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Style for an attractive icon */
    .icon {
      font-size: 80px;
      color: #4CAF50; /* Green color */
    }
  </style>
</head>

<body>
  <div class="form-container">
    <i class="icon fa fa-check-circle"></i>
    <div class="confirmation-message">
      Congratulations!
      <br>
      Your information has been safely planted in our database.
      <br>
      We'll nurture it with care.
    </div>
  </div>
</body>

</html>
