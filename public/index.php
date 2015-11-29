<?php
require_once "../includes/initialize.php";
?>

<?php require_once "layouts/user_header.php"; ?>
<?php render('user_nav','index') ?>

<section>
    <div class="section">
        <p>
            Ez a lap lenne az a lap amelyen talalhato a link a google play-storera illetve hat a bemutatkozo oldalunk
            elviekben ugye o kellene h legyen a legszebb lap ami csak elkeszul mivel az o feladata lenne h rabaszelje
            a felhasznalokat a hasznalatra<br>
            alkalmazas bemutatasa akar kep illusztraciokkal<br>
            figyelmedbe ajanlom a materialize weblapjan levo javascript reszleget


        </p>

        <!--
        Amennyiben ugy dontesz h hasznalod a materialize css-t
        kovetned kell a material design alap elveit a megrtesehez
        amik a kovetkezok lennenek nagyvonalakban
        a kodolast tekintve:

            Probalkozz az egyszerusegre es arra hogy olyan feluletet teremts amit egyszeru hasznalni
            Ajanlott csak 2-3 szint hasznalni
            1 - alap szin pl mint nalam a feher
            2 - fo szin pl mint nalam a kek
            3 - a fo muveletekre szemet felhivo szin ( :D )
            igyekezz a fo szint hasznalni es annak az arnyalatait (accent- 1 2 3)
            elvileg ajanlott hogy
                    accent-3 legyen a fenti header resz
                    accent-2 tartalomnal
            Feketet tilos hanszalni! Fekete helyett szurket kell.
            Tovabbi infot tudod mar hol keresd

        -->
        <h1>Look at my source bro!</h1>

        <a href="home.php" class="btn-flat">Login</a>
    </div>
</section>

<?php require_once "layouts/user_footer.php"; ?>
