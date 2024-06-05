<?php require __DIR__ . "/../partials/head.php"; ?>

<nav class="mainNavigation">
    <div class="controls">
        <?php
        $title = "Salony optyczne";
        $icon = "store.svg";
        require __DIR__ . "/../partials/heading.php"; ?>
        <fieldset class="filters">
            <input type="search" placeholder="Szukaj">
            <div class="filters__group" data-bs-theme="dark">
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
            <!-- <input type="button" class="button button--default button--medium" value="Dodaj"> -->
            <a class="button button--default button--medium" href="/stores/new">Dodaj</a>
        </fieldset>

    </div>
    <?php require __DIR__ . "/../partials/links.php" ?>
</nav>
<main class="mainContent container">
    <div class="row-flex justify-end">
        <div class="pagination col-2">

            <p>Rows per page:</p>
            <p><?= $stores_per_page ?></p>
            <p></p>

            <?php
            if ($page_number == 1) {
                echo '<a href="#" class="pagination__left pagination__disabled">&lt;</a>';
            } else {
                echo '<a href="?page=' . $page_number - 1 . '" class="pagination__left ">&lt;</a>';
            }
            ?>
            <div class="pagination__current"><?= $page_number ?></div>
            <a href="/stores?page=<?= $page_number + 1 ?>" class="pagination__right">&gt;</a>

        </div>
    </div>
    <div class="row">
        <div class="table col-12">
            <ul class="table__header table__row">
                <li class="table__cell">ID</li>
                <li class="table__cell">Nazwa</li>
                <li class="table__cell">Miasto</li>
                <li class="table__cell">Kod pocztowy</li>
                <li class="table__cell">Ulica</li>
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
                        <li class="table__cell"><?= $store["city"] ?></li>
                        <li class="table__cell"><?= $store["zip_code"] ?></li>
                        <li class="table__cell">
                            <?php
                            echo $store["apartment_number"] != null ? $store["street_name"] . " " . $store["street_number"] . "/" . $store["apartment_number"] : $store["street_name"] . " " . $store["street_number"];
                            ?></li>
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
    </div>

</main>
<script type="module" src="/assets/JS/stores.js" defer></script>
</body>

</html>