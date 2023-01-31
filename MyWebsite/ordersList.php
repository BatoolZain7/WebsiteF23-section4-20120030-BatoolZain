<?php
    require 'connection.php';
    session_start();
    $userId = $_SESSION['user']->id;
    $sql1 = "SELECT * FROM `user_order` WHERE user_id = :userId";
    $statement1= $pdo->prepare($sql1);
    $statement1->bindParam(':userId', $userId, PDO::PARAM_INT);
    $statement1->execute();
    $data1 = $statement1->fetchAll();
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ordersList.css">
    <title>Crispy Chicken - Order list</title>
</head>
    <body style="text-align: center;">
        <header>
            <?php require('header.php'); ?>
        </header>
            <h2 class="pageTitle">My Orders List</h2>
            <section class="listArea">
            <?php
            foreach ($data1 as $order) {
                echo
                '<div class="card">
                    <h5 class="card-header content-name">Day&nbsp;&nbsp;&nbsp;'.$order['date'].'</h5>
                    <div class="card-body">
                        <!--<h5 class="card-title">Special title treatment</h5>-->
                        <p class="card-text"><span class="content-name">Items: </span>';
                        $orderId = $order['id'];
                        $sql2 = "SELECT item.name, item.id, order_item.quantity FROM item INNER JOIN order_item ON item.id=order_item.`item_id` INNER JOIN user_order ON order_item.`order_id`=user_order.id WHERE user_order.id = $orderId;";
                            $statement2= $pdo->prepare($sql2);
                            $statement2->execute();
                            /*$statement2->bindparam(':userOrderId', $orderId, PDO::PARAM_INT);*/
                            $data2 = $statement2->fetchAll();
                        foreach ($data2 as $item) {
                            if($item != $data2[0]) echo ', ';
                            echo $item['name'] . '(' . $item['quantity'] . ')';
                        }
                        echo '.</p>
                        <p class="card-text"><span class="content-name">Price: </span>'.$order['price'].' JDs</p>
                        <p class="card-text"><span class="content-name">Status: </span>'.$order['status'].'</p>
                        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                    </div>
                </div>';}?>
            </section>
        <footer>
            <?php require('footer.html'); ?>
        </footer>
        <?php
            echo 
            '<script type="text/JavaScript">
                LoggedIn();
            </script>';
        ?>
        <script>
            document.querySelector('#myOrdersListNav').classList.add('active');
        </script>
    </body>