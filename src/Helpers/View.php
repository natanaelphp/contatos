<?php

function View($view)
{
    return $_SERVER['DOCUMENT_ROOT'].'/../src/Views/'.$view.'.php';
}
