
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Temperature Converter: IT 262 Group 1</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php
  include('includes/form.php');

  class Form
  {
    public function __construct($title, $method, $action, $list) {
      $this->title = $title;
      $this->method = $method;
      $this->action = $action;
      $this->list = $list;
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
      $this->error_msg = '';
    }
    private function fahrenheitTo($input, $scale)
    {
      if ($scale == "cel") {
        return number_format(((int)$input - $this->f_base) * (5/9), 2);
      } elseif ($scale == "kel") {
        return number_format((((int)$input - $this->f_base) * (5/9) + $this->k_base), 2);
      } elseif ($scale == "ran") {
        return number_format(((int)$input + $this->r_base), 2);
      }
    }
    private function celsiusTo($input, $scale)
    {
      if ($scale == "fahr") {
        return number_format(((int)($input * (9/5)) + $this->f_base), 2);
      } elseif ($scale == "kel") {
        return number_format((((int)$input + $this->k_base) * (5/9)), 2);
      } elseif ($scale == "ran") {
        return number_format((((int)$input * $this->unit) + $this->r_base), 2);
      }
    }
    private function kelvinTo($input, $scale)
    {
      if ($scale == "fahr") {
        return number_format((((int)$input - $this->k_base) * $this->unit + $this->f_base), 2);
      } elseif ($scale == "cel") {
        return number_format(((int)$input - $this->k_base), 2);
      } elseif ($scale == "ran") {
        return number_format(((int)$input * $this->unit), 2);
      }
    }
    private function rankineTo($input, $scale)
    {
      if ($scale == "fahr") {
        return number_format(((int)$input - $this->r_base), 2);
      } elseif ($scale == "cel") {
        return number_format((((int)$input - $this->r_base) * (5/9)), 2);
      } elseif ($scale == "kel") {
        return number_format(((int)$input / $this->unit), 2);
      }
    }
    public function generateOutput($scale1, $scale2, $conv) {
      if ($scale1 == "fahr") {
        $converted_out = $this->fahrenheitTo($conv, $scale2);
      }
      if ($scale1 == "cel") {
        $converted_out = $this->celsiusTo($conv, $scale2);
      }
      if ($scale1 == "kel") {
        $converted_out = $this->kelvinTo($conv, $scale2);
      }
      if ($scale1 == "ran") {
        $converted_out = $this->rankineTo($conv, $scale2);
      }
      echo '<div class="form-tag"><p>The answer is '. $converted_out .' degrees.</p></div>';
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
  
  $form = new Form("Temperature Converter", "POST", "", $form_data);
  $temperature_form = new ConverterForm($form);
  
  $degree = '';
  $ogScale = '';
  $newScale = '';
  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($form_data as $key => $val) {
      if (empty( $_POST[$key] )) {
        echo "<span class='error'>$key is required!</span>\n";
      } else {
        $degree = $_POST[$key];
      }
    }
  
    if(isset($_POST['degree'])) {
      $degree = $_POST['degree'];
      $ogScale = $_POST['ogScale'];
      $newScale = $_POST['newScale'];
  
      if(($degree != NULL) && (is_numeric($degree))){ // making sure degree value is filled and numeric
        $temperature_form->generateOutput($ogScale, $newScale, $degree);
      } // end inner if
      elseif($ogScale == $newScale) {
        echo '<span class="error">Please make sure scales do not match!<span>';
      }
      else {
        echo '<span class="error">Please fill all fields!</span>';
      }
    } // end outer if
  } // end server request
  ?>

</body>

</html>