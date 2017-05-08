<?php

    // get working dir
    $workDir = getcwd();
    $imageRoot = 'https://chunter.github.io/one-mc-show/images/';

    // setup Twig environment
    $twig_autoloader_path = "$workDir/vendor/twig/twig/lib/Twig/Autoloader.php";
    $twig_template_path = "$workDir/one-mc-show/templates";
    $twig_cache_folder = "$workDir/cache";
    require_once $twig_autoloader_path;
    Twig_Autoloader::register();


    $loader = new Twig_Loader_Filesystem($twig_template_path);
    $twig = new Twig_Environment($loader,
                                 ['cache' => $twig_cache_folder]);


    // get image file list
    ob_start();
    passthru("ls one-mc-show/images/*.jpg");
    $indexList = ob_get_clean();

    // render PHP template
    #include __DIR__.'/one-mc-show/templates/index.twig';
    // read and render Twig template
    $template = $twig->loadtemplate("index.twig");
    $pageTitle = 'One MC Show';
    $params = ['pageTitle' => $pageTitle,
               'imageRoot' => $imageRoot,
               'imageList' => $imageList ];
    $template->display($params);
