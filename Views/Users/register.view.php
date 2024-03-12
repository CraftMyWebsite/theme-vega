<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;


Website::setTitle("Inscription");
Website::setDescription("Inscrivez-vous");
?>

<section style="background-image: url('<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold">Inscription</h2>
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

<?php if(ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button')): ?>
<section class="mx-auto lg:w-1/3">
    <form class="space-y-6" action="" method="post">
        <?php (new SecurityManager())->insertHiddenToken() ?>
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
            <div class="lg:grid grid-cols-2 gap-4">
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail
                        :</label>
                    <div class="relative mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                        </div>
                        <input name="register_email" type="text" id="input-group-1"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="votre@mail.com">
                    </div>
                </div>
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pseudo
                        :</label>
                    <div class="relative mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                        </div>
                        <input name="register_pseudo" type="text" id="input-group-1"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="votre@mail.com">
                    </div>
                </div>
            </div>

            <div class="lg:grid grid-cols-2 gap-4">
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot
                        de passe :</label>
                    <div class="relative flex mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-lock"></i>
                        </div>
                        <input name="register_password" type="password" id="passwordInput"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="••••••••">
                        <div onclick="showPassword()"
                             class="cursor-pointer p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmation
                        :</label>
                    <div class="relative flex mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-lock"></i>
                        </div>
                        <input name="register_password_verify" type="password" id="passwordInputV"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="••••••••">
                        <div onclick="showPasswordV()"
                             class="cursor-pointer p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
            <?php SecurityController::getPublicData(); ?>
            <button type="submit"
                    class="mt-2 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                S'inscrire
            </button>

            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <p class="font-medium">S'enregistrer avec</p>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <div class="px-4 py-2 justify-center text-center w-full sm:w-auto">
                <div class="flex-wrap inline-flex space-x-3">
                    <a href="#" class="hover:text-blue-600" aria-label="facebook">
                        <i class="fa-xl fa-brands fa-github"></i>
                    </a> <a href="#" class="hover:text-blue-600" aria-label="twitter">
                        <i class="fa-xl fa-brands fa-square-twitter"></i>
                    </a> <a href="#" class="hover:text-blue-600" aria-label="instagram">
                        <i class="fa-xl fa-brands fa-instagram"></i>
                    </a><a href="#" class="hover:text-blue-600" aria-label="discord">
                        <i class="fa-xl fa-brands fa-discord"></i></a>
                    <a href="#" class="hover:text-blue-600" aria-label="discord">
                        <i class="fa-xl fa-brands fa-google"></i></a>
                </div>
            </div>
            <label class="block text-sm mt-4">Déjà un comtpe, <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login" class="text-blue-500">connexion</a></label>
        </div>
    </form>
</section>
<?php else: ?>
<section class="mx-auto lg:w-1/3">
    <div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto mb-6 mt-6">
        <div class="relative bg-white rounded-lg shadow">
            <div class="py-6 px-6 lg:px-8">
                <?= ThemeModel::getInstance()->fetchConfigValue('global_no_register_message') ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<script>
    function showPassword() {
        var x = document.getElementById("passwordInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function showPasswordV() {
        var x = document.getElementById("passwordInputV");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>