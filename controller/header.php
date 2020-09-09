<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
?>
<input id="current_repo" class="mdl-textfield__input"  type="hidden" value="<?php echo $repo; ?>" name="repo" >
<input id="current_order" class="mdl-textfield__input"  type="hidden" value="<?php echo $order; ?>" name="order" >
<input id="current_order_inv" class="mdl-textfield__input"  type="hidden" value="<?php echo $invert; ?>" name="invert" >
<header class="mdl-layout__header">
    <?php if ($nomaterial) { ?>
        <div width="48" heigth="48" class="mdl-layout__drawer-button" >
            <i class="fa-list">List</i>
        </div>
    <?php } ?>
    <div class="mdl-layout__header-row">
        <a href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>"><img id="replink" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/logo.png" alt=""></a>
        <div class="mdl-layout-spacer"></div>
        <img id="loading" class="hide" height="20px" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/images/ajax-loading.gif" alt="">
        <div class="<?php echo ($repo != -1) ? "" : "hide" ?> fd-search_mini mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width is-upgraded" >
            <form role="search" method="get" action="/<?php echo $repo; ?>/q/">
                <?php if (!$nomaterial) { ?>
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search_term" >
                        <i class="material-icons">search</i>
                    </label>
                <?php } ?>
                <div class="mdl-textfield__expandable-holder">
                    <input id="search_term" class="mdl-textfield__input" autocomplete="off" type="text" value="" name="q" >
                    <div id="search_preview" class="search_preview" ></div>
                </div>
            </form>
        </div>
    </div>
</header>





