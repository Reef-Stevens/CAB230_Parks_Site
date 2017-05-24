
<form class="reviewform-container" name="myForm" action="result.php" method="post">
    <div class="reviewform-content">
        <div class="review-comment">
            <?php
            require 'construct.php';
            $errors = array();
            input_field($errors, 'review', 'Review', 'Enter a review');
            ?>
        </div>
        <div class="review-name">
            <?php
            input_field($errors, 'name', '', 'Enter your name');
            ?>
            <label class='revLabel'>Rate the park:</label>
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
            </select>
        </div>
        <div class="buttons-container">
            <button type="submit" name="submit" value="yes" class="submitbtn">Submit</button>
        </div>

    </div>
</form>
