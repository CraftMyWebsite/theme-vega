<?php

use CMW\Controller\Forum\Admin\ForumPermissionController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;

/** @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/** @var \CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosed */

Website::setTitle("Forum");
Website::setDescription("Ajouter un sujet");
?>

<section style="background-image: url('<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>');"
         class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('forum_title') ?></h2>
    </div>

    <!--SEPARATOR-->
    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
         class="bg-transparent text-white dark:text-gray-800 rotate-180" width="100%" height="90px">
        <path fill="currentColor"
              d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25" class="shape-fill"></path>
        <path
            d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
            opacity=".5" class="shape-fill"></path>
        <path
            d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
    </svg>
</section>

<section class="px-4 lg:px-24 2xl:px-60 py-6">

    <section class="lg:grid grid-cols-4 gap-6 sm:mx-12 2xl:mx-72 pt-8">
        <div class="col-span-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1">
                    <li class="inline-flex items-center">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right"></i>
                            <a href="<?= $category->getLink() ?>"
                               class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $category->getName() ?></a>
                        </div>
                    </li>
                    <?php foreach ($forumModel->getParentByForumId($forum->getId()) as $parent): ?>
                        <li>
                            <div class="flex items-center">
                                <i class="fa-solid fa-chevron-right"></i>
                                <a href="../../<?= $parent->getLink() ?>"
                                   class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $parent->getName() ?></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>
    </section>


    <section class="my-8 sm:mx-12 2xl:mx-72">
        <div class="rounded-md shadow-lg p-8 dark:bg-gray-700">

            <h4>Nouveau topic dans : <b><?= $forum->getName() ?></b></h4>
            <form action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <?php if (UsersController::isAdminLogged() || ForumPermissionController::getInstance()->hasPermission("operator")) : ?>
                    <!--
                    ADMINISTRATION
                    -->
                    <div class="border-b p-2">
                        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-3">
                            <p class="font-semibold mt-2 dark:text-white text-center">Administration</p>
                            <div class="flex">
                                <div class="flex ml-3 space-x-4">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="important" value="1" id="important" type="checkbox"
                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                        </div>
                                        <label for="important" class="dark:text-white ml-2 text-sm font-medium text-gray-900"><i
                                                class="<?= $iconImportant ?>  text-orange-500 fa-sm"></i>
                                            Important</label>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="pin" id="pin" type="checkbox" value=""
                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                        </div>
                                        <label for="pin" class="dark:text-white ml-2 text-sm font-medium text-gray-900"><i
                                                class="<?= $iconPin ?> text-red-600 fa-sm"></i> Épingler</label>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="disallow_replies" value="1" id="closed" type="checkbox"
                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                        </div>
                                        <label for="closed" class="dark:text-white ml-2 text-sm font-medium text-gray-900"><i
                                                class="<?= $iconClosed ?> text-yellow-300 fa-sm"></i> Fermer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <!--
                PUBLIC
                -->
                <div class="border-b p-2">
                    <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-3">
                        <p class="font-semibold mt-4 text-center dark:text-white">Topic<span class="text-red-500">*</span></p>
                        <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4">
                            <div>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre
                                    du topic<span class="text-red-500">*</span> :</label>
                                <input name="name" id="title" type="text"
                                       class="dark:bg-gray-700 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                       placeholder="Titre du topic" required>
                            </div>
                            <div>
                                <label for="last_name"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags :
                                    <small>Séparez vos tags par ','</small></label>
                                <input name="tags" type="text" id="last_name"
                                       class="dark:bg-gray-700 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                       placeholder="Tag1,Tag2,Tag3">
                            </div>
                        </div>

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Options :</label>
                        <div class="flex mb-4 ">
                            <div class="flex ml-3 space-x-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="follow" type="checkbox" name="followTopic"
                                               class="dark:bg-gray-700 w-4 h-4 border border-gray-300 rounded bg-gray-50" checked>
                                    </div>
                                    <label for="follow" class="ml-2 text-sm font-medium">Suivre la discussion (alérter
                                        par mail)</label>
                                </div>
                            </div>
                        </div>
                        <label for="summernote-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenue<span
                                class="text-red-500">*</span> :</label>
                        <textarea minlength="20" name="content" class="w-full tinymce"></textarea>
                    </div>
                </div>


                <div class="text-center mt-2">
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                        <i class="fa-solid fa-pen-to-square"></i> Poster
                    </button>
                </div>
            </form>
        </div>
    </section>
</section>