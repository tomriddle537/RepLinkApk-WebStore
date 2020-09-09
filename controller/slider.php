<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
if (isset($idapp) && isset($imgs)) {
    if ($idapp != -1 && count($imgs) > 0) {
        ?>
        <script id="addJS">// Important note! If you're adding CSS3 transition to slides, fadeInLoadedSlide should be disabled to avoid fade-conflicts.
            var w = window.innerWidth;
            var h = window.innerHeight;
            jQuery(document).ready(function ($) {
                var si = $('#gallery-1').royalSlider({
                    fullscreen: {
                        enabled: true,
                        nativeFS: true
                    },
                    addActiveClass: true,
                    arrowsNav: true,
                    arrowsNavAutoHide: false,
                    arrowsNavHideOnTouch: false,
                    controlNavigation: 'none',
                    autoScaleSlider: true,
                    autoScaleSliderWidth: w,
                    autoScaleSliderHeight: h,
                    loop: false,
                    fadeinLoadedSlide: false,
                    //globalCaption: true,
                    keyboardNavEnabled: true,
                    //globalCaptionInside: false,
                    visibleNearby: {
                        enabled: true,
                        centerArea: 0.5,
                        center: true,
                        breakpoint: 650,
                        breakpointCenterArea: 0.64,
                        navigateByCenterClick: true
                    }
                }).data('royalSlider');
                // link to fifth slide from slider description.
                $('.slide4link').click(function (e) {
                    si.goTo(4);
                    return false;
                });
            });
        </script>
        <?php
    }
}

