<form action ="
<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ;?>
" method="post">
  <fieldset>
    <legend>Group 1's Temperature Converter</legend>
    <!-- <label class="form-label"  for="ogScale">Original scale?</label> -->
    <div class="form-row">
      <div class="form-group">
        <!-- <label for="degree">How many degrees?</label> -->
        <input type="text" name="degree" size=4>

        <select name="ogScale"><option value="" NULL
        <?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == NULL) echo 'selected = "unselected" '
        ;?>>
        <option value="fahr"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'fahr') echo 'selected = "selected" '
        ;?>>Fahrenheit</option>
        <option value="cel"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'cel') echo 'selected = "selected" '
        ;?>>Celcius</option> 
        <option value="kel"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'kel') echo 'selected = "selected" '
        ;?>>Kelvin</option> 
        <option value="ran"<?php if(isset($_POST['ogScale']) && $_POST['ogScale'] == 'ran') echo 'selected = "selected" '
        ;?>>Rankine</option>
        </select> 
        <span class="error"><?php echo $ogScale_Err; ?></span>
        
      </div>
      <p> = </p>
      <div class="form-group">
          <!-- <label class="form-label" for="newScale">Desired scale?</label> -->
        <input type="text" name="degree" size=4>

        <select name="newScale">
        <option value="" NULL
        <?php if(isset($_POST['newScale']) && $_POST['newScale'] == NULL) echo 'selected = "unselected" '
        ;?>>
        <option value="fahr"<?php if(isset($_POST['newScale']) && $_POST['newScale'] == 'fahr') echo 'selected = "selected" '
        ;?>>Fahrenheit</option>
        <option value="cel"<?php if(isset($_POST['newScale']) && $_POST['newScale'] == 'cel') echo 'selected = "selected" '
        ;?>>Celcius</option> 
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