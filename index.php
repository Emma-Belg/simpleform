<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

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


$email = "";
$emailErr = "";
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
}
if (isset($_POST['email']) == true && empty($_POST['email']) == false) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
        echo'<html lang="en"><div class="alert alert-success">thank you</div>';
    } else {
        echo '<html lang="en"><div class="alert alert-danger">invalid email format</div>';
    }
}

//$street = "";
function getStreet()
{
    if (isset($_POST['street']) == true && empty($_POST['street']) == false) {
        $street = trim($_POST['street']);
        if (empty($street)) {
            echo '<html lang="en"><div class="alert alert-danger">input required</div>';
        } else {
            echo'<html lang="en"><div class="alert alert-success">thank you</div>';
        }
    }
}

//$city = "";
function getCity(){
    $city = $_POST['city'];
    $cityArr = array();
    if (isset($_POST['city']) == true && empty($_POST['city']) == false) {
        if (empty($city)) {
            $enterData = '<div class="alert alert-danger">input required</div>';
            $citySession = $_SESSION['city'] = $city;
            array_push($cityArr, $enterData, $citySession);
        } else {
            $thankyou = '<div class="alert alert-success">thank you</div>';
            array_push($cityArr, $thankyou);
        }
        return $cityArr;
    }
}


function getStNumber() {
    $streetnumber = $_POST["streetnumber"];
    $streetNumberArr = array();
    if (isset($_POST["streetnumber"])) {
        if (empty($_POST["streetnumber"])) {
            $enterData = "  Please enter data";
            array_push($streetNumberArr, $enterData);
        }
        else if (is_numeric($streetnumber) == true) {
            $valid ='<html lang="en"><div class="alert alert-success">valid number</div>';
            $streetNumberSession = $_SESSION['streetnumber'] = $streetnumber;
            array_push($streetNumberArr, $valid, $streetNumberSession);
        } else {
            $askForValid = '<html lang="en"><div class="alert alert-danger">please enter only valid numbers</div>';
            array_push($streetNumberArr, $askForValid);
        }
        return $streetNumberArr;
    }
}

$streetNumberOutput = getStNumber();


function getZip() {
    $zipcode = /*htmlspecialchars(*/$_POST["zipcode"];
    $zipArr = array();
    if (isset($zipcode)) {
        if (empty($_POST["zipcode"])) {
            $enterData = "  Please enter data";
            array_push($zipArr, $enterData);
        }
        else if (is_numeric($_POST["zipcode"]) == true) {
            $valid = '<html lang="en"><div class="alert alert-success">valid number</div>';
            $zipSession = $_SESSION['zipcodee'] = $zipcode;
            array_push($zipArr, $valid, $zipSession);
        } else {
            $askForValid = '<html lang="en"><div class="alert alert-danger">please enter only valid numbers</div>';
            array_push($zipArr, $askForValid);
        }
        //implode("", $zipArr);
        return $zipArr;
    }
}

$zipOutput = getzip();
//var_dump($zipArr);


//NOTE from Sicco
//This is to set the cookie value
$_SESSION['whateveryouwant'] = 'codings awseomeeee';
//This is to read/get the cookie value
$whatisinthesession = $_SESSION['whateveryouwant'] ;


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

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'form-view.php';
