<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
?>
<div class="fd-navigation mdl-layout__drawer">
    <span class="fd-logo mdl-layout-title mdl-color--primary mdl-color-text--white">
        <a ><i class="pe-7s-<?php echo $repo != -1 ? $icons[3] : $icons[7]; ?>" ></i> <?php echo $repo != -1 ? $titles[$repo] : "Store"; ?></a>
    </span>
    <nav class="mdl-navigation mdl-color--white">
        <?php if ($repo != -1) { ?>
            <a class='<?php echo $category == -1 ? "mdl-color--accent mdl-color-text--white" : " " ?> mdl-navigation__link' href=<?php echo "/$repo/" . $ord . "/$num"; ?> >All</a>
            <a class='<?php echo $category == '99' ? "mdl-color--accent mdl-color-text--white" : " " ?> mdl-navigation__link' href=<?php echo "/$repo/99/" . $ord . "/$num"; ?> >With Screenshots</a>
            <?php
            for ($c = 0; $c < count($catType) - 1; $c++) {
                $highlightCat = $c == $category && $category != '99' ? "mdl-color--accent mdl-color-text--white" : " ";
                echo "<a  class='$highlightCat mdl-navigation__link' href='/$repo/$c/" . $ord . "'; >$catType[$c]</a>";
            }
        } else {
            ?>
            <p><img class="img-responsive" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/welcome.png" alt="">
                <img class="img-responsive" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/default.png" alt=""></p>
        <?php } ?>
    </nav>
    <?php foreach ($remainingRepos as $rRepo) { ?>
        <span class="fd-logo mdl-layout-title mdl-color--primary mdl-color-text--white">
            <a href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/<?php echo $rRepo; ?>" ><i class="pe-7s-<?php echo $icons[4]; ?>" ></i> <?php echo $titles[$rRepo]; ?></a>
        </span>
    <?php } ?>
</div>
