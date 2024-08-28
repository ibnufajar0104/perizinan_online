<?php

function login_required()
{
    $ci = &get_instance();


    if (!$ci->session->logged) {
        redirect('login');
    }
}

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

function status($str)
{
    if ($str == 2) {
        return  '<button class="btn btn-sm btn-outline-danger">Ditolak</button>';
    }

    if ($str == 4) {
        return  '<button class="btn btn-sm btn-outline-success">Selesai</button>';
    }

    if ($str == 5) {
        return  '<button class="btn btn-sm btn-outline-primary">Draf</button>';
    }


    return  '<button class="btn btn-sm btn-outline-warning">Diproses</button>';
}

function path_persyaratan($file)
{
    $path = ip() . 'handle-file/persyaratan/' . $file;

    return  $path;
}


function value(array $array, $key)
{
    return isset($array[$key]) ? $array[$key] : null;
}