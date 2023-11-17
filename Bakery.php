<?php
  session_start();
?>
<?php
  require_once('CreateDb.php');
  require_once('component.php');

  $database= new CreateDb("Productdb","Cusinesdb");
  if(isset($_POST['add'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id= array_column($_SESSION['cart'],"product_id");
        

        if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script>alert('Product is already added in the cart!')</script>";
            echo "<script>window.location='Bakery.php'</script>";
        }else{
            $count=count($_SESSION['cart']);
            $item_array= array(
                'product_id'=>$_POST['product_id']
            );

            $_SESSION['cart'][$count]=$item_array;
            // print_r($_SESSION['cart']);
        }
        
    }else{
        $item_array= array(
            'product_id'=>$_POST['product_id']
        );

        $_SESSION['cart'][0]=$item_array;
        // print_r($_SESSION['cart']);


    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- <link rel="stylesheet" href="../Stylesheets/Product.css"> -->
    <link rel="stylesheet" href="Stylesheets/style.css">
    <!-- <link rel="stylesheet" href="../Stylesheets/responsive.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <nav class="nav">
            <div class="list">
                <ul>
                    <li><a href="Homepage.php">HOME</a></li>
                    <li><a href="About_us.php">ABOUT</a></li>
                    <li>
                        <div class="dropdown">
                        <button class="dropbtn" id="ocassion">EXPLORE MORE</button>
                        <div class="dropdown-content">
                            <a href="Cuisines.php">Cuisines</a>
                            <a href="Bakery.php">Bakery Items</a>
                            <a href="Desserts.php">Desserts</a>
                        </div>
                      </div>
                    </li>
                    <li><a href="Contact_us.php">CONTACT</a></li>
                </ul>
            </div>
            <div class="logo">
               <a href="#"><img src="Images/logo.png" alt="Logo"></a>
            </div>
            <div class="right_side">
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user'] == true)
                echo '<div class="login"> <a href="logout.php"> <img src="Images/logout.png"> </a></div>';
            else 
                echo '<div class="login"> <a href="Login.php"> <img src="Images/login.png"> </a></div>';
            ?>
                <div class="cart"> <a href="Cart.php"> <img src="Images/cart.png"> 
                <?php
            if(isset($_SESSION['cart'])){
                $count= count($_SESSION['cart']);
                echo "<span id= \"cart_count\" style=\" display: flex; width: 30px; height: 30px;
                background-color: #ebefeb; justify-content: center; align-items: center; border-radius: 50% ; position: absolute; 
                top: 50px; right: 10px;\" >$count</span>";
            }else{
                echo "<span id= \"cart_count\" style=\" display: flex; width: 30px; height: 30px;
                background-color: #ebefeb; justify-content: center; align-items: center; border-radius: 50% ; position: absolute; 
                top: 50px; right: 10px;\" >0</span>";
            }
            ?>
            </a></div>
            </div>
        </nav>  
    </header> 
    <!-- Product -->
    <div class="container">
        <div class="products" class="row1" style=" margin: 50px 30px;">
        <?php
                $result = $database->getData();
                while($row = mysqli_fetch_assoc($result)){
                    if ($row['product_type'] == 'bakery'){
                    component2($row['product_name'],$row['product_price'],$row['product_image'],$row['id'],$row['product_type']);
                    }
                }
        ?>
    </div>
</div>
<footer>
    <div class="footer_container">
        <div class="footer_logo">
            <img src="Images/logo.png" alt="Logo">
        </div>

        <div class="footer_social">
            <span id="follow">FOLLOW US ON</span>
            <div class="social">
                <i class='bx bxl-youtube'></i>                    
                <i class='bx bxl-facebook'></i>
                <i class='bx bxl-instagram'></i>
            </div>
            
        </div>
    </div>
    <div class="footer_copyright">
        &copy; 2023 Bite Delight. All rights reserved.
    </div>   
</footer>
</body>
</html>
