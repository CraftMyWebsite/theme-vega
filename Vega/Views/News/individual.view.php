<?php

use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var \CMW\Entity\News\NewsEntity $news */

$title = Website::getName() . ' - ' . $news->getTitle();
$description = $news->getDescription();
?>

<section style="background-image: url('<?= ThemeModel::fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold"><?= $news->getTitle() ?></h2>
        <p><?= $news->getDescription() ?></p>
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
    <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
        <div class="lg:grid grid-cols-4 gap-2">
            <div>
                <img class="rounded-lg" src="<?= $news->getImageLink() ?>" alt="...">
                <p class="text-center mt-2"><?= $news->getAuthor()->getPseudo() ?>
                    <br><small><?= $news->getDateCreated() ?></small></p>
            </div>
            <div class="col-span-3">
                <?= $news->getContent() ?>
            </div>
        </div>
        <div class="flex justify-end">
            <div class="cursor-pointer">
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
            </div>
        </div>
    </div>
</section>

<section class="px-4 lg:px-24 2xl:px-96 py-6">
    <div class="w-full font-medium rounded-lg p-2 bg-gray-100 dark:bg-gray-900 dark:text-white mb-4"><i
            class="fa-solid fa-newspaper"></i> Espace commentaires
    </div>
    <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
        <?php foreach ($news->getComments() as $comment): ?>
            <div class=" bg-white dark:bg-gray-800 dark:text-gray-300 rounded-lg shadow p-4 mb-2">
                <div class="lg:grid grid-cols-5 gap-2">
                    <div class="mx-auto text-center">
                        <img style="height: 100px; width: 100px" class="rounded-lg"
                             src="<?= $comment->getUser()->getUserPicture()->getImageLink() ?>" alt="...">
                        <p><b>Zomb</b></p>
                        <small>25/03/2345 à 11h25</small>
                    </div>
                    <div class="col-span-4">
                        <p><?= $comment->getContent() ?></p>
                    </div>

                </div>
                <div class="flex justify-end">
                    <div class="cursor-pointer">
                                <span data-tooltip-target="<?php if ($comment->userCanLike()) {
                                    echo "tooltip-liked";
                                } else {
                                    echo "tooltip-like";
                                } ?>">
                                <span class="text-base"><?= $comment->getLikes()->getTotal() ?>
                                    <?php if ($comment->userCanLike()): ?>
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
                                        <a href="<?= $comment->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
                                        <div id="tooltip-like" role="tooltip"
                                             class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <hr class="my-4 border-t-2">
        <div class=" bg-white dark:bg-gray-800 dark:text-gray-300 rounded-lg shadow p-4">
            <form method="post" action="<?= $news->sendComments() ?>" class="">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div class="lg:grid grid-cols-5 gap-2">
                    <div class="mx-auto text-center">
                        <img style="height: 100px; width: 100px" class="rounded-lg"
                             src="http://localhost:63342/theme-vega/dev/img/bg1.png" alt="...">
                        <p><b>Zomb</b></p>
                    </div>
                    <div class="col-span-4">
                        <p><b>Votre commentaire :</b></p>
                        <textarea name="comments"
                                  class="mb-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  required></textarea>
                        <div class="text-center mt-4">
                            <?php if (UsersController::isUserLogged()): ?>
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">
                                    Commenter
                                    <i class="fa-solid fa-comments"></i>
                                </button>
                            <?php else: ?>
                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login"
                                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Commenter
                                    <i class="fa-solid fa-comments"></i></i></a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</section>