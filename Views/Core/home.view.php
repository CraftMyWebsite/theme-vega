<?php

use CMW\Controller\Core\PackageController;
use CMW\Controller\Core\SecurityController;
use CMW\Controller\Minecraft\MinecraftController;
use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Minecraft\MinecraftModel;
use CMW\Model\News\NewsModel;
use CMW\Utils\Website;

if (PackageController::isInstalled("News")) {
    $newsLists = new newsModel;
    $newsList = $newsLists->getSomeNews(ThemeModel::getInstance()->fetchConfigValue('news_number_display'));
}
if (PackageController::isInstalled("Minecraft")) {
    $mc = new minecraftModel;
    $favExist = $mc->favExist();
    if ($favExist) {
        $minecraft = MinecraftController::pingServer($mc->getFavServer()->getServerIp(), $mc->getFavServer()->getServerPort())->getPlayersOnline();
    }

}

Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('home_title'));
Website::setDescription(Website::getWebsiteDescription());
?>
    <!--HERO SECTION-->
    <section style="background-image: url('<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:pt-24 lg:pb-24 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <?php if (PackageController::isInstalled("Minecraft") ): ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('hero_show_minecraft_player')): ?>
                        <?php if ($favExist): ?>
                            <div class="max-w-2xl text-white font-light md:text-lg lg:text-xl"><i
                                        class="text-green-500 fa-regular fa-circle-dot fa-beat-fade"></i> <?= ThemeModel::getInstance()->fetchConfigValue('hero_join_prefix') ?>
                                <b><?= $minecraft ?></b> <?= ThemeModel::getInstance()->fetchConfigValue('hero_join_suffix') ?></div>
                        <?php else: ?>
                            <?php if (UsersController::isAdminLogged()) : ?>
                                <section class="py-8">
                                    <div class="container mx-auto px-4 relative">
                                        <div id="bg-blue-200"
                                             class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                                             role="alert">
                                            <div class="flex items-center">
                                                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <h3 class="text-lg font-medium">Vous n'avez pas de favoris !</h3>
                                            </div>
                                            <div class="mt-2 mb-4 text-sm">
                                                Pour utilisez l'option "Afficher le nombre de joueurs minecraft" vous devez avoir un serveur en Favoris !<br>Seuls les administrateurs voient ce message !
                                            </div>
                                            <div class="flex">
                                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cmw-admin/minecraft/servers" target="_blank"
                                                   type="button"
                                                   class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                                    <p><i class="fa-solid fa-square-arrow-up-right"></i> Gérer les favoris</p>
                                                </a>
                                                <button type="button"
                                                        class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800"
                                                        data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                                                    <p><i class="fa-solid fa-eye-slash"></i> Masquer</p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="max-w-2xl mb-4 text-2xl md:text-3xl xl:text-4xl font-bold tracking-tight leading-none text-white"><?= ThemeModel::getInstance()->fetchConfigValue('hero_title') ?>
                    <span class="text-3xl md:text-4xl xl:text-5xl underline"><?= Website::getWebsiteName() ?></span></div>
                <div class="max-w-2xl mb-4 text-white font-light  md:text-lg lg:text-xl"><?= ThemeModel::getInstance()->fetchConfigValue('hero_description') ?></div>
                <a href="<?= ThemeModel::getInstance()->fetchConfigValue('hero_button_link') ?>"
                   class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    <?= ThemeModel::getInstance()->fetchConfigValue('hero_button_text') ?>
                </a>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('hero_show_footer_icon')): ?>
                    <div class="py-2 w-full sm:w-auto mt-4 text-4xl text-white">
                        <div class="flex-wrap inline-flex space-x-4 lg:space-x-6">
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_active_facebook')): ?>
                                <a href="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_facebook') ?>"
                                   <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?>
                                   class="hover:text-blue-600">
                                    <i class=" <?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_active_twitter')): ?>
                                <a href="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_twitter') ?>"
                                   <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?>
                                   class="hover:text-blue-600">
                                    <i class=" <?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_active_instagram')): ?>
                                <a href="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_instagram') ?>"
                                   <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?>
                                   class="hover:text-blue-600">
                                    <i class=" <?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_active_discord')): ?>
                                <a href="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_discord') ?>"
                                   <?php if (ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?>
                                   class="hover:text-blue-600">
                                    <i class=" <?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="<?= ThemeModel::getInstance()->fetchImageLink('header_img_logo') ?>" alt="...">
            </div>

        </div>
        <!--SEPARATOR-->
        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
             class="bg-transparent text-white dark:text-gray-800 rotate-180" width="100%" height="90px">
            <path fill="currentColor"
                  d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                  opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                  opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
        </svg>
    </section>


    <!--WHY US SECTION-->
<?php if (ThemeModel::getInstance()->fetchConfigValue('feature_section_active')): ?>
    <section>
        <div class="container mx-auto px-4 py-16 relative">

            <div class="flex flex-wrap -mx-4">
                <div class="w-full p-4  xl:w-4/12 sm:w-6/12">
                    <div class="bg-gray-100 block group px-6 py-16 rounded-lg shadow-lg dark:bg-gray-900 dark:text-white">
                        <div class="text-center">
                            <i class="mb-4 text-blue-700 text-4xl <?= ThemeModel::getInstance()->fetchConfigValue("feature_img_1") ?>"></i>
                        </div>
                        <h4 class="font-bold mb-2 text-gray-900 text-xl dark:text-white"><?= ThemeModel::getInstance()->fetchConfigValue('feature_title_1') ?></h4>
                        <p><?= ThemeModel::getInstance()->fetchConfigValue('feature_description_1') ?></p>
                    </div>
                </div>
                <div class="w-full p-4  xl:w-4/12 sm:w-6/12">
                    <div class="bg-gray-100 block px-6 py-16 rounded-lg shadow-lg dark:bg-gray-900 dark:text-white">
                        <div class="text-center">
                            <i class="mb-4 text-blue-700 text-4xl <?= ThemeModel::getInstance()->fetchConfigValue("feature_img_2") ?>"></i>
                        </div>
                        <h4 class="font-bold mb-2 text-gray-900 text-xl dark:text-white"><?= ThemeModel::getInstance()->fetchConfigValue('feature_title_2') ?></h4>
                        <p><?= ThemeModel::getInstance()->fetchConfigValue('feature_description_2') ?></p>
                    </div>
                </div>
                <div class="w-full p-4  xl:w-4/12 sm:w-6/12">
                    <div class="bg-gray-100 block px-6 py-16 rounded-lg shadow-lg dark:bg-gray-900 dark:text-white">
                        <div class="text-center">
                            <i class="mb-4 text-blue-700 text-4xl <?= ThemeModel::getInstance()->fetchConfigValue("feature_img_3") ?>"></i>
                        </div>
                        <h4 class="font-bold mb-2 text-gray-900 text-xl dark:text-white"><?= ThemeModel::getInstance()->fetchConfigValue('feature_title_3') ?></h4>
                        <p><?= ThemeModel::getInstance()->fetchConfigValue('feature_description_3') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!--Trailer-->
<?php if (ThemeModel::getInstance()->fetchConfigValue('trailer_section_active')): ?>
    <section class="bg-gray-100 dark:bg-gray-900 dark:text-white">
        <div class="px-4 py-6 lg:px-24 2xl:px-48">
            <div class="lg:grid lg:grid-cols-2">
                <div class="text-center my-auto lg:px-16">
                    <div class="font-bold text-3xl mb-4"><?= ThemeModel::getInstance()->fetchConfigValue('trailer_title') ?></div>
                    <div><?= ThemeModel::getInstance()->fetchConfigValue('trailer_text') ?></div>
                    <div class="mt-4">
                        <a href="<?= ThemeModel::getInstance()->fetchConfigValue('trailer_button_link') ?>"
                           class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            <?= ThemeModel::getInstance()->fetchConfigValue('trailer_button_text') ?>
                        </a>
                    </div>
                </div>
                <div class="rounded-lg bg-white p-2 mx-auto dark:bg-gray-800 mt-8 lg:mt-0">
                    <iframe class="w-full h-[12rem] lg:w-[36rem] lg:h-[24rem]"
                            src="https://www.youtube.com/embed/<?= ThemeModel::getInstance()->fetchConfigValue('trailer_youtube_link') ?>"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <!--NEWS SECTION-->
<?php if (PackageController::isInstalled("News")): ?>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('news_section_active')): ?>
        <section>
            <div class="px-4 lg:px-24 2xl:px-72 py-16">
                <div class="w-full font-medium rounded-lg p-2 bg-gray-100 dark:bg-gray-900 dark:text-white"><i
                            class="fa-solid fa-newspaper"></i> <?= ThemeModel::getInstance()->fetchConfigValue('news_section_title') ?>
                </div>
                <div class="lg:grid grid-cols-2">
                    <?php foreach ($newsList as $news): ?>
                        <div class="p-4">
                            <div style="background-image: url('<?= Website::getProtocol() ?>://<?= $_SERVER['SERVER_NAME'] . $news->getImageLink() ?>')"
                                 class="bg-cover h-96 rounded-lg flex">
                                <div class="bg-gray-900/70 self-end w-full rounded-b-lg text-white">
                                    <div class="p-4">
                                        <div class="flex justify-between">
                                            <p class="font-bold text-2xl"><?= $news->getTitle() ?></p>
                                            <span class="h-fit bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-1 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                  <?= $news->getDateCreated() ?>
                                </span>
                                        </div>
                                        <p class="font-medium mb-4"><?= $news->getDescription() ?></p>
                                        <div class="flex justify-between">
                                            <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>news/<?= $news->getSlug() ?>"
                                               class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                                <?= ThemeModel::getInstance()->fetchConfigValue('news_button') ?>
                                            </a>
                                            <div class="cursor-pointer">
            <?php if ($news->isLikesStatus()): ?>
                                <span data-tooltip-target="<?php if ($news->getLikes()->userCanLike()) {
                                    echo "tooltip-liked";
                                } else {
                                    echo "tooltip-like";
                                } ?>">
                                <span class="text-base"><?= $news->getLikes()->getTotal() ?>
                                    <?php if ($news->getLikes()->userCanLike()): ?>
                                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                                        <div id="tooltip-liked" role="tooltip"
                                             class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if (UsersController::isUserLogged()) {
                                            echo "Vous aimez déjà !";
                                        } else {
                                            echo "Connectez-vous pour aimé !";
                                        } ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?>
                                        <a href="<?= $news->getLikes()->getSendLike() ?>"><i
                                                    class="fa-regular fa-heart"></i></a>
                                        <div id="tooltip-like" role="tooltip"
                                             class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                </span>
            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else: ?>
    <?php if (UsersController::isAdminLogged()) : ?>
        <section class="py-8">
            <div class="container mx-auto px-4 relative">
                <div id="alert-additional-content-4"
                     class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                     role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Vous n'utilisez pas le package News</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Le thème Wipe prend en charge le package News, pour le moment vous ne l'utilisez pas, installez
                        le si vous voulez en bénéficier.<br>Seuls les administrateurs voient ce message !
                    </div>
                    <div class="flex">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cmw-admin" target="_blank"
                           type="button"
                           class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                            <p><i class="fa-solid fa-download"></i> Installer le package</p>
                        </a>
                        <button type="button"
                                class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800"
                                data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                            <p><i class="fa-solid fa-eye-slash"></i> Masquer</p>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
    <!--CUSTOM SECTION 1-->
<?php if (ThemeModel::getInstance()->fetchConfigValue('custom_section_active_1')): ?>
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="px-4 lg:px-24 2xl:px-72 py-6 dark:text-gray-300">
            <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_1') ?>
        </div>
    </section>
<?php endif; ?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('custom_section_active_2')): ?>
    <!--CUSTOM SECTION 2-->
    <section class="dark:text-gray-300">
        <div class="px-4 lg:px-24 2xl:px-72 py-6">
            <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_2') ?>
        </div>
    </section>
<?php endif; ?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('custom_section_active_3')): ?>
    <!--CUSTOM SECTION 3-->
    <section class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300">
        <div class="px-4 lg:px-24 2xl:px-72 py-6">
            <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_3') ?>
        </div>
    </section>
<?php endif; ?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('custom_section_active_4')): ?>
    <!--CUSTOM SECTION 4-->
    <section class="dark:text-gray-300">
        <div class="px-4 lg:px-24 2xl:px-72 py-6">
            <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_4') ?>
        </div>
    </section>
<?php endif; ?>
    <!--CONTACT SECTION-->
<?php if (PackageController::isInstalled("Contact")): ?>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('contact_section_active')): ?>
        <section class="bg-gray-100 dark:bg-gray-900">
            <div class="px-4 lg:px-24 2xl:px-72 py-16">
                <div class="w-full font-medium rounded-lg p-2 bg-white dark:bg-gray-800 dark:text-white"><i
                            class="fa-solid fa-address-book"></i> Nous contacter
                </div>
                <div class="p-4">
                    <form action="contact" method="post" class="rounded-md shadow-lg p-8">
                        <?php (new SecurityManager())->insertHiddenToken() ?>
                        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg">
                            <div class="lg:grid grid-cols-2 gap-6 ">
                                <div>
                                    <label for="input-group-1"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                                        mail :</label>
                                    <div class="relative mb-6">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                                        </div>
                                        <input name="email" type="text" id="input-group-1"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="votre@mail.com">
                                    </div>
                                </div>
                                <div>
                                    <label for="input-group-1"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                                        nom :</label>
                                    <div class="relative mb-6">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-signature"></i>
                                        </div>
                                        <input name="name" type="text" id="input-group-1"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Jean Dupont">
                                    </div>
                                </div>
                            </div>
                            <label for="input-group-1"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sujet :</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="text-gray-500 dark:text-gray-400 fa-solid fa-circle-info"></i>
                                </div>
                                <input name="object" type="text" id="input-group-1"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Votre site est super">
                            </div>

                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                                message</label>
                            <textarea minlength="20" id="message" name="content" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Bonjour,"></textarea>
                            <?php SecurityController::getPublicData(); ?>
                            <div class="mt-4 text-center">
                                <button type="submit"
                                        class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                    Soumettre <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </section>
    <?php endif; ?>
<?php else: ?>
    <?php if (UsersController::isAdminLogged()) : ?>
        <section class="py-8">
            <div class="container mx-auto px-4 relative">
                <div id="alert-additional-content-4"
                     class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                     role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Vous n'utilisez pas le package Contact</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Le thème Wipe prend en charge le package Contact, pour le moment vous ne l'utilisez pas,
                        installez le si vous voulez en bénéficier.<br>Seuls les administrateurs voient ce message !
                    </div>
                    <div class="flex">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cmw-admin" target="_blank"
                           type="button"
                           class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                            <p><i class="fa-solid fa-download"></i> Installer le package</p>
                        </a>
                        <button type="button"
                                class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800"
                                data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                            <p><i class="fa-solid fa-eye-slash"></i> Masquer</p>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php if (PackageController::isInstalled('Newsletter')): ?>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('newsletter_section_active')): ?>
        <section class="bg-gray-100 dark:bg-gray-900">
            <div class="px-4 lg:px-24 2xl:px-72 py-16">
                <div class="w-full font-medium rounded-lg p-2 bg-white dark:bg-gray-800 dark:text-white"><i
                        class="fa-solid fa-address-book"></i> <?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_title') ?>
                </div>
                <div class="p-4">
                    <form action="newsletter" method="post" class="rounded-md shadow-lg p-8">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_description') ?>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                            </div>
                            <input name="newsletter_users_mail" type="text" id="input-group-1"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="votre@mail.com">
                        </div>
                        <?php SecurityController::getPublicData(); ?>
                        <div class="mt-4 text-center">
                            <button type="submit"
                                    class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                <?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_button') ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>