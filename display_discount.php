<?php
/**
 * Created by PhpStorm.
 * User: matthewthoms
 * Date: 2016-09-17
 * Time: 11:59 PM
 */

//get the data from the form using the POST method
$product_description = $_POST['product_description'];
$list_price = $_POST['list_price'];
$discount_percent = $_POST['discount_percent'];

//get the data from the form using the GET method
//Using this way uses the url for transferring data to the next page

//$product_description = filter_input(INPUT_GET, product_description);
//$list_price = filter_input(INPUT_GET, list_price);
//$discount_percent = filter_input(INPUT_GET, $discount_percent);


//calculate the discount
$discount = $list_price * $discount_percent * .01;
$discount_price = $list_price - $discount;

//apply currency formatting to the dollar and percent amounts
$list_price_formatted = "$".number_format($list_price, 2);
$discount_percent_formatted = number_format($discount_percent, 1)."%";
$discount_formatted = "$".number_format($discount, 2);
$discount_price_formatted = "$".number_format($discount_price, 2);

//escape the unformatted input
$product_description_escaped = htmlspecialchars($product_description);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <main>
        <h1>Product Discount Calculator</h1>
        <label for="">Product Description:</label>
        <span><?php echo $product_description_escaped; ?></span> <br>

        <label for="">List Price:</label>
        <span><?php echo $list_price_formatted; ?></span> <br>

        <label for="">Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span> <br>

        <label for="">Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span> <br>

        <label for="">Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span> <br>
    </main>
</body>
</html>
