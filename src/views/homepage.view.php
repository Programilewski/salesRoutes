<?php
require __DIR__ . "/partials/head.php";
require __DIR__ . "/partials/sidebar.php";

?>


<div id="map"></div>
<nav class="mapNavigation" id="mapNavigation">
    <div class="mapNavigation__toggle" id="mapNavigationToggle">

        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#909cff">
            <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
        </svg>
    </div>
    <div class="timeline">
    </div>
    <div class="mapControls">
        <div class="datePicker">
            <input class="datePicker__input" type="date" id="datePickerInput" name="date-pick" value="<?= date("Y-m-d") ?>" />
        </div>
        <div class="radioInputGroup" id="salesmenList">
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
        </div>
    </div>
</nav>


<script src="assets/JS/map.js" defer></script>
<script type="module" src="assets/JS/app.js" defer></script>

</body>

</html>