<?php

function aclassAutoloader ($class) {
    include_once $class . '.php';
}

spl_autoload_register('aclassAutoloader');
