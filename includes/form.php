<form action ="
<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ;?>
" method=<?=$form->method?>>
  <fieldset>
    <h1><?=$temperature_form->title?></h1>
    <!-- <label class="form-label"  for="ogScale">Original scale?</label> -->
    <div class="form-row">
      <div class="form-group">
        <input type="number" name="degree" size=4 placeholder="degrees">
        <select name="ogScale" class="select"><option diasbled value="" NULL
        <?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == NULL) echo 'selected = "unselected" '
        ;?>> Choose </option>
        <option value="fahr"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'fahr') echo 'selected = "selected" '
        ;?>>Fahrenheit</option>
        <option value="cel"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'cel') echo 'selected = "selected" '
        ;?>>celsius</option> 
        <option value="kel"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'kel') echo 'selected = "selected" '
        ;?>>Kelvin</option> 
        <option value="ran"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'ran') echo 'selected = "selected" '
        ;?>>Rankine</option>
        </select> 
        <span class="error"><?php echo $ogScale_Err; ?></span>
      </div>
      <div class="form-group">
          <!-- <label class="form-label" for="newScale">Desired scale?</label> -->
        <div class="form-blank"></div>
        <!-- <input type="number" name="degree-2" size=4 value=""> -->
        <select name="newScale" class="select">
        <option value="" NULL
        <?php if(isset($_POST['newScale']) && $_POST['newScale'] == NULL) echo 'selected = "unselected" '
        ;?>> Choose </option>
        <option value="fahr"<?php if(isset($_POST['newScale']) && $_POST['newScale'] == 'fahr') echo 'selected = "selected" '
        ;?>>Fahrenheit</option>
        <option value="cel"<?php if(isset($_POST['newScale']) && $_POST['newScale'] == 'cel') echo 'selected = "selected" '
        ;?>>celsius</option> 
        <option value="kel"<?php if(isset($_POST['newScale']) && $_POST['newScale'] == 'kel') echo 'selected = "selected" '
        ;?>>Kelvin</option> 
        <option value="ran"<?php if(isset($_POST['newScale']) && $_POST['newScale'] == 'ran') echo 'selected = "selected" '
        ;?>>Rankine</option>
        </select>
      </div>
    </div>
    <span class="error"><?php echo $degree_Err; ?></span>
    <span class="error"><?php echo $newScale_Err; ?></span>

  <input type="submit" value="Convert"/>
 </form> 
