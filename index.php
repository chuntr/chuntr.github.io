<?php

    // setup Twig environment
    $twig_autoloader_path = './vendor/twig/twig/lib/Twig/Autoloader.php';
    require_once $twig_autoloader_path;
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem($twig_autoloader_path);
    $twig = new Twig_Environment($loader);

    $escaper = new Twig_Extension_Escaper(false);
    $twig->addExtension($escaper);


    $template = $twig->loadtemplate('templates/index.phtml');
    $params = ['indexList' => $indexList];
    $template->display($params);
