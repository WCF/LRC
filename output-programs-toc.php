<?php require_once('generate-toc.php'); ?>

<nav class="toc">
    <ul>
        <li class="title"><a href="programs.php">Programs</a></li>
        <?php
            foreach (generateTOC('programs-') as $key => $value) {
                echo '<li><a href="' . urlencode($key) . '">' . strip_tags($value) . '</a></li>';
            }
        ?>
    </ul>
</nav>
