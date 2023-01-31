<!DOCTYPE html> 
<?php 
    require 'connection.php';
    session_start();
    if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['user'])){
        $userId = $_SESSION['user']->id;
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $quantity = $_POST['quantity'];
        $product_image = $_POST['product_image'];

        $AlreadyAdded = "SELECT * FROM cart WHERE name = :product_name AND user_id = :userId";
        $AlreadyAddedStatement= $pdo->prepare($AlreadyAdded);
        $AlreadyAddedStatement->bindParam(':userId', $userId, PDO::PARAM_INT);
        $AlreadyAddedStatement->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $AlreadyAddedStatement->execute();
            if($AlreadyAddedStatement->rowCount() > 0){
                echo '<script>alert("Product already added to cart!");</script>';
            }else{
                
                $addToCart = "INSERT INTO cart (user_id, `name`, price, `image`, quantity) values ($userId, $product_name, $product_price, $product_image, $quantity);";
                $addToCartStatement = $pdo->prepare($addToCart);
                $addToCartStatement->execute();
                echo '<script>alert("Product added to cart!");</script>';
           }

        }else{
            echo '<script>alert("You cannot add to cart until you register!");</script>';
        }
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
            <h1 class="heading">Main Menu</h1>
                <!--<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
                </nav>-->
                <h3 class="categories" id="broastedChicken">Broasted Chicken</h3>
                <div class="typeContainer">
                    <?php 
                        $sql = "SELECT * FROM item WHERE type = 'Broasted Chicken'";
                        $statement= $pdo->prepare($sql);
                        $statement->execute();
                        $data = $statement->fetchAll();
                        foreach($data as $row){
                        echo '
                        <form method="post" action="">
                        <div class="card grow">
                            <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['name'].'</h5>
                                <p class="card-text"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                                <p class="card-text price">'.$row['price'].' JDs</p>
                                 <input type="number" min="1" value="1" name="quantity" id="quantity" required>
                                 <input type="hidden" name="product_image" value="'.$row['image'].'">
                                 <input type="hidden" name="product_name" value="'.$row['name'].'">
                                 <input type="hidden" name="product_price" value="'.$row['price'].'">
                                 <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
                            </div>
                        </div>
                        </form>
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
                        <form method="post" action="">
                        <div class="card grow">
                            <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['name'].'</h5>
                                <p class="card-text"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                                <p class="card-text price">'.$row['price'].' JDs</p>
                                 <input type="number" min="1" value="1" name="quantity" id="quantity" required>
                                 <input type="hidden" name="product_image" value="'.$row['image'].'">
                                 <input type="hidden" name="product_name" value="'.$row['name'].'">
                                 <input type="hidden" name="product_price" value="'.$row['price'].'">
                                 <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
                            </div>
                        </div>
                        </form>
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
                        <form method="post" action="">
                        <div class="card grow">
                            <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['name'].'</h5>
                                <p class="card-text"><span class="boxTitles">Ingerdients: </span> '.$row['ingredients'].'</p>
                                <p class="card-text price">'.$row['price'].' JDs</p>
                                 <input type="number" min="1" value="1" name="quantity" id="quantity" required>
                                 <input type="hidden" name="product_image" value="'.$row['image'].'">
                                 <input type="hidden" name="product_name" value="'.$row['name'].'">
                                 <input type="hidden" name="product_price" value="'.$row['price'].'">
                                 <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
                            </div>
                        </div>
                        </form>
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
                            <form method="post" action="">
                            <div class="card grow">
                                <img class="card-img-left" src="images/dishes/'.$row['image'].'" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <p class="card-text price">'.$row['price'].' JDs</p>
                                     <input type="number" min="1" value="1" name="quantity" id="quantity" required>
                                     <input type="hidden" name="product_image" value="'.$row['image'].'">
                                     <input type="hidden" name="product_name" value="'.$row['name'].'">
                                     <input type="hidden" name="product_price" value="'.$row['price'].'">
                                     <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
                                </div>
                            </div>
                            </form>
                            ';
                        }
                    ?>
                </div>
            </section>
            <!--<section class="myCart">
                <div class="cartContainer">
                    <h2 class="cartTitle">Your Cart</h2>
                    <div class="details">
                        <p class="totalPrice"><span>Total Price: </span>00 JDs</p>
                        <div class="cartButtons">
                            <a href="viewBasket.php" class="cartButton viewCart">View Cart</a>
                            <a href="ordersList.php" class="cartButton OrderNow">Order Now</a>
                        </div>
                    </div>
                </div>-->
            </section>
        </main>
        </div>
        <div class="shopping-cart">
            <h1 class="heading">Shopping Cart</h1>
            <table>
                <thead>
                    <th>name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total price</th>
                    <th>action</th>
                </thead>
                <tbody>
                <?php 
                        $grand_total = 0;
                        $cartQ = "SELECT * FROM `cart` WHERE user_id = :userId";
                        $cartQstatement= $pdo->prepare($cartQ);
                        $cartQstatement->bindParam(':userId', $userId, PDO::PARAM_INT);
                        $cartQstatement->execute();
                        $cartQdata = $cartQstatement->fetchAll();
                        foreach($cartQdata as $row){
                        echo
                        '<tr>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>
                            <form action="" method = "post">
                                <input type="hidden" name="cart_id" value="'.$row['id'].'">
                                <input type="number" min="1" name="cartQ" value ="'.$row['quantity'].'">
                                <input type="submit" name="update_cart" value="update" class="option-btn">
                            </form>
                        </td>
                        <td>'.$sub_total = number_format($row['price']*$row['quantity']).'</td>
                        <td><a href="index.php?remove='.$row['id'].'" class="delete-btn" onclick="return confirm("remove item from cart?")">remove</a></td>
                        </tr>';
                        $grand_total += $sub_total;
                        }
                        ?>
                    <tr class="table-bottom">
                        <td colspan="4">grand total: </td>
                        <td><?php echo $grand_total; ?> JDs</td>
                        <td><a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div class="cart-btn">
                <a href="#" class="btn">Proceed to Checkout</a>
            </div>
        </div>

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