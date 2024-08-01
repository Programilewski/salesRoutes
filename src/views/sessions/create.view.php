<?php
require base_path("/src/views/partials/head.php");
?>
<main class="mainContent--full mainContent--center-content mainContent--accent-background mainContent--background-gradient">
    <form class="col-6 form form--black form--light-background p-2 form--w25 form--mobile--w75 form--rounded form--light-font-color" method="POST" action="/sessions">
        <h3 class="">Login</h3>
        <input type="hidden" name="salesman_id" value="">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="">
                <?php displayErrors($errors['email'] ?? []) ?>
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="password">Hasło</label>
                <input class="form-control" type="password" name="password" id="password" value="">
                <?php displayErrors($errors['password'] ?? []) ?>
            </div>
        </div>
        <button class="button button--default button--medium button--shadow" type="submit">Zapisz</button>
    </form>
</main>



</body>

</html>