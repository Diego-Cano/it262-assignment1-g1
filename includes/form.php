<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <table>
        <tr>
            <td>Enter temperature.</td>
            <td><input type="text" name="user_temp" pattern="[0-9]{1,}" required>
                <select name="init_type">
                    <option disabled>Select Temperature Type</option>
                    <option value="farenheit">Farenheit</option>
                    <option value="celsius">Celsius</option>
                    <option value="kelvin">Kelvin</option>
                </select>
            </td>

        </tr>
        <tr>
            <td>See the temperature in:</td>
            <td><select name="temp_type" id="temp_type">
                    <option disabled>Select Temperature Type</option>
                    <option value="farenheit">Farenheit</option>
                    <option value="celsius">Celsius</option>
                    <option value="kelvin">Kelvin</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="convert" id="convert" value="Convert"></td>
            <td><input type="reset" name="reset" id="reset" value="Reset"></td>
        </tr>
    </table>
</form>