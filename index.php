<?php

    require_once("descriptions.php");


    // get working dir
    $workDir = getcwd();
    $imageRoot = 'https://chuntr.github.io/one-mc-show';

    // setup Twig environment
    $twig_autoloader_path = "$workDir/vendor/twig/twig/lib/Twig/Autoloader.php";
    $twig_template_path = "$workDir/one-mc-show/templates";
    $twig_cache_folder = "$workDir/cache";
    require_once $twig_autoloader_path;
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem($twig_template_path);
    $twig = new Twig_Environment($loader,
                                 ['cache' => false,
                                 #['cache' => $twig_cache_folder,

                             ]);

    // get image file list
    $imageList = glob("$workDir/one-mc-show/images/IMG*.jpg", GLOB_ERR);

    // take the basename of each image name, remove the '.jpg', and make
    // that the list key
    foreach ($imageList as $key => $value) {
        $imageList[$key] = basename($imageList[$key]);
        $imageList[$key] = str_replace(".jpg","",$imageList[$key]);
    }

    // read and render Twig template
    $template = $twig->loadtemplate("index.twig");
    $pageTitle = 'One MC Show';
    $params = [ 'descriptions' => $descriptions,
                'imageRoot' => $imageRoot,
                'imageList' => $imageList,
                'pageTitle' => $pageTitle, ];
    $template->display($params);
