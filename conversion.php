<?php

$degree = '';
$ogScale = '';
$newScale = '';

$degree_Err = '';
$ogScale_Err = '';
$newScale_Err = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    
    $f2c = ($degree - 32) * (5/9); // conversion formula
    $round_f2c = number_format($f2c, 2); // rounding to two decimals

    $f2k =  ((5/9) * $degree) + 459.67;
    $round_f2k = number_format($f2k, 2);

    $f2r = $degree + 459.67;
    $round_f2r = number_format($f2r, 2);

    $c2f = ($degree * (9/5)) + 32 ;
    $round_c2f = number_format($c2f, 2);

    $c2k = $degree + 273.15;
    $round_c2k = number_format($c2k, 2);

    $c2r = ($degree * (9/5)) + 491.67;
    $round_c2r = number_format($c2r, 2);

    $k2f = (($degree - 273.15) * (9/5)) + 32;
    $round_k2f = number_format($k2f, 2);

    $k2c = $degree - 273.15;
    $round_k2c = number_format($k2c, 2);

    $k2r = $degree / 1.8;
    $round_k2r = number_format($k2r, 2);

    $r2f = $degree - 459.67;
    $round_r2f = number_format($c2k, 2);

    $r2c = ($degree - 491.67) * (5/9);
    $round_r2c = number_format($c2k, 2);

    $r2k = $degree * 1.8;
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

        if (($ogScale == "kel") && ($newScale == ran)){ // Kelvin --> Rankine
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

    <?php function cels_faren($temp)
{
    $faren = (((9 / 5) * $temp) + (32));
    $faren_format = number_format($faren, 2);
    return $faren_format;
}
function faren_kelv($temp)
{
    $kelvin = (($temp + 459.67) * (5 / 9));
    $kelvin_format = number_format($kelvin, 2);
    return $kelvin_format;
}
function faren_cels($temp)
{
    $cels = ((5 / 9) * ($temp - 32));
    $cels_format = number_format($cels, 2);
    return $cels_format;
}
function kelv_cels($temp)
{
    $kelv_cels = (($temp - 273.15));
    $kelv_cels_format = number_format($kelv_cels, 2);
    return $kelv_cels_format;
}function cels_kelv($temp)
{
    $cels_kelv = (($temp + 273.15));
    $cels_kelv_format = number_format($cels_kelv, 2);
    return $cels_kelv_format;
}function kelv_faren($temp)
{
    $kelv_faren = (($temp * (9 / 5)) - 459.67);
    $kelv_faren_format = number_format($kelv_faren, 2);
    return $kelv_faren_format;
}

if (isset($_POST['convert'])) {
    $init_type = $_POST['init_type'];
    $temp_type = $_POST['temp_type'];
    $user_temp = $_POST['user_temp'];
    if ($init_type == "farenheit" && $temp_type == "celsius") {
        $conv = faren_cels($user_temp);
        echo "$user_temp °F  is $conv °C.";

    } elseif ($init_type == "farenheit" && $temp_type == "kelvin") {
        $conv = faren_kelv($user_temp);
        echo "$user_temp $init_type is $conv K.";

    } elseif ($init_type == "celsius" && $temp_type == "farenheit") {
        $conv = cels_faren($user_temp);
        echo "$user_temp °C is $conv °F.";

    } elseif ($init_type == "celsius" && $temp_type == "kelvin") {
        $conv = cels_kelv($user_temp);
        echo "$user_temp °C is $conv K.";

    } elseif ($init_type == "kelvin" && $temp_type == "farenheit") {
        $conv = kelv_faren($user_temp);
        echo "$user_temp K is $conv °F.";

    } elseif ($init_type == "kelvin" && $temp_type == "celsius") {
        $conv = kelv_cels($user_temp);
        echo "$user_temp K is $conv °C.";
    } elseif ($init_type == $temp_type) {
        echo "Please choose a different temperature type to convert.";
    }
}

?>

    <?php include 'includes/form.php';?>
</body>

</html>