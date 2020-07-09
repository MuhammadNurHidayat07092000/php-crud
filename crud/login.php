<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
</head>

<body>

<?php
    require 'connection.php';

    // cek bisa jalan atau tidak
    if(isset($_POST['btnlogin'])) {
        $username     = htmlentities(strip_tags(trim($_POST['txtusername'])));
        $password     = htmlentities(strip_tags(trim($_POST['txtpassword'])));

        $username     = mysqli_real_escape_string($link, $username);
        $password     = mysqli_real_escape_string($link, $password);

        $password_sha = sha1($password);// diubah sesuai acak yang ada di database

        $query = "SELECT *  FROM  users WHERE username ='$username' AND password='$password_sha'";

        $result = mysqli_query($link, $query);
        
        if(mysqli_num_rows($result) == 1) {

            $data = mysqli_fetch_array($result);

            $_SESSION['status'] = $data['status'];
            $_SESSION['username'] = $data['username'];

            $_SESSION['masuk'] = true;
            //jika username dan password bener, redirenct ke halaman login
            header('location: index.php');
        } else {
            echo "username dan/pw tidak sesuai";
        }
    }
?>
    <form action="" method="post">
        <div class="container">
            <fieldset>
                <div class="form-group">
                    <legend class="text-center mt-4">Form Login</legend>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="txtusername" required class="form-control fas fa-user">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="txtpassword" required class="form-control"> 
                </div>

                <input type="submit" name="btnlogin" value="login" class="btn btn-success">
            </fieldset>
        </div>
    </form>
</body>
</html>
