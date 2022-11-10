<?php
include_once("include/head.php");
include_once("include/header.php");
?>

<!--HERO SECTION-->
<section class="bg-[url('http://localhost:63342/theme-vega/dev/img/bg1.png')] bg-cover mb-4">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:pt-24 lg:pb-24 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <div class="max-w-2xl text-white font-light md:text-lg lg:text-xl"><i class="text-green-500 fa-regular fa-circle-dot"></i> Rejoins les <b>10</b> joueurs en ligne</div>
            <div class="max-w-2xl mb-4 text-2xl md:text-3xl xl:text-4xl font-bold tracking-tight leading-none text-white">Bienvenue sur <span class="text-3xl md:text-4xl xl:text-5xl underline">votre site</span></div>
            <div class="max-w-2xl mb-4 text-white font-light  md:text-lg lg:text-xl">Une super description pour votre serveur web</div>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Bouton 1
            </a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Bouton 2
            </a>
            <div class="py-2 w-full sm:w-auto mt-4 text-4xl text-white">
                <div class="flex-wrap inline-flex space-x-4 lg:space-x-6">
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-square-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-discord"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="./img/logo.png" alt="mockup">
        </div>

    </div>
    <!--SEPARATOR-->
    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="bg-transparent text-white dark:text-gray-800 rotate-180" width="100%" height="90px">
        <path fill="currentColor" d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" ></path>
    </svg>
</section>

<!--NEWS SECTION-->
<section>
    <div class="px-4 lg:px-24 2xl:px-72">
        <div class="w-full font-medium rounded-lg p-2 bg-gray-100 dark:bg-gray-900 dark:text-white"><i class="fa-solid fa-newspaper"></i> Derniers articles</div>
        <div class="lg:grid grid-cols-2">
            <div class="p-4">
                <div class="bg-[url('http://localhost:63342/theme-vega/dev/img/bg1.png')] bg-cover h-96 rounded-lg flex">
                    <div class="bg-gray-900/70 self-end w-full rounded-b-lg text-white">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <p class="font-bold text-2xl">Titre</p>
                                <span class="h-fit bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-1 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                  28/25/2025 à 18h32
                                </span>
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
            <div class="p-4">
                <div class="bg-[url('http://localhost:63342/theme-vega/dev/img/bg1.png')] bg-cover h-96 rounded-lg flex">
                    <div class="bg-gray-900/70 self-end w-full rounded-b-lg text-white">
                        <div class="p-4">
                            <div class="flex justify-between">
                                <p class="font-bold text-2xl">Titre</p>
                                <span class="h-fit bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-1 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                  28/25/2025 à 18h32
                                </span>
                            </div>
                            <p class="font-medium mb-4">Description iption iption iption iption iption iption iption iption</p>
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
        </div>
    </div>
</section>

<!--Trailer-->
<section class="bg-gray-100 dark:bg-gray-900 dark:text-white">
    <div class="px-4 py-6 lg:px-24 2xl:px-48">
        <div class="lg:grid lg:grid-cols-2">
            <div class="text-center my-auto lg:px-16">
                <div class="font-bold text-3xl mb-4">Titre du texte</div>
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recentl</div>
                <div class="mt-4">
                    <a href="#" class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Lire la suite
                    </a>
                    <a href="#" class="ml-4 px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Lire la suite
                    </a>
                </div>
            </div>
            <div class="rounded-lg bg-white p-2 mx-auto dark:bg-gray-800 mt-8 lg:mt-0">
                <iframe class="w-full h-[12rem] lg:w-[36rem] lg:h-[24rem]" src="https://www.youtube.com/embed/Mskc0Q_Abpw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!--WHY US SECTION-->
<section>
    <div class="container mx-auto px-4 py-16 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full p-4  xl:w-4/12 sm:w-6/12">
                <div class="bg-gray-100 block group px-6 py-16 rounded-lg shadow-lg dark:bg-gray-900 dark:text-white">
                    <div class="text-center">
                        <i class="mb-4 text-blue-700 text-4xl fa-solid fa-code"></i>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 text-xl dark:text-white">Development</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor.</p>
                </div>
            </div>
            <div class="w-full p-4  xl:w-4/12 sm:w-6/12">
                <div class="bg-gray-100 block px-6 py-16 rounded-lg shadow-lg dark:bg-gray-900 dark:text-white">
                    <div class="text-center">
                        <i class="mb-4 text-blue-700 text-4xl fa-solid fa-swatchbook"></i>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 text-xl dark:text-white">Product Design</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor. </p>
                </div>
            </div>
            <div class="w-full p-4  xl:w-4/12 sm:w-6/12">
                <div class="bg-gray-100 block px-6 py-16 rounded-lg shadow-lg dark:bg-gray-900 dark:text-white">
                    <div class="text-center">
                        <i class="mb-4 text-blue-700 text-4xl fa-solid fa-object-group"></i>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 text-xl dark:text-white">UI/UX Research</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae congue tortor. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--CUSTOM SECTION 1-->
<section class="bg-gray-100 dark:bg-gray-900">
    <div class="px-4 lg:px-24 2xl:px-72">
        test
    </div>
</section>

<!--CUSTOM SECTION 2-->
<section>
    <div class="px-4 lg:px-24 2xl:px-72">
        test
    </div>
</section>

<!--STATS SECTION-->
<section class="bg-gray-100 dark:bg-gray-900">
    <div class="px-4 lg:px-24 2xl:px-72">
        test
    </div>
</section>

<!--CONTACT SECTION-->
<section>
    <div class="px-4 lg:px-24 2xl:px-72">
        test
    </div>
</section>

<?php
include_once("include/footer.php");
?>
