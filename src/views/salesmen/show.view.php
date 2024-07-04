<?php require __DIR__ . "/../partials/head.php";
require __DIR__ . "/../partials/sidebar.php";
?>
<main class="mainContent row-grid">
    <form class="col-6 form form--black" method="POST" action="/salesmen">
        <input type="hidden" name="_method" value="PATCH">
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label " for="name">Imię</label>
                <input class="form-control" required id="name" name="name" type="text" value="<?= $salesmanData[0]["name"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="surname">Nazwisko</label>
                <input class="form-control" required id="surname" name="surname" type="text" value="<?= $salesmanData[0]["surname"] ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="car_id">Kod auta</label>
                <input class="form-control" type="text" name="car_id" id="car_id" value="<?= $salesmanData[0]["car_id"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="plates_number">Tablica rejestracyjna</label>
                <input class="form-control" type="text" name="plates_number" id="plates_number" value="<?= $salesmanData[0]["plates_number"] ?>">
            </div>
        </div>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="salesman_code">Kod handlowca</label>
                <input class="form-control" type="text" name="salesman_code" id="salesman_code" value="<?= $salesmanData[0]["salesman_code"] ?>">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="color">Kolor</label>
                <input class="form-control" type="text" name="color" id="color" value="<?= $salesmanData[0]["color"] ?>">
            </div>
        </div>
        <h3 class="form__subtitle">Adres domowy</h3>
        <div class="row form--w100 d-flex row-flex g-1">
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="salesman_code">Szerokość geograficzna</label>
                <input class="form-control" type="text" name="salesman_code" id="salesman_code" value="52.111">
            </div>
            <div class="column-flex form__inputContainer align-start">
                <label class="form-label" for="color">Długość geograficzna</label>
                <input class="form-control" type="text" name="color" id="color" value="11.222">
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


</body>

</html>