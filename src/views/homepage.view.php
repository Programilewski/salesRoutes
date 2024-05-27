<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Do</title>
    <link rel="stylesheet" href="/assets/CSS/reset.css">
    <link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/CSS/main.css">
    <link rel="stylesheet" href="/assets/CSS/typography.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>

<body>
    <nav class="mainNavigation">
        <div class="controls">
            <?php
            $title = "Panel";
            $icon = "dashboard.svg";
            require "partials/heading.php"; ?>
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
                <div class="radioInputGroup__inputContainer">
                    <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M240.92-268.31q51-37.84 111.12-59.77Q412.15-350 480-350t127.96 21.92q60.12 21.93 111.12 59.77 37.3-41 59.11-94.92Q800-417.15 800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 62.85 21.81 116.77 21.81 53.92 59.11 94.92ZM480.01-450q-54.78 0-92.39-37.6Q350-525.21 350-579.99t37.6-92.39Q425.21-710 479.99-710t92.39 37.6Q610-634.79 610-580.01t-37.6 92.39Q534.79-450 480.01-450ZM480-100q-79.15 0-148.5-29.77t-120.65-81.08q-51.31-51.3-81.08-120.65Q100-400.85 100-480t29.77-148.5q29.77-69.35 81.08-120.65 51.3-51.31 120.65-81.08Q400.85-860 480-860t148.5 29.77q69.35 29.77 120.65 81.08 51.31 51.3 81.08 120.65Q860-559.15 860-480t-29.77 148.5q-29.77 69.35-81.08 120.65-51.3 51.31-120.65 81.08Q559.15-100 480-100Zm0-60q54.15 0 104.42-17.42 50.27-17.43 89.27-48.73-39-30.16-88.11-47Q536.46-290 480-290t-105.77 16.65q-49.31 16.66-87.92 47.2 39 31.3 89.27 48.73Q425.85-160 480-160Zm0-350q29.85 0 49.92-20.08Q550-550.15 550-580t-20.08-49.92Q509.85-650 480-650t-49.92 20.08Q410-609.85 410-580t20.08 49.92Q450.15-510 480-510Zm0-70Zm0 355Z" />
                    </svg>
                    <input type="radio" id="106218" name="salesman" value="106218" checked="">
                    <label for="106218" aria-carid="106218">Adam Raboj</label>
                </div>
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
            <li class="stop">
                <span class="stop__number">1</span>
                <p class="stop__coordinates">52.33123 11.52133</p>
            </li>
        </ul>
    </div>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="" defer></script>
    <script src="assets/JS/map.js" defer></script>
    <script type="module" src="assets/JS/app.js" defer></script>

</body>

</html>