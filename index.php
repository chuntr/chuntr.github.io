<?php

    // get image file list
    ob_start();
    passthru("ls one-mc-show/images/*.jpg");
    $indexList = ob_get_clean();
    #print $indexList;

    // setup Twig environment
    /*
    $twig_autoloader_path = 'vendor/twig/twig/lib/Twig/Autoloader.php';
    require_once $twig_autoloader_path;
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem($twig_autoloader_path);
    $twig = new Twig_Environment($loader);

    $escaper = new Twig_Extension_Escaper(false);
    $twig->addExtension($escaper);

    // read and render Twig template
    $template = $twig->loadtemplate('onec-mc-show/templates/index.phtml');
    $template->display($params);
    */

    $pageTitle = 'One MC Show';
    $params = ['indexList' => $indexList];

    // render PHP template
    include __DIR__.'/one-mc-show/templates/index.phtml';

    echo $twig->render(params);
