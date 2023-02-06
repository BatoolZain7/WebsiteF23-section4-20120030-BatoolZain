<!DOCTYPE html> 
<?php 
    $totalPrice = 0.00;
    require 'connection.php';
    session_start();
    if(isset($_SESSION['user'])){
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crispy Chicken - Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/7588f5298e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <style>
        header nav{
            background-color: #E56A19;
        }
    </style>
</head>
    <body>
    
        <!-- header section starts -->
        <header>
            <?php require('header.php'); ?>
        </header>
        <section class="introImg">
            <img src="images/crispy chicken background.png">
        </section>
        
        <!-- header section ends -->
        <!-- <div id="internalNav">
            <span class="hidden"><i class="fa-solid fa-chevron-left"></i></span>
            <ul>
                <li><a href="#broastedChicken">Broasted chicken</a></li>
                <li><a href="#sandwiches">Sandwiches</a></li>
                <li><a href="#burger">Burger</a></li>
                <li><a href="#sideDishes">Side Dishes</a></li>
            </ul>
            <span class="hidden"><i class="fa-solid fa-chevron-right"></i></span>
        </div>-->
        <!--
        <div class="wrapper">
            <span class="minus">-</span>
            <span class="number">00</span>
            <span class="plus">+</span>
        </div>
        -->
        <main class="menuMain">
            <section class="menu" id="menu">
                <h3 class="categories" id="broastedChicken">Broasted Chicken</h3>
                <div class="typeContainer">
                    <?php 
                        $sql = "SELECT * FROM item WHERE type = 'Broasted Chicken'";
                        $statement= $pdo->prepare($sql);
                        $statement->execute();
                        $data = $statement->fetchAll();
                        foreach($data as $row){
                        echo '
                        <div class="card grow">
                            <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['name'].'</h5>
                                <p class="card-text"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                                <p class="card-text"><span class="boxTitles">Price: </span>'.$row['price'].' JDs</p>
                                <input type="number" value="1" name="quantity" id="quantity" required>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                        ';
                        }
                    ?>
                </div>
                <h3 class="categories" id="sandwiches">Sandwiches</h3>
                <div class="typeContainer">
                    <?php 
                        $sql = "SELECT * FROM item WHERE type = 'Sandwiches'";
                        $statement= $pdo->prepare($sql);
                        $statement->execute();
                        $data = $statement->fetchAll();
                        foreach($data as $row){
                            echo '
                            <div class="card grow">
                                <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <p class="card-text"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                                    <p class="card-text"><span class="boxTitles">Price: </span>'.$row['price'].' JDs</p>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                </div>
                <h3 class="categories"  id="burger">Burger</h3>
                <div class="typeContainer">
                    <?php 
                        $sql = "SELECT * FROM item WHERE type = 'Burger'";
                        $statement= $pdo->prepare($sql);
                        $statement->execute();
                        $data = $statement->fetchAll();
                        foreach($data as $row){
                            echo '
                            <div class="card grow">
                                <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <p class="card-text"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                                    <p class="card-text"><span class="boxTitles">Price: </span>'.$row['price'].' JDs</p>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                    </div>
                <h3 class="categories"  id='sideDishes'>Side Dishes</h3>
                <div class="typeContainer">
                    <?php 
                        $sql = "SELECT * FROM item WHERE type = 'Side Dishes'";
                        $statement= $pdo->prepare($sql);
                        $statement->execute();
                        $data = $statement->fetchAll();
                        foreach($data as $row){
                            echo '
                            <div class="card grow">
                                <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <p class="card-text"><span class="boxTitles">Price: </span>'.$row['price'].' JDs</p>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                </div>
            </section>
            <section class="myCart">
                <div class="cartContainer">
                    <h2 class="cartTitle">Your Cart</h2>
                    <div class="details">
                        <p class="totalPrice"><span>Total Price: </span><?php echo number_format((float)$totalPrice, 2, '.', ''); ?> JDs</p>
                        <div class="cartButtons">
                            <a href="viewBasket.php" class="cartButton viewCart">View Cart</a>
                            <a href="ordersList.php" class="cartButton OrderNow">Order Now</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        </div>
        <!-- <div class="products-preview">
            <?php
           /* $sql = "SELECT * FROM item WHERE";
            $statement= $pdo->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll();
            foreach ($data as $row) {
                echo
                '<div class="preview">
                    <i class="fas fa-times"></i>
                    <img src="images/dishes/'.$row['image'].'" alt="">
                    <h3>'.$row['name'].'</h3>
                    <p class="ingredients"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                    <div class="price">'.$row['price'].'</div>
                    <div class="buttons">
                        <div class="button"><label for="itemNumber">number</label><input type="number" name="itemNumber" class="number" value="0"></div>
                        <a class="button cart">Add to cart</a>
                    </div>
                </div>';
            }*/
            ?>
        </div> -->

        <footer>
            <?php require('footer.html'); ?>
        </footer>
        <?php
        if(isset($_SESSION['user'])){
            echo 
            '<script type="text/JavaScript">
                LoggedIn();
            </script>';
        }else{
            echo
            '<script type="text/JavaScript">
                notLoggedIn();
            </script>';
        }
        ?>
        
    </body>