<?php require __DIR__ . "/../partials/head.php"; ?>

<nav class="mainNavigation">
    <div class="controls">
        <?php
        $title = "Nowy sklep";
        $icon = "store.svg";
        require __DIR__ . "/../partials/heading.php"; ?>
    </div>
    <?php require __DIR__ . "/../partials/links.php" ?>
</nav>
<main class="mainContent container p-3 d-flex">
    <form class="col-5 form form--black" method="POST" action="/stores">
        <div class="mb-2">
            <label class="form-label" for="name">Nazwa</label>
            <input class="form-control" requiredd id="name" name="name" type="text">
        </div>
        <div class="mb-2">
            <label class="form-label" for="voivodeship">Województwo</label>
            <input class="form-control" requiredd id="voivodeship" name="voivodeship" type="text">
        </div>
        <div class="mb-2">
            <label class="form-label" for="city">Miasto</label>
            <input class="form-control" type="text" name="city" id="city">
        </div>
        <div class="mb-2">
            <label class="form-label" for="zip_code">Kod pocztowy</label>
            <input class="form-control" type="text" name="zip_code" id="zip_cdoe">
        </div>
        <div class="mb-2">
            <label class="form-label" for="street_name">Ulica</label>
            <input class="form-control" type="text" name="street_name" id="street_name">
        </div>
        <div class="mb-2">
            <label class="form-label" for="street_number">Nr. Ulicy</label>
            <input class="form-control" type="text" name="street_number" id="street_number">
        </div>
        <div class="mb-2">
            <label class="form-label" for="apartment_number">Nr. lokalu</label>
            <input class="form-control" type="text" name="apartment_number" id="apartment_number">
        </div>
        <div class="mb-2">
            <label class="form-label" for="latitude">Szerokość Geograficzna</label>
            <input class="form-control" type="text" name="latitude" id="latitude">
        </div>
        <div class="mb-2">
            <label class="form-label" for="longitude">Długość Geograficzna</label>
            <input class="form-control" type="text" name="longitude" id="longitude">
        </div>
        <div class="mb-2">
            <label class="form-label" for="salesman_code">Kod handlowca</label>
            <input class="form-control" type="text" name="salesman_code" id="salesman_code">
        </div>
        <button class="button button--default button--medium" type="submit">Dodaj</button>
        <?php
        if (isset($errors)) {
            foreach ($errors as $key => $value) {
                echo $value . "<br>";
            }
        }
        ?>
    </form>
</main>
<script type="module" src="/assets/JS/stores.js" defer></script>
</body>

</html>