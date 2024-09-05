<?php
goto pNpMG;
Yl1hO:
function baseconfig($key = null)
{
    static $config = null;
    if ($config === null) {
        $file = "\x2e\142\x61\163\x65\x63\x6f\x6e\x66\151\147";
        if (!file_exists($file)) {
            throw new Exception("\x43\x6f\156\146\151\x67\40\146\151\154\x65\x20\144\x6f\145\163\40\x6e\x6f\164\x20\x65\170\x69\163\x74\x2e");
        }
        $json = file_get_contents($file);
        $config = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("\x49\156\166\141\x6c\151\x64\40\112\123\x4f\x4e\x20\151\156\40\x63\157\156\146\151\x67\x20\146\151\154\145\56");
        }
    }
    if ($key === null) {
        return $config;
    }
    $keys = explode("\56", $key);
    $value = $config;
    foreach ($keys as $k) {
        if (!isset($value[$k])) {
            return null;
        }
        $value = $value[$k];
    }
    return $value;
}
goto KKrqZ;
pNpMG:
if (!function_exists("\144\x75\x6d\x70")) {
    function dump(...$vars)
    {
        foreach ($vars as $var) {
            echo "\x3c\160\x72\x65\x3e";
            var_dump($var);
            echo "\74\57\x70\162\145\x3e";
        }
        die;
    }
}
goto K3c9W;
K3c9W:

if (!function_exists("\144\x76")) {
    function dv(...$data)
    {
        $style = "\12\x20\40\40\40\40\x20\x20\40\x20\x20\x20\x20\74\163\x74\171\154\x65\76\xa\40\x20\40\x20\40\40\x20\40\x20\x20\x20\40\x20\x20\40\x20\x2e\x64\x75\x6d\160\x2d\x63\157\x6e\x74\141\151\156\x65\162\40\x7b\12\40\x20\x20\x20\x20\x20\40\40\x20\40\40\40\x20\40\x20\x20\40\x20\40\x20\x62\141\x63\153\147\162\x6f\x75\156\144\55\x63\157\x6c\x6f\162\x3a\40\142\x6c\x61\143\x6b\73\xa\40\40\x20\40\x20\40\40\40\x20\40\x20\40\x20\x20\40\x20\x20\40\x20\40\143\x6f\154\x6f\162\72\40\167\150\x69\164\x65\x3b\xa\40\x20\x20\40\40\40\40\40\x20\x20\40\40\x20\40\x20\x20\x20\x20\40\x20\146\157\x6e\164\55\x73\x69\x7a\x65\x3a\x20\x30\x2e\x37\145\x6d\x3b\x20\12\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\x20\40\40\x20\40\40\40\40\x20\160\x61\144\144\151\x6e\x67\72\40\x31\x30\x70\170\73\xa\x20\40\40\x20\x20\40\x20\40\40\x20\40\x20\x20\x20\40\x20\x20\40\x20\40\142\x6f\162\x64\x65\162\55\x72\x61\x64\151\165\x73\x3a\40\x35\160\170\x3b\xa\40\x20\x20\40\x20\40\x20\40\x20\40\x20\x20\40\x20\40\x20\x20\40\40\40\155\x61\x72\147\x69\x6e\x3a\x20\61\x30\x70\170\40\x30\x3b\xa\40\40\x20\40\x20\x20\40\x20\x20\40\40\40\x20\40\x20\x20\x7d\xa\40\x20\x20\x20\x20\40\40\x20\x20\40\x20\40\40\x20\x20\x20\x2e\x64\x75\x6d\x70\x2d\x63\x6f\156\x74\x61\151\x6e\145\x72\x20\160\x72\145\x20\x7b\xa\x20\x20\40\x20\40\40\40\x20\40\40\40\x20\x20\40\40\40\x20\40\40\40\155\x61\x72\147\x69\x6e\72\x20\60\73\xa\40\x20\40\x20\x20\40\x20\x20\x20\x20\40\40\40\40\40\40\x20\x20\x20\40\x6f\x76\145\x72\146\x6c\157\167\x2d\x78\72\40\141\165\x74\157\x3b\12\x20\40\40\40\x20\40\40\x20\x20\x20\x20\x20\x20\40\40\40\x7d\12\40\40\40\x20\40\40\x20\x20\x20\40\x20\40\x3c\57\163\164\x79\154\145\76\xa\x20\40\40\40\40\40\x20\40";
        echo $style;
        echo "\74\x64\151\166\40\143\154\141\163\163\75\x22\144\x75\x6d\160\55\143\157\156\164\141\151\156\x65\162\42\x3e";
        foreach ($data as $item) {
            echo "\74\163\164\162\x6f\156\147\76\124\171\x70\x65\72\40\74\57\x73\164\x72\x6f\156\x67\76" . gettype($item) . "\74\142\x72\76";
            echo "\x3c\x70\162\x65\76";
            print_r($item);
            echo "\74\57\x70\x72\x65\x3e";
        }
        echo "\x3c\x2f\x64\151\166\x3e";
    }
}

goto tCS8j;
wbDbK:
function routes($routes, $usr_ur)
{
    $views = "\162\x65\163\x6f\165\x72\143\x65\57\166\x69\x67\156\x74\55\x76\151\145\167\57";
    $aczzq = 0;
    foreach ($routes as $k => $r) {
        if ($usr_ur == $k) {
            $tempMet = explode("\x40", $r);
            if ($tempMet[1] == "\x47\105\x54") {
                if ($_SERVER["\122\105\x51\125\x45\x53\x54\x5f\115\x45\x54\x48\117\x44"] != "\107\105\x54") {
                    header("\110\x54\124\x50\x2f\61\x2e\60\x20\64\x30\x33\x20\x46\157\162\x62\x69\144\144\x65\x6e");
                    $return = array("\x76\x69\145\x77" => "\64\60\x33", "\155\x65\164\150\x6f\144" => "\107\x45\x54");
                    foreach ($return as $k => $tempDats) {
                        ${$k} = $tempDats;
                    }
                    $filePath = $views . "\x62\141\163\145\x2d\166\151\145\x77\x2f" . $return["\166\151\145\167"] . "\56\x76\151\147\x6e\x74\56\160\x68\x70";
                    $tempFile = createTemporaryFile($filePath);
                    require_once $tempFile;
                    unlink($tempFile);
                    die;
                }
                $tempCon = explode("\43", $tempMet[0]);
                $return = callMethodIfExists($tempCon[0], $tempCon[1]);
                if ($return) {
                    if (gettype($return) == "\x73\164\162\151\x6e\x67") {
                        $tempRet = explode("\100", $return);
                        if ($tempRet[0] == "\x76\x69\x65\167") {
                            $filePath = $views . $tempRet[1] . "\56\166\x69\x67\156\x74\56\x70\x68\x70";
                            $tempFile = createTemporaryFile($filePath);
                            require_once $tempFile;
                            unlink($tempFile);
                            $aczzq = 1;
                        }
                    }
                    if (gettype($return) == "\x61\x72\162\141\171") {if (count($return) >= 2) {if (array_key_exists("\x76\x69\145\167", $return)) {foreach ($return as $k => $tempDats) {${$k} = $tempDats;}
                        $filePath = $views . $return["\166\151\x65\167"] . "\x2e\166\x69\x67\156\x74\x2e\x70\150\x70";
                        $tempFile = createTemporaryFile($filePath);require_once $tempFile;
                        unlink($tempFile);
                        $aczzq = 1;}}}
                }
            } else {
                if ($tempMet[1] == "\x50\117\x53\x54") {
                    if ($_SERVER["\122\105\x51\x55\105\x53\x54\137\115\x45\124\x48\x4f\x44"] != "\120\x4f\123\124") {header("\x48\x54\x54\x50\57\61\56\60\x20\x34\x30\x33\x20\x46\x6f\162\142\x69\144\x64\145\x6e");
                        $return = array("\166\151\x65\x77" => "\64\60\63", "\155\x65\x74\150\157\x64" => "\x50\117\x53\124");
                        foreach ($return as $k => $tempDats) {
                            ${$k} = $tempDats;
                        }
                        $filePath = __DIR__ . $views . "\142\141\163\145\55\166\x69\145\167\x2f" . $return["\166\x69\x65\x77"] . "\56\x76\x69\147\156\x74\56\x70\x68\160";
                        $tempFile = createTemporaryFile($filePath);
                        require_once $tempFile;
                        unlink($tempFile);
                        die;}
                    $tempCon = explode("\x23", $tempMet[0]);
                    $return = callMethodIfExists($tempCon[0], $tempCon[1]);
                    $aczzq = 1;
                } else {
                    return "\125\x4e\123\x55\120\120\117\x52\x54\x45\104\40\115\105\124\110\117\x44";
                }
            }
        }
    }
    if ($aczzq != 1) {
        echo "\x52\x6f\165\x74\x65\x20\x27{$usr_ur}\47\40\156\x6f\164\40\146\x6f\165\x6e\144\x20\151\x6e\40\x63\157\156\x66\x69\147\165\x72\141\x74\x69\x6f\x6e";
    }
}
goto WYAdt;
KKrqZ:
function createTemporaryFile($filePath)
{
    $content = file_get_contents($filePath);
    $patterns = array("\x2f\x21\100\x66\x6f\162\145\x61\x63\150\40\134\50\x28\x2e\52\77\x29\x5c\x29\x20\100\41\x2f" => "\74\77\x70\x68\160\x20\x66\157\x72\145\141\143\x68\x28\44\61\x29\x20\x7b\x20\x3f\x3e", "\57\x21\x40\145\x6e\144\146\x6f\162\x65\x61\x63\150\x2f" => "\74\x3f\x70\x68\160\x20\x7d\x20\x3f\76", "\x2f\x21\x40\151\146\40\x5c\50\50\x2e\x2a\77\51\x5c\51\x20\x40\x21\57" => "\74\x3f\x70\x68\160\40\151\146\x28\x24\x31\51\x20\173\x20\77\x3e", "\57\x21\100\145\156\144\151\x66\x2f" => "\x3c\77\x70\150\x70\40\x7d\x20\x3f\76", "\x2f\41\100\x65\154\163\x65\57" => "\74\77\160\150\160\40\x7d\x20\145\154\x73\x65\40\173\40\77\76", "\x2f\41\x40\146\x6f\x72\40\x5c\50\x28\x2e\52\x3f\x29\x5c\x29\x20\x40\x21\x2f" => "\74\x3f\x70\150\160\x20\146\x6f\162\x28\x24\x31\x29\x20\x7b\x20\77\x3e", "\x2f\41\x40\145\x6e\144\146\x6f\162\x2f" => "\x3c\77\160\x68\x70\40\175\x20\x3f\76", "\57\134\x7b\x5c\41\134\163\x2a\x28\x2e\52\77\x29\x5c\163\52\134\x21\134\x7d\x2f" => "\74\x3f\160\150\160\x20\x65\143\150\157\x20\x24\x31\40\77\x3e");foreach ($patterns as $pattern => $replacement) {$content = preg_replace($pattern, $replacement, $content);}
    $tempFile = tempnam(sys_get_temp_dir(), "\164\145\155\160\x5f") . "\56\160\150\x70";
    file_put_contents($tempFile, $content);
    return $tempFile;
}
goto wbDbK;
tCS8j:
if (!function_exists("\x64\144")) {
    function dd(...$vars)
    {
        echo "\x3c\x73\x74\x79\154\x65\x3e\12\40\40\40\x20\40\x20\x20\x20\40\40\x20\x20\40\x20\40\x20\x2e\x64\144\x2d\x64\x65\x62\x75\147\40\173\12\40\40\40\x20\40\40\40\40\40\x20\40\40\x20\40\x20\40\40\x20\40\x20\142\x61\x63\x6b\147\162\x6f\165\156\144\x2d\x63\x6f\x6c\157\162\72\40\43\62\x65\x32\x65\62\x65\73\12\x20\40\x20\40\40\40\40\x20\40\40\40\40\40\x20\x20\x20\40\40\x20\x20\143\157\x6c\x6f\162\72\40\43\x66\x30\146\60\x66\60\x3b\12\x20\x20\40\x20\x20\40\40\x20\x20\x20\40\x20\x20\40\40\40\x20\40\40\40\x70\x61\144\144\x69\x6e\x67\72\40\x32\x30\160\x78\73\xa\40\x20\x20\x20\x20\40\40\40\x20\40\x20\40\40\40\x20\40\x20\40\40\40\142\157\162\144\145\162\x3a\40\61\x70\x78\40\163\x6f\x6c\151\x64\x20\43\x34\64\64\x3b\xa\40\40\x20\40\40\40\x20\40\x20\40\40\x20\40\40\40\x20\x20\40\40\x20\x62\x6f\x72\x64\x65\162\x2d\x72\x61\x64\151\165\x73\x3a\x20\65\x70\170\73\xa\x20\40\x20\x20\40\x20\x20\40\40\x20\40\x20\x20\x20\40\40\x20\40\40\x20\157\x76\145\x72\x66\x6c\x6f\167\72\40\x61\x75\164\157\73\12\x20\x20\40\x20\x20\x20\x20\40\x20\40\x20\x20\40\x20\x20\40\x20\x20\40\40\x6d\x61\x78\55\x68\x65\151\x67\150\164\x3a\40\70\x30\x76\150\73\12\40\40\40\x20\x20\x20\x20\x20\40\x20\x20\x20\40\40\40\x20\40\x20\40\40\x66\157\156\x74\x2d\146\141\155\x69\x6c\x79\x3a\40\155\157\156\157\163\x70\x61\x63\x65\73\12\x20\40\x20\x20\x20\40\x20\x20\40\40\40\40\x20\40\x20\40\x7d\xa\x20\40\x20\40\x20\40\40\40\x20\40\x20\x20\40\x20\x20\x20\56\144\144\x2d\144\145\142\x75\147\x20\x70\x72\145\40\x7b\12\x20\40\x20\40\40\x20\40\x20\x20\x20\40\40\40\40\x20\x20\40\40\x20\x20\155\x61\162\x67\151\x6e\72\40\x30\73\xa\40\x20\40\x20\40\40\40\x20\40\40\40\40\40\x20\40\x20\x20\40\x20\40\143\157\154\157\162\72\40\43\146\x30\x66\x30\x66\x30\73\xa\40\40\x20\40\x20\40\40\40\x20\x20\x20\x20\x20\40\40\x20\x7d\12\40\x20\x20\40\40\x20\40\x20\x20\x20\x20\40\x20\x20\40\40\56\x64\144\x2d\x64\145\x62\x75\x67\40\56\x6f\x62\x6a\145\x63\x74\x2d\x70\x72\x6f\x70\x65\162\164\x69\145\163\x20\x7b\xa\40\40\x20\40\40\x20\x20\x20\40\x20\x20\x20\x20\x20\40\x20\40\40\40\40\155\x61\x72\147\x69\156\x3a\40\65\x70\x78\x20\x30\x3b\12\40\40\x20\x20\40\40\40\40\40\40\x20\x20\40\x20\x20\40\x7d\12\40\x20\40\x20\x20\x20\40\40\40\40\40\40\40\40\40\x20\56\144\144\x2d\144\x65\142\x75\x67\40\x2e\x6f\142\x6a\x65\143\x74\55\x76\x61\154\x75\145\163\x20\173\12\40\x20\40\x20\x20\40\40\x20\40\40\40\x20\x20\x20\40\40\40\40\x20\40\155\x61\x72\147\151\156\x2d\154\145\146\164\x3a\40\62\x30\x70\170\x3b\12\40\x20\x20\40\x20\40\x20\x20\x20\40\x20\x20\40\40\40\40\x7d\xa\40\40\40\x20\40\x20\40\40\40\40\x20\40\40\40\x20\x20\56\144\x64\x2d\x64\145\x62\165\x67\40\x2e\164\151\164\x6c\x65\x20\x7b\12\x20\x20\x20\40\40\40\40\40\40\x20\40\x20\x20\x20\40\x20\40\40\x20\x20\146\157\x6e\x74\55\x73\151\172\x65\72\x20\x31\56\65\x65\155\73\12\x20\40\x20\40\40\x20\x20\x20\x20\40\40\40\40\x20\40\x20\x20\x20\40\40\155\x61\x72\x67\151\156\x2d\142\157\164\x74\x6f\155\x3a\40\x31\60\x70\x78\x3b\xa\40\x20\x20\40\40\40\x20\x20\x20\x20\40\40\40\x20\40\40\x7d\xa\40\x20\40\x20\40\x20\x20\x20\40\40\x20\x20\40\40\74\x2f\x73\x74\171\154\x65\76";
        echo "\x3c\x64\151\x76\x20\x63\x6c\x61\x73\163\x3d\47\144\x64\55\x64\145\142\165\x67\x27\x3e\x3c\x64\x69\166\x20\x63\x6c\x61\x73\x73\75\x27\x74\151\164\x6c\145\x27\x3e\x56\151\x67\156\x74\40\55\x20\x44\165\x6d\160\40\x64\141\164\141\x20\x61\156\144\x20\x44\151\145\40\x74\x68\x65\40\x63\x6f\x64\145\74\x2f\144\x69\166\x3e";foreach ($vars as $var) {echo "\74\x64\x69\x76\40\143\154\141\x73\x73\x3d\47\144\x64\x2d\144\145\142\165\x67\x27\76";
            echo "\x3c\x64\x69\166\40\143\x6c\141\x73\x73\75\47\x74\171\160\x65\x27\76\x54\x79\160\x65\72\x20" . gettype($var) . "\74\57\144\151\166\x3e";
            if (is_object($var)) {
                echo "\x3c\144\x69\x76\40\x63\x6c\141\163\163\x3d\x27\157\x62\x6a\145\x63\164\55\x70\x72\x6f\160\145\x72\x74\x69\145\163\47\x3e\x4f\142\152\145\143\x74\40\x6f\x66\x20\x63\154\141\163\x73\x20" . get_class($var) . "\74\57\144\151\166\76";
                echo "\x3c\160\162\x65\x3e";
                foreach (get_object_vars($var) as $property => $value) {
                    echo "\x3c\144\151\166\40\143\154\x61\163\x73\75\47\x6f\x62\152\145\x63\164\x2d\x76\141\x6c\x75\145\163\x27\x3e{$property}\40\x3d\76\40";
                    echo htmlspecialchars(print_r($value, true));
                    echo "\74\57\144\x69\166\76";
                }
                echo "\x3c\x2f\x70\162\x65\x3e";
            } elseif (is_array($var)) {echo "\x3c\x70\162\145\x3e";
                foreach ($var as $key => $value) {
                    echo "\x3c\144\151\166\40\x63\x6c\x61\x73\163\75\x27\157\x62\152\x65\x63\164\x2d\x70\x72\x6f\160\x65\x72\164\151\x65\163\x27\76\x4b\x65\x79\x3a\x20{$key}\x3c\x2f\144\x69\x76\x3e";
                    if (is_object($value)) {
                        echo "\74\x64\151\166\40\143\154\x61\163\163\x3d\47\x6f\x62\x6a\x65\x63\164\55\166\141\154\165\145\163\47\76\117\x62\x6a\x65\x63\164\x20\x6f\x66\40\143\154\x61\x73\x73\40" . get_class($value) . "\x3c\x2f\144\x69\166\76";
                        foreach (get_object_vars($value) as $property => $propValue) {
                            echo "\x3c\x64\151\166\40\143\x6c\x61\x73\163\75\47\157\142\152\x65\143\x74\55\x76\x61\x6c\x75\145\x73\x27\x3e{$property}\x20\x3d\x3e\40";
                            echo htmlspecialchars(print_r($propValue, true));
                            echo "\74\x2f\144\151\166\76";
                        }
                    } else {
                        echo "\74\x64\x69\166\x20\143\x6c\141\x73\x73\75\47\157\x62\x6a\x65\143\164\55\x76\x61\154\165\145\x73\x27\76";
                        print_r($value);
                        echo "\74\57\x64\151\x76\x3e";
                    }
                }
                echo "\74\x2f\x70\162\145\x3e";
            } else {
                echo "\x3c\x70\162\145\x3e";
                var_dump($var);
                echo "\x3c\57\160\x72\145\x3e";
            }
            echo "\x3c\57\144\x69\166\76";
        }
        die;
    }
}
goto Yl1hO;
WYAdt: function callMethodIfExists($className, $methodName, ...$args)
{if (!class_exists($className)) {throw new Exception("\103\154\141\163\x73\40{$className}\x20\144\x6f\x65\163\40\x6e\157\164\x20\x65\170\151\163\164\56");}
    $reflectionClass = new ReflectionClass($className);if (!$reflectionClass->hasMethod($methodName)) {throw new Exception("\115\145\x74\x68\x6f\x64\40{$methodName}\40\144\x6f\145\x73\40\156\157\164\40\145\170\151\x73\x74\x20\x69\156\x20\x63\x6c\141\163\163\40{$className}\x2e");}
    $reflectionMethod = $reflectionClass->getMethod($methodName);if ($reflectionMethod->isStatic()) {return call_user_func_array(array($className, $methodName), $args);} else { $instance = $reflectionClass->newInstance();return call_user_func_array(array($instance, $methodName), $args);}}
