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