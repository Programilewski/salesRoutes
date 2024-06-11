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
    <form class="form form--w100 form--white" style="color:black" method="POST" action="">
        <label for="name">Imię</label>
        <input requiredd id="name" name="name" type="text">
        <label for="surname">Nazwisko</label>
        <input requiredd id="surname" name="surname" type="text">
        <label for="car_id">Id auta</label>
        <input requiredd id="car_id" name="car_id" type="number">
        <label for="plates_number">Nr. Tablic rejestracyjnych</label>
        <input requiredd id="plates_number" name="plates_number" type="text">
        <label for="salesman_code">Kod handlowca</label>
        <input requiredd id="salesman_code" name="salesman_code" type="text">
        <label for="color">Kolor</label>
        <input requiredd type="color" name="color" id="color">
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