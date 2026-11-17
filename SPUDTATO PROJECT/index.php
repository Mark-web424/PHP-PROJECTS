<?php
require "rates.php";
require "products.php";

include "header.php";

$storeAge = date("Y") - $yearOpened;

echo "<h2>Welcome to " . $storeName . "!</h2>";
echo "<p>Serving spuds for " . $storeAge . " year(s). Open " . $openDays[0] . " to " . $openDays[5] . ".</p>";

echo "<h3>Featured Products</h3>";
echo "<p>" . $products["SP1"]["name"] . " - Php " . $products["SP1"]["price"] . "</p>";
echo "<p>" . $products["SP2"]["name"] . " - Php " . $products["SP2"]["price"] . "</p>";
echo "<p>" . $products["SP3"]["name"] . " - Php " . $products["SP3"]["price"] . "</p>";

$qty = 2;
$subtotal = $products["SP1"]["price"] * $qty;
$discount = $subtotal * $studentRate;
$total = $subtotal - $discount;
echo "<h3>Sample Student Order</h3>";
echo "<p>" . $qty . " x " . $products["SP1"]["name"] . " = Php " . $subtotal . "</p>";
echo "<p>Discount: Php " . $discount . "</p>";
echo "<p>Total: Php " . $total . "</p>";

include "footer.php";
?>
