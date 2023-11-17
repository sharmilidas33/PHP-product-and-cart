<?php
  session_start();
?>
<?php
require_once("CreateDb.php");
require_once("component.php");

$db = new CreateDb("Productdb","Cusinesdb");

if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id']==$_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Item removed from cart!')</script>";
                echo "<script>window.location='Cart.php'</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta cha£et="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Stylesheets/style.css">
    <!-- <link rel="stylesheet" href="../Stylesheets/responsive.css"> -->
    <!-- <link rel="stylesheet" href="../Stylesheets/cart2.css"> -->
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
                <div class="cart"> <a href="Cart.php"> <img src="Images/cart.png"> </a></div>
            </div>
        </nav>
    </header>
    <div class="wrapper1">
        <h1>Shopping Cart</h1>
        <div class="project1">
            <div class="shop">
                <?php
                $total=0;
                if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],'product_id');
                    $result = $db->getData();

                    while($row= mysqli_fetch_assoc($result)){
                        foreach($product_id as $id){
                            if($row['id']== $id){
                                cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                                $total= $total+ (int)$row['product_price'];
                            }
                        }
                    }
                }else{
                    echo"<h5>Cart is empty</h5>";
                }
                ?>
                
                <div class="right-bar">
                    <p><span>Total Products</span>
                    <span>
                        <?php
                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "$count";
                        }else{
                            echo "0";
                        }
                        ?>
                    </span>
                        <hr>
                    <p><span>Subtotal</span><span><?php
                        echo "£ $total";
                       ?></span>
                        <hr>
                    <p><span>Shipping</span><span>FREE</span>
                        <hr>
                    <p><span>Total</span><span><?php
                        echo "£ $total";
                       ?></span>
                        <hr>
                        <a href="Checkout.php"><i class="fa fa-shoppingcart"></i>Checkout</a>
                </div>
            </div>
        </div>


        <!-- Footer Code  -->
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