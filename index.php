<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

/*ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);*/

//we are going to use session variables so we need to enable sessions
session_start();

//Half way through making a function to check all of the input data at once instead of all separately
/*function postingData($field, $recieved, $fieldErr)
{
    //$recieved = "";
    //$fieldErr = "";
    if (empty($_POST["'" . $field . "'"])) {
        $fieldErr = $field . "is required";
    }
    if (isset($_POST["'" . $field . "'"]) == true && empty($_POST["'" . $field . "'"]) == false) {
        $recieved = $_POST["'" . $field . "'"];
    }
}

function getStreetCity($field)
{
    if (isset($_POST["'" . $field . "'"]) == true && empty($_POST["'" . $field . "'"]) == false) {
        $street = trim($_POST["'" . $field . "'"]);
        if (empty($street)) {
            echo "input required.";
        } else {
            echo "thank you";
        }
    }
}*/
//running several functions inside an if (we are checking if there is any information in the POST)
//if (isset($_POST)) {

function getEmail()
{
    $email = $_POST['email'];
    $emailArr = array();
    if (isset($_POST['email']) == true && empty($_POST['email']) == false) {
        if (empty($_POST['email'])) {
            $enterData = "  Please enter data";
            $_POST['email'] = "";
            array_push($emailArr, $enterData);
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
            $valid = '<div class="alert alert-success">thank you</div>';
            $emailSession = $_SESSION['email'] = $email;
            array_push($emailArr, $valid, $emailSession);
        } else {
            $askForValid = '<div class="alert alert-danger">invalid email format</div>';
            $_POST['email'] = "";
            array_push($emailArr, $askForValid);
        }
    }
    return $emailArr;
}

$emailOutput = getEmail();


function getStreet()
{
    $street = $_POST['street'];
    $streetArr = array();
    if (isset($_POST['street']) == true && empty($_POST['street']) == false) {
        if (empty($street)) {
            $enterData = '<div class="alert alert-danger">input required</div>';
            $_POST['street'] = "";
            array_push($cityArr, $enterData);
        } else {
            $thankyou = '<div class="alert alert-success">thank you</div>';
            $streetSession = $_SESSION['street'] = $street;
            array_push($streetArr, $thankyou, $streetSession);
        }
        return $streetArr;
    }
}

//get the the return value of the function and putting it into a new var so that it can be used in the HTML
$streetOutput = getStreet();

//$city = "";
function getCity()
{
    $city = $_POST['city'];
    $cityArr = array();
    if (isset($_POST['city']) == true && empty($_POST['city']) == false) {
        if (empty($city)) {
            $enterData = '<div class="alert alert-danger">input required</div>';
            $_POST['city'] = "";
            array_push($cityArr, $enterData);
        } else {
            $thankyou = '<div class="alert alert-success">thank you</div>';
            $citySession = $_SESSION['city'] = $city;
            array_push($cityArr, $thankyou, $citySession);
        }
        return $cityArr;
    }
}

$cityOutput = getCity();


function getStNumber()
{
    $streetnumber = $_POST["streetnumber"];
    $streetNumberArr = array();
    if (isset($_POST["streetnumber"])) {
        if (empty($_POST["streetnumber"])) {
            $enterData = "  Please enter data";
            $_POST["streetnumber"] = "";
            array_push($streetNumberArr, $enterData);
        } else if (is_numeric($streetnumber) == true) {
            $valid = '<html lang="en"><div class="alert alert-success">valid number</div>';
            $streetNumberSession = $_SESSION['streetnumber'] = $streetnumber;
            array_push($streetNumberArr, $valid, $streetNumberSession);
        } else {
            $askForValid = '<html lang="en"><div class="alert alert-danger">please enter only valid numbers</div>';
            $_POST["streetnumber"] = "";
            array_push($streetNumberArr, $askForValid);
        }
        return $streetNumberArr;
    }
}

$streetNumberOutput = getStNumber();

function getZip()
{
    $zipcode = $_POST["zipcode"];
    $zipArr = array();
    if (isset($zipcode)) {
        if (empty($_POST["zipcode"])) {
            $enterData = "  Please enter data";
            $_POST["zipcode"] = "";
            array_push($zipArr, $enterData);
        } else if (is_numeric($_POST["zipcode"]) == true) {
            $valid = '<div class="alert alert-success">valid number</div>';
            $zipSession = $_SESSION['zipcodee'] = $zipcode;
            array_push($zipArr, $valid, $zipSession);
        } else {
            $askForValid = '<div class="alert alert-danger">please enter only valid numbers</div>';
            $_POST["zipcode"] = "";
            array_push($zipArr, $askForValid);
        }
        return $zipArr;
    }
}

$zipOutput = getzip();
//}

function correctOrder()
{
    if (!empty($_POST['email']) && !empty($_POST['street']) && !empty($_POST['streetnumber']) && !empty($_POST['city']) && !empty($_POST["zipcode"])) {
        $order = '<div class="alert alert-success">Your order is being processed</div>';
    } else {
        $order = '<div class="alert alert-danger">please complete the form</div>';
    }
    return $order;
}

function orderButtons()
{
    //if(isset(correctOrder() == '<div class="alert alert-success">Your order is being processed</div>'))
    if (isset($_POST['order'])) {
        $normalDelivery = date('h:i:s A', strtotime('+ 2 hours'));
        $deliveryStatement = '<div class="alert alert-success">' . "Your order should arrive by " . $normalDelivery . "<br></div>";
    }
    if (isset($_POST['expressOrder'])) {
        $expressDelivery = date('h:i:s A', strtotime('+ 45 minutes'));
        $deliveryStatement = '<div class="alert alert-success">' . "Your order should arrive by " . $expressDelivery . "<br></div>";
    }
    return $deliveryStatement;
}


/*//NOTE from Sicco
//This is to set the cookie value
$_SESSION['whateveryouwant'] = 'codings awseomeeee';
//This is to read/get the cookie value
$whatisinthesession = $_SESSION['whateveryouwant'] ;*/


function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//whatIsHappening();

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$drinks = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

if (!isset($_GET["food"])) {
    $_GET["food"] = 1;
}
if ($_GET["food"] == 1) {
    $products = $products;
} else {
    $products = $drinks;
}



    if (!empty($_POST["products"])) {
        $productOrders = $_POST["products"];
        $totalPrice = array();

        foreach ($productOrders as $key => $amount) {
            $prodPrice = $products[$key]['price'];
            $addingPrice = $prodPrice * $amount;
            array_push($totalPrice, $addingPrice);
        }
        $total = array_sum($totalPrice);
        $totalValue = $total;
        if(!isset($_COOKIE["priceCookie"])) {
            setcookie ("priceCookie", strval($totalValue), time() + (6000));
        } else {
            $totalValue= $totalValue + $_COOKIE["priceCookie"];
            setcookie ("priceCookie", strval($totalValue), time() + (6000));
        }
         $totalValue = $_COOKIE["priceCookie"];
    } else {
        $totalValue = 0;
    }





require 'form-view.php';
