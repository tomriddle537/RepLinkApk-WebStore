<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
?>
<h4 style="text-align: center;">
    <?php
    for ($i = 1; $i <= $cantpages; $i++) {
        $last = false;
        if ($i != $cantpages && $i == 1 && $num != 1) {
            echo "<a class='mid' href='/$repo/" . $cat . $ord . "/$i'><div class='pagelink" . ($i == $num ? 'ed' : '') . "'><span>$i</span></div></a>,";
            $last = true;
        } else if ($i == $cantpages && $num != $cantpages) {
            echo "<a class='mid' href='/$repo/" . $cat . $ord . "/$i'><div class='pagelink" . ($i == $num ? 'ed' : '') . "'><span>$i</span></div></a>";
            break;
        } else if (($i + 1) == $num || ($i + 2) == $num || ($i - 2) == $num || ($i - 1) == $num) {
            echo "<a class='mid' href='/$repo/" . $cat . $ord . "/$i'><div class='pagelink'><span>$i</span></div></a>,";
            $last = true;
        } else if ($i == $num) {
            echo "<div class='pagelinked'><span>$i</span></div>" . ($num == $cantpages ? "" : ",");
            $last = true;
        }

        if (!$last && !$one) {
            echo '...,';
            $one = true;
        } else if ($last) {
            $one = false;
        }
    }
    ?>
</h4>
