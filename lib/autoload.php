<?php

function autoload($classe) {
    $file = 'Modele/' . $classe . '.php';
    if (file_exists($file))
        include $file;
}

spl_autoload_register('autoload');
