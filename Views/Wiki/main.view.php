<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;


Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('wiki','wiki_page_title'));
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('wiki','wiki_description'));
?>

<section data-cmw-style="background:home-hero:hero_img_bg" style="background: no-repeat ;background-size: cover;" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold" data-cmw="wiki:wiki_page_title"></h2>
        <p data-cmw="wiki:wiki_description"></p>
    </div>

    <!--SEPARATOR-->
    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="bg-transparent text-white dark:text-gray-800 rotate-180" width="100%" height="90px">
        <path fill="currentColor" d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" ></path>
    </svg>
</section>

<section class="px-4 lg:px-24 2xl:px-60 py-6">
    <div class="lg:grid grid-cols-4 gap-4">
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
            <h4 class="font-bold text-center" data-cmw="wiki:wiki_menu_title"></h4>
            <?php foreach ($categories as $categorie): ?>
            <p class="font-medium mt-4"><i data-cmw-visible="wiki:wiki_display_categorie_icon" class="<?= $categorie->getIcon() ?>"></i><?= $categorie->getName() ?></p>
            <?php foreach ($categorie?->getArticles() as $menuArticle): ?>
            <a href="<?=   EnvManager::getInstance()->getValue("PATH_SUBFOLDER") . "wiki/" . $categorie->getSlug() . "/" . $menuArticle->getSlug() ?>">
                <p class="pl-2 py-1 mt-1 cursor-pointer rounded hover:bg-gray-200 dark:hover:bg-gray-600"><i data-cmw-visible="wiki:wiki_display_article_categorie_icon" class="<?= $menuArticle->getIcon() ?>"></i> <?= $menuArticle->getTitle() ?></p>
            </a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <div class="col-span-3 bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4 h-fit">
            <?php if($article !== null): ?>
            <h4 class="font-bold text-center mb-2"><i data-cmw-visible="wiki:wiki_display_article_icon" class="<?= $article->getIcon() ?>"></i> <?= $article->getTitle() ?></h4>
            <p><?= $article->getContent() ?></p>
            <hr class="border-b-1 border-white dark:border-gray-500 mt-2">
            <div class="flex justify-between">
                <div data-cmw-visible="wiki:wiki_display_creation_date" class="mt-1">Crée le : <?= $article->getDateCreate() ?></div>
                <div data-cmw-visible="wiki:wiki_display_autor" class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1"><?= $article->getAuthor()->getPseudo() ?></div>
                <div data-cmw-visible="wiki:wiki_display_edit_date" class="mt-1">Modifié le : <?= $article->getDateUpdate() ?></div>
            </div>
            <?php elseif($firstArticle === null): ?>
            <h4 class="font-bold text-center mb-2">Aucun article</h4>
            <p>Vous n'avez pas encoré commencer la création de votre Wiki ! <br>Connectez-vous pour le remplir !</p>
            <hr class="border-b-1 border-white dark:border-gray-500 mt-2">
            <div class="flex justify-between">
                <div class="mt-1">Crée le : Jamais</div>
                <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1">Personne</div>
                <div class="mt-1">Modifié le : Jamais</div>
            </div>
            <?php else: ?>
                <h4 class="font-bold text-center mb-2"><i data-cmw-visible="wiki:wiki_display_article_icon" class="<?= $firstArticle->getIcon() ?>"></i> <?= $firstArticle->getTitle() ?></h4>
                <p><?= $firstArticle->getContent() ?></p>
                <hr class="border-b-1 border-white dark:border-gray-500 mt-2">
                <div class="flex justify-between">
                    <div data-cmw-visible="wiki:wiki_display_creation_date" class="mt-1">Crée le : <?= $firstArticle->getDateCreate() ?></div>
                    <div data-cmw-visible="wiki:wiki_display_autor" class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1"><?= $firstArticle->getAuthor()->getPseudo() ?></div>
                    <div data-cmw-visible="wiki:wiki_display_edit_date" class="mt-1">Modifié le : <?= $firstArticle->getDateUpdate() ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>