<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utils;

/**
 * Description of CreateCsvUtils
 *
 * @author user
 */
class CreateCsvUtils {
    public static function createCsv() {
        $fileDir = FILE_DIR;
        $fileDirName = FILE_DIR_NAME;
        $fileName = "\\" . uniqid() . '.csv';
        foreach ($transactionDetails as $transactionDetails) {
            $fileContent .= implode(",", $transactionDetails) . "\n";
        }
        //Create directory if doesnt exist
        $resultFileDir = new \Cake\Filesystem\Folder($fileDir, true);
        $resultFileDir->create($fileDir);
        $resultFile = new \Cake\Filesystem\File($fileDirName . $fileName, true);
        $resultFile->open('w');
        $write = $resultFile->write($fileContent);
        $resultFile->close();
 //        $fp = fopen('files/'.$fileName, 'wb');
 //        header('Content-Type: application/text');
 //
 //
 //        $file = fwrite($fp,$fileContent);
 //        fclose($fp);
        //If the file created successfully, then return target path
        if ($write) {
            return $fileDir . $fileName;
        } else {
            return NULL;
        }
    }
}
