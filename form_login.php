<form class="loginform-container" name="myForm" action="login.php" method="post">
    <div class="loginform-content">
        <?php
        require 'construct.php';
        $errors = array();
        input_field($errors, 'email', 'Email', 'Enter Email');
        input_field($errors, 'pass', 'Password', 'Enter Password');
        ?>
        <div class="buttons-container">
            <button type="submit" name="login" value="yes" class="loginbtn">Login</button>
        </div>
    </div>
</form>
