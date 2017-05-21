
<form class="signform-container" name="myForm" action="signup.php" method="post">
    <div class="signform-content">
            <?php
            require 'construct.php';

            input_field($errors, 'name', 'Username', 'Enter First Name');
            input_field($errors, 'email', 'Email', 'Enter Email');
            input_field($errors, 'age', 'Age', 'Enter age');
            input_field($errors, 'date', 'Birthday', 'DD/MM/YYYY');
            input_field($errors, 'pass', 'Password', 'Enter Password');
            ?>

        <div class="buttons-container">
            <button type="submit" name="signup" value="yes" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form>
