<?php

/**
 * Use to preload all necessary file
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 */
final class AutoLoad
{

    public function __construct()
    {
        require_once('BaseController.php');
        $this->loadRecursiveFiles(APP_INTERFACES);
        $this->loadRecursiveFiles(APP_CONTROLLER);
        $this->loadRecursiveFiles(APP_SERVICES);
    }

    public function loadRecursiveFiles($dir)
    {
        if (is_dir($dir)) {
            $fh = opendir($dir);
            while (($file = readdir($fh)) !== false) {
                if (strcmp($file, '.') == 0 || strcmp($file, '..') == 0) {
                    continue;
                }
                $filepath = $dir . '/' . $file;
                if (is_dir($filepath)) {
                    $this->loadRecursiveFiles($filepath);
                } else {
                    require_once($filepath);
                }
            }
            closedir($fh);
        } else {
            die("Invalid directory $dir");
        }
    }
}

