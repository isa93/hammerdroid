<?php
require_once "../includes/initialize.php";

$title = "Team";
$keywords = "team,hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'team');
render('user_nav', 'team');
?>
<?= isset($message) ? output_user_message($message) : null; ?>
<style type="text/css">
    tr td img{
        border-radius: 15px;
        box-shadow: rgba(128, 128, 128, 1) 0 0 10px;
    }
    .details td{
        border-radius: 15px;
        box-shadow: rgba(128, 128, 128, 1) 0 0 5px 1px;
    }
</style>
<div id="pic">
    <table  width="1000" align="center" border="0" cellspacing="15" >
        <tr>
            <td width="250" align="center" class="fadeInUp">
                <img src="images/Dani.JPG" alt="Dani" title="Dani" width="250" height="366"/>
            </td>
            <td width="250"  align="center" class="fadeInUp">
                <img src="images/Daniel.jpg" alt="Daniel" title="Daniel" width="250" height="366" />
            </td>
        </tr>
        <tr class="details">
            <td align="center" style="background: rgba(118, 205, 83, 0.4);"><b><h2 class="hvr-sweep-to-right"><i>Web designer</i></h2></b><br>
                <b><h3 class="hvr-sweep-to-right"><i>Bognár Dániel, 1994.01.07.</i></h3></b><br>
                <h4 class="hvr-sweep-to-right"><i>bogydani@gmail.com</i></h4>
            </td>
            <td align="center" style="background: rgba(118, 205, 83, 0.4);"><b><h2 class="hvr-sweep-to-right"><i>Tester</i></h2></b><br>
                <b><h3 class="hvr-sweep-to-right"><i>Győri Dániel, 1994.08.26.</i></h3></b><br>
                <h4 class="hvr-sweep-to-right"><i>gyoridani@gmail.com</i></h4>
            </td>
        </tr>
        <tr>
            <td align="center" class="fadeInUp">
                <img src="images/Tamas.jpg" alt="Tamas" title="Tamas" width="250" height="366" />
            </td>
            <td  align="center" class="fadeInUp">
                <img src="images/Zsolti.jpg" alt="Zsolti" title="Zsolti" width="250" height="366"/>
            </td>
        </tr>
        <tr class="details">
            <td align="center" style="background: rgba(118, 205, 83, 0.4);"><b><h2 class="hvr-sweep-to-right"><i>Android developer</i></h2></b><br>
                <b><h3 class="hvr-sweep-to-right"><i>Molnár Tamás, 1993.02.08.</i></h3></b><br>
                <h4 class="hvr-sweep-to-right"><i>mtammasss@gmail.com</i></h4>
            </td>
            <td align="center" style="background: rgba(118, 205, 83, 0.4);"><b><h2 class="hvr-sweep-to-right"><i>Lecturer and translator</i></h2></b><br>
                <b><h3 class="hvr-sweep-to-right"><i>Pakai Zsolt, 1990.09.16.</i></h3></b><br>
                <h4 class="hvr-sweep-to-right"><i>nsp.sojber.geroxy@gmail.com</i></h4>
            </td>

        </tr>
        <tr>
            <td width="250" align="center" class="fadeInUp">
                <img src="images/Szebi.jpg" alt="Szebi" title="Szebi" width="250" height="366" />
            </td>
            <td  align="center" class="fadeInUp">
                <img src="images/Arni.jpg" alt="Arni" title="Arni" width="250" height="366"/>
            </td>
        </tr>
        <tr class="details">
            <td align="center" style="background: rgba(118, 205, 83, 0.4);"><b><h2 class="hvr-sweep-to-right"><i>Team leader (The Boss)</i></h2></b><br>
                <b><h3 class="hvr-sweep-to-right"><i>Szokol Szebasztián, 1994.01.14.</i></h3></b><br>
                <h4 class="hvr-sweep-to-right"><i>szokolszebi@citromail.hu</i></h4>
            </td>
            <td align="center" style="background: rgba(118, 205, 83, 0.4);"><b><h2 class="hvr-sweep-to-right"><i>Web programmer</i></h2></b><br>
                <b><h3 class="hvr-sweep-to-right"><i>Tóth Isaszegi Arnold, 1993.10.08.</i></h3></b><br>
                <h4 class="hvr-sweep-to-right"><i>arnoldti93@gmail.com</i></h4>
            </td>
        </tr>
        <div id="arrow" class="hvr-bob">
            <a href="#container"><img src="images/arrow.png" alt="up" width="100" height="100" /></a>
        </div>
    </table>
</div>

<?php require_once "layouts/user_footer.php"; ?>
