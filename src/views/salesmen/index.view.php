<?php require __DIR__ . "/../partials/head.php"; ?>
<nav class="mainNavigation">

    <?php
    $title = "Handlowcy";
    $icon = "person.svg";
    require __DIR__ . "/../partials/heading.php"; ?>
    <?php require __DIR__ . "/../partials/links.php" ?>
</nav>
<main class="mainContent">

    <div class="table">
        <ul class="table__header table__row">
            <li class="table__cell">ID</li>
            <li class="table__cell">Imię</li>
            <li class="table__cell">Nazwisko</li>
            <li class="table__cell">Kody aut</li>
            <li class="table__cell">Tablica rejestracyjna</li>
            <li class="table__cell">Kod handlowca</li>
            <li class="table__cell">Kolor</li>
            <li class="table__cell">Operacje</li>
        </ul>
        <div class="table__body" id="salesmen_table">
            <?php
            foreach ($data as $salesman) {
            ?>
                <ul class="table__row">
                    <li class="table__cell"><?= $salesman["salesman_id"] ?></li>
                    <li class="table__cell"><?= htmlspecialchars($salesman["name"]) ?></li>
                    <li class="table__cell"><?= $salesman["surname"] ?></li>
                    <li class="table__cell"><?= $salesman["car_id"] ?></li>
                    <li class="table__cell"><?= $salesman["plates_number"] ?></li>
                    <li class="table__cell"><?= $salesman["salesman_code"] ?></li>
                    <li class="table__cell"><input type="color" value='#<?= $salesman["color"] ?>' disabled></li>
                    <li class="table__cell">

                        <a href="<?= "/salesmen/edit?salesman_id=" . $salesman['salesman_id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M200-200h50.461l409.463-409.463-50.461-50.461L200-250.461V-200Zm-59.999 59.999v-135.383l527.616-527.384q9.073-8.241 20.036-12.736 10.963-4.495 22.993-4.495 12.029 0 23.307 4.27 11.277 4.269 19.969 13.576l48.846 49.461q9.308 8.692 13.269 20.004 3.962 11.311 3.962 22.622 0 12.065-4.121 23.028-4.12 10.964-13.11 20.037l-527.384 527H140.001Zm620.384-570.153-50.231-50.231 50.231 50.231Zm-126.134 75.903-24.788-25.673 50.461 50.461-25.673-24.788Z" />
                            </svg>
                        </a>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $salesman["salesman_id"] ?>">
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

</body>

</html>