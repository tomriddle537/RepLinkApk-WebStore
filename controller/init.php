<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
include_once (filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . './config/config.php');
include_once (filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . './controller/func.php');

$num = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, "page") : -1;
$nomaterial = filter_input(INPUT_GET, "nomaterial") ? filter_input(INPUT_GET, "nomaterial") : false;
$category = filter_input(INPUT_GET, "category") !== NULL ? filter_input(INPUT_GET, "category") : -1;
if (isset($ajaxOrder)) {
    $order = $ajaxOrder;
} else {
    $order = filter_input(INPUT_GET, "order") ? filter_input(INPUT_GET, "order") : -1;
}
if (isset($ajaxRepo)) {
    $repo = $ajaxRepo;
} else {
    $repo = filter_input(INPUT_GET, "rep") ? filter_input(INPUT_GET, "rep") : -1;
}
if (isset($ajaxQuery)) {
    $query = $ajaxQuery;
} else {
    $query = trim(filter_input(INPUT_GET, "q")) ? trim(filter_input(INPUT_GET, "q")) : -1;
}

$details = filter_input(INPUT_GET, "details", FILTER_VALIDATE_BOOLEAN) ? filter_input(INPUT_GET, "details") : false;
$id = filter_input(INPUT_GET, "id") ? filter_input(INPUT_GET, "id") : false;

if (IsRepositoryDir($repositoriesRoute, $repo)) {
    //Set the lists ORDER
    $invert = false;
    if (strpos($order, '_inv')) {
        $invert = true;
        $order = str_replace("_inv", "", $order);
    }
    if ($order == -1 || !($order == "name" || $order == "added" || $order == "lastupdated" || $order == "size")) {
        $order = 'added';
    }
    if ($order == 'added' || $order == 'lastupdated' || $order == 'size') {
        $sort = SORT_DESC;
    } else if ($order == 'name') {
        $sort = SORT_ASC;
    }

    if ($invert) {
        $sort = ToggleOrder($sort);
    }

    $repoMd5Id = RepositoryMd5Id($repositoriesRoute, $repo);
    if (!file_exists($tempDir . "config.$repoMd5Id.php") || ConfigWasUpdated($tempDir, $repositoriesRoute, $repo, $repoMd5Id)) {
        InitCurrentRepository($tempDir, $repositoriesRoute, $repo, $repoMd5Id);
    }
    include_once $tempDir . "config.$repoMd5Id.php";

    $idapp = array();
    $d = dir($repositoriesRoute . $repo . "\\");
    while ($entry = $d->read()) {
        if ($entry != '.' && $entry != '..') {
            $imgsArray = glob($repositoriesRoute . $repo . "\\" . $entry . "\\es\\phoneScreenshots\\*.*");
            if (count($imgsArray) > 0) {
                $idapp[] = $entry;
            }
        }
    }
    $d->close();

    $eyeBadge = "";
    $tempApps = array();

    if ($category == "99") {
        for ($g = 0; $g < count($allXmlApps); $g++) {
            $gid = $allXmlApps[$g]['id'];

            if (in_array($gid, $idapp)) {
                $tempApps[] = $allXmlApps[$g];
            }
        }
    } else if ($category > -1 && $category < count($catType)) {
        for ($g = 0; $g < count($allXmlApps); $g++) {

            $gcat = $allXmlApps[$g]['category'];
            $gcats = $allXmlApps[$g]['categories'];

            if (strpos($gcats, $catType[$category])) {
                $tempApps[] = $allXmlApps[$g];
            } else if ($gcat == $catType[$category]) {
                $tempApps[] = $allXmlApps[$g];
            }
        }
    } else if ($query != -1) {
        $allQueryTerms = explode(" ", $query);
        for ($g = 0; $g < count($allXmlApps); $g++) {
            $gname = $allXmlApps[$g]['name'];
            $gid = $allXmlApps[$g]['id'];
            $inName = false;
            $inId = false;
            foreach ($allQueryTerms as $queryTerm) {
                if (stripos($gname, $queryTerm) !== false) {
                    $inName = true;
                    break;
                }
                if (stripos($gid, $queryTerm) !== false) {
                    $inId = true;
                    break;
                }
            }
            if ($inName || $inId) {
                $tempApps[] = $allXmlApps[$g];
            }
        }
    } else {
        $tempApps = $allXmlApps;
    }
    if (count($tempApps) > 1) {
        Array_Sort_By_Column($tempApps, $order, $sort);
    }
    $cantpages = (int) (count($tempApps) / $forPage);
    if (count($tempApps) % $forPage != 0) {
        $cantpages++;
    } else {
        $cantpages = 1;
    }
    if ($num <= 0) {
        $num = 1;
    } else if ($num >= $cantpages) {
        $num = $cantpages;
    }
    $pagina = ($num - 1) * ($forPage);
    $ord = $order != -1 || $invert ? "$order" . ($invert ? "_inv" : "") : '';
    $cat = $category != -1 ? "$category/" : '';
} else if ($repo != -1) {
    header('location: ' . filter_input(INPUT_SERVER, 'REQUEST_SCHEME') . '://' . filter_input(INPUT_SERVER, 'HTTP_HOST'));
} else {
    //All Repositories on the directory
    $reposList = RepositoriesList($repositoriesRoute);
    //Repositories on the directory minus Actual
    $remainingRepos = $reposList;
    //All repos titles
    $titles = RepositoriesTitleList($repositoriesRoute, $reposList);
}


