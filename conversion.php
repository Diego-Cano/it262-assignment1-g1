<?php
class Form
{
  public function __construct(
    public $title,
    public $method = "POST",
    public $action = "",
    public $list = []
  ) {
  }
}
class ConverterForm
{
  public function __construct(Form $form) {
    $this->title = $form->title;
    $this->unit = 1.8;
    $this->f_base = 32;
    $this->k_base = 273.15;
    $this->r_base = 459.67;
    $this->out_Str = '';
  }
  private function fahrenheitToCelsius($fahr)
  {
    return number_format(((int)$fahr - $this->f_base) * (5/9), 2);
  }
  private function fahrenheitToKelvin($input)
  {
    return number_format((((int)$input - $this->f_base) * (5/9) + $this->k_base), 2); 
  }
  private function fahrenheitToRankine($input)
  {
    return number_format(((int)$input + $this->r_base), 2); 
  }
  private function celsiusToFahrenheit($input)
  {
    return number_format(((int)($input * (9/5)) + $this->f_base), 2);
  }
  private function celsiusToKelvin($input)
  {
    return number_format((((int)$input + $this->k_base) * (5/9)), 2);
  }
  private function celsiusToRankine($input)
  {
    return number_format((((int)$input * $this->unit) + $this->r_base), 2);
  }
  private function kelvinToFahrenheit($input)
  {
    return number_format((((int)$input - $this->k_base) * $this->unit + $this->f_base), 2);
  }
  private function kelvinToCelsius($input)
  {
    return number_format(((int)$input - $this->k_base), 2);
  }
  private function kelvinToRankine($input)
  {
    return number_format(((int)$input * $this->unit), 2);
  }
  private function rankineToFahrenheit($input)
  {
    return number_format(((int)$input - $this->r_base), 2);
  }
  private function rankineToCelsius($input)
  {
    return number_format((((int)$input - $this->r_base) * (5/9)), 2);
  }
  private function rankineToKelvin($input)
  {
    return number_format(((int)$input / $this->unit), 2);
  }
  public function generateOutput($scale1, $scale2, $conv) {
    if ($scale1 == "fahr") {
      if ($scale2 == "cel") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->fahrenheitToCelsius($conv) .'</p></div>';
      } elseif ($scale2 == "kel") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->fahrenheitToKelvin($conv) .'</p></div>';
      } elseif ($scale2 == "ran") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->fahrenheitToRankine($conv) .'</p></div>';
      }
    }
    if ($scale1 == "cel") {
      if ($scale2 == "fahr") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->celsiusToFahrenheit($conv) .'</p></div>';
      } elseif ($scale2 == "kel") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->celsiusToKelvin($conv) .'</p></div>';
      } elseif ($scale2 == "ran") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->celsiusToRankine($conv) .'</p></div>';
      }
    }
    if ($scale1 == "kel") {
      if ($scale2 == "fahr") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->kelvinToFahrenheit($conv) .'</p></div>';
      } elseif ($scale2 == "cel") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->kelvinToCelsius($conv) .'</p></div>';
      } elseif ($scale2 == "ran") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->kelvinToRankine($conv) .'</p></div>';
      }
    }
    if ($scale1 == "ran") {
      if ($scale2 == "fahr") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->rankineToFahrenheit($conv) .'</p></div>';
      } elseif ($scale2 == "cel") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->rankineToCelsius($conv) .'</p></div>';
      } elseif ($scale2 == "kel") {
        $this->out_Str .= '<div class="form-tag"><p>'. $this->rankineToKelvin($conv) .'</p></div>';
      }
    }
    echo $this->out_Str;
  }
  public function generateHTML() {
    echo '
    <fieldset>
      <h1>'.$this->title.'</h1>
      <div class="form-row">
        <div class="form-group">
          <input type="number" name="degree" size=4 placeholder="degrees">
          <select class="select">

          </select>
        </div>
        <div class="form-group">
          <input type="number" name="degree" size=4 placeholder="degrees">
          <select class="select"></select>
        </div>
      </div>
    </fieldset>
    ';
  }
}
$form_data = array(
  'degree' => '',
  'ogScale' => '',
  'newScale' => ''
);

$form = new Form(
  title: "Temperature Converter",
  list: $form_data
);
$temperature_form = new ConverterForm($form);

$degree = '';
$ogScale = '';
$newScale = '';

$degree_Err = '';
$ogScale_Err = '';
$newScale_Err = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(empty($_POST['degree'])) {
    $degree_Err = 'Please enter a value!';
  } else { 
    $degree = $_POST['degree'];
  }
  if(empty($_POST['ogScale'])) {
    $ogScale_Err = 'Please select the original scale!';
  } else { 
    $degree = $_POST['ogScale'];
  }
  if(empty($_POST['newScale'])) {
    $newScale_Err = 'Please select the desired scale!'; 
  } else { 
    $degree = $_POST['newScale'];
  }

  if(isset($_POST['degree'])) {
    $degree = $_POST['degree'];
    $ogScale = $_POST['ogScale'];
    $newScale = $_POST['newScale'];

    if(($degree != NULL) && (is_numeric($degree))){ // making sure degree value is filled and numeric
      $temperature_form->generateOutput($ogScale, $newScale, $degree);
    } // end inner if
    else {
      echo 'Please enter a numeric value!';
    }
  } // end outer if
} // end server request
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Temperature Converter: IT 262 Group 1</title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php
  include('includes/form.php');
?>
</body>

</html>