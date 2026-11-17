<?php
require "rates.php";
require "products.php";
include "header.php";

if ($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "<p class='error'>Please use the order form first.</p>";
    echo "<p><a href='index.php#order'>Go to order form</a></p>";
} else{
    $name = $_POST["customer_name"];
    $type = $_POST["customer_type"];
    $code = $_POST["product"];
    $addon = $_POST["addon"];
    $quantity = (int) $_POST["quantity"];
    $budget = (float) $_POST["budget"];

    $message = "";
    if ($name == ""){
        $message = "Please enter your name.";
    } elseif (!isset($products[$code])){
        $message = "Product not found.";
    } elseif ($quantity < 1 || $quantity > 10){
        $message = "Quantity must be 1 to 10.";
    } elseif ($quantity > $products[$code]["stock"]){
        $message = "Not enough stock. Only " . $products[$code]["stock"] . " left.";
    }

    if ($message != ""){
        echo "<p class='error'>" . $message . "</p>";
        echo "<p><a href='index.php#order'>Return to form</a></p>";
    } else{
        $product = $products[$code];
        $price = $product["price"];
        $addonText = "";
        $addonCost = 0;

        if ($addon != "none"){
            $addonCost = $addons[$addon];
            $addonText = " + " . $addon;
        }

        $unitPrice = $price + $addonCost;
        $subtotal = $unitPrice * $quantity;

        switch ($type){
            case "student":
                $rate = $studentRate;
                break;
            case "senior":
                $rate = $seniorRate;
                break;
            case "pwd":
                $rate = $pwdRate;
                break;
            default:
                $rate = 0;
        }

        $discount = $subtotal * $rate;
        $total = $subtotal - $discount;

        echo "<h2>Order Receipt</h2>";
        echo "<p>Customer: " . $name . "</p>";
        echo "<p>Customer type: " . $type . "</p>";

        echo "<h3>Items Ordered</h3>";

        for ($i = 1; $i <= $quantity; $i++){
            echo "<p>#" . $i . " - " . $product["name"] . $addonText . " - Php " . $unitPrice . "</p>";
        }

        echo "<h3>Bill</h3>";
        echo "<p>Subtotal: Php " . $subtotal . "</p>";
        echo "<p>Discount (" . ($rate * 100) . "%): Php " . $discount . "</p>";
        echo "<h2>Final Bill: Php " . $total . "</h2>";
        echo "<p>Budget: Php " . $budget . "</p>";

        if ($budget < $total){
            echo "<p class='error'>Insufficient budget!</p>";
            echo "<p>Shortage: Php " . ($total - $budget) . "</p>";
            echo "<p><a href='index.php#order'>Change my order</a></p>";
        } else{
            echo "<p class='success'>Budget is sufficient!</p>";
            echo "<p>Change: Php " . ($budget - $total) . "</p>";

            echo "<h3>Cooking Batches</h3>";
            $left = $quantity;
            $batch = 0;
            do{
                $batch++;
                $left = $left - $batchSize;
                echo "<p>Batch " . $batch . " is cooking...</p>";
            } while ($left > 0);

            $extra = $quantity % $batchSize;
            if ($extra == 0){
                $lastBatch = $batchSize;
            } else{
                $lastBatch = $extra;
            }
            echo "<p>Last batch has " . $lastBatch . " item(s).</p>";

            echo "<h3>Preparation Progress</h3>";
            $counter = 1;
            while ($counter <= $quantity){
                echo "<p>Preparing item " . $counter . " of " . $quantity . "</p>";
                $counter++;
            }

            echo "<h2 class='success'>Thank you for buying, " . $name . "!</h2>";
            echo "<p>Please come again to " . $storeName . ".</p>";
            echo "<p><a href='index.php#order'>Place another order</a></p>";
        }
    }
}

include "footer.php";
?>
