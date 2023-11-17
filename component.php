<?php
function component($productname, $productprice, $productimg, $productid, $producttype){
    $element = "
    <form action='Cuisines.php' method='post'>
    <div class='product' style='width: 80%;'>
        <div class='image'>
            <img src='$productimg' alt=''>
        </div>
        <div class='namePrice'>
            <h3>$productname</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
            <h6>$productprice</h6>
        </div>
        <div class='buy'>
            <button type='submit' name='add'> Order Now </button>
            <input type='hidden' name='product_id' value='$productid'>
            <input type='hidden' name='product_type' value='$producttype'>
        </div>
    </div>
    </form>";
    echo $element;
}

function component2($productname, $productprice, $productimg, $productid, $producttype){
    $element = "
    <form action='Bakery.php' method='post'>
    <div class='product' style='width: 80%;'>
        <div class='image'>
            <img src='$productimg' alt=''>
        </div>
        <div class='namePrice'>
            <h3>$productname</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
            <h6>$productprice</h6>
        </div>
        <div class='buy'>
            <button type='submit' name='add'> Order Now </button>
            <input type='hidden' name='product_id' value='$productid'>
            <input type='hidden' name='product_type' value='$producttype'>
        </div>
    </div>
    </form>";
    echo $element;
}

function component3($productname, $productprice, $productimg, $productid, $producttype){
    $element = "
    <form action='Desserts.php' method='post'>
    <div class='product' style='width: 80%;'>
        <div class='image'>
            <img src='$productimg' alt=''>
        </div>
        <div class='namePrice'>
            <h3>$productname</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
            <h6>$productprice</h6>
        </div>
        <div class='buy'>
            <button type='submit' name='add'> Order Now </button>
            <input type='hidden' name='product_id' value='$productid'>
            <input type='hidden' name='product_type' value='$producttype'>
        </div>
    </div>
    </form>";
    echo $element;
}

function cartElement($productimg,$productname,$productprice,$productid){
    $element ="<form action='Cart.php?action=remove&id=$productid' method='post' class='cart-items'>
    <div class='box1'>
        <img src=$productimg alt=''>
        <div class='content'>
            <h3>$productname</h3>
            <h4>$productprice</h4>
            <p class='unit'>Quantity:<input type='number' value='2'></p>
            <button class='btn-area' name='remove' style='width: auto; right: 6%;'>
                <i class='fa fa-trash'></i>
            </button>
        </div>
    </div>
    </form>";
    echo $element;
}
?>