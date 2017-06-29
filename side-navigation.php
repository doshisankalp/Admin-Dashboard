<style scoped>
    body {
        margin: 0;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 20%;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    li a.active {
        background-color: #4CAF50;
        color: white;
    }

    li a:hover:not(.active) {
        background-color: #555;
        color: white;
    }
</style>



<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="./display.php">Database Operation</a></li>
<li>
    <select onclick="settablename(this.value);show(0);" size="10" style="max-width: 350%;">
        <option selected>Select Table from below list :</option>
        <option value="businesses">Businesses</option>
        <option value="city">City</option>
        <option value="jobs">Jobs</option>
        <option value="language">Language</option>
        <option value="name_group">Name Group</option>
        <option value="names">Names</option>
        <option value="religion">Religion</option>
        <option value="world">World</option>
    </select>
</li>
    <li><a href="phpsysinfo.php">PHP System Info</a></li>
    <li><a href="./SystemStats.php">Server Stats</a></li>
    <span style="display:block; height: 90px;"></span>

    <li><a href="#"><?php
            include_once("./php/session.php");
            ?> <b>Logged In User</b></a></li>

</ul>
