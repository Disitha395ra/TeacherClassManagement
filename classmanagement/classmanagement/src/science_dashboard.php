<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Include your database connection
$con = mysqli_connect("localhost", "root", "", "class");

if (!$con) {
    die(mysqli_error($con));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newEmail = mysqli_real_escape_string($con, $_POST['newEmail']);
    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);

    $currentEmail = $_SESSION['email'];

    $query = "UPDATE login
              SET email = '$newEmail', password = '$newPassword'
              WHERE standard = 'science' AND email = '$currentEmail'";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>
            alert("updating success");
            window.location="../";
         </script>';
        $_SESSION['email'] = $newEmail;
    } else {
        echo '<script>
            alert("updating error");
            window.location="../";
         </script>';
        $updateMessage = "Error updating profile: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Science Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center">
            <h2 class="display-4 text-primary fw-bold">Science Teacher Dashboard</h2>
        </div>
    </div>
</div>

<div class="grade-btn-science" style="padding-top: 30px; padding-left: 350px">
    <a href="sciencegrade6.php" class="btn btn-primary">Grade 6</a>
    <a href="sciencegrade7.php" class="btn btn-secondary">Grade 7</a>
    <a href="sciencegrade8.php" class="btn btn-success">Grade 8</a>
    <a href="sciencegrade9.php" class="btn btn-danger">Grade 9</a>
    <a href="sciencegrade10.php" class="btn btn-warning">Grade 10</a>
    <a href="sciencegrade11.php" class="btn btn-info">Grade 11</a>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h2 class="text-center mb-4">Teacher Profile</h2>
            <form action="science_dashboard.php" method="POST">
                <div class="mb-3">
                    <label for="newEmail" class="form-label">New Email address</label>
                    <input type="email" class="form-control" id="newEmail" name="newEmail" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
            <div class="text-center">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
