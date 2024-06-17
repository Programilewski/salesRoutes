<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Do</title>
    <link rel="stylesheet" href="/assets/CSS/reset.css">
    <link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/CSS/main.css">
    <link rel="stylesheet" href="/assets/CSS/typography.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>

<body>
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
        <form class="col-5 form form--black" method="POST" action="/salesmen">
            <input type="hidden" name="_method" value="PATCH">
            <div class="mb-2 column-flex align-start form--w25">
                <label class="form-label " for="name">Imię</label>
                <input class="form-control" required id="name" name="name" type="text" value="<?= $salesmanData[0]["name"] ?>">
            </div>
            <div class="mb-2 form--w25 column-flex align-start">
                <label class="form-label" for="surname">Nazwisko</label>
                <input class="form-control" required id="surname" name="surname" type="text" value="<?= $salesmanData[0]["surname"] ?>">
            </div>
            <div class="mb-2 form--w25 column-flex align-start">
                <label class="form-label" for="car_id">Kod auta</label>
                <input class="form-control" type="text" name="car_id" id="car_id" value="<?= $salesmanData[0]["car_id"] ?>">
            </div>
            <div class="mb-2 form--w25 column-flex align-start">
                <label class="form-label" for="plates_number">Tablica rejestracyjna</label>
                <input class="form-control" type="text" name="plates_number" id="plates_number" value="<?= $salesmanData[0]["plates_number"] ?>">
            </div>
            <div class="mb-2 form--w25 column-flex align-start">
                <label class="form-label" for="salesman_code">Kod handlowca</label>
                <input class="form-control" type="text" name="salesman_code" id="salesman_code" value="<?= $salesmanData[0]["salesman_code"] ?>">
            </div>
            <div class="mb-2 form--w25 column-flex align-start">
                <label class="form-label" for="color">Kolor</label>
                <input class="form-control" type="text" name="color" id="color" value="<?= $salesmanData[0]["color"] ?>">
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