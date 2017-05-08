<?php

    // get image file list
    ob_start();
    passthru("ls one-mc-show/images/*.jpg");
    $indexList = ob_get_clean();

    // setup Twig environment
    $twig_autoloader_path = 'vendor/twig/twig/lib/Twig/Autoloader.php';
    $twig_template_path = 'one-mc-show/templates';
    $twig_cache_folder = 'cache';
    require_once $twig_autoloader_path;
    Twig_Autoloader::register();


    $loader = new Twig_Loader_Filesystem($twig_template_path);
    $twig = new Twig_Environment($loader,
                                 ['cache' => $twig_cache_folder]);

    // read and render Twig template
    $template = $twig->loadtemplate('one-mc-show/templates/index.twig');
    $template->display($params);

    $imageRoot = 'https://chunter.github.io/one-mc-show/images/';

    $pageTitle = 'One MC Show';
    $params = ['imageRoot' => $imageRoot,
                'indexList' => $indexList ];

    // render PHP template
    include __DIR__.'/one-mc-show/templates/index.twig';

    echo $twig->render(params);
