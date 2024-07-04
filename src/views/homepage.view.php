<?php
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/sidebar.php";

?>


<div id="map"></div>
<div class="timeline">
</div>
<div class="mapControls">
    <div class="datePicker">
        <input class="datePicker__input" type="date" id="datePickerInput" name="date-pick" value="<?= date("Y-m-d") ?>" />
    </div>
    <fieldset class="radioInputGroup" id="salesmenList">
        <?php
        foreach ($data as $salesman) {
        ?>
            <div class="radioInputGroup__inputContainer">
                <input aria-color="<?= $salesman['color'] ?>" type="radio" id="<?= $salesman['car_id'] ?>" name="salesman" value="<?= $salesman['car_id'] ?>" aria-salesmanCode=<?= $salesman["salesman_code"] ?> checked="">
                <label for="<?= $salesman['car_id'] ?>"><?= $salesman["name"] . "<br> " . $salesman["surname"] ?></label>
            </div>
        <?php
        }
        ?>
    </fieldset>
</div> <!-- <svg width="5" height="5" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#<?= $salesman['color'] ?>" />
                </svg> -->

<script src="assets/JS/map.js" defer></script>
<script type="module" src="assets/JS/app.js" defer></script>

</body>

</html>