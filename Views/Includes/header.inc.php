<?php

use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\MenusModel;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

$menus = MenusModel::getInstance()->getMenus();

?>
<nav class="lg:px-12 py-2 bg-gray-50 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class=" flex flex-wrap  items-center mx-auto">
        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>" class="flex items-center">
            <?php if (ThemeModel::getInstance()->fetchConfigValue('header_active_logo')): ?>
            <img src="<?= ThemeModel::getInstance()->fetchImageLink('header_img_logo') ?>" class="mr-3 w-10" alt="Logo">
            <?php endif; ?>
            <?php if (ThemeModel::getInstance()->fetchConfigValue('header_active_title')): ?>
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"><?= Website::getWebsiteName() ?></span>
            <?php endif; ?>
        </a>
        <div class="flex ml-auto lg:order-2 text-sm">
            <?php if(UsersController::isUserLogged()): ?>
            <ul class="flex flex-col p-4">
                <li>
                    <button id="dropdownNavbarLinkProfil" data-dropdown-toggle="dropdownNavbarProfil" class="flex justify-between items-center py-2  w-full font-medium text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:hover:text-blue-700 lg:p-0 lg:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:hover:bg-gray-700 lg:dark:hover:bg-transparent"><i class="mr-2 fa-solid fa-user"></i> <?= UsersModel::getCurrentUser()->getPseudo() ?></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbarProfil" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cmw-admin" target="_blank" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                            </li>
                            <li>
                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>profile" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-regular fa-address-card"></i> Profil</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>logout" class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                        </div>
                    </div>
                </li>
            </ul>
            <?php else: ?>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button')): ?>
                <a class="hidden lg:flex justify-between items-center" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login"><button class="py-2 pr-4 pl-3 w-full font-medium text-blue-500 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:w-auto dark:text-blue-500 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 lg:dark:hover:bg-transparent">Connexion</button></a>
                <?php endif; ?>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button')): ?>
                <a class="hidden lg:flex justify-between items-center ml-4" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>register"><button class="py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 lg:dark:hover:bg-transparent">Inscription</button></a>
                <?php endif; ?>
            <?php endif; ?>
            <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex justify-center items-center lg:ml-3 text-gray-400 rounded-lg lg:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-500" aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <?php if(ThemeModel::getInstance()->fetchConfigValue('dark_light')): ?>
            <button id="theme-toggle" type="button" class="ml-4 text-gray-500 dark:text-gray-400 my-auto">
                <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-6 h-6 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
            <?php endif; ?>
        </div>

        <div class="hidden w-full lg:block lg:w-auto lg:ml-6" id="navbar-multi-level">
            <ul class="flex flex-col p-4 mt-4 rounded-lg border border-gray-100 lg:flex-row lg:space-x-8 lg:mt-0 lg:text-sm lg:font-medium lg:border-0 dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
                <?php foreach ($menus as $menu): ?>
                    <?php if ($menu->isUserAllowed()): ?>
                        <li>
                            <a href="<?= $menu->getUrl() ?>" <?= !$menu->isTargetBlank() ?: "target='_blank'" ?> class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent"><?= $menu->getName() ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</nav>
