<div>
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
    <li><a class="active" href="./index1.php">Home</a></li>
    <li><a href="./display.php">Database Operation</a></li>
    <li><a href="#">phpMyAdmin</a></li>
    <li><a href="./SystemStats.php">Server Stats</a></li>
</ul>
</div>