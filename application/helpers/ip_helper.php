<?php

function ip()
{
    return 'http://172.16.36.105/ptsp/';
}

function dd($str)
{
    echo json_encode($str, true);
    die();
}


function selected($x, $y)
{

    if ($x == $y) {
        return 'selected';
    }

    return '';
}