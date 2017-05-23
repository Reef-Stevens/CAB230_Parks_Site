
<form class="signform-container" name="myForm" action="result.php" method="post">
    <div class="signform-content">
            <?php
            require 'construct.php';
            $errors = array();
            input_field($errors, 'name', 'Username', 'Enter First Name');
            ?>
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
            </select>
            <?php
            input_field($errors, 'review', 'Review', 'Enter a review');
            ?>

            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
            </select>

        <div class="buttons-container">
            <button type="submit" name="submit" value="yes" class="submitbtn">Submit</button>
        </div>
    </div>
</form>
