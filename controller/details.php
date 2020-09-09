<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
include_once './controller/color/util.php';


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

$title = "";
$category = "";
$idApp = "";
$android;
$du = "";
$da = "";
$flagFoundApp = false;
$summary = "";
$desc = "";
$size = "";

$arrayAllVersionsSize = array();
$arrayAllVersionsApk = array();
$arrayAllVersionsSDK = array();
$arrayAllVersionsVer = array();
$arrayAllObbMainFile = array();
$arrayAllObbPatchFile = array();
foreach ($allXmlApps as $app) {
    if ($app['id'] == $id) {
        $title = $app['name'];
        $idApp = $app['id'];
        $summary = $app['summary'];
        $desc = $app['desc'];
        $category = $app['category'];
        $size = $app['size'];
        if ($size > 0) {
            $arrayAllVersionsSize = $app['arrayAllVersionsSize'];
            $arrayAllVersionsApk = $app['arrayAllVersionsApk'];
            $arrayAllVersionsSDK = $app['arrayAllVersionsSDK'];
            $arrayAllVersionsVer = $app['arrayAllVersionsVer'];
            $arrayAllObbMainFile = $app['arrayAllObbMainFile'];
            $arrayAllObbPatchFile = $app['arrayAllObbPatchFile'];
        }
        $du = $app['lastupdated'];
        $da = $app['added'];
        $flagFoundApp = true;
    }
}
?>
<div id="fd-section_container">
    <div class="spn_hol">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <?php
    if ($flagFoundApp) {
        $nDayA = (int) substr($da, 8, 2);
        $nYearA = (int) substr($da, 0, 4);
        $nMonthA = (int) substr($da, 5, 2);
        $nMonthA--;
        if ($du == "0000-00-00") {
            $du = $da;
        }
        $nDayU = (int) substr($du, 8, 2);
        $nYearU = (int) substr($du, 0, 4);
        $nMonthU = (int) substr($du, 5, 2);
        $nMonthU--;

        $fa = "$month[$nMonthA] $nDayA, $nYearA";
        $fu = "$month[$nMonthU] $nDayU, $nYearU";
        if ($size > 0) {
            $android = $androidSDKVer[(int) $arrayAllVersionsSDK[0]];
        }

        //$showranking = false;
        ?>
        <section class="fd-section mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="fd-section_header mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone" style="background: url(<?php echo $default ? ("//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/images/default.transparent.png" ) : $titles["$repo-url"] . "/icons/" . $id . ".$ext" ?>) center center no-repeat  <?php echo $materialColor; ?>; background-size: 120px 120px;"></div>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card__supporting-text mdl-color-text--grey-900">
                    <h1 class="fd-application_title"><?php echo $title; ?></h1>
                    <div class="mdl-color-text--grey-600"><i class="pe-7s-<?php echo $icon[$repo]; ?>"></i>&nbsp;<?php echo $category; ?></div>
                    <div class="fd-application_info mdl-color-text--grey-800">
                        <strong>Added</strong>: <?php echo $fa; ?><br/>
                        <strong>Updated</strong>: <?php echo $fu; ?><br/>
                        <?php if ($size > 0) { ?>
                            <strong>Lastest Version</strong>: <?php echo $arrayAllVersionsVer[0]; ?><br/>
                            <strong>Size</strong>: <?php echo GetAppSize($arrayAllVersionsSize[0]); ?><br/>
                            <strong>Require Android</strong>: <?php echo $android; ?>
                        <?php } ?>
                    </div>
                    <?php if ($size > 0) { ?>
                        <img class='androidver' title="Android <?php echo $android; ?>" style="float: right; margin-top: 30px; width:64px; height:64px" src='<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/sdk/<?php echo $arrayAllVersionsSDK[0]; ?>.png'/>
                    <?php } ?>
                </div>
            </div>

            <?php if (!$nomaterial) { ?>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white" id="fd-application_menu">
                    <i class="fa fa-download"></i>
                </button>
            <?php } ?>
            <?php
            if ($size > 0) {
                $urlApk = array();
                $urlApkAndroid = array();
                $urlObbMainAndroid = array();
                $urlObbPatchAndroid = array();
                for ($index = 0; $index < count($arrayAllVersionsApk); $index++) {
                    $oneApkName = $arrayAllVersionsApk[$index];
                    $urlApk[] = "href='" . $titles["$repo-url"] . "/" . $oneApkName . "'";
                    $urlApkAndroid[] = $arrayAllVersionsSDK[$index];
                    $urlObbMainAndroid [] = $arrayAllObbMainFile[$index] == "" ? "" : "href='" . $titles["$repo-url"] . "/" . $arrayAllObbMainFile[$index] . "'";
                    $urlObbPatchAndroid [] = $arrayAllObbPatchFile[$index] == "" ? "" : "href='" . $titles["$repo-url"] . "/" . $arrayAllObbPatchFile[$index] . "'";
                }
                $seeUrlLinks = "<ul>";
                $firstVer = $urlApkAndroid[0];
                for ($link = 0; $link < count($urlApk); $link++) {
                    $seeUrlLinks .= "<li style='<!--display:inline-block; -->' ><a " . $urlApk[$link] . ">Descargar Version: $arrayAllVersionsVer[$link] [" . GetAppSize($arrayAllVersionsSize[$link]) . "]</a> &nbsp;<small><i>Requiere Android</i></small> <b>" . $androidSDKVer[(int) $urlApkAndroid[$link]] . "</b></li>";
                    if ($urlObbMainAndroid[$link]) {
                        $seeUrlLinks .= "<li style='<!--display:inline-block; -->' >[OBB Main] <a " . $urlObbMainAndroid[$link] . ">Descargar Version: $arrayAllVersionsVer[$link] </a></li>";
                    }
                    if ($urlObbPatchAndroid[$link]) {
                        $seeUrlLinks .= "<li style='<!--display:inline-block; -->' >[OBB Patch] <a " . $urlObbPatchAndroid[$link] . ">Descargar Version: $arrayAllVersionsVer[$link] </a></li>";
                    }
                }
                $seeUrlLinks .= "</ul>";
                ?>
                <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="fd-application_menu">
                    <?php ?>
                    <li class="mdl-menu__item" onclick="downloading();" >
                        <a id="noline" title="Download APK from <?php echo $title; ?>" class="p_download"  <?php echo $urlApk[0]; ?>><span id="inside" >Download APK [<?php echo $arrayAllVersionsVer[0]; ?>][<?php echo GetAppSize($arrayAllVersionsSize[0]); ?>]</span> </a>
                    </li>
                    <?php
                    if ($urlObbMainAndroid[0]) {
                        ?>
                        <li class="mdl-menu__item" onclick="downloadingObbMain();" >
                            <a id="nolineObbM" title="Download Obb Main from <?php echo $title; ?>" class="p_download"  <?php echo $urlObbMainAndroid[0]; ?>><span id="insideObbM" >Download OBB Main [<?php echo $arrayAllVersionsVer[0]; ?>]</span> </a>
                        </li>
                        <?php
                    }
                    if ($urlObbPatchAndroid[0]) {
                        ?>
                        <li class="mdl-menu__item" onclick="downloadingObbPatch();" >
                            <a id="nolineObbP" title="Download Obb Patch from <?php echo $title; ?>" class="p_download"  <?php echo $urlObbPatchAndroid[0]; ?>><span id="insideObbP" >Download OBB Patch [<?php echo $arrayAllVersionsVer[0]; ?>]</span> </a>
                        </li>
                    <?php }
                    ?>
                </ul>
            <?php } ?>
        </section>
        <?php
        $unknown = strpos($desc, "Unknown") || strpos($desc, "Desconocida") ? true : false;
        $imgs = glob($repositoriesRoute . $repo . "\\$idApp\\$screnshotsLang\\phoneScreenshots\\*.*");
        if ($size > 0) {
            ?>
            <section class="fd-section mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                <div class="mdl-card-small mdl-cell mdl-cell--12-col">
                    <?php echo $seeUrlLinks; ?>
                </div>
            </section>
            <?php
        }
        if (!$unknown || count($imgs) > 0) {
            ?>
            <section class="fd-section mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                <div class="mdl-card mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__supporting-text">
                        <?php
                        if (!$unknown) {
                            ?>
                            <div class="description contains-text-link apps-secondary-color"  >
                                <h1 aria-label="Description"></h1> 
                                <div class="show-more-content text-body" itemprop="description"> 
                                    <div jsname="C4s9Ed"><strong><?php echo $title; ?></strong>  <?php echo $summary ? " - " . $summary : ""; ?>
                                        <p><br>DESCRIPTION: &nbsp;<?php echo $desc; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <?php
                        }
                        if ($idApp != -1 && count($imgs) > 0) {
                            ?>
                            <div id="gallery-1" class="royalSlider rsDefault visibleNearby">
                                <?php
                                for ($j = 0; $j < count($imgs); $j++) {
                                    $auxDirPartes = explode("\\", $imgs[$j]);
                                    $aux = $auxDirPartes[count($auxDirPartes) - 1];
                                    $partes = explode(".", $aux);
                                    $sinExt = array();
                                    for ($i = 0; $i < count($partes) - 1; $i++) {
                                        $sinExt[] = $partes[$i];
                                    }
                                    $imgName = join(".", $sinExt);
                                    if ($aux != "index.php" && $aux != "Thumbs.db") {
                                        echo "<a class='rsImg' href='" . $titles["$repo-url"] . "/$idApp/$screnshotsLang/phoneScreenshots/$aux' >$idApp $j</a>";
                                        if (count($imgs) - 1 > $j) {
                                            echo "\r\n";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <?php
        }
    } else {
        ?>
        <h1 class="fd-title">
            404 NOT FOUND! There is no package with ID: 
            <br>"<?php echo $id; ?>"
        </h1>
        <p style="text-align: center;"><img class="img-responsive" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/nothing.300x285.png" alt=""></p>
<?php } ?>
</div>    


