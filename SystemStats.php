<html>
<head>
    <title>Server Stats - Neeti Solutions</title>
    <meta http-equiv="refresh" content="1">
    <link rel="stylesheet" href="./css/pure-min.css">

</head>
<header> <?php include("./header.php"); ?> </header>
<nav><?php include("./navigation.php"); ?></nav>
<nav><?php include("./side-navigation.php"); ?></nav>

<div style="margin-left:25%">

<?php
function get_server_memory_usage(){

    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = ($mem[1]-$mem[6])/$mem[1]*100;
    return $memory_usage;
}

function get_server_cpu_usage(){
    $load = sys_getloadavg();
    return $load[2];
}
?>

    <span style="display:block; height: 30px;"></span>

    <table class='pure-table pure-table-striped pure-table-bordered'>
        <th>Server Memory Usage</th>
        <th>Server CPU Usage</th>
        <th>Memory to PHP</th>
        <tr>
            <td><?php echo get_server_memory_usage()." %"; ?></td>
            <td><?php echo get_server_cpu_usage(); ?></td>
            <td><?php echo (memory_get_usage()/1024)." KB"; ?></td>
        </tr>
    </table>

</div>