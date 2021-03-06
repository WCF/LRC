<?php
    /*
        include pop.php if using POP as persistance library:
            include_once ('pop/pop.php');

            (the rest of your script)
            $new_pop_model = new Model();

            render();  // optional, if defaults are used

        include index.php (typically not required) if using POP as website manager:
            include_once ('pop/index.php');

            (the rest of your script)
            $new_pop_model = new Model();
    */

    // set to false if using POP as persistence library
    if (!defined('USE_POP_REDIRECTION')) {
        define ('USE_POP_REDIRECTION', false);
    }

    set_time_limit(3); // preferred; prevents DDoS?
    define ('DOMAIN', 'http://' . $_SERVER['SERVER_NAME']);
    define ('DATA_PATH', PATH . 'data/');
    define ('CACHE_PATH', PATH . 'cache/');
    define ('MODULE_PATH', PATH . 'modules/');
    define ('LIBRARY_PATH', PATH . 'lib/');
    define ('VIEWS_PATH', PATH . '../templates/');
    define ('TEMPLATE_PATH', PATH . '../templates/');
    define ('STATIC_PATH', 'static/'); // cannot be changed
    define ('SITE_TEMPLATE', 'default.html');
    define ('DEFAULT_TEMPLATE', 'default.html');
    define ('FS_FETCH_HARD_LIMIT', 1000); // when should Query give up?
    define ('TEMPLATE_COMPRESS', false); // use compressor = more CPU, less bandwidth
    define ('SITE_SECRET', '12345678'); // for ajax. Change immediately!
    define ('WRITE_ON_MODIFY', true); // if false, Model.put() is required

    // SUBDIR: value is environment-dependent.
    // define ('SUBDIR', substr (PATH, strlen ($_SERVER['DOCUMENT_ROOT'])));
    define ('SUBDIR', '');

    define ('WIN', 5);
    $win = WIN;
    define ('FAIL', 6);
    $fail = FAIL;

    $modules = array (
        'Model',
        'View',
        'Query'
    );