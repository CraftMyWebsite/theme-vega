<?php
use CMW\Controller\Core\PackageController;
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
