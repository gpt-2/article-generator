<?php
include_once "src/gpt2com.php";

$gpt2= new gpt2com;
$gpt2->user_id="YOUR_USER_ID";
$gpt2->api_key="YOUR_API_KEY";

 

$outfolder="./out";
if (!is_writable($outfolder))
    {
	echo "set writing permissions to folder out";
	die();
    }
if (!is_writable("tasks.txt"))
    {
	echo "set writing permissions to file tasks.txt";
	die();
    }
if (ini_get('max_execution_time')<>0)
    {
	echo "set max_execution_time = 0 in your PHP.INI file ".php_ini_loaded_file();
    }
$tasks=file("tasks.txt");
foreach ($tasks as $task)
{
$data=explode("|",$task);
$title=trim($data[0]);
$prefix = trim($data[1]);
//echo $title."\n\n";
//echo $prefix;
//die();
$article=$gpt2->generate($prefix);
if ($article<>false)
    {
    $filename=time().".txt";
    file_put_contents($outfolder."/".$filename,$title."\n".$article);
    echo "\033[32m".$filename." written \033[0m".$title." \n";
    }
else
    {
    echo "\033[31m empty article received \033[0m\n";
    }
}