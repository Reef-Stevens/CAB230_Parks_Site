<!--  form used for the user review in result.php if user is logged in  -->
<form class="reviewform-container" name="myForm" action="result.php" method="post">
    <div class="reviewform-content">
        <div class="review-comment">
            <?php
            require 'construct.php';
            $errors = array();
            // input field to enter a review of the park
            input_field($errors, 'review', 'Review', 'Enter a review');
            ?>
        </div>
        <div class="review-name">
            <label class='revLabel'>Rate the park:</label>
            <!--  selector for ratings options  -->
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
            </select>
        </div>
        <div class="buttons-container">
            <button type="submit" name="submit" class="submitbtn">Submit</button>
        </div>

    </div>
</form>
