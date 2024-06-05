<?php require __DIR__ . "/partials/head.php"; ?>

<nav class="mainNavigation">
    <div class="controls">
        <?php
        partials("heading.php", [
            "title" => "Panel",
            "icon" => "dashboard.svg"
        ]);
        ?>
        <fieldset class="radioInputGroup" id="salesmenList">
            <?php
            foreach ($data as $salesman) {
            ?>
                <div class="radioInputGroup__inputContainer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#<?= $salesman['color'] ?>" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <input aria-color="<?= $salesman['color'] ?>" type="radio" id="<?= $salesman['car_id'] ?>" name="salesman" value="<?= $salesman['car_id'] ?>" aria-salesmanCode=<?= $salesman["salesman_code"] ?> checked="">
                    <label for="<?= $salesman['car_id'] ?>"><?= $salesman["name"] . " " . $salesman["surname"] ?></label>
                </div>
            <?php
            }
            ?>
        </fieldset>
        <div class="datePicker">
            <input class="datePicker__input" type="date" id="datePickerInput" name="date-pick" value="<?= date("Y-m-d") ?>" />
        </div>
    </div>
    </div>
    <?php require "partials/links.php" ?>
    <div class="badge">
        <div class="salesmanInfo">
            <h3 id="salesmanInfo__heading" class="">Adam Kubicki</h3>
            <p class="salesmanInfo__code">P000150</p>
            <p class="salesManInfo__plates" id="salesmanPlates">WOT0321</p>
        </div>
</nav>
<div id="map"></div>
<div class="stopsContainer">
    <h4>Przystanki</h4>
    <ul class="stopsList">
    </ul>
</div>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="" defer></script>
<script src="assets/JS/map.js" defer></script>
<script type="module" src="assets/JS/app.js" defer></script>

</body>

</html>