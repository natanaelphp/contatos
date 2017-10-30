<?php

function redirect($url)
{
    header('Location: '.$url);
    die();
}

function old($input, $default = null)
{
    return $_POST[$input] ?? $default ?? '';
}

/*------------------------------------------------------------------------------
    To use in development
------------------------------------------------------------------------------*/
function show($something)
{
    echo '<pre>';
    print_r($something);
    echo '</pre>';
}

function sd($something)
{
    show($something);
    die();
}
