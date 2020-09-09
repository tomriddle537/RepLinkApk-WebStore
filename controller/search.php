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
<?php
if ($num <= $cantpages) {
    if ($num == $cantpages) {
        $to = count($tempApps) - 1;
    } else {
        $to = $pagina + ($forPage - 1);
    }
    if ($num == $cantpages && $num == 1) {
        $till = 3;
    }
    $last = false;
    $one = false;
    ?>
    <div class="fd-search_mega mdl-shadow--2dp mdl-color--white" style="border-radius: 25px; padding: 5px 20px;">
        <form role="search" method="get" action="/<?php echo $repo; ?>/q/">
            <div class="mdl-js-textfield mdl-textfield--floating-label" >
                <input  id="search_term" class="mdl-textfield__input mdl-color--white" type="text" value="<?php echo $query != -1 ? $query : ""; ?>" name="q" />
                <label class="mdl-textfield__label" style="margin: 0 0 20px 20px;" for="search_term"><i class="material-icons"><i class="fa fa-search" > </i></i>Search apps...</label>
            </div>
        </form>
    </div>
    <div class="fd-tabs mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <?php
        if (count($tempApps) > 0) {
            if ($paginationOnTop) {
                include './controller/pagination.php';
            }
            ?>
            <div class="mdl-tabs__tab-bar">
                <h1 class="fd-title">
                    Found <?php echo count($tempApps) == 1 ? "1 result " : count($tempApps) . " results"; ?> for "<?php echo $query; ?>"
                </h1>
            </div>
        <?php } ?>
        <div class="mdl-tabs__panel is-active" >
            <div class="fd-list_applications">
                <?php
                if (count($tempApps) > 0) {
                    include_once './controller/color/util.php';
                    for ($r = 0; $r < count($tempApps); $r++) {
                        $eyeBadge = false;
                        $id = $tempApps[$r]['id'];
                        $app = $tempApps[$r]['name'];

                        $fullApp = $app;
                        if (in_array($id, $idapp)) {
                            $eyeBadge = true;
                        }
                        if (strlen($app) > 20) {
                            $app = trim(substr($app, 0, 18)) . "...";
                        }
                        $iconFile = $repositoriesRoute . $repo . "\\icons\\$id.jpg";
                        $ext = "xml";
                        $default = false;
                        if (file_exists($iconFile)) {
                            $ext = "jpg";
                        } else if (file_exists(str_replace('jpg', 'webp', $iconFile))) {
                            $iconFile = str_replace('jpg', 'webp', $iconFile);
                            $ext = "webp";
                        } else if (file_exists(str_replace('jpg', 'png', $iconFile))) {
                            $iconFile = str_replace('jpg', 'png', $iconFile);
                            $ext = "png";
                        } else {
                            $iconFile = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . "/view/images/default.png";
                            $ext = "png";
                            $default = true;
                        }

                        $extractedColors = getMaterialColorForImage($iconFile, $ext, 'fast');
                        $mainColor = $extractedColors[2];
                        $materialColor = $extractedColors[0];
                        $contrastColor = $extractedColors[1];

                        $addedDateParts = explode("-", $tempApps[$r]['added']);

                        $added = $tempApps[$r]['added'];
                        $lastupdated = $tempApps[$r]['lastupdated'];
                        $dateCurrent = new DateTime();
                        $dateCurrent->setDate(date("Y"), date("n"), date("d"));


                        $newApp = false;
                        $actApp = false;
                        if ($lastupdated == "0000-00-00") {
                            $dateAdded = new DateTime();
                            $dateAdded->setDate(substr($added, 0, 4), substr($added, 5, 2), substr($added, 8, 2));
                            $dateAddedDiff = date_diff($dateAdded, $dateCurrent)->days;
                            if ($dateAddedDiff < $daysForNew) {
                                $newApp = true;
                            }
                        } else {
                            $dateUpdated = new DateTime();
                            $dateUpdated->setDate(substr($lastupdated, 0, 4), substr($lastupdated, 5, 2), substr($lastupdated, 8, 2));
                            $dateUpdatedDiff = date_diff($dateUpdated, $dateCurrent)->days;
                            if ($dateUpdatedDiff < $daysForUpdated) {
                                $actApp = true;
                            }
                        }

                        $catPos = array_search($tempApps[$r]['category'], $catType);
                        $catPosText = "/$catPos";
                        if ($catPos === false) {
                            $catPosText = "";
                        }
                        ?>

                        <div class="fd-application fd-application_box mdl-card mdl-shadow--2dp mdl-color--white">
                            <div class="mdl-card__title mdl-card--expand" style="background: url(<?php echo $default ? ("//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/images/default.transparent.png" ) : ($titles["$repo-url"] . "/icons/" . $id . ".$ext") ?>) 50% 30% no-repeat  <?php echo $materialColor; ?>; background-size: 80px 80px;">
                                <h5 class="mdl-card__title-text mdl-color-text--<?php echo $contrastColor; ?>" ><a href="<?php echo "/$repo$catPosText"; ?>" title="<?php echo $tempApps[$r]['category']; ?>"><?php echo $tempApps[$r]['category']; ?></a></h5>
                            </div>
                            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                                <a href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/details/$repo/$id"; ?>" title="<?php echo $fullApp; ?>"><?php echo $app; ?></a>
                            </div>
                            <div class="mdl-card__actions mdl-card--border" style="text-align: right;">
                                <a href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/details/$repo$catPosText/$id"; ?>" title="<?php echo $fullApp; ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Details...</a>
                            </div>
                            <?php include './controller/badge.php'; ?>
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
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if (count($tempApps) == 0) { ?>
        <h1 class="fd-title">
            404 NOT FOUND! 
        </h1>
        <p style="text-align: center;"><img class="img-responsive" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/nothing.300x285.png" alt=""></p>
    <?php } ?>
    <?php
} 
