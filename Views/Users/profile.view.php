<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;


$title = Website::getWebsiteName() . ' - Profil de ' . $user->getPseudo() ;
$description = Website::getWebsiteDescription();
?>

<section style="background-image: url('<?= ThemeModel::fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold"><?= $user->getPseudo() ?></h2>
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

<section class="mx-auto lg:w-1/2">
    <div class="lg:grid grid-cols-2 gap-6">
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
            <h4 class="text-center font-bold">Identité visuel</h4>
            <img style="height: 200px; width: 200px" class="rounded-lg shadow-lg mx-auto"
                 src="<?= $user->getUserPicture()->getImage() ?>"
                 alt="...">
            <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Changer
                d'image :</label>
            <form action="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>profile" method="post" enctype="multipart/form-data">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <input name="pictureProfile" accept=".png, .jpg, .jpeg, .webp, .gif" required
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG, WEBP, GIF
                    (MAX. 400px400px).</p>
                <button type="submit"
                        class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Sauvegarder
                </button>
            </form>
        </div>
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
            <form class="space-y-6" action="profile/update" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <h4 class="text-center font-bold">Informations personnel</h4>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail
                    :</label>
                <div class="relative mb-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                    </div>
                    <input required value="<?= $user->getMail() ?>" name="email" type="text" id="input-group-1"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="votre@mail.com">
                </div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pseudo /
                    Nom d'affichage :</label>
                <div class="relative mb-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-gray-500 dark:text-gray-400 fa-solid fa-user"></i>
                    </div>
                    <input required value="<?= $user->getPseudo() ?>" name="pseudo" type="text" id="input-group-1"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Jean">
                </div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de
                    passe :</label>
                <div class="relative mb-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-gray-500 dark:text-gray-400 fa-solid fa-lock"></i>
                    </div>
                    <input required name="password" type="text" id="input-group-1"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="*********">
                </div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmation
                    :</label>
                <div class="relative mb-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-gray-500 dark:text-gray-400 fa-solid fa-lock"></i>
                    </div>
                    <input required name="passwordVerif" type="text" id="input-group-1"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="*********">
                </div>
                <button type="submit"
                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Modifier
                </button>
            </form>
        </div>


        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4 mb-6">
            <div class="space-y-6">
                <h4 class="text-center font-bold"><?php if ($user->get2Fa()->isEnabled()): ?>
                        <span style="color: #188c1a;">Sécurité <i class="fa-solid fa-check"></i></span>
                    <?php else: ?>
                        <span style="color: #bc2015;">Sécurité <i class="fa-solid fa-triangle-exclamation"></i></span>
                    <?php endif; ?></h4>

                <?php if (!$user->get2Fa()->isEnabled()): ?>
                    <p class="block mb-2 text-sm font-medium text-gray-900">Pour activer l'authentification à double facteur scannez le QR code dans une application
                        d'authentification (GoogleAuthenticator, Aegis ...)</p>
                <?php endif; ?>


                <form class="space-y-6" action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile/2fa/toggle" method="post">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                <div class="lg:grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <img class="mx-auto" height="85%" width="85%" src='<?= $user->get2Fa()->getQrCode(250) ?>'
                             alt="QR Code double authentification">
                        <span><?= $user->get2Fa()->get2FaSecretDecoded() ?></span>
                    </div>
                    <div>
                        <label for="secret" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code d'authentification
                            :</label>
                        <div class="relative mb-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="text-gray-500 dark:text-gray-400 fa-solid fa-shield-halved"></i>
                            </div>
                            <input required name="secret" type="text" id="secret"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                    class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <?= $user->get2Fa()->isEnabled() ? 'Désactiver' : 'Activer' ?>
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4 mb-6 h-fit">
            <div class="space-y-6">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <h4 class="text-center font-bold">Vous nous quittez ?</h4>
                <p class="text-center block mt-4 mb-4 text-sm font-medium">Nous somme triste de vous voir partir !</p>
                <div class="text-center mt-4 mb-6">
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>profile/delete/<?= $user->getId() ?>" style="background: #a21111" class="mb-4 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Supprimer mon compte</a>
                </div>
            </div>
        </div>



    </div>

</section>