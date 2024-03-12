<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;


Website::setTitle("Votez");
Website::setDescription("Votez, obtenez des points de vote et plein d'autres cadeaux!");
?>

<section style="background-image: url('<?= ThemeModel::fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('votes_page_title') ?></h2>
        <p><?= ThemeModel::getInstance()->fetchConfigValue('vote_description') ?></p>
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
    <div class="lg:grid grid-cols-3 gap-4">
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4 h-fit">
            <h4 class="font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('votes_participate_title') ?></h4>
            <?php if (UsersModel::getCurrentUser()?->getId() === -1): ?>
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-2 mb-2">
                    <p>Pour pouvoir voter et récupérer vos récompenses vous devez être connecté sur le site, alors
                        n'attendez plus pour obtenir des récompenses uniques !</p>
                </div>
                <div class="pt-4 pb-2 text-center">
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2">Connexion</i></a>
                </div>
            <?php else: ?>
                <?php foreach ($sites as $site): ?>
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-2 mb-4">
                        <div class="flex flex-wrap justify-between">
                            <div class="font-medium"><?= $site->getTitle() ?></div>
                            <div
                                class="bg-gray-300 dark:bg-gray-800 font-medium inline-block px-3 py-1 rounded-sm text-xs ">
                                <i class="fa-solid fa-clock-rotate-left"></i> <?= $site->getTimeFormatted() ?>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <div class="mt-2 py-2 font-medium">Récompense : <span
                                    class="font-bold"><?= $site->getRewards()?->getTitle() ?></span>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="<?= $site->getUrl() ?>" target="_blank"
                                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2">Voter
                                    <i class="fa-solid fa-award"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <div class="col-span-2 bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4 h-fit">
            <h4 class="font-bold text-center mb-2"><?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_title') ?></h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 ">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <i class="fa-solid fa-user"></i> Voteur
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            <i class="fa-solid fa-trophy"></i> Position
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            <i class="fa-solid fa-award"></i> Nombres de votes
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($topCurrent

                    as $top):
                    $i++; ?>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full"
                                 src="<?= $top->getUser()->getUserPicture()->getImage() ?>"
                                 alt="...">
                            <div class="pl-3">
                                <div class="text-base font-semibold"><?= $top->getUser()->getPseudo() ?></div>
                            </div>
                        </th>
                        <td class="py-4 px-6 text-center">
                            <?php $color_position = $i ?>
                            <div class="
                                                <?php
                            switch ($color_position) {
                                case '1':
                                    echo "bg-amber-400";
                                    break;
                                case '2':
                                    echo "bg-amber-300";
                                    break;
                                case '3':
                                    echo "bg-amber-200";
                                    break;
                                default:
                                    echo "bg-blue-200";
                                    break;
                            }
                            ?>
                                             inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?></div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="font-medium"><?= $top->getVotes() ?></div>
                        </td>
                    </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php if(ThemeModel::getInstance()->fetchConfigValue('votes_display_global')): ?>
<section class="px-4 lg:px-24 2xl:px-96 py-6">
    <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4 h-fit">
        <h4 class="font-bold text-center mb-2"><?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_global_title') ?></h4>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <i class="fa-solid fa-user"></i> Voteur
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        <i class="fa-solid fa-trophy"></i> Position
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        <i class="fa-solid fa-award"></i> Nombres de votes
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach ($topGlobal as $top): $i++; ?>
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="flex items-center px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="<?= $top->getUser()->getUserPicture()->getImage() ?>" alt="...">
                        <div class="pl-3">
                            <div class="text-base font-semibold"><?= $top->getUser()->getPseudo() ?></div>
                        </div>
                    </th>
                    <td class="py-4 px-6 text-center">
                        <?php $color_position = $i  ?>
                        <div class="
                                <?php
                        switch ($color_position) {
                            case '1':
                                echo "bg-amber-400";
                                break;
                            case '2':
                                echo "bg-amber-300";
                                break;
                            case '3':
                                echo "bg-amber-200";
                                break;
                            default:
                                echo "bg-blue-200";
                                break;
                        }
                        ?>
                            inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="font-medium"><?= $top->getVotes() ?></div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php endif; ?>