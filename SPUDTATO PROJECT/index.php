<?php
require "rates.php";
require "products.php";

include "header.php";

$today = date("l");
$storeAge = date("Y") - $yearOpened;

$openToday = $isOpen && $today != "Sunday";

echo "<h2>Welcome to " . $storeName . "!</h2>";
echo "<p>Serving spuds for " . $storeAge . " year(s). Open " . $openDays[0] . " to " . $openDays[5] . ".</p>";

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
?>

<h2 id="order">Place Your Order</h2>

<form method="POST" action="process.php">

    <label>Name</label>
    <input name="customer_name" required>

    <label>Customer Type</label>
    <select name="customer_type">
        <option value="regular">Regular</option>
        <option value="student">Student (10% off)</option>
        <option value="senior">Senior Citizen (20% off)</option>
        <option value="pwd">PWD (10% off)</option>
    </select>

    <label>Product</label>
    <select name="product">
        <?php

        foreach ($products as $code => $item){
            if ($item["stock"] == 0){
                echo "<option value='" . $code . "' disabled>" . $item["name"] . " - Sold Out</option>";
            } else{
                echo "<option value='" . $code . "'>" . $item["name"] . " - Php " . $item["price"] . "</option>";
            }
        }
        ?>
    </select>

    <label>Add-on</label>
    <select name="addon">
        <option value="none">No add-on</option>
        <?php

        foreach ($addons as $addonName => $addonPrice){
            echo "<option value='" . $addonName . "'>" . $addonName . " (+Php " . $addonPrice . ")</option>";
        }
        ?>
    </select>

    <label>Quantity</label>
    <select name="quantity">
        <?php

        for ($q = 1; $q <= 10; $q++){
            echo "<option value='" . $q . "'>" . $q . "</option>";
        }
        ?>
    </select>

    <label>Budget (PHP)</label>
    <input name="budget" type="number" min="0" step="0.01" required>

    <button type="submit">Process Order</button>
</form>

<?php include "footer.php"; ?>
