<?php
declare(strict_types=1);
//stocks.php -stock monitoring using functions

require "rates.php";

$spudtato = [
    "Cheesy Potato Heaven" => ["price" => 135, "stock" => 25],
    "Garlic Bacon Bomb" => ["price" => 135, "stock" => 18],
    "Ultimate Chili Cheese Con Carne" => ["price" => 135, "stock" => 12],
    "Garlic Cheese Delight" => ["price" => 135, "stock" => 15],
    "Cheezy Garlic Bacon Bomb" => ["price" => 165, "stock" => 4],
    "Bacony Cheese Melt" => ["price" => 165, "stock" => 10],
    "Spud Mango Graham Shake" => ["price" => 100, "stock" => 0],
    "Spicy Sausage Supreme" => ["price" => 150, "stock" => 8],
    "Tuna Melt Spud" => ["price" => 150, "stock" => 20],
    "Spud Iced Tea" => ["price" => 80, "stock" => 30],
];

$tax_rate = 12;

function get_reorder_message(int $stock): string{
    return $stock < 10 ? "Yes" : "No";
}

function get_total_value(float $price, int $quantity): float{
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float{
    $total = $price * $quantity;
    return $total * ($tax_rate / 100);
}

include "header.php";
?>

<h2>Stock Monitoring</h2>

<table>
    <tr>
        <th>Product</th>
        <th>Stock</th>
        <th>Reorder?</th>
        <th>Total Value</th>
        <th>Tax Due</th>
    </tr>
    <?php foreach ($spudtato as $product_name => $data){ ?>
    <tr>
        <td><?php echo $product_name; ?></td>
        <td><?php echo $data["stock"]; ?></td>
        <td><?php echo get_reorder_message($data["stock"]); ?></td>
        <td>Php <?php echo number_format(get_total_value($data["price"], $data["stock"]), 2); ?></td>
        <td>Php <?php echo number_format(get_tax_due($data["price"], $data["stock"], $tax_rate), 2); ?></td>
    </tr>
    <?php } ?>
</table>

<?php include "footer.php"; ?>
