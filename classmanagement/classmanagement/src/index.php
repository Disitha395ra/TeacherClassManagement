<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "class");

if (!$con) {
    die(mysqli_error($con));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $standard = $_POST["std"];

    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password' AND standard = '$standard'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["standard"] = $standard;

        switch ($standard) {
            case 'english':
                header("Location: english_dashboard.php");
                break;
            case 'sinhala':
                header("Location: sinhala_dashboard.php");
                break;
            case 'maths':
                header("Location: maths_dashboard.php");
                break;
            case 'science':
                header("Location: science_dashboard.php");
                break;
            default:
                echo '<script>
            alert("invalid selection");
            window.location="../";
         </script>';;
                break;
        }

        exit();
    } else {
        echo '<script>
            alert("invalid login");
            window.location="../";
         </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: burlywood">
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="zenithlogo-modified.png" alt="Institute Logo" class="rounded-circle" style="width: 80px; height: 80px;">
                        <h2  >ZENITH EDUCATIONAL INSTITUTION</h2>
                    </div>
                    <form class="loginform" action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Preference</label>
                            <select class="form-select" name="std">
                                <option value="english">English</option>
                                <option value="sinhala">Sinhala</option>
                                <option value="maths">Maths</option>
                                <option value="science">Science</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
