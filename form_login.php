<!--  Login form used in the login page login.php  -->
<form class="loginform-container" name="myForm" action="login.php" method="post">
    <div class="loginform-content">
        <?php
        require 'construct.php';
        $errors = array();
        // prints error when login failed in previous form submission
        if (isset($_GET['loginfail'])){
            echo "<p style='text-align:center;color:red;'>Login failed. Check that you have enter your details correctly.</p>";
        }
        // constructs two input fields, one for email and one for password
        input_field($errors, 'email', 'Email', 'Enter Email');
        input_field($errors, 'pass', 'Password', 'Enter Password');
        ?>
        <div class="buttons-container">
            <button type="submit" name="login" value="yes" class="loginbtn">Login</button>
        </div>
    </div>
</form>
