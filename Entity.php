<?php
    class Entity{
        static public function createElementOfCSV($filename, $element){
            if(count($_POST)>0){
                //make sure name is not already in the file
                  $error ='';
                  if(file_exists($filePath)){
                    $fh = fopen($filePath, 'r'); //open file  in read mode
                    while($line=fgets($fh)){
                      if($_POST['element'] == trim($line)){
                        $error='This already exists';
                      }
                    }
                    fclose($fh); //close file
                  }
    
                  if(strlen($error)>0) echo $error;
                  else{
                    // Add the name to the csv file
                    $fh = fopen($filePath, 'a');
                    fputs($fh,$_POST['element'].PHP_EOL);//php_eol = new line
                    fclose($fh);
                    exit();
                  }
            }

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