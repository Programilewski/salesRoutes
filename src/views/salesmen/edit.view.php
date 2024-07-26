<?php require __DIR__ . "/../partials/head.php";
require __DIR__ . "/../partials/sidebar.php";
?>
<?php //dd($salesmanData)
?>
<main class="mainContent row-grid">
    <form class="col-6 form form--black" method="POST" action="/salesmen">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="salesman_id" value="<?= $salesmanData[0]["salesman_id"] ?? "" ?>">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="name">Imię</label>
                <input class="form-control" id="name" name="name" type="text" value="<?= $salesmanData[0]["name"] ?? "" ?>">
                <?php displayErrors($errors["name"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="surname">Nazwisko</label>
                <input class="form-control" id="surname" name="surname" type="text" value="<?= $salesmanData[0]["surname"] ?? "" ?>">
                <!-- <p class="form__error"> <?= $errors["surname"] ?? "" ?> </p> -->

                <?php displayErrors($errors["surname"] ?? []); ?>

            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="car_id">Kod auta</label>
                <input class="form-control" type="text" name="car_id" id="car_id" value="<?= $salesmanData[0]["car_id"] ?? "" ?>">

                <?php displayErrors($errors["car_id"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="plates_number">Tablica rejestracyjna</label>
                <input class="form-control" type="text" name="plates_number" id="plates_number" value="<?= $salesmanData[0]["plates_number"] ?? "" ?>">

                <?php displayErrors($errors["plates_number"] ?? []); ?>

            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="salesman_code">Kod handlowca</label>
                <input class="form-control" type="text" name="salesman_code" id="salesman_code" value="<?= $salesmanData[0]["salesman_code"] ?? "" ?>">

                <?php displayErrors($errors["salesman_code"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="color">Kolor</label>
                <input class="form-control" type="text" name="color" id="color" value="<?= $salesmanData[0]["color"] ?? "" ?>">

                <?php displayErrors($errors["color"] ?? []); ?>

            </div>
        </div>
        <button class="button button--default button--medium" type="submit">Zapisz</button>
    </form>
</main>


</body>

</html>