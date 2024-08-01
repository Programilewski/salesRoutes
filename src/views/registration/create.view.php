<?php
require __DIR__ . "/../partials/head.php";
?>
<main class="mainContent--full mainContent--center-content mainContent--accent-background mainContent--background-gradient">
    <form class="col-6 form form--black form--w25 form--mobile--w75 m-3 form--light-background p-2 form--rounded form--light-font-color" method="POST" action="/register">
        <h3 class="">Rejestracja</h3>
        <input type="hidden" name="salesman_id" value="<?= $salesmanData[0]["salesman_id"] ?? "" ?>">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="">

                <?php displayErrors($errors["email"] ?? []); ?>

            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="name">Imię</label>
                <input class="form-control" id="name" name="name" type="text" value="<?= $salesmanData[0]["name"] ?? "" ?>">
                <?php displayErrors($errors["name"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="surname">Nazwisko</label>
                <input class="form-control" id="surname" name="surname" type="text" value="<?= $salesmanData[0]["surname"] ?? "" ?>">
                <?php displayErrors($errors["surname"] ?? []); ?>

            </div>
        </div>

        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="password">Hasło</label>
                <input class="form-control" type="password" name="password" id="password" value="">
                <?php displayErrors($errors["password"] ?? []); ?>

            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="repeated_password">Powtórz hasło</label>
                <input class="form-control" type="password" name="repeated_password" id="repeated_password" value="">
                <?php displayErrors($errors["repeated_password"] ?? []); ?>

            </div>
        </div>
        <button class="button button--default button--medium button--shadow" type="submit">Zapisz</button>
    </form>
</main>



</body>

</html>