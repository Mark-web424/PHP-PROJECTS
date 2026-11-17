<?php
require "rates.php";
require "products.php";

include "header.php";

$storeAge = date("Y") - $yearOpened;

echo "<h2>Welcome to " . $storeName . "!</h2>";
echo "<p>Serving spuds for " . $storeAge . " year(s). Open " . $openDays[0] . " to " . $openDays[5] . ".</p>";

$today = date("l");

$openToday = $isOpen && $today != "Sunday";

if ($openToday){
    echo "<p class='success'>We are open today!</p>";
} else{
    echo "<p class='error'>We are closed today.</p>";
}

$special = match ($today){
    "Monday"    => "Cheesy Potato Heaven",
    "Tuesday"   => "Garlic Bacon Bomb",
    "Wednesday" => "Ultimate Chili Cheese Con Carne",
    "Thursday"  => "Garlic Cheese Delight",
    "Friday"    => "Cheezy Garlic Bacon Bomb",
    "Saturday"  => "Bacony Cheese Melt",
    default     => "None - we are closed. See you tomorrow!",
};
echo "<h3>Spud of the Day (" . $today . ")</h3>";
echo "<p>" . $special . "</p>";

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

include "menu.php";

echo "<h3>Next fresh batch in:</h3>";
$minutes = 5;
while ($minutes > 0){
    echo $minutes . " min... ";
    $minutes--;
}
echo "<p class='success'>Fresh batch is ready!</p>";

include "footer.php";
?>
