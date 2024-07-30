<?php
require __DIR__ . "/partials/head.php";
?>
<main class="mainContent--full mainContent--center-content mainContent--accent-background mainContent--background-gradient">
    <form class="col-6 form form--black  m-3 form--light-background p-2 form--rounded form--light-font-color" method="POST" action="/register">
        <h3 class="form-label--white-font">Rejestracja</h3>
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="salesman_id" value="<?= $salesmanData[0]["salesman_id"] ?? "" ?>">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="car_id">Email</label>
                <input class="form-control" type="text" name="car_id" id="car_id" value="<?= $salesmanData[0]["car_id"] ?? "" ?>">

                <?php displayErrors($errors["car_id"] ?? []); ?>

            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="name">Imię</label>
                <input class="form-control" id="name" name="name" type="text" value="<?= $salesmanData[0]["name"] ?? "" ?>">
                <?php displayErrors($errors["name"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="surname">Nazwisko</label>
                <input class="form-control" id="surname" name="surname" type="text" value="<?= $salesmanData[0]["surname"] ?? "" ?>">
                <!-- <p class="form__error"> <?= $errors["surname"] ?? "" ?> </p> -->

                <?php displayErrors($errors["surname"] ?? []); ?>

            </div>
        </div>

        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="salesman_code">Hasło</label>
                <input class="form-control" type="password" name="salesman_code" id="salesman_code" value="<?= $salesmanData[0]["salesman_code"] ?? "" ?>">

                <?php displayErrors($errors["salesman_code"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="repeatPassword">Powtórz hasło</label>
                <input class="form-control" type="password" name="repeatPassword" id="repeatPassword" value="<?= $salesmanData[0]["color"] ?? "" ?>">

                <?php displayErrors($errors["color"] ?? []); ?>

            </div>
        </div>
        <button class="button button--default button--medium button--shadow" type="submit">Zapisz</button>
    </form>
</main>



</body>

</html>