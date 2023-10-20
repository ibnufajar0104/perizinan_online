<?php

function ip()
{
    return 'http://172.16.36.105/ptsp/';
    // return 'http://192.168.100.100/ptsp/';
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