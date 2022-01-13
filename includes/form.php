<form action ="
<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ;?>
" method="post">
<fieldset>
<legend>A Temperature Converter</legend>
<label for="degree">How many degrees?</label>
<input type = "text" name = "degree" size=4>

<label for="original">Original scale?</label>
<select name="original"><option value="" NULL
<?php if(isset($_POST['original']) && $_POST['original'] == NULL) echo 'selected = "unselected" '
;?>>
<option value="fahr"<?php if(isset($_POST['original']) && $_POST['original'] == 'fahr') echo 'selected = "selected" '
;?>>Fahrenheit</option>
<option value="cel"<?php if(isset($_POST['original']) && $_POST['original'] == 'cel') echo 'selected = "selected" '
;?>>Celcius</option> 
<option value="kel"<?php if(isset($_POST['original']) && $_POST['original'] == 'kel') echo 'selected = "selected" '
;?>>Kelvin</option> 
<option value="ran"<?php if(isset($_POST['original']) && $_POST['original'] == 'ran') echo 'selected = "selected" '
;?>>Rankine</option> 
</select> 

<label for="desired">Desired scale?</label>
<select name="desired">
<option value="" NULL
<?php if(isset($_POST['desired']) && $_POST['desired'] == NULL) echo 'selected = "unselected" '
;?>>
<option value="fahr"<?php if(isset($_POST['desired']) && $_POST['desired'] == 'fahr') echo 'selected = "selected" '
;?>>Fahrenheit</option>
<option value="cel"<?php if(isset($_POST['desired']) && $_POST['desired'] == 'cel') echo 'selected = "selected" '
;?>>Celcius</option> 
<option value="kel"<?php if(isset($_POST['desired']) && $_POST['desired'] == 'kel') echo 'selected = "selected" '
;?>>Kelvin</option> 
<option value="ran"<?php if(isset($_POST['desired']) && $_POST['desired'] == 'ran') echo 'selected = "selected" '
;?>>Rankine</option> 
</select> 

<input type = "submit" value = "Convert"/> 
</form> 
