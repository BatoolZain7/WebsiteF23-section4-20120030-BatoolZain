<!DOCTYPE html> 
<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['user'])){
        echo 'You are already Logged in!';
        header('Location: index.php');
    }
    if(isset($_POST['submit'])){
        if($_POST['password']==$_POST['confirmPassword']){ //hid the div if it is showed in the previous trial
            $sql = "INSERT into `web_user` (`email`, `fname`, `lname`, `password`, `phone`) VALUES (:email, :firstName, :lastName, :password, :phoneNumber)";
            $statement= $pdo->prepare($sql);
            $statement->bindparam(':email', $_POST['email'], PDO::PARAM_STR);
            $statement->bindparam(':firstName', $_POST['firstName'], PDO::PARAM_STR);
            $statement->bindparam(':lastName', $_POST['lastName'], PDO::PARAM_STR);
            $statement->bindparam(':phoneNumber', $_POST['phoneNumber'], PDO::PARAM_INT);
            $statement->bindparam(':password', $_POST['password'], PDO::PARAM_STR);
            $statement->execute();
            echo 'signed up successfully';
            header('Location: logIn.php');
        }else{
            echo 'The two passwords are not similar!';//div hidden and I will show it after checking
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crispy Chicken - Sign up</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/registration.css">
</head>
    <body style="text-align: center;">
        <header>
            <?php require('header.php'); ?>
        </header>
            <div class="contentBox">
                <div class="formBox">
                    <h2>Sign up</h2>
                    <form method="POST">
                        <div class="inputBox nameField">
                            <label for="firstName">First name</label>
                            <input type="text" name="firstName" id="firstName" required>
                        </div>
                        <div class="inputBox nameField lastName">
                            <label for="lastName">Last name</label>
                            <input type="text" name="lastName" id="lastName" required>
                        </div>
                        <div class="inputBox">
                            <label for="phoneNumber">phone number</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" required>
                        </div>
                        <div class="inputBox">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="inputBox">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="inputBox">
                            <label for="password">Confirm password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" required>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="submit" value="Sign up">
                        </div>
                        <div class="inputBox">
                            <p>You already have and account? <a href="logIn.php">Log in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        <?php
            echo 
            '<script type="text/JavaScript">
                notLoggedIn();
            </script>';
        ?>
        <footer>
            <?php require('footer.html'); ?>
        </footer>
        <script>
            document.querySelector('#signUpNav').classList.add('active');
        </script>
    </body>