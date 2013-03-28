<?php require_once('generate-toc.php'); ?>

<nav class="toc">
    <ul>
        <?php
            foreach (generateTOC('programs-') as $key => $value) {
                echo '<li><a href="' . $key . '">' . $value . '</a></li>';
            }
        ?>
    </ul>
</nav>
