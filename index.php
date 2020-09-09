<!DOCTYPE html>
<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include './controller/init.php';
?>
<html lang="<?php echo $lang ?>">
    <head>
        <!-- stylesheet -->
        <link rel="stylesheet" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/css/material.blue-deep_orange.min.css?v1.3.0">
        <link rel="stylesheet" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/css/style.min.css">
        <link rel="stylesheet" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/css/font.css">
        <link rel="stylesheet" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/css/Pe-icon-7-stroke.css">
        <!-- seo -->
        <title><?php echo $repo != -1 ? ($titles[$repo] . " | ") : ""; ?>RepLink</title>
        <meta name="robots" content="index,follow">
        <meta name="url" content="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>" />
        <meta name="description" content="RepLink, the place to find your favorite Android Apps!" />
        <meta name="site_name" content="RepLink" />
        <!-- icons -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/ico/favicon.ico" />
        <meta name="theme-color" content="#2196F3-rgb(33,150,243)">
        <!-- viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include_once './controller/sliderAssets.php'; ?>
    </head>
    <body class="mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <?php
            include_once './controller/header.php';
            include_once './controller/nav.php';
            ?>
            <main class="mdl-layout__content">
                <?php
                if ($details) {
                    include './controller/details.php';
                } else if ($repo != -1 && $query == -1) {
                    include './controller/store.php';
                } else if ($repo != -1 && $query != -1) {
                    include './controller/search.php';
                } else {
                    include './controller/welcome.php';
                }
                ?>
                <?php include './controller/footer.php'; ?>
            </main>
        </div>
        <script src = "<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/js/script.min.js"></script>
        <?php
        //SOME OLD BROWSERS DONT DEAL WELL WITH THIS
        if (!$nomaterial) {
            ?>  <script defer src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/js/material.min.js"></script>
        <?php } ?>
        <?php include_once './controller/slider.php'; ?>
    </body>
</html>
