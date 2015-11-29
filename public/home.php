<?php
require_once "../includes/initialize.php";
//check_login();
?>

<?php require_once "layouts/user_header.php"; ?>
<?php render('user_nav','home') ?>

    <section>
        <div class="section">

            <p>
            Ide kerulnek a felhasznalok miutan bejelentkeztek<br>

            Itt tudjak az elmentett adataikat megnezni torolni esetleg modositani?<br>

             profiljukat meg tudjak nezni,modositani vagyis profile.php-hez vezeto hivatkozas<br>
             logout...
             </p>
            <h1>CTRL+ALT+L legyen veled!</h1>
            <a href="profile.php">Check my profile</a>

        </div>
    </section>

<?php require_once "layouts/user_footer.php"; ?>