<!DOCTYPE html>
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