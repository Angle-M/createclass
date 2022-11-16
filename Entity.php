<?php
    class Entity{
        static public function createElementOfCSV($filename,$element1,$element2,$element3){
            $element=$_GET;
            $fh = fopen($filename, 'w');

            $information = $element[$element1].';'.$element[$element2].';'.$element[$element3];
            fputs($fh,$information."\n");
            fclose($fh);
        }
        static public function modifyElementOfCSVFile($fileName, $line){
            /*$fh = fopen($fileName, 'r');
            readCSVFile($fileName);
            $index=0;
            while($line=fgets($fh)){
                if(strlen(trim($line))>0) {
                    echo ($index.trim($line));
                    $index++;
                }
            } //read line by line
            fclose($fh); //close file*/

        }
    
        static public function deleteElementOfCSVFile(){
            
    
        }

        static public function createElementOfJSON($filename,$element){
            if(!file_exists($filename)) die('File not found');
            $elements=json_decode(file_get_contents($filename),true);
            $elements[]=$element;
            file_put_contents($filename,json_encode($elements));
        }

        static public function modifyElementOfJSONFile($fileName,$index,$element){
            if(!file_exists($filename)) die('File not found');
            $elements=json_decode(file_get_contents($filename),true);
            if(isset($elements[$index])){
                $elements[$index]=$element;
                file_put_contents($filename,json_encode(array_values($elements)));
            }
        }
    
        static public function deleteElementOfJSONFile($filename,$index){
            if(!file_exists($filename)) die('File not found');
            $elements=json_decode(file_get_contents($filename),true);
            if(isset($elements[$index])){
                unset($elements[$index]);
                file_put_contents($filename,json_encode(array_values($elements)));
            }
        }
    }