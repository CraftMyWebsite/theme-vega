<?php
use CMW\Controller\Core\PackageController;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Utils;
use CMW\Utils\Website;

?>

<!-------------->
<!--Navigation-->
<!-------------->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="setting1-tab" data-bs-toggle="tab" href="#setting1" role="tab" aria-selected="true">En tête & Global</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting2-tab" data-bs-toggle="tab" href="#setting2" role="tab" aria-selected="false">Accueil</a>
    </li>
    <?php if (PackageController::isInstalled("News")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting3-tab" data-bs-toggle="tab" href="#setting3" role="tab" aria-selected="false">News</a>
        </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Faq")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting4-tab" data-bs-toggle="tab" href="#setting4" role="tab" aria-selected="false">F.A.Q</a>
        </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Votes")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting5-tab" data-bs-toggle="tab" href="#setting5" role="tab" aria-selected="false">Votes</a>
        </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Wiki")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting6-tab" data-bs-toggle="tab" href="#setting6" role="tab" aria-selected="false">Wiki</a>
        </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Forum")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting7-tab" data-bs-toggle="tab" href="#setting7" role="tab" aria-selected="false">Forum</a>
        </li>
    <?php endif; ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting8-tab" data-bs-toggle="tab" href="#setting8" role="tab" aria-selected="false">Footer</a>
    </li>
</ul>

<!--------------->
<!----CONTENT---->
<!--------------->
<div class="tab-content" id="myTabContent">
    <!---EN TÊTE---->
    <div class="tab-pane fade show active py-2" id="setting1" role="tabpanel" aria-labelledby="setting1-tab">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card-in-card">
                    <div class="card-body">
                        <h4>En tête</h4>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="header_active_logo" name="header_active_logo" <?= ThemeModel::fetchConfigValue('header_active_logo') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="header_active_logo"><h6>Logo : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                        </div>
                        <div class="text-center ">
                            <img class="w-25" src="<?= ThemeModel::fetchImageLink("header_img_logo") ?>" alt="Image introuvable !">
                        </div>
                        <input class="mt-2 form-control form-control-sm" type="file" id="header_img_logo" name="header_img_logo" accept=".png, .jpg, .jpeg, .webp, .gif">
                        <span>Fichiers autorisé ; png, jpg, jpeg, webp, svg, gif</span>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" value="1" name="header_active_title" id="header_active_title" <?= ThemeModel::fetchConfigValue('header_active_title') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="header_active_title"><h6>Titre : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                <div class="card-in-card">
                    <div class="card-body">
                        <h4>Global</h4>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" value="1" id="header_allow_login_button" name="header_allow_login_button" <?= ThemeModel::fetchConfigValue('header_allow_login_button') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="header_allow_login_button"><h6>Connexion <i data-bs-toggle="tooltip" title="Désactive le bouton de connexion mais vous avez toujours accès à la page" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" value="1" name="header_allow_register_button" id="header_allow_register_button" <?= ThemeModel::fetchConfigValue('header_allow_register_button') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="header_allow_register_button"><h6>Inscription <i data-bs-toggle="tooltip" title="Vous pouvez désactiver les inscriptions et afficher un message" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                </div>
                            </div>
                            <h6>Message d'inscription désactiver :</h6>
                            <textarea name="global_no_register_message" class="tinymce"><?= ThemeModel::fetchConfigValue('global_no_register_message') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---ACCUEIL---->
    <div class="tab-pane fade py-2" id="setting2" role="tabpanel" aria-labelledby="setting2-tab">
        <!--INDEX / META-->
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>Si vous ne comprenez toujours pas ce que sa modifier merci de contacter le support de CraftMyWebsite</p>
                </div>
                <h6>Titre de la page :</h6>
                <input type="text" class="form-control" id="home_title" name="home_title" value="<?= ThemeModel::fetchConfigValue('home_title') ?>" required>
            </div>
        </div>
        <!--HERO-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h6>En tête :</h6>
                <h6>Images :</h6>
                <input class="mt-2 form-control form-control-sm" type="file" id="hero_img_bg" name="hero_img_bg" accept="png,jpg,jpeg,webp,svg,gif">
                <span>Fichiers autorisé ; png, jpg, jpeg, webp, svg, gif</span>
                <h6>Réglages :</h6>
                <section class="bg-gray-800 position-relative text-white">
                    <img width="1080" height="720" src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="position-absolute h-full inset-0 object-center object-cover w-full" style="width: 100%; height: 100%; object-fit: cover;" alt="Vous devez upload bg.webp depuis votre panel !"/>
                    <div class="container mx-auto position-relative">
                        <div class="flex flex-wrap p-3">
                            <div class="mx-auto text-center w-full lg:w-8/12">
                                <div class="form-group">
                                    <input class="form-control text-center" type="text" id="hero_title" name="hero_title" value="<?= ThemeModel::fetchConfigValue('hero_title') ?>">
                                </div>
                                <h1 class="font-extrabold text-2xl md:text-6xl"><?= Website::getName()?></h1>
                                <div class="form-group">
                                    <input class="form-control text-center" type="text" id="hero_description" name="hero_description" value="<?= ThemeModel::fetchConfigValue('hero_description') ?>">
                                </div>
                                <div class="form-group">
                                    <div class="btn btn-primary"><input class="form-control text-center" type="text" id="hero_button_text" name="hero_button_text" value="<?= ThemeModel::fetchConfigValue('hero_button_text') ?>"></div>
                                </div>
                                <div class="form-group">
                                    <label for="hero_button_link">Lien du bouton :</label>
                                    <input class="form-control text-center" type="text" id="hero_button_link" name="hero_button_link" value="<?= ThemeModel::fetchConfigValue('hero_button_link') ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--FONCTIONNALITÉS-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="feature_section_active" name="feature_section_active" <?= ThemeModel::fetchConfigValue('feature_section_active') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="feature_section_active"><h6>Fonctionnalités : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <h6>Titre de la section :</h6>
                <input type="text" class="form-control" name="feature_section_title" value="<?= ThemeModel::fetchConfigValue('feature_section_title') ?>" required>
                <div class="row mt-2">
                    <div class="col card me-2">
                        <label>Image :</label>
                        <div class="text-center">
                            <img src="<?= ThemeModel::fetchImageLink("feature_img_1") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature1.webp depuis votre panel !" width="160" height="160"/>
                        </div>
                        <div class="form-group">
                            <input class="mt-2 form-control form-control-sm" type="file" id="feature_img_1" name="feature_img_1" accept="png,jpg,jpeg,webp,svg,gif">
                            <span>Fichiers autorisé ; png, jpg, jpeg, webp, svg, gif</span>
                        </div>
                        <div class="form-group">
                            <label>Titre :</label>
                            <input class="form-control text-center" type="text" id="feature_title_1" name="feature_title_1" value="<?= ThemeModel::fetchConfigValue('feature_title_1') ?>">
                        </div>
                        <div class="form-group">
                            <label>Description :</label>
                            <input class="form-control text-center" type="text" id="feature_description_1" name="feature_description_1" value="<?= ThemeModel::fetchConfigValue('feature_description_1') ?>">
                        </div>
                    </div>
                    <div class="col card me-2">
                        <label>Image :</label>
                        <div class="text-center">
                            <img src="<?= ThemeModel::fetchImageLink("feature_img_2") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature2.webp depuis votre panel !" width="160" height="160">
                        </div>
                        <div class="form-group">
                            <input class="mt-2 form-control form-control-sm" type="file" id="feature_img_2" name="feature_img_2" accept="png,jpg,jpeg,webp,svg,gif">
                            <span>Fichiers autorisé ; png, jpg, jpeg, webp, svg, gif</span>
                        </div>
                        <div class="form-group">
                            <label>Titre :</label>
                            <input class="form-control text-center" type="text" id="feature_title_2" name="feature_title_2" value="<?= ThemeModel::fetchConfigValue('feature_title_2') ?>">
                        </div>
                        <div class="form-group">
                            <label>Description :</label>
                            <input class="form-control text-center" type="text" id="feature_description_2" name="feature_description_2" value="<?= ThemeModel::fetchConfigValue('feature_description_2') ?>">
                        </div>
                    </div>
                    <div class="col card me-2">
                        <label>Image :</label>
                        <div class="text-center">
                            <img src="<?= ThemeModel::fetchImageLink("feature_img_3") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature3.webp depuis votre panel !" width="160" height="160">
                        </div>
                        <div class="form-group">
                            <input class="mt-2 form-control form-control-sm" type="file" id="feature_img_3" name="feature_img_3" accept="png,jpg,jpeg,webp,svg,gif">
                            <span>Fichiers autorisé ; png, jpg, jpeg, webp, svg, gif</span>
                        </div>
                        <div class="form-group">
                            <label>Titre :</label>
                            <input class="form-control text-center" type="text" id="feature_title_3" name="feature_title_3" value="<?= ThemeModel::fetchConfigValue('feature_title_3') ?>">
                        </div>
                        <div class="form-group">
                            <label>Description :</label>
                            <input class="form-control text-center" type="text" id="feature_description_3" name="feature_description_3" value="<?= ThemeModel::fetchConfigValue('feature_description_3') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--NEWS-->
        <?php if (PackageController::isInstalled("News")): ?>
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="news_section_active" name="news_section_active" <?= ThemeModel::fetchConfigValue('news_section_active') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="news_section_active"><h6>Nouveautés : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="news_section_title" value="<?= ThemeModel::fetchConfigValue('news_section_title') ?>" required>
                    <div class="form-group">
                        <label>Nombre de news à afficher :</label>
                        <input class="form-control" type="number" id="news_number_display" name="news_number_display" value="<?= ThemeModel::fetchConfigValue('news_number_display') ?>">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--CUSTOM 1-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_1" name="custom_section_active_1" <?= ThemeModel::fetchConfigValue('custom_section_active_1') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="custom_section_active_1"><h6>Personnalisable 1 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Titre de la section :</label>
                <input type="text" class="form-control" name="custom_section_title_1" value="<?= ThemeModel::fetchConfigValue('custom_section_title_1') ?>" required>
                <label>Contenue :</label>
                <textarea name="custom_section_content_1" class="tinymce"><?= ThemeModel::fetchConfigValue('custom_section_content_1') ?></textarea>
            </div>
        </div>
        <!--CUSTOM 2-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_2" name="custom_section_active_2" <?= ThemeModel::fetchConfigValue('custom_section_active_2') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="custom_section_active_2"><h6>Personnalisable 2 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Titre de la section :</label>
                <input type="text" class="form-control" name="custom_section_title_2" value="<?= ThemeModel::fetchConfigValue('custom_section_title_2') ?>" required>
                <label>Contenue :</label>
                <textarea name="custom_section_content_2" class="tinymce"><?= ThemeModel::fetchConfigValue('custom_section_content_2') ?></textarea>
            </div>
        </div>
        <!--CUSTOM 3-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_3" name="custom_section_active_3" <?= ThemeModel::fetchConfigValue('custom_section_active_3') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="custom_section_active_3"><h6>Personnalisable 3 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Titre de la section :</label>
                <input type="text" class="form-control" name="custom_section_title_3" value="<?= ThemeModel::fetchConfigValue('custom_section_title_3') ?>" required>
                <label>Contenue :</label>
                <textarea name="custom_section_content_3" class="tinymce"><?= ThemeModel::fetchConfigValue('custom_section_content_3') ?></textarea>
            </div>
        </div>
        <!--CONTACT-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="contact_section_active" name="contact_section_active" <?= ThemeModel::fetchConfigValue('contact_section_active') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="contact_section_active"><h6>Contact : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Titre de la section :</label>
                <input type="text" class="form-control" name="contact_section_title" value="<?= ThemeModel::fetchConfigValue('contact_section_title') ?>" required>
            </div>
        </div>
    </div>
</div>
