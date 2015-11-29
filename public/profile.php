<?php
require_once "../includes/initialize.php";
//check_login();
?>

<?php require_once "layouts/user_header.php"; ?>
<?php render('user_nav','profile') ?>

<?php if(isset($_GET['edit'])): ?>
    <section>
        <div class="section">

            <a href="index.php">Back to index</a>

        </div>
    </section>
<?php else: ?>
    <section>
        <div class="section">

            <p>
                profil adatok megtekintese es modositasa<br>
                ez a csak egy otlet ha akarod maskepp is hasznalhatod vagy akar uj oldalak is csinalhatsz mint en h pl edit_profile.php
                utobbi modszernel egyszerubb es gyorsabb a hibakereses de tobb a dizajn ismetles
            </p>
            <a href="profile.php?edit" class="btn-large red accent-1">Lets edit my profile</a>

        </div>
    </section>
<?php endif; ?>

<?php require_once "layouts/user_footer.php"; ?>