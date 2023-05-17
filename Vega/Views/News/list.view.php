<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;


$title = Website::getName() . ' - '. ThemeModel::fetchConfigValue('news_title');
$description = ThemeModel::fetchConfigValue('news_description');
?>

<section style="background-image: url('<?= ThemeModel::fetchImageLink('hero_img_bg') ?>');" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 class="font-bold">Nouveautés</h2>
        <p>Description de la page</p>
    </div>

    <!--SEPARATOR-->
    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="bg-transparent text-white dark:text-gray-800 rotate-180" width="100%" height="90px">
        <path fill="currentColor" d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" ></path>
    </svg>
</section>

<section>
    <div class="px-4 lg:px-24 2xl:px-72 py-16">
        <div class="lg:grid grid-cols-2 gap-4">


            <div class="rounded-lg shadow-xl bg-gray-100 dark:bg-gray-900 h-fit">
                <div class="">
                    <img class="rounded-t-lg" src="http://localhost:63342/theme-vega/dev/img/bg1.png" alt="...">
                </div>
                <div class=" rounded-b-lg p-4">
                    <div class="flex justify-between">
                        <p class="font-bold text-2xl">Titre</p>
                        <span class="h-fit bg-gray-300 text-gray-800 text-xs font-medium inline-flex items-center px-1 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">28/25/2025 à 18h32</span>
                    </div>
                    <p class="font-medium mb-4">Description iption iption iption iption iption iption iption iption iption iption iption iption iption iption</p>
                    <div class="flex justify-between">
                        <a href="#" class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Lire la suite
                        </a>
                        <div class="self-end"><i class="fa-solid fa-heart"></i></div>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-xl bg-gray-100 dark:bg-gray-900 h-fit">
                <div class="">
                    <img class="mx-auto" src="data:image/jpeg;base64,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" alt="...">
                </div>
                <div class=" rounded-b-lg p-4">
                    <div class="flex justify-between">
                        <p class="font-bold text-2xl">Titre</p>
                        <span class="h-fit bg-gray-300 text-gray-800 text-xs font-medium inline-flex items-center px-1 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">28/25/2025 à 18h32</span>
                    </div>
                    <p class="font-medium mb-4">Description iption iption iption iption iption iption iption iption iption iption iption iption iption iption</p>
                    <div class="flex justify-between">
                        <a href="#" class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Lire la suite
                        </a>
                        <div class="self-end"><i class="fa-solid fa-heart"></i></div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</section>