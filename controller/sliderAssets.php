<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
if ($details) { ?>
    <script src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/assets/royalslider/jquery-1.8.3.min.js"></script>
    <script class="rs-file" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/assets/royalslider/jquery.royalslider.min.js"></script>
    <link class="rs-file" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/assets/royalslider/royalslider.css" rel="stylesheet">
    <link class="rs-file" href="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/assets/royalslider/skins/default/rs-default.css" rel="stylesheet">
    <style>
        .visibleNearby {
            width: 100%;
            background: #141414;
            color: #FFF;
            padding: 5px 0px;
        }
        .visibleNearby .rsGCaption {
            font-size: 16px;
            line-height: 18px;
            padding: 12px 0 16px;
            background: #141414;
            width: 100%;
            position: static;
            float: left;
            left: auto;
            bottom: auto;
            text-align: center;
        }
        .visibleNearby .rsGCaption span {
            display: block;
            clear: both;
            color: #bbb;
            font-size: 14px;
            line-height: 22px;
        }
        /* Scaling transforms */
        .visibleNearby .rsSlide img {
            opacity: 0.45;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
            -webkit-transform: scale(0.9);  
            -moz-transform: scale(0.9); 
            -ms-transform: scale(0.9);
            -o-transform: scale(0.9);
            transform: scale(0.9);
        }
        .visibleNearby .rsActiveSlide img {
            opacity: 1;
            -webkit-transform: scale(1);  
            -moz-transform: scale(1); 
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
        }
        /* Non-linear resizing on smaller screens */
        @media screen and (min-width: 0px) and (max-width: 900px) { 
            #gallery-1 {
                padding:5px 0px;
            }
            #gallery-1 .rsOverflow,
            .royalSlider#gallery-1 {
                height: 400px !important;
            }
        }
        @media screen and (min-width: 0px) and (max-width: 500px) { 
            #gallery-1 .rsOverflow,
            .royalSlider#gallery-1 {
                height: 300px !important;
            }
        }
    </style>
    <style>
        #page-navigation { display: none; }
    </style>
<?php } else { ?>
    <script class="rs-file" src="<?php echo "//" . filter_input(INPUT_SERVER, 'HTTP_HOST') ?>/js/jquery-1.11.1.min.js"></script>
<?php
}
