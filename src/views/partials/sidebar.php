<nav class="mainNavigation justify-between" id="mainNavigation">
    <div class="group">
        <img class="mainNavigation__logo" src="/assets/media/Logo_sales_routes.png" alt="">
        <?php
        require __DIR__ . "/../partials/links.php"; ?>
    </div>
    <div class="group">
        <?php if ($_SESSION["user"] ?? false) : ?>
            <p> <?= $_SESSION["user"]["email"] ?> </p>
            <form action="/sessions" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden">
                <button class="button button--default button--medium button--shadow" type="submit">Wyloguj się</button>
            </form>
        <?php endif; ?>
    </div>
</nav>
<div class="menu__toggler" id="menuToggler">
    <div></div>
    <div></div>
    <div></div>
</div>