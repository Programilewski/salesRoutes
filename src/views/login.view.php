<?php
require __DIR__ . "/partials/head.php";
?>
<main class="mainContent--full mainContent--center-content mainContent--accent-background mainContent--background-gradient">
    <form class="col-6 form form--black form--light-background p-2 form--rounded form--light-font-color" method="POST" action="/login">
        <h3 class="form-label--white-font">Login</h3>
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="salesman_id" value="<?= $salesmanData[0]["salesman_id"] ?? "" ?>">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="color">Email</label>
                <input class="form-control" type="email" name="color" id="color" value="<?= $salesmanData[0]["color"] ?? "" ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label form-label--white-font" for="password">Hasło</label>
                <input class="form-control" type="password" name="password" id="password" value="<?= $salesmanData[0]["color"] ?? "" ?>">
            </div>
        </div>
        <button class="button button--default button--medium button--shadow" type="submit">Zapisz</button>
    </form>
</main>



</body>

</html>