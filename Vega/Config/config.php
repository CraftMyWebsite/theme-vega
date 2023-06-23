<?php
use CMW\Controller\Core\PackageController;
use CMW\Controller\Minecraft\MinecraftController;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Minecraft\MinecraftModel;
use CMW\Utils\Utils;
use CMW\Utils\Website;

if (PackageController::isInstalled("Minecraft")) {
    $mc = new minecraftModel;
    $minecraft = MinecraftController::pingServer($mc->getFavServer()->getServerIp(), $mc->getFavServer()->getServerPort())->getPlayersOnline();
}
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
                            <div class="col-12 mb-2">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" value="1" name="dark_light" id="dark_light" <?= ThemeModel::fetchConfigValue('dark_light') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="dark_light"><h6>light-dark Switch <i data-bs-toggle="tooltip" title="Les utilisateur peuvent alterner entre dark et light" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
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
                    <p>Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>Si vous ne comprenez toujours pas ce que sa modifie merci de contacter le support de CraftMyWebsite</p>
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
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="hero_show_minecraft_player" name="hero_show_minecraft_player" <?= ThemeModel::fetchConfigValue('hero_show_minecraft_player') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="hero_show_minecraft_player"><h6>Nombre de joueurs minecraft : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="hero_show_footer_icon" name="hero_show_footer_icon" <?= ThemeModel::fetchConfigValue('hero_show_footer_icon') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="hero_show_footer_icon"><h6>Icon footer : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <section class="bg-gray-800 position-relative text-white">
                    <img width="1080" height="720" src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="position-absolute h-full inset-0 object-center object-cover w-full" style="width: 100%; height: 100%; object-fit: cover;" alt="Vous devez upload bg.webp depuis votre panel !"/>
                    <div class="row position-relative">
                        <div class="col-12 col-lg-6 p-5">
                            <div class=" w-full lg:w-8/12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input class="form-control text-center" type="text" id="hero_join_prefix" name="hero_join_prefix" value="<?= ThemeModel::fetchConfigValue('hero_join_prefix') ?>">
                                    </div>
                                    <div class="col-lg-4 text-start">
                                        <p><?= $minecraft ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control text-center" type="text" id="hero_join_suffix" name="hero_join_suffix" value="<?= ThemeModel::fetchConfigValue('hero_join_suffix') ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input class="form-control text-center" type="text" id="hero_title" name="hero_title" value="<?= ThemeModel::fetchConfigValue('hero_title') ?>">
                                    </div>
                                    <div class="col-lg-6 text-start">
                                        <p><?= Website::getName()?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="hero_description" name="hero_description" value="<?= ThemeModel::fetchConfigValue('hero_description') ?>">
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
                        <div class="col-12 col-lg-6">
                            <div class="text-center">
                                <img class="w-25" src="<?= ThemeModel::fetchImageLink("header_img_logo") ?>" alt="Image introuvable !">
                            </div>

                        </div>
                    </div>
                    <div class="container mx-auto position-relative">
                        <div class="flex flex-wrap p-3">

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
                <div class="row mt-2">
                    <div class="col card me-2">
                        <label>Icon :</label>
                        <div class="text-center">
                            <i class="mb-4 text-blue-700 text-4xl <?= ThemeModel::fetchConfigValue("feature_img_1") ?>"></i>
                            <input class="form-control text-center" type="text" id="feature_img_1" name="feature_img_1" value="<?= ThemeModel::fetchConfigValue("feature_img_1") ?>">
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
                        <label>Icon :</label>
                        <div class="text-center">
                            <i class="mb-4 text-blue-700 text-4xl <?= ThemeModel::fetchConfigValue("feature_img_2") ?>"></i>
                            <input class="form-control text-center" type="text" id="feature_img_2" name="feature_img_2" value="<?= ThemeModel::fetchConfigValue("feature_img_2") ?>">
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
                        <label>Icon :</label>
                        <div class="text-center">
                            <i class="mb-4 text-blue-700 text-4xl <?= ThemeModel::fetchConfigValue("feature_img_3") ?>"></i>
                            <input class="form-control text-center" type="text" id="feature_img_3" name="feature_img_3" value="<?= ThemeModel::fetchConfigValue("feature_img_3") ?>">
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
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="trailer_section_active" name="trailer_section_active" <?= ThemeModel::fetchConfigValue('trailer_section_active') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="trailer_section_active"><h6>Trailer : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="trailer_title" value="<?= ThemeModel::fetchConfigValue('trailer_title') ?>" required>
                    <div class="form-group">
                        <label>Texte :</label>
                        <input class="form-control" type="text" id="trailer_text" name="trailer_text" value="<?= ThemeModel::fetchConfigValue('trailer_text') ?>">
                    </div>
                    <div class="form-group">
                        <label>Texte du bouton :</label>
                        <input class="form-control" type="text" id="trailer_button_text" name="trailer_button_text" value="<?= ThemeModel::fetchConfigValue('trailer_button_text') ?>">
                    </div>
                    <div class="form-group">
                        <label>Lien du bouton :</label>
                        <input class="form-control" type="text" id="trailer_button_link" name="trailer_button_link" value="<?= ThemeModel::fetchConfigValue('trailer_button_link') ?>">
                    </div>
                    <div class="form-group">
                        <label>Code du lien youtube :</label>
                        <input class="form-control" type="text" id="trailer_youtube_link" name="trailer_youtube_link" value="<?= ThemeModel::fetchConfigValue('trailer_youtube_link') ?>">
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
                    <div class="form-group">
                        <label>Texte du bouton :</label>
                        <input class="form-control" type="text" id="news_button" name="news_button" value="<?= ThemeModel::fetchConfigValue('news_button') ?>">
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
                <label>Contenue :</label>
                <textarea name="custom_section_content_3" class="tinymce"><?= ThemeModel::fetchConfigValue('custom_section_content_3') ?></textarea>
            </div>
        </div>
        <!--CUSTOM 4-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_4" name="custom_section_active_4" <?= ThemeModel::fetchConfigValue('custom_section_active_4') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="custom_section_active_3"><h6>Personnalisable 4 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Contenue :</label>
                <textarea name="custom_section_content_4" class="tinymce"><?= ThemeModel::fetchConfigValue('custom_section_content_4') ?></textarea>
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








    <!---FOOTER---->
    <div class="tab-pane fade py-2" id="setting8" role="tabpanel" aria-labelledby="setting8-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Année :</h6>
                        <input type="text" class="form-control" id="footer_year" name="footer_year" value="<?= ThemeModel::fetchConfigValue('footer_year') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="footer_open_link_new_tab" name="footer_open_link_new_tab" <?= ThemeModel::fetchConfigValue('footer_open_link_new_tab') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="footer_open_link_new_tab"><h6>Ouvrir les liens dans un nouvel onglet</h6></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Conditions general :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de section :</h6>
                        <input type="text" class="form-control" id="footer_title_condition" name="footer_title_condition" value="<?= ThemeModel::fetchConfigValue('footer_title_condition') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="footer_active_condition" name="footer_active_condition" <?= ThemeModel::fetchConfigValue('footer_active_condition') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="footer_active_condition"><h6>Afficher dans le footer</h6></label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <h6>Condition General d'Utilisation :</h6>
                        <input type="text" class="form-control" id="footer_desc_condition_use" name="footer_desc_condition_use" value="<?= ThemeModel::fetchConfigValue('footer_desc_condition_use') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <h6>Condition General de Vente :</h6>
                        <input type="text" class="form-control" id="footer_desc_condition_sale" name="footer_desc_condition_sale" value="<?= ThemeModel::fetchConfigValue('footer_desc_condition_sale') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Icônes :</h4>
                <p>Retrouvez les incônes ici : <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a></p>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_facebook" name="footer_active_facebook" <?= ThemeModel::fetchConfigValue('footer_active_facebook') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_facebook"><h6>Icône 1 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::fetchConfigValue('footer_icon_facebook') ?>"></i>
                            </div>
                            <input type="text" class="mt-1 form-control" id="footer_link_facebook" name="footer_link_facebook" value="<?= ThemeModel::fetchConfigValue('footer_link_facebook') ?>" required>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="form-control" id="footer_icon_facebook" name="footer_icon_facebook" value="<?= ThemeModel::fetchConfigValue('footer_icon_facebook') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_twitter" name="footer_active_twitter" <?= ThemeModel::fetchConfigValue('footer_active_twitter') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_twitter"><h6>Icône 2 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::fetchConfigValue('footer_icon_twitter') ?>"></i>
                            </div>
                            <input type="text" class="mt-1 form-control" id="footer_link_twitter" name="footer_link_twitter" value="<?= ThemeModel::fetchConfigValue('footer_link_twitter') ?>" required>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="form-control" id="footer_icon_twitter" name="footer_icon_twitter" value="<?= ThemeModel::fetchConfigValue('footer_icon_twitter') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_instagram" name="footer_active_instagram" <?= ThemeModel::fetchConfigValue('footer_active_instagram') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_instagram"><h6>Icône 3 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::fetchConfigValue('footer_icon_instagram') ?>"></i>
                            </div>
                            <input type="text" class="mt-1 form-control" id="footer_link_instagram" name="footer_link_instagram" value="<?= ThemeModel::fetchConfigValue('footer_link_instagram') ?>" required>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="form-control" id="footer_icon_instagram" name="footer_icon_instagram" value="<?= ThemeModel::fetchConfigValue('footer_icon_instagram') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_discord" name="footer_active_discord" <?= ThemeModel::fetchConfigValue('footer_active_discord') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_discord"><h6>Icône 4 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::fetchConfigValue('footer_icon_discord') ?>"></i>
                            </div>
                            <input type="text" class="mt-1 form-control" id="footer_link_discord" name="footer_link_discord" value="<?= ThemeModel::fetchConfigValue('footer_link_discord') ?>" required>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="form-control" id="footer_icon_discord" name="footer_icon_discord" value="<?= ThemeModel::fetchConfigValue('footer_icon_discord') ?>" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
