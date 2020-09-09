<?php
/*
 * Copyright (C) 2017-2020 tomriddle537
 * RepLink Web Store.
 * https://github.com/tomriddle537/RepLinkApk-WebStore
 * Licensed GPL
 */
function ToggleOrder($ordID) {
    if ($ordID == SORT_ASC) {
        return SORT_DESC;
    } else if ($ordID == SORT_DESC) {
        return SORT_ASC;
    } else {
        return SORT_DESC;
    }
}

function CreateDir($tempDir) {
    if (is_dir($tempDir) === false) {
        mkdir($tempDir);
    }
}

function GetAppSize($size) {
    if ($size < 1024) {
        return round(QString::number(size), 2) + " Bytes";
    } else {
        $kilos = round($size / 1024, 2);
        if ($kilos < 1024) {
            return $kilos . " KB";
        }
        $megas = round($kilos / 1024, 2);
        if ($megas < 1024) {
            return (int) $megas . "." . ($kilos % 1024) . " MB";
        } else {
            return (int) ($megas / 1024) . "." . (megas % 1024) . " GB";
        }
    }
}

function Array_Sort_By_Column(&$array, $column, $direction = SORT_ASC) {
    $reference_array = array();

    foreach ($array as $key => $row) {
        $reference_array[$key] = $row[$column];
    }

    array_multisort($reference_array, $direction, $array);
}

function RepositoryMd5Id($configDir, $repo) {
    return md5($configDir . $repo);
}

function IsRepositoryDir($configDir, $repo) {
    try {
        $result = (strpos($repo, " ") === false) && file_exists($configDir . $repo . "\\" . "replink.xml") && file_exists($configDir . $repo . "\\" . "categories.txt");
    } catch (ErrorException $err) {
        //Nothing to do
    }
    return $result;
}

function RepositoriesList($configDir) {
    $result = array();
    if (is_dir($configDir)) {
        $subDirectory = scandir($configDir);
        foreach ($subDirectory as $subDir) {
            if (IsRepositoryDir($configDir, $subDir)) {
                $result[] = $subDir;
            }
        }
    }
    return $result;
}

function RemainingRepositoriesList($reposList, $repo) {
    $result = array();
    foreach ($reposList as $repoUnit) {

        if ($repoUnit != $repo) {
            $result[] = $repoUnit;
        }
    }
    return $result;
}

function RepositoriesTitleList($configDir, $reposList) {
    $result = array();
    foreach ($reposList as $repoUnit) {
        $tempRepo = simplexml_load_file($configDir . "\\" . $repoUnit . "\\" . "replink.xml");
        $result["$repoUnit"] = (string) $tempRepo->repo[0]["name"];
        $result["$repoUnit-url"] = (string) $tempRepo->repo[0]["url"];
        $result["$repoUnit-icon"] = (string) $tempRepo->repo[0]["icon"];
        $result["$repoUnit-desc"] = (string) $tempRepo->repo[0]->description[0];
    }
    return $result;
}

function ReadCategories($configDir, $subDir) {
    $handleCategoryFile = fopen($configDir . "\\" . $subDir . "\\" . "categories.txt", "r");
    $result = array();
    if ($handleCategoryFile) {
        while (($categoryLine = fgets($handleCategoryFile)) !== false) {
            $result[] = trim((string) $categoryLine);
        }
    }
    $result ["99"] = "With Pictures";
    return $result;
}

function ReadApps($configDir, $subDir) {
    return simplexml_load_file($configDir . "\\" . $subDir . "\\" . "replink.xml");
}

function ConfigWasUpdated($tempDir, $configDir, $repo, $repoMd5Id) {
    $wasUpdated = false;
    $mod_date_temp_config = date("YmdHis", filemtime($tempDir . "config.$repoMd5Id.php"));
    $mod_date_index = date("YmdHis", filemtime($configDir . $repo . "\\" . "replink.xml"));
    $mod_date_categories = date("YmdHis", filemtime($configDir . $repo . "\\" . "categories.txt"));
    if ($mod_date_index > $mod_date_temp_config || $mod_date_categories > $mod_date_temp_config) {
        $wasUpdated = true;
    }
    return $wasUpdated;
}

function InitCurrentRepository($tempDir, $configDir, $repo, $repoMd5Id) {
//All Repositories on the directory
    $reposList = RepositoriesList($configDir);
//Repositories on the directory minus Actual
    $remainingRepos = RemainingRepositoriesList($reposList, $repo);
//Categories on the Current Repository
    $catType = ReadCategories($configDir, $repo);
//APPS List on the Current Repository
    $apps = ReadApps($configDir, $repo);
//Cant APPS on the Current Repository
    $cant = count($apps->application);
//All repos titles
    $titles = RepositoriesTitleList($configDir, $reposList);

    $allXmlApps = array();
    foreach ($apps->application as $item) {
        $auxAdded = (string) $item->added;
        $auxLastupdated = (string) $item->lastupdated;
        $arrayAllVersionsSize = array();
        $arrayAllVersionsApk = array();
        $arrayAllVersionsSDK = array();
        $arrayAllVersionsVer = array();
        $arrayObbMainFile = array();
        $arrayObbPatchFile = array();
        if ($auxAdded == $auxLastupdated) {
            $auxLastupdated = "0000-00-00";
        }
        if (isset($item->package[0])) {
            $allXmlAppsPackageSize = intval($item->package[0]->size);
        } else {
            $allXmlAppsPackageSize = 0;
        }
        foreach ($item->package as $pkgVer) {
            $arrayAllVersionsSize[] = intval($pkgVer->size);
            $arrayAllVersionsApk[] = (string) $pkgVer->apkname;
            $arrayAllVersionsSDK[] = intval($pkgVer->sdkver);
            $arrayAllVersionsVer[] = (string) $pkgVer->version;
            $arrayObbMainFile[] = $pkgVer->obbMainFile ? (string) $pkgVer->obbMainFile : "";
            $arrayObbPatchFile[] = $pkgVer->obbPatchFile ? (string) $pkgVer->obbPatchFile : "";
        }
        $allXmlApps[] = array(
            'id' => (string) $item->id,
            'name' => trim((string) $item->name),
            'category' => (string) $item->category,
            'categories' => (string) $item->categories,
            'summary' => (string) $item->summary,
            'desc' => (string) $item->desc,
            'added' => $auxAdded,
            'lastupdated' => $auxLastupdated,
            'size' => (int) ( $allXmlAppsPackageSize / 1024),
            'arrayAllVersionsSize' => $arrayAllVersionsSize,
            'arrayAllVersionsApk' => $arrayAllVersionsApk,
            'arrayAllVersionsSDK' => $arrayAllVersionsSDK,
            'arrayAllVersionsVer' => $arrayAllVersionsVer,
            'arrayAllObbMainFile' => $arrayObbMainFile,
            'arrayAllObbPatchFile' => $arrayObbPatchFile
        );
    }
    CreateDir($tempDir);
    $tempConfig = $tempDir . "/config.$repoMd5Id.php";
    $handleTempConfig = fopen($tempConfig, 'w');
    $textToPrint = "<?php \$reposList=" . var_export($reposList, true) . ";"
            . " \$remainingRepos=" . var_export($remainingRepos, true) . ";"
            . " \$catType=" . var_export($catType, true) . ";"
            . " \$allXmlApps=" . var_export($allXmlApps, true) . ";"
            . " \$cant=" . var_export($cant, true) . ";"
            . " \$titles=" . var_export($titles, true) . ";";
    fwrite($handleTempConfig, $textToPrint);
    fclose($handleTempConfig);
}
