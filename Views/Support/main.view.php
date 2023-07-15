<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportResponsesModel;
use CMW\Model\Support\SupportSettingsModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity[] $publicSupport */

$title = Website::getWebsiteName() . ' - Support';
$description = 'Parfait pour vos demande de support';
?>

<section style="background-image: url('<?= ThemeModel::fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold">Support</h2>
    </div>

    <!--SEPARATOR-->
    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="bg-transparent text-white dark:text-gray-800 rotate-180" width="100%" height="90px">
        <path fill="currentColor" d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" ></path>
    </svg>
</section>

<section class="py-6 px-4 lg:px-24 2xl:px-60">
    <div class="text-center">
        <a href="<?= Website::getProtocol() . "://" . $_SERVER["SERVER_NAME"] . EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ."support/private" ?>"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center">Voir
            mes demandes</a>
    </div>
    <div class="lg:grid grid-cols-3 gap-4 mt-4">
        <div class="rounded-lg shadow bg-gray-100 dark:bg-gray-900 p-4">
            <div class="flex flex-no-wrap justify-center items-center py-4">

                <div class="px-10 w-auto">
                    <p class="text-center text-lg font-medium mb-4">Nouveau support</p>
                </div>

            </div>
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
            <div class="mb-2">
                <label for="support_question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre demande :</label>
                <textarea id="support_question" rows="4" name="support_question"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Impossible de ..."></textarea>
            </div>
                <?php if(SupportSettingsModel::getInstance()->getConfig()->getCaptcha()):?>
                    <?php SecurityController::getPublicData(); ?>
                <?php endif; ?>
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="support_is_public" name="support_is_public" checked type="checkbox" value=""
                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                    </div>
                    <label for="support_is_public" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Question publique</label>
                </div>
                <div>
                    <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Soumettre
                    </button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-span-2 rounded-lg shadow bg-gray-100 dark:bg-gray-900 p-4 h-fit">
            <div class="container mx-auto h-fit">
                <div class="flex flex-no-wrap justify-center items-center py-4">

                    <div class="px-10 w-auto">
                        <p class="text-center text-lg font-medium mb-4">Support publique</p>
                    </div>

                </div>
                <div class="lg:grid grid-cols-3 gap-4">
                    <?php foreach ($publicSupport as $support): ?>
                    <div class="shadow-lg p-2 rounded-lg bg-gray-100 dark:bg-gray-800">
                        <a href="<?= $support->getUrl() ?>" class="text-lg font-medium text-blue-700 hover:text-blue-500"><?= $support->getQuestion() ?></a>
                        <div class="border-t">
                            <p>Statut : <?= $support->getStatusFormatted() ?></p>
                            <p>Date : <?= $support->getCreated() ?></p>
                            <p>Réponses : <?= SupportResponsesModel::getInstance()->countResponses($support->getId()) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>