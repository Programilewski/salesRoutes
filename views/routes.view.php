<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Do</title>
    <link rel="stylesheet" href="/dist/CSS/reset.css">
    <link rel="stylesheet" href="/dist/CSS/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dist/CSS/main.css">
    <link rel="stylesheet" href="/dist/CSS/typography.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>

<body>
    <nav class="mainNavigation">
        <div class="controls">
            <div class="captionedIcon captionedIcon--vertical">
                <svg class="captionedIcon__icon" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M824.153-520.269v315.538q0 28.437-19.916 48.353-19.915 19.916-48.353 19.916H204.539q-28.438 0-48.353-19.916-19.916-19.916-19.916-48.353v-316.308q-25.269-18.23-36.827-50.574-11.558-32.343.058-68.464l39.638-129.821q7.929-24.491 26.9-39.469 18.97-14.979 45.326-14.979h537.006q26.179 0 45.096 14.212 18.917 14.211 27.268 39.478l40.187 130.579q11.616 36.192.058 68.423t-36.827 51.385Zm-257.207-27.307q33.631 0 49.978-20.039 16.346-20.038 13.346-43.038l-24-157.732h-98.078v157.193q0 25.654 17.297 44.635 17.297 18.981 41.457 18.981Zm-177.563 0q27.883 0 45.366-18.981 17.482-18.981 17.482-44.635v-157.193h-98.078l-23.808 159.27q-2.923 20.808 13.539 41.173 16.462 20.366 45.499 20.366Zm-175.537 0q22.847 0 38.943-15.783 16.096-15.783 19.865-39.487l24.039-165.539h-87.347q-6.539 0-10.481 2.884-3.943 2.885-5.674 8.655L154.23-627.5q-8.731 28.5 7.615 54.212 16.347 25.712 52.001 25.712Zm532.731 0q32.462 0 50.904-24.539 18.443-24.539 8.712-55.385l-39.961-130.115q-1.924-5.77-5.866-8.27-3.943-2.5-10.289-2.5h-86.155l23.81 165.539q3.806 23.462 19.902 39.366 16.097 15.904 38.943 15.904ZM204.539-192.422h551.345q5.385 0 8.847-3.462 3.462-3.462 3.462-8.847v-290.116q-6.231 2.077-11.327 2.654-5.097.577-10.295.577-26.69 0-46.954-9.769-20.264-9.77-38.77-31.308-16.193 18.769-39.034 29.923-22.842 11.154-52.124 11.154-25.189 0-47.17-10.577-21.98-10.577-41.904-30.5-18.538 19.923-42 30.5-23.461 10.577-46.775 10.577-26.225 0-49.917-9.404t-41.692-31.673q-25.847 25.846-46.654 33.462-20.808 7.615-39.717 7.615-5.278 0-10.8-.577-5.522-.577-10.83-2.654v290.116q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462Zm551.345 0H204.539 755.884Z" />
                </svg>
                <h3 class="captionedIcon__title">Salony optyczne</h3>
            </div>
            <fieldset class="filters">
                <input type="search" placeholder="Szukaj">
                <div class="filters__group">
                    <fieldset class="radioInputGroup row">
                        <legend>Zapłon</legend>
                        <div class="radioInputGroup__inputContainer">
                            <input type="radio" id="115693" name="salesman" value="115693" checked="">
                            <label for="115693" aria-carid="115693">Tak</label>
                        </div>
                        <div class="radioInputGroup__inputContainer">
                            <input type="radio" id="96751" name="salesman" value="96751" checked="">
                            <label for="96751" aria-carid="96751">Nie</label>
                        </div>
                        <div class="radioInputGroup__inputContainer">
                            <input type="radio" id="89718" name="salesman" value="89718" checked="">
                            <label for="89718" aria-carid="89718">Oba</label>
                        </div>
                    </fieldset>
                    <div class="inputSearch">
                        <input type="text" name="" id="searchVoiviodeships" placeholder="ID auta" class="inputSearch__header">
                        <ul class="inputSearch__list" id="searchVoiviodeshipsField">
                        </ul>
                    </div>
                    <div class="inputSearch">
                        <label for=""></label>
                        <input type="range" name="" id="searchVoiviodeships" placeholder="Handlowiec" class="inputSearch__header">
                        </ul>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="links">
            <a href="/" class="links__item">

                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h240v-560H200v560Zm320 0h240v-280H520v280Zm0-360h240v-200H520v200Z" />
                </svg>
                Panel
            </a>
            <a href="/salesmen" class="links__item">
                <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M240.92-268.31q51-37.84 111.12-59.77Q412.15-350 480-350t127.96 21.92q60.12 21.93 111.12 59.77 37.3-41 59.11-94.92Q800-417.15 800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 62.85 21.81 116.77 21.81 53.92 59.11 94.92ZM480.01-450q-54.78 0-92.39-37.6Q350-525.21 350-579.99t37.6-92.39Q425.21-710 479.99-710t92.39 37.6Q610-634.79 610-580.01t-37.6 92.39Q534.79-450 480.01-450ZM480-100q-79.15 0-148.5-29.77t-120.65-81.08q-51.31-51.3-81.08-120.65Q100-400.85 100-480t29.77-148.5q29.77-69.35 81.08-120.65 51.3-51.31 120.65-81.08Q400.85-860 480-860t148.5 29.77q69.35 29.77 120.65 81.08 51.31 51.3 81.08 120.65Q860-559.15 860-480t-29.77 148.5q-29.77 69.35-81.08 120.65-51.3 51.31-120.65 81.08Q559.15-100 480-100Zm0-60q54.15 0 104.42-17.42 50.27-17.43 89.27-48.73-39-30.16-88.11-47Q536.46-290 480-290t-105.77 16.65q-49.31 16.66-87.92 47.2 39 31.3 89.27 48.73Q425.85-160 480-160Zm0-350q29.85 0 49.92-20.08Q550-550.15 550-580t-20.08-49.92Q509.85-650 480-650t-49.92 20.08Q410-609.85 410-580t20.08 49.92Q450.15-510 480-510Zm0-70Zm0 355Z" />
                </svg>
                Handlowcy
            </a>
            <a href="/routes" class="links__item">

                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M120-240q-33 0-56.5-23.5T40-320q0-33 23.5-56.5T120-400h10.5q4.5 0 9.5 2l182-182q-2-5-2-9.5V-600q0-33 23.5-56.5T400-680q33 0 56.5 23.5T480-600q0 2-2 20l102 102q5-2 9.5-2h21q4.5 0 9.5 2l142-142q-2-5-2-9.5V-640q0-33 23.5-56.5T840-720q33 0 56.5 23.5T920-640q0 33-23.5 56.5T840-560h-10.5q-4.5 0-9.5-2L678-420q2 5 2 9.5v10.5q0 33-23.5 56.5T600-320q-33 0-56.5-23.5T520-400v-10.5q0-4.5 2-9.5L420-522q-5 2-9.5 2H400q-2 0-20-2L198-340q2 5 2 9.5v10.5q0 33-23.5 56.5T120-240Z" />
                </svg>
                Ścieżki
            </a>
            <a href="/stores" class="links__item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M824.153-520.269v315.538q0 28.437-19.916 48.353-19.915 19.916-48.353 19.916H204.539q-28.438 0-48.353-19.916-19.916-19.916-19.916-48.353v-316.308q-25.269-18.23-36.827-50.574-11.558-32.343.058-68.464l39.638-129.821q7.929-24.491 26.9-39.469 18.97-14.979 45.326-14.979h537.006q26.179 0 45.096 14.212 18.917 14.211 27.268 39.478l40.187 130.579q11.616 36.192.058 68.423t-36.827 51.385Zm-257.207-27.307q33.631 0 49.978-20.039 16.346-20.038 13.346-43.038l-24-157.732h-98.078v157.193q0 25.654 17.297 44.635 17.297 18.981 41.457 18.981Zm-177.563 0q27.883 0 45.366-18.981 17.482-18.981 17.482-44.635v-157.193h-98.078l-23.808 159.27q-2.923 20.808 13.539 41.173 16.462 20.366 45.499 20.366Zm-175.537 0q22.847 0 38.943-15.783 16.096-15.783 19.865-39.487l24.039-165.539h-87.347q-6.539 0-10.481 2.884-3.943 2.885-5.674 8.655L154.23-627.5q-8.731 28.5 7.615 54.212 16.347 25.712 52.001 25.712Zm532.731 0q32.462 0 50.904-24.539 18.443-24.539 8.712-55.385l-39.961-130.115q-1.924-5.77-5.866-8.27-3.943-2.5-10.289-2.5h-86.155l23.81 165.539q3.806 23.462 19.902 39.366 16.097 15.904 38.943 15.904ZM204.539-192.422h551.345q5.385 0 8.847-3.462 3.462-3.462 3.462-8.847v-290.116q-6.231 2.077-11.327 2.654-5.097.577-10.295.577-26.69 0-46.954-9.769-20.264-9.77-38.77-31.308-16.193 18.769-39.034 29.923-22.842 11.154-52.124 11.154-25.189 0-47.17-10.577-21.98-10.577-41.904-30.5-18.538 19.923-42 30.5-23.461 10.577-46.775 10.577-26.225 0-49.917-9.404t-41.692-31.673q-25.847 25.846-46.654 33.462-20.808 7.615-39.717 7.615-5.278 0-10.8-.577-5.522-.577-10.83-2.654v290.116q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462Zm551.345 0H204.539 755.884Z" />
                </svg>
                Salony
            </a>
        </div>
    </nav>
    <main class="mainContent">
        <div class="table">
            <ul class="table__header table__row">
                <li class="table__cell">ID</li>
                <li class="table__cell">ID auta</li>
                <li class="table__cell">Zapłon</li>
                <li class="table__cell">Prędkość</li>
                <li class="table__cell">Szr. Geogr.</li>
                <li class="table__cell">Dł. Geogr.</li>
                <li class="table__cell">Data wystąpienia</li>
                <li class="table__cell">Operacje</li>
            </ul>
            <div class="table__body">
                <ul class="table__row">
                    <li class="table__cell">1</li>
                    <li class="table__cell">88096</li>
                    <li class="table__cell">Tak</li>
                    <li class="table__cell">25</li>
                    <li class="table__cell">51.137817</li>
                    <li class="table__cell">16.887756</li>
                    <li class="table__cell">16 Kwietnia 2024 8:40:27</li>
                    <li class="table__cell">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="m600-120-240-84-186 72q-20 8-37-4.5T120-170v-560q0-13 7.5-23t20.5-15l212-72 240 84 186-72q20-8 37 4.5t17 33.5v560q0 13-7.5 23T812-192l-212 72Zm-40-98v-468l-160-56v468l160 56Zm80 0 120-40v-474l-120 46v468Zm-440-10 120-46v-468l-120 40v474Zm440-458v468-468Zm-320-56v468-468Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M200-200h50.461l409.463-409.463-50.461-50.461L200-250.461V-200Zm-59.999 59.999v-135.383l527.616-527.384q9.073-8.241 20.036-12.736 10.963-4.495 22.993-4.495 12.029 0 23.307 4.27 11.277 4.269 19.969 13.576l48.846 49.461q9.308 8.692 13.269 20.004 3.962 11.311 3.962 22.622 0 12.065-4.121 23.028-4.12 10.964-13.11 20.037l-527.384 527H140.001Zm620.384-570.153-50.231-50.231 50.231 50.231Zm-126.134 75.903-24.788-25.673 50.461 50.461-25.673-24.788Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M292.309-140.001q-29.923 0-51.115-21.193-21.193-21.192-21.193-51.115V-720h-40v-59.999H360v-35.384h240v35.384h179.999V-720h-40v507.691q0 30.308-21 51.308t-51.308 21H292.309ZM680-720H280v507.691q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462h375.382q4.616 0 8.463-3.846 3.846-3.847 3.846-8.463V-720ZM376.155-280h59.999v-360h-59.999v360Zm147.691 0h59.999v-360h-59.999v360ZM280-720v520-520Z" />
                        </svg>
                    </li>
                </ul>

            </div>
        </div>
    </main>

    <script src="dist/JS/app.js" defer></script>
</body>

</html>