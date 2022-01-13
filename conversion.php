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
  include('includes/form.php'); // include form

  class Form
  {
    public function __construct($title, $method, $action, $list) {
      // assigns properties from args passed during instantiation
      $this->title = $title;
      $this->method = $method;
      $this->action = $action;
      $this->list = $list;
    }
  }
  // declares ConverterForm class
  class ConverterForm
  {
    // constructor takes in object of type Form
    public function __construct(Form $form) {
      // assigns title property from form
      $this->title = $form->title;
      // define standard units of conversion for this form's calculations
      $this->unit = 1.8;
      $this->f_base = 32;
      $this->k_base = 273.15;
      $this->r_base = 459.67;
      // define strings for form output and errors
      $this->out_Str = '';
      $this->error_msg = '';
    }
    // conversion function for fahrenheit (we already know that the value-to-convert is fahrenheit because generateOutput() sessed out the first scale value and called this function accordingly)
    private function fahrenheitTo($input, $scale)
    {
      if ($scale == "cel") {
        return number_format(((int)$input - $this->f_base) * (5/9), 2);
      } elseif ($scale == "kel") {
        return number_format((((int)$input - $this->f_base) * (5/9) + $this->k_base), 2);
      } elseif ($scale == "ran") {
        return number_format(((int)$input + $this->r_base), 2);
      } elseif ($scale == "fahr") { // if scales are the same 
        return number_format(((int)$input), 2); 
      }
    }
    // conversion function for celsius
    private function celsiusTo($input, $scale)
    {
      if ($scale == "fahr") {
        return number_format(((int)($input * (9/5)) + $this->f_base), 2);
      } elseif ($scale == "kel") {
        return number_format((((int)$input + $this->k_base) * (5/9)), 2);
      } elseif ($scale == "ran") {
        return number_format((((int)$input * $this->unit) + $this->r_base), 2);
      } elseif ($scale == "cel") {
        return number_format(((int)$input), 2);
      }
    }
    // conversion function for kelvin
    private function kelvinTo($input, $scale)
    {
      if ($scale == "fahr") {
        return number_format((((int)$input - $this->k_base) * $this->unit + $this->f_base), 2);
      } elseif ($scale == "cel") {
        return number_format(((int)$input - $this->k_base), 2);
      } elseif ($scale == "ran") {
        return number_format(((int)$input * $this->unit), 2);
      } elseif ($scale == "kel") {
        return number_format(((int)$input), 2);
      }
    }
    // conversion function for rankine
    private function rankineTo($input, $scale)
    {
      if ($scale == "fahr") {
        return number_format(((int)$input - $this->r_base), 2);
      } elseif ($scale == "cel") {
        return number_format((((int)$input - $this->r_base) * (5/9)), 2);
      } elseif ($scale == "kel") {
        return number_format(((int)$input / $this->unit), 2);
      } elseif ($scale == "ran") {
        return number_format(((int)$input), 2);
      }
    }
    // function to decide which form method to call based on string values of scale arguments
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
      // return converted value
      echo '<div class="form-tag"><p>The answer is '. $converted_out .' degrees.</p></div>';
    }
  } // end ConverterForm class
  // declares an array to store form data, to be passed to the Form constructor to generate form fields (we didn't get as far along with implementing this concept, but this is the key to creating multiple forms with a variable number of form fields)
  $form_data = array(
    'degree' => '',
    'original' => '',
    'desired' => ''
  );
  // instantiate new Form
  $form = new Form("Temperature Converter", "POST", "", $form_data);
  $temperature_form = new ConverterForm($form);
  
  // declare arbitrary strings for readability
  $degree = '';
  $original = '';
  $desired = '';
  
  // Check if request is for POST ops
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // iterate form list
    foreach($form_data as $key => $val) {
      // check if the form field is empty
      if (empty( $_POST[$key] )) {
        // if it is: throw an error indicating the missing field
        echo "<span class='error'>$key is required!</span>\n";
      } else {
        // if it isn't, assign the value of the input form field to $degree
        $degree = $_POST[$key];
      }
    }
  // check if values in POST array is set
    if(isset($_POST['degree'])) {
      $degree = $_POST['degree'];
      $original = $_POST['original'];
      $desired = $_POST['desired'];
  
      if(($degree != NULL) && (is_numeric($degree))){ // making sure degree value is filled and numeric
        $temperature_form->generateOutput($original
        , $desired, $degree); // call on converter handler method to perform the appropriate operation for the form data
      } // end inner if
      elseif((is_numeric($degree)) == FALSE) { // if non-numeric
        echo '<span class="error">Please enter a numeric value!</span>'; // error message
      }
      else {
        echo '<span class="error">Please fill all fields!</span>'; // if non-numeric and/or not filled
      }
    } // end outer if
  } // end server request
  ?>
</body>
</html>
