<?php
    include('../inc/config.php');
    session_start();

    $gameName = $_SESSION['gameName'];
    $txtFile = $gameName . '.txt';

    $function = $_POST['function'];
    
    $log = array();
    
    switch($function) {
    
        case('getState'):
            if(file_exists('../games/chatLogs/'.$txtFile.'')){
                $lines = file('../games/chatLogs/'.$txtFile.'');
                }
            $log['state'] = count($lines); 
            break; 
        
        case('update'):
            $state = $_POST['state'];
            if(file_exists('../games/chatLogs/'.$txtFile.'')){
                $lines = file('../games/chatLogs/'.$txtFile.'');
                }
            $count =  count($lines);
            if($state == $count){
                $log['state'] = $state;
                $log['text'] = false;
                 
                } else {
                    $text = array();
                    $log['state'] = $state + count($lines) - $state;
                    foreach ($lines as $line_num => $line){
                        if($line_num >= $state){
                        $text[] =  $line = str_replace("\n", "", $line);
                        }
                    }
                    $log['text'] = $text; 
                }
            break;

        case('send'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            $message = htmlentities(strip_tags($_POST['message']));
            
            if(($message) != "\n"){
            
            if(preg_match($reg_exUrl, $message, $url)) {
                $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
                }
                if(strpos($nickname, 'Storyteller') == true){
                    fwrite(fopen('../games/chatLogs/'.$txtFile.'', 'a'), "<span style='color: blue;'>". $nickname . " : ".  $message = str_replace("\n", " ", $message) . "\n") ."</span>";
                } else {
                    fwrite(fopen('../games/chatLogs/'.$txtFile.'', 'a'), "<span>". $nickname . "</span> : ". $message = str_replace("\n", " ", $message) . "\n");
                }
            }
            break;
    
        case('dice'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            $message = htmlentities(strip_tags($_POST['message']));
            
            if(($message) != "\n"){
            
            if(preg_match($reg_exUrl, $message, $url)) {
                $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
                }
                if(strpos($nickname, 'Storyteller') == true){
                    fwrite(fopen('../games/chatLogs/'.$txtFile.'', 'a'), "<span style='color: blue;'>". $nickname . " : ".  $message = str_replace("\n", " ", $message) . "\n") ."</span>";
                } else {
                    fwrite(fopen('../games/chatLogs/'.$txtFile.'', 'a'), $nickname . " : <span style='color: red;'>".  $message = str_replace("\n", " ", $message) . "\n") ."</span>";
                }
            }
            break;   
    }

    echo json_encode($log);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);    
?>
