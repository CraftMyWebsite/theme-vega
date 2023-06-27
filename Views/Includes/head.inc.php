<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Uploads\ImagesManager;
use CMW\Model\Core\ThemeModel;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="><?= $description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Vega/Assets/Css/style.css">
    <script src="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Vega/Assets/Js/flowbite.js"></script>
    <link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Admin/Resources/Vendors/Fontawesome-free/Css/fa-all.min.css">

    <?= ImagesManager::getFaviconInclude() ?>

    <?php if(ThemeModel::fetchConfigValue('dark_light')): ?>
    <script>
		// On page load or when changing themes, best to add inline in `head` to avoid FOUC
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark')
		}
    </script>
    <?php endif; ?>

</head>

<body class="bg-white dark:bg-gray-800 dark:text-gray-300 flex flex-col min-h-screen">
