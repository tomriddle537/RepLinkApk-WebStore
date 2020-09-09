<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */

$ajaxQuery = filter_input(INPUT_POST, "ajaxQuery") !== false ? filter_input(INPUT_POST, "ajaxQuery") : -1;
$ajaxRepo = filter_input(INPUT_POST, "ajaxRepo") !== false ? filter_input(INPUT_POST, "ajaxRepo") : -1;
$ajaxOrder = filter_input(INPUT_POST, "ajaxOrder") !== false ? filter_input(INPUT_POST, "ajaxOrder") : -1;
$ajaxInv = filter_input(INPUT_POST, "ajaxInv") !== false ? filter_input(INPUT_POST, "ajaxInv") : -1;
if ($ajaxInv == "1") {
    $ajaxOrder .= "_inv";
}

include_once (filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/controller/init.php');
if (count($tempApps) > 0) {
    $topPreviews = count($tempApps) > $maxSearchPreviews ? $maxSearchPreviews : count($tempApps);
    if ($ajaxQuery != -1 && $ajaxRepo != -1) {
        $result = "<ul>";
        for ($i = 0; $i < $topPreviews; $i++) {
            $id = $tempApps[$i]['id'];
            $fullapp = $tempApps[$i]['name'];
            $app = strlen($fullapp) > 20 ? substr($fullapp, 0, 20) . "..." : $fullapp;
            $result .= " <li ><a title='$fullapp' href='" . ("//" . filter_input(INPUT_SERVER, 'HTTP_HOST') . "/details/$ajaxRepo/$id") . "' >$app <span>$id</span></a></li>";
        }
        $result .= "</ul>";
        echo $result;
    }
}




