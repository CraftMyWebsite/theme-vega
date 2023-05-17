<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;

?>
</body>
<div class="border-t-2 text-sm mt-auto dark:text-gray-300">
    <div class="flex flex-wrap  items-center">
        <div class="px-6 py-6 md:flex-1">
            <p>Copyright © <br>Par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <b>Vega</b></p>
            <p class="hidden">Credit thème : PinglsDzn - Z0mblard</p>
        </div>
        <div class="px-4 py-2 w-full sm:w-auto">
            <div class="flex-wrap inline-flex space-x-3">
                <a href="" target="_blank" class="hover:text-blue-600">
                    <i class="fa-xl fa-solid fa-users"></i>
                </a>
                <a href="" target="_blank" class="hover:text-blue-600">
                    <i class="fa-xl fa-solid fa-users"></i>
                </a>
                <a href="" target="_blank" class="hover:text-blue-600">
                    <i class="fa-xl fa-solid fa-users"></i>
                </a>
                <a href="" target="_blank" class="hover:text-blue-600">
                    <i class="fa-xl fa-solid fa-users"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</html>

<?php if(ThemeModel::fetchConfigValue('dark_light')): ?>
    <script src="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Vega/Assets/Js/darklight.js"></script>
<?php endif; ?>