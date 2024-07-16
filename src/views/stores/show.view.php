<?php require __DIR__ . "/../partials/head.php";
require __DIR__ . "/../partials/sidebar.php";
?>
<main class="mainContent row-grid container p-3 d-flex">
    <form class="col-6 form form--black" method="POST" action="/stores">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="name">Nazwa</label>
                <input class="form-control" required id="name" name="name" type="text" value="<?= $storeData[0]["name"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="voivodeship">Województwo</label>
                <input class="form-control" required id="voivodeship" name="voivodeship" type="text" value="<?= $storeData[0]["voivodeship"] ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="city">Miasto</label>
                <input class="form-control" type="text" name="city" id="city" value="<?= $storeData[0]["city"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="zip_code">Kod pocztowy</label>
                <input class="form-control" type="text" name="zip_code" id="zip_code" value="<?= $storeData[0]["zip_code"] ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="street_name">Ulica</label>
                <input class="form-control" type="text" name="street_name" id="street_name" value="<?= $storeData[0]["street_name"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="street_number">Nr. Ulicy</label>
                <input class="form-control" type="text" name="street_number" id="street_number" value="<?= $storeData[0]["street_number"] ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="apartment_number">Nr. lokalu</label>
                <input class="form-control" type="text" name="apartment_number" id="apartment_number" value="<?= $storeData[0]["apartment_number"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="salesman_code">Kod handlowca</label>
                <input class="form-control" type="text" name="salesman_code" id="salesman_code" value="<?= $storeData[0]["salesman_id"] ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="longitude">Długość Geograficzna</label>
                <input class="form-control" type="text" name="longitude" id="longitude" value="<?= $storeData[0]["longitude"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="latitude">Szerokość Geograficzna</label>
                <input class="form-control" type="text" name="latitude" id="latitude" value="<?= $storeData[0]["latitude"] ?>">
            </div>
        </div>

        <button class="button button--default button--medium" type="submit">Zapisz</button>
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