<?php


function dd($str)
{
    echo json_encode($str, true);
    die();
}

function aplikasi()
{
    return 'Pelayanan Terpadu Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Tanah Laut';
}


function selected($x, $y)
{

    if ($x == $y) {
        return 'selected';
    }

    return '';
}

function fail($msg = 'Maaf, terjadi kesalahan')
{
    $res = array('status' => false, 'msg' => $msg);
    echo json_encode($res, true);
    die();
}

function success($msg)
{
    $res = array('status' => true, 'msg' => $msg);
    echo json_encode($res, true);
    die();
}

function return_json($str)
{
    echo json_encode($str, true);
    die();
}