<?php

function ip()
{
    return 'http://192.168.100.100/ptsp/';
}

function dd($str)
{
    echo json_encode($str, true);
    die();
}