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
            $title = "Salony optyczne";
            $icon = "store.svg";
            require __DIR__ . "/../partials/heading.php"; ?>
            <fieldset class="filters">
                <input type="search" placeholder="Szukaj">
                <div class="filters__group">
                    <div class="inputSearch">
                        <input type="text" name="" id="searchVoiviodeships" placeholder="Województwo" class="inputSearch__header">
                        <ul class="inputSearch__list" id="searchVoiviodeshipsField">
                        </ul>
                    </div>
                    <div class="inputSearch">
                        <input type="text" name="" id="searchVoiviodeships" placeholder="Miasto" class="inputSearch__header">
                        <ul class="inputSearch__list" id="searchVoiviodeshipsField">
                        </ul>
                    </div>
                    <div class="inputSearch">
                        <input type="text" name="" id="searchVoiviodeships" placeholder="Handlowiec" class="inputSearch__header">
                        <ul class="inputSearch__list" id="searchVoiviodeshipsField">
                        </ul>
                    </div>
                </div>
                <input type="button" class="button button--default button--medium" value="Dodaj">
            </fieldset>
            <form class="form" method="POST" action="">
                <label for="name">Nazwa</label>
                <input requiredd id="name" name="name" type="text">
                <label for="voivodeship">Województwo</label>
                <input requiredd id="voivodeship" name="voivodeship" type="text">
                <label for="city">Miasto</label>
                <input type="text" name="city" id="city">
                <label for="zip_code">Kod pocztowy</label>
                <input type="text" name="zip_code" id="zip_cdoe">
                <label for="street_name">Ulica</label>
                <input type="text" name="street_name" id="street_name">
                <label for="street_number">Nr. Ulicy</label>
                <input type="text" name="street_number" id="street_number">
                <label for="apartment_number">Nr. lokalu</label>
                <input type="text" name="apartment_number" id="apartment_number">
                <label for="latitude">Szerokość Geograficzna</label>
                <input type="text" name="latitude" id="latitude">
                <label for="longitude">Długość Geograficzna</label>
                <input type="text" name="longitude" id="longitude">
                <label for="salesman_code">Kod handlowca</label>
                <input type="text" name="salesman_code" id="salesman_code">
                <button class="button button--default button--medium" type="submit">Dodaj</button>
                <?php
                if (isset($errors)) {
                    foreach ($errors as $key => $value) {
                        echo $value . "<br>";
                    }
                }
                ?>
            </form>
        </div>
        <?php require __DIR__ . "/../partials/links.php" ?>
    </nav>
    <main class="mainContent">
        <div class="table">
            <ul class="table__header table__row">
                <li class="table__cell">ID</li>
                <li class="table__cell">Nazwa</li>
                <li class="table__cell">Województwo</li>
                <li class="table__cell">Miasto</li>
                <li class="table__cell">Kod pocztowy</li>
                <li class="table__cell">Ulica</li>
                <li class="table__cell">Nr. Ulicy</li>
                <li class="table__cell">Nr. lokalu</li>
                <li class="table__cell">Szr. Geogr.</li>
                <li class="table__cell">Dł. Geogr.</li>
                <li class="table__cell">Kod handlowca</li>
                <li class="table__cell">Operacje</li>
            </ul>
            <div class="table__body" id="storesTable">
                <?php
                foreach ($data as $store) {
                ?>
                    <ul class="table__row">
                        <li class="table__cell"><?= $store["store_id"] ?></li>
                        <li class="table__cell"><?= $store["name"] ?></li>
                        <li class="table__cell"><?= $store["voivodeship"] ?></li>
                        <li class="table__cell"><?= $store["city"] ?></li>
                        <li class="table__cell"><?= $store["zip_code"] ?></li>
                        <li class="table__cell"><?= $store["street_name"] ?></li>
                        <li class="table__cell"><?= $store["street_number"] ?></li>
                        <li class="table__cell"><?= $store["apartment_number"] ?></li>
                        <li class="table__cell"><?= $store["latitude"] ?></li>
                        <li class="table__cell"><?= $store["longitude"] ?></li>
                        <li class="table__cell"><?= $store["salesman_id"] ?></li>
                        <li class="table__cell">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M200-200h50.461l409.463-409.463-50.461-50.461L200-250.461V-200Zm-59.999 59.999v-135.383l527.616-527.384q9.073-8.241 20.036-12.736 10.963-4.495 22.993-4.495 12.029 0 23.307 4.27 11.277 4.269 19.969 13.576l48.846 49.461q9.308 8.692 13.269 20.004 3.962 11.311 3.962 22.622 0 12.065-4.121 23.028-4.12 10.964-13.11 20.037l-527.384 527H140.001Zm620.384-570.153-50.231-50.231 50.231 50.231Zm-126.134 75.903-24.788-25.673 50.461 50.461-25.673-24.788Z" />
                            </svg>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $store["store_id"] ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                                        <path d="M292.309-140.001q-29.923 0-51.115-21.193-21.193-21.192-21.193-51.115V-720h-40v-59.999H360v-35.384h240v35.384h179.999V-720h-40v507.691q0 30.308-21 51.308t-51.308 21H292.309ZM680-720H280v507.691q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462h375.382q4.616 0 8.463-3.846 3.846-3.847 3.846-8.463V-720ZM376.155-280h59.999v-360h-59.999v360Zm147.691 0h59.999v-360h-59.999v360ZM280-720v520-520Z" />
                                    </svg>
                                </button>
                            </form>

                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="pagination">
            <a href="/stores?page=<?= $page_number - 1 ?>" class="pagination__right">&lt;</a>
            <div class="pagionation_previousOne"><?= $page_number - 2 ?></div>
            <div class="pagionation_previousTwo"><?= $page_number - 1 ?></div>
            <div class="pagination__current"><?= $page_number ?></div>
            <div class="pagination_nextOne"><?= $page_number + 1 ?></div>
            <div class="pagination_nextTwo"><?= $page_number + 2 ?></div>
            <a href="/stores?page=<?= $page_number + 1 ?>" class="pagination__right">&gt;</a>
    </main>
    <script type="module" src="/assets/JS/stores.js" defer></script>
</body>

</html>