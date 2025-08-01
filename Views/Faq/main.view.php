<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/** @var CMW\Entity\Faq\FaqEntity $faqList */

Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('faq','faq_page_title'));
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('faq','faq_description'));
?>

<section data-cmw-style="background:home-hero:hero_img_bg" style="background: no-repeat ;background-size: cover;" class="bg-cover mb-4">
    <div class="text-center text-white py-8">
        <h2 data-cmw="faq:faq_page_title" class="font-bold"></h2>
        <p data-cmw="faq:faq_description"></p>
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


<div class="<?php if(ThemeModel::getInstance()->fetchConfigValue('faq','faq_display_form')): {echo "lg:grid grid-cols-3 gap-6";} endif ?> py-6 px-4 lg:px-24 2xl:px-60 ">
    <section data-cmw-visible="faq:faq_display_form" class="">
        <div class="rounded-lg shadow bg-gray-100 dark:bg-gray-900">
            <div class="p-4 rounded-lg">
                <p class="text-center text-lg font-medium mb-4 " data-cmw="faq:faq_question_title"></p>
                <form action="contact" method="post" class="">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <div class="lg:grid grid-cols-2 gap-6 ">
                        <div>
                            <label for="input-group-1"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre mail
                                :</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                                </div>
                                <input name="email" required type="text" id="input-group-1"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="votre@mail.com">
                            </div>
                        </div>
                        <div>
                            <label for="input-group-1"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre nom
                                :</label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="text-gray-500 dark:text-gray-400 fa-solid fa-signature"></i>
                                </div>
                                <input name="name" required type="text" id="input-group-1"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Jean Dupont">
                            </div>
                        </div>
                    </div>
                    <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sujet
                        :</label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 dark:text-gray-400 fa-solid fa-circle-info"></i>
                        </div>
                        <input name="object" required type="text" id="input-group-1"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Votre site est super">
                    </div>

                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre
                        message</label>
                    <textarea minlength="50" name="content" required id="message" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Bonjour,"></textarea>
                    <div class="mt-4 text-center">
                        <button type="submit"
                                class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Soumettre <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="col-span-2 mt-4 lg:mt-0">
        <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow p-4">
            <p class="text-center text-lg font-medium mb-4" data-cmw="faq:faq_answer_title"></p>

            <div id="accordion-collapse" data-accordion="collapse">
                <?php foreach ($faqList as $faq) : ?>
                <p id="accordion-collapse-heading-2">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-<?= $faq->getFaqId() ?>" aria-expanded="false"
                            aria-controls="accordion-collapse-body-<?= $faq->getFaqId() ?>">
                        <span><?= $faq->getQuestion() ?></span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </p>
                <div id="accordion-collapse-body-<?= $faq->getFaqId() ?>" class="hidden" aria-labelledby="accordion-collapse-heading-<?= $faq->getFaqId() ?>">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 "><?= $faq->getResponse() ?></p>
                        <p data-cmw-visible="faq:faq_display_autor"><small><?= $faq->getAuthor()->getPseudo() ?></small></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
</div>