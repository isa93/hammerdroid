
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- jQuery Cookie plugin -->
    <script src="../js/jquery-cookie.js"></script>

    <!-- MATERIALIZE.JS -->
    <script src="../js/materialize.min.js"></script>

    <!-- CUSTOM JS -->
    <script src="../js/admin.js"></script>

    <?= isset($widgets) && $widgets===true ? "<script type='text/javascript'>initUserWidget();initAdminWidget()</script>" : null  ?>
</main>
</body>
</html>