<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 8/6/17
 * Time: 5:10 PM
 */
echo "<html>
<head>
    <meta http-equiv=\"refresh\" content=\"3\" >

</head>";

echo "Server Memory Usage: ".get_server_cpu_usage(). "<br>";

echo "Server CPU Usage: ".get_server_cpu_usage(). "<br>";

echo "Memory Usage: ". memory_get_usage() . "<br>";


echo "</html>";

function get_server_memory_usage(){

    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]/$mem[1]*100;

    return $memory_usage;
}

function get_server_cpu_usage(){

    $load = sys_getloadavg();
    return $load[2];

}
