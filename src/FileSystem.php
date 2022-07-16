<?php

/**
 * FileSystem.php
 * 
 * Class for handling folders and files in php
 * 
 * 
 * @link https://github.com/DiegoDuenez/filesystem-php
 * @author DiegoDuenez 
 */

class FileSystem{


    public static function errors($key)
    {
        return $_FILES[$key]['error'];
    }

    public static function get($key, $property)
    {
        return $_FILES[$key][$property];
    }

    public static function move($from, $to)
    {
        move_uploaded_file($from, $to);

    }

    public static function getExtensionFrom($name)
    {
        $n = strrpos($name, '.');
        return ($n === false) ? '' : substr($name, $n+1);
    }

    public static function makeDirectory($path)
    {

        if (!is_dir($path)) {
            mkdir($path);
            return true;
        }
        return false;
        
    }

    public static function renameDirectory($path, $newname)
    {

        if (is_dir($path)) {

            try{
                if(!is_dir($newname)){
                    try{
                        if(rename($path, $newname)){
                            return true;
                        }
                        else{
                            throw new Exception("Error trying to rename $path");
                        }
                    }
                    catch(Exception $e){
                        echo $e->getMessage();
                    }
                }
                else{
                    throw new Exception("There is already a file called $newname");
                }
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return false;
    }

    public static function getFilesFrom($path)
    {

        if (is_dir($path)) {
            $files = scandir($path);
            return $files;
        }
        else{
            return false;
        }
       
    }

    public static function dropFilesFrom($path)
    {
        if(is_dir($path)){
            $files = glob("$path/*");
            foreach($files as $file){
                unlink($file); 
                return true;
            }
        }
        return false;
            
    }

    public static function dropFile($path)
    {
        if(file_exists($path)){
            unlink($path); 
            return true;
        }
        return false;
    }

    public static function directoryExists($path)
    {

        return (is_dir($path)) ? true : false ;

    }

    public static function fileExists($path){

        return (file_exists($path)) ? true : false ;

    }

    public static function makeFile($path)
    {

        $f = fopen($path, 'wb');
        return (!$f) ? false : true ;

    }

    public static function writeFile($path, $content, $mode = 'w')
    {
        if(file_exists($path)){
            $fh = fopen($path, $mode);
            fwrite($fh, $content);
            fclose($fh);
            return true;
        }
        return false;
    }


}