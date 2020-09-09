<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
?>
<div class="spn_hol">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<div class="fd-tabs mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
    <div class="mdl-tabs__panel is-active" >
        <div class="fd-list_applications">
            <?php
            if (count($reposList) > 0) {
                include_once './controller/color/util.php';
                foreach ($reposList as $repoUnit) {
                    $iconFile = $repositoriesRoute . $repoUnit . "\\" . $titles[$repoUnit . "-icon"];
                    $ext = "xml";
                    $default = false;
                    if (file_exists($iconFile)) {
                        $ext = substr(strrchr($titles[$repoUnit . "-icon"], "."), 1);
                    } else {
                        $iconFile = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . "/view/images/default.png";
                        $ext = "png";
                        $default = true;
                    }
                    $extractedColors = getMaterialColorForImage($iconFile, $ext, 'fast');
                    $mainColor = $extractedColors[2];
                    $materialColor = $extractedColors[0];
                    $contrastColor = $extractedColors[1];
                    ?>
                    <div class="fd-application fd-application_box mdl-card mdl-shadow--2dp mdl-color--white">
                        <div class="mdl-card__title mdl-card--expand" style="background: url(<?php echo $default ? ("//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/images/default.png" ) : ($titles["$repoUnit-url"] . "/" . $titles["$repoUnit-icon"]) ?>) 50% 30% no-repeat  <?php echo $materialColor; ?>; background-size: 80px 80px;">
                            <h5 class="mdl-card__title-text mdl-color-text--<?php echo $contrastColor; ?>" ><a  title="<?php echo $titles["$repoUnit"]; ?>"><?php echo $titles["$repoUnit"]; ?></a></h5>
                        </div>
                        <div class="mdl-card__supporting-text mdl-color-text--grey-600" style="font-size:9pt !important;" >
                            <span><?php echo $titles["$repoUnit-desc"]; ?></span>
                        </div>
                        <div class="mdl-card__actions mdl-card--border" style="text-align: right;">
                            <a href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/$repoUnit"; ?>" title="<?php echo $titles["$repoUnit"]; ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Open...</a>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
                <div class="fd-flex_filler"></div>
            </div>
        <?php } ?>
    </div>
    <?php if (count($reposList) == 0) { ?>
        <h1 class="fd-title">
            Found 0 repositories for this Setup! Please check "config.php" file.
        </h1>
        <p style="text-align: center;"><img class="img-responsive" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/nothing.300x285.png" alt=""></p>
        <?php } ?>
</div>

