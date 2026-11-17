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