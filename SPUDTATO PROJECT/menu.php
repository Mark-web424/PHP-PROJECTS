<h2 id="menu">Available Menu</h2>

<table>
    <tr>
        <th>Code</th>
        <th>Product</th>
        <th>Section</th>
        <th>Price</th>
        <th>Badge</th>
        <th>Status</th>
    </tr>

    <?php
    $soldOut = 0;

    foreach ($products as $code => $item){
        switch ($item["category"]){
            case "Spudtato":
                $section = "Spudtato";
                break;
            case "Beverage":
                $section = "Spud Beverages";
                break;
            default:
                $section = "Other";
        }

        if ($item["sold"] >= 100){
            $badge = "Best Seller";
        } else{
            $badge = "Classic";
        }

        if ($item["stock"] == 0){
            $status = "Sold Out";
            $class = "error";
            $soldOut++;
        } elseif ($item["stock"] <= $lowStockLimit){
            $status = "Low Stock (" . $item["stock"] . " left)";
            $class = "error";
        } else{
            $status = "In Stock";
            $class = "success";
        }

        echo "<tr>";
        echo "<td>" . $code . "</td>";
        echo "<td>" . $item["name"] . "</td>";
        echo "<td>" . $section . "</td>";
        echo "<td>Php " . $item["price"] . "</td>";
        echo "<td>" . $badge . "</td>";
        echo "<td class='" . $class . "'>" . $status . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php

if ($soldOut > 0){
    echo "<p class='banner'>Sold out today: " . $soldOut . " item(s).</p>";
} else{
    echo "<p class='success'>All items are available.</p>";
}
?>

<h3>Add-ons</h3>
<table>
    <tr>
        <th>Add-on</th>
        <th>Price</th>
    </tr>
    <?php

    foreach ($addons as $addonName => $addonPrice){
        echo "<tr><td>" . $addonName . "</td><td>Php " . $addonPrice . "</td></tr>";
    }
    ?>
</table>
