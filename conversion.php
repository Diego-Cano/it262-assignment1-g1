<?php

        function fahrCel($temp) // converts Fahrenheit to Celcius and rounds the conversion to two decimals
{
        $f2c = ((int) $degree - 32) * (5 / 9); // conversion formula
        $roundF2c = number_format($f2c, 2); // rounding to two decimals
        return $roundF2c; // return rounded number
}
        function fahrKel($temp) // converts Fahrenheit to Kelvin and rounds the conversion to two decimals
{
        $f2k = ((5 / 9) * (int) $degree) + 459.67;
        $roundF2k = number_format($f2k, 2);
        return $roundF2k;
}
        function fahrRan($temp) // converts Fahrenheit to Rankine and rounds the conversion to two decimals
{
        $f2r = (int) $degree + 459.67;
        $roundF2r = number_format($f2r, 2);
        return $roundF2r;
}
        function celFahr($temp) // converts Celcius to Fahrenheit and rounds the conversion to two decimals
{       
        $c2f = ((int) $degree * (9 / 5)) + 32;
        $roundC2f = number_format($c2f, 2);
        return $roundC2f;
}
        function celKel($temp) // converts Celcius to Kelvin and rounds the conversion to two decimals
{  
        $c2k = (int) $degree + 273.15;
        $roundC2k = number_format($c2k, 2);
        return $roundC2k;
}
        function celRan($temp) // converts Celcius to Rankine and rounds the conversion to two decimals
{  
        $c2r = ((int) $degree * (9 / 5)) + 491.67;
        $roundC2r = number_format($c2r, 2);
        return $roundC2r;
}
        function kelFahr($temp) // converts Kelvin to Fahrenheit and rounds the conversion to two decimals
{  
        $k2f = (((int) $degree - 273.15) * (9 / 5)) + 32;
        $roundK2f = number_format($k2f, 2);
        return $roundK2f;
}
        function kelCel($temp) // converts Kelvin to Celcius and rounds the conversion to two decimals
{  
        $k2c = (int) $degree - 273.15;
        $roundK2c = number_format($k2c, 2);
        return $roundK2c;
}
        function kelRan($temp) // converts Kelvin to Rankine and rounds the conversion to two decimals
{  
        $k2r = (int) $degree / 1.8;
        $roundK2r = number_format($k2r, 2);
        return $roundK2r;
}
        function ranFahr($temp) // converts Rankine to Fahrenheit and rounds the conversion to two decimals
{  
        $r2f = (int) $degree - 459.67;
        $roundR2f = number_format($c2k, 2);
        return $roundR2f;
}
        function ranCel($temp) // converts Rankine to Celcius and rounds the conversion to two decimals
{  
        $r2c = ((int) $degree - 491.67) * (5 / 9);
        $roundR2c = number_format($c2k, 2);
        return $roundR2c;
}
        function ranKel($temp) // converts Rankine to Kelvin and rounds the conversion to two decimals
{  
        $r2k = (int) $degree * 1.8;
        $roundR2k = number_format($c2k, 2);
        return $roundR2k;
}

$degree = '';
$ogScale = '';
$newScale = '';

$degree_Err = '';
$ogScale_Err = '';
$newScale_Err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['degree'])) {
        $degree_Err = 'Please enter a value!';// making sure user has filled out degree value
    }
    else
    { 
    $degree = $_POST['degree'];}

    if(empty($_POST['ogScale'])) {
        $degree_Err = 'Please select the original scale!';// making sure user has filled out degree value
    }
    else
    { 
    $degree = $_POST['ogScale'];}

    if(empty($_POST['newScale'])) {
        $degree_Err = 'Please select the desired scale!';// making sure user has filled out degree value
    }
    else
    { 
    $degree = $_POST['newScale'];}

    if(isset($_POST['degree'])) {
    $degree = $_POST['degree'];
    $ogScale = $_POST['ogScale'];
    $newScale = $_POST['newScale'];
    
    $f2c = ((int)$degree - 32) * (5/9); // conversion formula
    $round_f2c = number_format($f2c, 2); // rounding to two decimals

    $f2k =  ((5/9) * (int)$degree) + 459.67;
    $round_f2k = number_format($f2k, 2);

    $f2r = (int)$degree + 459.67;
    $round_f2r = number_format($f2r, 2);

    $c2f = ((int)$degree * (9/5)) + 32 ;
    $round_c2f = number_format($c2f, 2);

    $c2k = (int)$degree + 273.15;
    $round_c2k = number_format($c2k, 2);

    $c2r = ((int)$degree * (9/5)) + 491.67;
    $round_c2r = number_format($c2r, 2);

    $k2f = (((int)$degree - 273.15) * (9/5)) + 32;
    $round_k2f = number_format($k2f, 2);

    $k2c = (int)$degree - 273.15;
    $round_k2c = number_format($k2c, 2);

    $k2r = (int)$degree / 1.8;
    $round_k2r = number_format($k2r, 2);

    $r2f = (int)$degree - 459.67;
    $round_r2f = number_format($c2k, 2);

    $r2c = ((int)$degree - 491.67) * (5/9);
    $round_r2c = number_format($c2k, 2);

    $r2k = (int)$degree * 1.8;
    $round_r2k = number_format($c2k, 2);

    if(($degree != NULL) && (is_numeric($degree))){ // making sure degree value is filled and numeric

        if (($ogScale == "fahr") && ($newScale == "cel")){ // Fahrenheit --> Celcius
            echo '<div class="form-tag"><p>'. $round_f2c .'</p></div>';
        }

        if (($ogScale == "fahr") && ($newScale == "kel")){ // Fahrenheit --> Kelvin
            echo '<div class="form-tag"><p>'. $round_f2k . '</p></div>';
        }

        if (($ogScale == "fahr") && ($newScale == "ran")){ // Fahrenheit --> Rankine
            echo '<div class="form-tag"><p>'. $round_f2r . '</p></div>';
        }

        if (($ogScale == "cel") && ($newScale == "fahr")){ // Celcius --> Fahrenheit
            echo '<div class="form-tag"><p>'. $round_c2f . '</p></div>';
        }

        if (($ogScale == "cel") && ($newScale == "kel")){ // Celcius --> Kelvin
            echo '<div class="form-tag"><p>'. $round_c2k . '</p></div>';
        }

        if (($ogScale == "cel") && ($newScale == "ran")){ // Celcius --> Rankine
            echo '<div class="form-tag"><p>'. $round_c2r . '</p></div>';
        }

        if (($ogScale == "kel") && ($newScale == "fahr")){ // Kelvin --> Fahrenheit
            echo '<div class="form-tag"><p>'. $round_k2f . '</p></div>';
        }

        if (($ogScale == "kel") && ($newScale == "cel")){ // Kelvin --> Celcius
            echo '<div class="form-tag"><p>'. $round_k2c . '</p></div>';
        }    

        if (($ogScale == "kel") && ($newScale == "ran")){ // Kelvin --> Rankine
            echo '<div class="form-tag"><p>'. $round_k2r . '</p></div>';
        }

        if (($ogScale == "ran") && ($newScale == "fahr")){ // Rankine --> Fahrenheit
            echo '<div class="form-tag"><p>'. $round_k2f . '</p></div>';
        }

        if (($ogScale == "ran") && ($newScale == "cel")){ // Rankine --> Fahrenheit
            echo '<div class="form-tag"><p>'. $round_k2f . '</p></div>';
        }

        if (($ogScale == "ran") && ($newScale == "kel")){ // Rankine --> Fahrenheit
            echo '<div class="form-tag"><p>'. $round_k2f . '</p></div>';
        }

    } // end inner if
    else {
        echo 'Please enter a numeric value!';
    }


    } // end outer if

} // end server request
?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Temperature Converter: IT 262 Group 1</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>

<body>

    <?php include 'includes/form.php';?>
</body>

</html>
