<form name="myForm" action="login.php" method="post">
        <?php
        require 'construct.php';

        input_field($errors, 'name', 'Username', 'Enter First Name');
        input_field($errors, 'email', 'Email', 'Enter Email');

        label('age', 'Age');
        echo '<input type="number" min="18" max="99" placeholder="Example: 21" required>';

        label('birth', 'Birthday');
        echo '<input type="date" placeholder="DD/MM/YYYY" pattern="[0-9-/]+" id="myDate" required>';

        input_field($errors, 'pass', 'Password', 'Enter Password');
        ?>

    <div class="buttons-container">
        <button type="submit" class="signupbtn">Sign Up</button>
    </div>
</form>
