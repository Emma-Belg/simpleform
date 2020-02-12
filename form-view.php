<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <?php echo correctOrder(), orderButtons()?>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" value="<?php echo $emailOutput[1]; ?>"class="form-control"/>
                <?php echo $emailOutput[0]; ?>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <?php
                    getStreet()
                    ?>
                    <input type="text" name="street" id="street" value="<?php echo $streetOutput[1]; ?>" class="form-control"/>
                    <?php echo $streetOutput[0]; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <?php
                    getStNumber()
                    ?>
                    <input type="text" id="streetnumber" name="streetnumber" value="<?php echo $streetNumberOutput[1]; ?>" class="form-control">
                    <?php echo $streetNumberOutput[0]; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <?php
                    getCity()
                        ?>
                    <input type="text" id="city" name="city" value="<?php echo $cityOutput[1]; ?>" class="form-control">
                    <?php echo $cityOutput[0]; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <?php
                    getZip()
                        ?>
                    <input type="text" id="zipcode" name="zipcode" value="<?php echo $zipOutput[1]; ?>" class="form-control">
                    <?php echo $zipOutput[0]; ?>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="number" value="0" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button name = "order" type="submit" class="btn btn-primary">Order!</button>
        <button name = "expressOrder" type="submit" class="btn btn-primary">ExpressDelivery!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
    <br>
    <br>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>
