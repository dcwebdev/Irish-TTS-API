<?php
/**
 * Created by PhpStorm.
 * User: Laura 7
 * Date: 10/3/2016
 * Time: 5:33 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("display_startup_errors", 1);

if(!isset($_GET['s']))
{
    die("no string sent or string contained only invalid characters");
}

//TODO: convert output file to mp3
$stringToRead = escapeshellcmd($_GET['s']); //use spaces, not underscores, %20s, etc.
$lang = escapeshellcmd($_GET['lang']); //uses the two letter language code

if(validate($lang) == 1)
{
    $stringToRead = str_replace(" ", "_", $stringToRead);

    header("Content-Type: audio/wav");
    header("Content-Disposition:attachment; filename=".$stringToRead.".wav");
    chdir("command_line");

    //why does it still read the string? the -w flag means it should be silent
    $cmd = "espeak -v".$lang . " \"" . $stringToRead . "\""; //espeak -vga "stringtoread"
    passthru($cmd); //sends the data in response to the get request
    chdir("..");
}
else
{
    echo "invalid lang";
}

function validate($lang)
{
    $returnString = "";
    if($lang != "ga")
    {
        $returnString .= "Invalid lang code. ";
    }

    if($returnString == "")
    {
        return 1;
    }

    return $returnString;
}