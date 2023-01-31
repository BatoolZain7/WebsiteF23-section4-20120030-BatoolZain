<?php 
    require 'connection.php';
    if(isset($_SESSION['user'])){           //replace it with : is session start?
        echo "<script>alert('You are already Logged in!');</script>";  //change it to be alert in index page
        header('Location: index.php');
    }
    if(isset($_POST['submit'])){
        $sql = 'SELECT * FROM web_user WHERE email = :email AND password = :password';
        $statement= $pdo->prepare($sql);
        $statement->bindparam(':email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindparam(':password', $_POST['password'], PDO::PARAM_STR);
        $statement->execute();
        if($statement->rowCount() == 0){
            echo "<script>alert('Invalid username or password!');</script>";
        }else{
            //$data = $statement->fetchAll();
            $user = $statement->fetchObject();
            session_start();
            $_SESSION['user'] = $user;
            /*$_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['fname'] = $data['fname'];
            $_SESSION['laname'] = $data['lname'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['phone'] = $data['phone'];*/
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crispy Chicken - Log in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- This is the one -->
    <script src="https://kit.fontawesome.com/7588f5298e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/registration.css">
</head>
    <body style="text-align: center;">
        <header>
            <?php require('header.php'); ?>
            <script>
                var element = document.getElementsById('logInNav');
                element.classList.add("active");
            </script>
        </header>
        <section>
            <div class="imgBox">
                <img id="logIn" src="images/registrationImg.jpg">
            </div>
            <div class="contentBox">
                <div class="formBox">
                    <h2>Log  in</h2>
                    <form method="post">
                        <div class="inputBox">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="inputBox">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="submit" value="Log in">
                        </div>
                        <div class="inputBox">
                            <p>Dont't have and acount? <a href="signUp.php">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
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
            document.querySelector('#logInNav').classList.add('active');
        </script>
    </body>