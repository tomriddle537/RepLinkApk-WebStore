<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
if ($eyeBadge) { ?>
    <div class="fd-badge mdl-color--white mdl-shadow--2dp">
        <div id="fd-badge_<?php echo $id; ?>" class="material-icons"><i class="fa fa-eye"></i></div>
        <div class="mdl-tooltip" for="fd-badge_<?php echo $id; ?>">With Screenshots</div>
    </div>
<?php } if ($newApp && !$actApp) { ?>
    <div class="fd-badge-new mdl-shadow--2dp" style="background-color: #69A128;">
        <i class="fa fa-plus"></i> New
        <div class="mdl-tooltip" for="fd-badge_new">New</div>
    </div>
<?php } if ($actApp) {
    ?>
    <div class="fd-badge-act mdl-shadow--2dp" style="background-color: #00BBFF;">
        <i class="fa fa-refresh"></i> Updated
        <div class="mdl-tooltip" for="fd-badge_act">Updated</div>
    </div>
<?php } 