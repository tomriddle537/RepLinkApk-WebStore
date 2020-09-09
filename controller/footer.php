<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
?>
<footer class="mdl-mini-footer">
    <div class="mdl-mini-footer__left-section">
        <div class="mdl-logo"> 2017-2020 RepLink Store</div>
        <ul class="mdl-mini-footer__link-list">
            <li><a href="/">Home</a> </li>
            <?php foreach ($remainingRepos as $rRepo) {
                echo "<li><a href='//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/$rRepo'>$titles[$rRepo]</a> </li>";
            } ?>
            <li><a href="//github.com/tomriddle537">Contact</a> </li>
        </ul>
    </div>
</footer>