<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'wamp' . DS . 'www' . DS . 'OOP-3' . DS . 'src');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'includes');

require_once LIB_PATH . DS . "config.php";

require_once LIB_PATH . DS . "functions.php";

require_once LIB_PATH . DS . "session.php";

require_once LIB_PATH . DS . "database.php";

require_once LIB_PATH . DS . "render.php";

/*____________ MODELS ______________ */

require_once LIB_PATH . DS . "user.php";

require_once LIB_PATH . DS . "image.php";

require_once LIB_PATH . DS . "region.php";

