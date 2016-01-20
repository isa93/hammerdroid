<?php
require_once "../includes/initialize.php";

$title = "Project";
$keywords = "peoject,hammerdroid,android,application,roof,ceiling,calculator";
$description = "Hammerdroid is the world first android based roof calculator with built in cloud storage for your calculations.";
render('user_header', 'project');
render('user_nav', 'project');
?>
<?= isset($message) ? output_user_message($message) : null; ?>

<div class="descript">
    <i>Project description:</i>
</div>
<br>
<div class="content slide">
    <span><i><b>Hammerdroid is an Android application, that is made for architects and can be used in Hungarian and
                Serbian languages.</b></i></span>
</div>
<br>
<br>
<div class="content1 slide1">
       <span><i><b>This application helps architects to define the amount of iron roofs, their wind resistance, weight
                   and the type of their
                   structures as well as the comparison of their ideal structures.</b></i></span>
</div>
<br>
<br>
<div class="content2 slide2">
       <span><i><b>It is useful because it can give fast information on the area of constraction and it is important for
                   the user as
                   the data can be calculeted much faster. This can be done offline as well and, if needed the user can
                   save these data
                   on a website.</b></i></span>
</div>
<br>
<br>
<div class="content3 slide3">
    <span><i><b>This application started as a school project which we could practice the Scrum method
                with.</b></i></span>
</div>
<br>
<br>
<div class="content4 slide4">
       <span><i><b>This was Szokol Szabolcs's idea, the brother of a member of our group. He studied architecture and
                   needed such an
                   Android application for his job.</b></i></span>
</div>

<?php require_once "layouts/user_footer.php"; ?>
