<?php
/**
 * ScanDirectory Class.
 * @author Jauhari Khairul Kawistara <jkawistara@gmail.com>
 * Date: 2018-01-08
 */

namespace modules;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use UnexpectedValueException;

class ScanDirectory
{
    const REGEX = '/^[^\.].*$/';

    /**
     * @param string|null $dir The directory selected name.
     * @return array
     */
    public function scanDir(string $dir = null): array
    {
        if(empty($dir)) {
            printf("Directory is not selected");
            return [];
        }

        $directories = $this->getDirectories($dir);
        return $this->getFiles($directories);
    }

    /**
     * @param string $dir The directory name.
     * @return RecursiveIteratorIterator
     */
    private function getDirectories(string $dir)
    {
        try {
            return new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dir)
            );
        } catch (UnexpectedValueException $error) {
            printf("Directory Not Found or Failed To Access. ");
            printf("Kindly to reconfigure name folder on /config/config.ini");
            die();
        }
    }

    /**
     * @param array $directories The array of directories.
     * @return array
     */
    private function getFiles(RecursiveIteratorIterator $directories): array
    {
        $files = [];
        foreach ($directories as $directory) {
            if (!is_dir($directory) && preg_match(self::REGEX, $directory->getFilename())){
                $files[] = $directory->getPathname();
            }
        }

        return $files;
    }
}