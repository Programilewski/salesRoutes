<?php require __DIR__ . "/../partials/head.php"; ?>

<nav class="mainNavigation">
    <?php
    $title = "Salony optyczne";
    $icon = "store.svg";
    require __DIR__ . "/../partials/heading.php"; ?>

    <?php require __DIR__ . "/../partials/links.php" ?>
</nav>
<main class="mainContent container">
    <div class="row-flex justify-between align-end">
        <div class="searchResults">
            <?= isset($_GET["search"]) === true ? "Wyniki wyszukiwania dla: " . "<b>" . $_GET["search"] . "</b>" : "" ?>
        </div>
        <div class="row-flex align-end m-1">
            <fieldset class="filters row-flex  justify-end">
                <div class="inputSearch" id="salesmanFilter">
                    <div class="inputSearch__badge"><?= $_GET["salesman_name"] ?? "" ?>
                        <?php if (isset($_GET["salesman_id"])) { ?>
                            <a href="<?= buildQuery("/stores", [], true, ["salesman_id", "salesman_name"]) ?>"><svg xmlns="http://www.w3.org/2000/svg" height="12px" viewBox="0 -960 960 960" width="12px" fill="#000000">
                                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                                </svg></a>
                        <?php } ?>
                    </div>
                    <input type="text" name="" id="searchSalesman" placeholder="Handlowiec" class="inputSearch__header">
                    <ul class="inputSearch__list" id="searchSalesmanField">
                        <?php
                        foreach ($salesmen as $salesman) {
                            echo '<li><a href="' . buildQuery("/stores", ["salesman_id" => $salesman["salesman_code"], "salesman_name" => $salesman["name"]], false) . '">' . $salesman["name"] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="inputSearch" id="citiesFilter">
                    <div class="inputSearch__badge"><?= $_GET["city"] ?? "" ?>
                        <?php if (isset($_GET["city"])) { ?>
                            <a href="<?= buildQuery("/stores", [], true, ["city"]) ?>"><svg xmlns="http://www.w3.org/2000/svg" height="12px" viewBox="0 -960 960 960" width="12px" fill="#000000">
                                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                                </svg></a>
                        <?php } ?>
                    </div>
                    <input type="text" name="searchCities" id="searchCities" placeholder="<?php echo $_GET["city"] ?? "Miasto" ?>" class="inputSearch__header">
                    <ul class="inputSearch__list" id="searchCitiesField">
                        <?php
                        foreach ($cities as $city) {
                            echo '<li><a href="' . buildQuery("/stores", ["city" => $city["city"]], false) . '">' . $city["city"] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <form action="#" method="GET">
                    <input type="search" name="search" id="search">
                    <?php
                    foreach ($_GET as $key => $value) {
                        if ($key !== "search") {
                            echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
                        }
                    }
                    ?>
                </form>
            </fieldset>
            <div class="pagination col-2 row-flex ph-1">
                <p>Rows per page:</p>
                <form action="" id="rows_per_page_form">
                    <select name="rows_per_page" id="rows_per_page">
                        <option <?= $stores_per_page == 10 ? "selected" : "" ?> value="10">10</option>
                        <option <?= $stores_per_page == 20 ? "selected" : "" ?> value="20">20</option>
                        <option <?= $stores_per_page == 30 ? "selected" : "" ?> value="30">30</option>
                        <option <?= $stores_per_page == 50 ? "selected" : "" ?> value="50">50</option>
                    </select>
                    <?php
                    foreach ($_GET as $key => $value) {
                        if ($key !== "rows_per_page") {
                            echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
                        }
                    }
                    ?>
                </form>
                <p><?= ($page_number - 1) * $stores_per_page + 1 ?>-<?php
                                                                    if ($rows_number < $page_number * $stores_per_page) {
                                                                        echo $rows_number . "  ";
                                                                    } else {
                                                                        echo $page_number * $stores_per_page;
                                                                    }
                                                                    ?> z <?= $rows_number
                                                                            ?></p>
                <?php
                if ($page_number == 1) {
                    echo '<a href="#" class="pagination__left pagination__disabled">&lt;</a>';
                } else {
                    echo "<a href='" . buildQuery("/stores", ["page" => $page_number - 1]) . "' class='pagination__left '>&lt;</a>";
                }
                ?>
                <div class="pagination__current"><?= $page_number ?></div>
                <a href="<?= buildQuery("/stores", ["page" => $page_number + 1]) ?>" class="pagination__right">&gt;</a>

            </div>
        </div>

    </div>

    <div class="table col-12">
        <ul class="table__header table__row">
            <li class="table__cell"><a href="<?= buildQuery("/stores", ["orderby" => "store_id", "order" => $asc_or_desc]) ?>">ID <img src="<?php echo ($orderBy == "store_id") ? '/assets/media/arrow_' . $asc_or_desc : '/assets/media/arrow_DESC'; ?>.svg" alt=""> </a></li>
            <li class="table__cell"><a href="<?= buildQuery("/stores", ["orderby" => "name", "order" => $asc_or_desc]) ?>">name <img src="<?php echo ($orderBy == "name") ? '/assets/media/arrow_' . $asc_or_desc : '/assets/media/arrow_DESC'; ?>.svg" alt=""> </a></li>
            <li class="table__cell"><a href="<?= buildQuery("/stores", ["orderby" => "city", "order" => $asc_or_desc]) ?>">City <img src="<?php echo ($orderBy == "city") ? '/assets/media/arrow_' . $asc_or_desc : '/assets/media/arrow_DESC'; ?>.svg" alt=""> </a></li>
            <li class="table__cell"><a href="<?= buildQuery("/stores", ["orderby" => "zip_code", "order" => $asc_or_desc]) ?>">Kod pocztowy <img src="<?php echo ($orderBy == "zip_code") ? '/assets/media/arrow_' . $asc_or_desc : '/assets/media/arrow_DESC'; ?>.svg" alt=""> </a></li>
            <li class="table__cell"><a href="<?= buildQuery("/stores", ["orderby" => "street_name", "order" => $asc_or_desc]) ?>">Ulica <img src="<?php echo ($orderBy == "street_name") ? '/assets/media/arrow_' . $asc_or_desc : '/assets/media/arrow_DESC'; ?>.svg" alt=""> </a></li>
            <li class="table__cell"><a href="<?= buildQuery("/stores", ["orderby" => "salesman_id", "order" => $asc_or_desc]) ?>">Kod handlowca <img src="<?php echo ($orderBy == "salesman_id") ? '/assets/media/arrow_' . $asc_or_desc : '/assets/media/arrow_DESC'; ?>.svg" alt=""> </a></li>
            <li class="table__cell">Operacje</li>
        </ul>
        <div class="table__body" id="storesTable">
            <?php
            foreach ($data as $store) {
            ?>
                <ul class="table__row">
                    <li class="table__cell"><?= $store["store_id"] ?></li>
                    <li class="table__cell"><?= $store["name"] ?></li>
                    <li class="table__cell"><?= $store["city"] ?></li>
                    <li class="table__cell"><?= $store["zip_code"] ?></li>
                    <li class="table__cell">
                        <?php
                        echo $store["apartment_number"] != null ? $store["street_name"] . " " . $store["street_number"] . "/" . $store["apartment_number"] : $store["street_name"] . " " . $store["street_number"];
                        ?></li>
                    <li class="table__cell"><?= $store["salesman_id"] ?></li>
                    <li class="table__cell">
                        <a href="/?latitude=<?= $store["latitude"] ?>&longitude=<?= $store["longitude"] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z" />
                            </svg>
                        </a>
                        <a href="/stores/edit?store_id=<?= $store["store_id"] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M200-200h50.461l409.463-409.463-50.461-50.461L200-250.461V-200Zm-59.999 59.999v-135.383l527.616-527.384q9.073-8.241 20.036-12.736 10.963-4.495 22.993-4.495 12.029 0 23.307 4.27 11.277 4.269 19.969 13.576l48.846 49.461q9.308 8.692 13.269 20.004 3.962 11.311 3.962 22.622 0 12.065-4.121 23.028-4.12 10.964-13.11 20.037l-527.384 527H140.001Zm620.384-570.153-50.231-50.231 50.231 50.231Zm-126.134 75.903-24.788-25.673 50.461 50.461-25.673-24.788Z" />
                            </svg>
                        </a>
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


</main>
<script type="module" src="/assets/JS/stores.js" defer></script>
</body>

</html>