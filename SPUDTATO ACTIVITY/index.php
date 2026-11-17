<?php
$storeName = "Spudtato";
$tagline = "Unang kagat, Patatas Lahat";
$yearOpened = 2024;
$isOpen = true;

$openDays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

$studentRate = 0.10;
$seniorRate = 0.20;
$pwdRate = 0.10;

$lowStockLimit = 5;
$batchSize = 3;

$products = [
    "SP1" => ["name" => "Cheesy Potato Heaven",            "category" => "Spudtato", "price" => 135, "stock" => 25, "sold" => 90],
    "SP2" => ["name" => "Garlic Bacon Bomb",               "category" => "Spudtato", "price" => 135, "stock" => 18, "sold" => 80],
    "SP3" => ["name" => "Ultimate Chili Cheese Con Carne", "category" => "Spudtato", "price" => 135, "stock" => 12, "sold" => 150],
    "SP4" => ["name" => "Garlic Cheese Delight",           "category" => "Spudtato", "price" => 135, "stock" => 15, "sold" => 55],
    "SP5" => ["name" => "Cheezy Garlic Bacon Bomb",        "category" => "Spudtato", "price" => 165, "stock" => 4,  "sold" => 130],
    "SP6" => ["name" => "Bacony Cheese Melt",              "category" => "Spudtato", "price" => 165, "stock" => 10, "sold" => 120],
    "SB1" => ["name" => "Spud Mango Graham Shake",         "category" => "Beverage", "price" => 100, "stock" => 0,  "sold" => 30],
];

$addons = [
    "Cheese Sauce"        => 30,
    "Creamy Garlic Sauce" => 40,
    "Chedarella"          => 30,
    "Chili Con Carne"     => 40,
    "Bacon"               => 35,
];

$storeAge = date("Y") - $yearOpened;

$qty = 2;
$subtotal = $products["SP1"]["price"] * $qty;
$discount = $subtotal * $studentRate;
$total = $subtotal - $discount;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $storeName; ?></title>
    <style>
        body{ 
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f4e4b8;
            color: #2b1d12;
        }

        h1{ 
            color: #5a3a1e;
        }
    </style>
</head>
<body>
    <h1><?php echo $storeName; ?></h1>
    <p><?php echo $tagline; ?></p>

    <h2>Welcome to <?php echo $storeName; ?>!</h2>
    <p>Serving spuds for <?php echo $storeAge; ?> year(s). Open <?php echo $openDays[0] . " to " . $openDays[5]; ?>.</p>

    <h3>Featured Products</h3>
    <p><?php echo $products["SP1"]["name"] . " - Php " . $products["SP1"]["price"]; ?></p>
    <p><?php echo $products["SP2"]["name"] . " - Php " . $products["SP2"]["price"]; ?></p>
    <p><?php echo $products["SP3"]["name"] . " - Php " . $products["SP3"]["price"]; ?></p>

    <h3>Sample Student Order</h3>
    <p><?php echo $qty . " x " . $products["SP1"]["name"] . " = Php " . $subtotal; ?></p>
    <p>Discount: Php <?php echo $discount; ?></p>
    <p>Total: Php <?php echo $total; ?></p>
</body>
</html>
