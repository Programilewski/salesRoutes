<?php require __DIR__ . "/partials/head.php"; ?>

<nav class="mainNavigation">
    <?php
    partials("heading.php", [
        "title" => "Panel",
        "icon" => "dashboard.svg"
    ]);
    ?>
    <?php require "partials/links.php" ?>

</nav>
<div id="map"></div>
<div class="timeline">
    <div class="stop">
        <div class="stop__number">1</div>
        <div class="stop__time">16:37 - 17:12</div>
    </div>
</div>
<div class="controls">
    <div class="datePicker">
        <input class="datePicker__input" type="date" id="datePickerInput" name="date-pick" value="<?= date("Y-m-d") ?>" />
    </div>
    <fieldset class="radioInputGroup" id="salesmenList">
        <?php
        foreach ($data as $salesman) {
        ?>
            <div class="radioInputGroup__inputContainer">
                <!-- <svg width="5" height="5" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#<?= $salesman['color'] ?>" />
                </svg> -->
                <input aria-color="<?= $salesman['color'] ?>" type="radio" id="<?= $salesman['car_id'] ?>" name="salesman" value="<?= $salesman['car_id'] ?>" aria-salesmanCode=<?= $salesman["salesman_code"] ?> checked="">
                <label for="<?= $salesman['car_id'] ?>"><?= $salesman["name"] . "<br> " . $salesman["surname"] ?></label>
            </div>
        <?php
        }
        ?>
    </fieldset>
</div>

<script src="assets/JS/map.js" defer></script>
<script type="module" src="assets/JS/app.js" defer></script>

</body>

</html>