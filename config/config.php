<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */

//Set the Repositories "C:\\route\\to\\repos\\like\\this\\";
$repositoriesRoute = "";

//Number of days add badge New or Updated app
$daysForNew = 10;
$daysForUpdated = 7;
//Number of Apps for page
$forPage = 24;
//Max Search Previews
$maxSearchPreviews = 5;
//Set Pagination at start too
$paginationOnTop=false;
//Store Language (For Future Implementation)
$lang = "en";
//ScreenShots Language
$screnshotsLang = "es";

//Pe icon 7 stroke
$icons = array("joy", "tools", "paint", "diamond", "albums", "female", "male", "folder");
//Edit this in the future
$androidSDKVer = array("Android Desconocido", "1.0 Alpha", "1.1 Beta", "1.5 Cupcake", "1.6 Donut", "2.0 Eclair", "2.0.1 Eclair", "2.1 Eclair", "2.2 - 2.2.3 Froyo", "2.3 Gingerbread", "2.3.3 Gingerbread", "3.0 Honeycomb", "3.1 Honeycomb", "3.2 Honeycomb", "4.0 Ice Cream Sandwich", "4.0.3 Ice Cream Sandwich", "4.1 Jelly Bean", "4.2 Jelly Bean", "4.3 Jelly Bean", "4.4 KitKat", "4.4W KitKat", "5.0 Lollipop", "5.1 - 5.1.1 Lollipop", "6.0 - 6.0.1 Marshmallow", "7.0 Nougat", "7.0.1 - 7.1 Nougat", "8.0 Oreo", "8.1 Oreo", "9.0 Pie", "10.0 Android 10", "11.0 Android 11", "Android Desconocido", "Android Desconocido", "Android Desconocido");
//Month
$month = array("January", "February", "March", "April", "May", "June", "July", "Agust", "September", "October", "Novenmber", "December");
//Temporary and Cache Directory
$tempDir = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT')."\\temp\\";