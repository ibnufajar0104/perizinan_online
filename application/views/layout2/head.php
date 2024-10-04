<!DOCTYPE html>

<head>

    <title><?= $title ?></title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="Sistem Informasi Manajemen Pelayanan Terpadu Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Tanah Laut"
        name="description" />
    <meta content="DPMPTSP" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/logo%20tala.png">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url() ?>tmp/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>tmp/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>tmp/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>tmp/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- alertifyjs Css -->
    <link href="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet"
        type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet"
        type="text/css" />

    <style>
        body {
            background-color: #e6f2ff;
        }

        .card {
            background-color: #FAFDFE;
            /* Warna latar belakang yang lebih terang untuk kontras */
            border: none;
            /* Menghapus border default card */
            border-radius: 10px;
            /* Membulatkan sudut card */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Memberikan bayangan ringan */
            margin-bottom: 15px;
        }


        .form-image {
            margin-top: 40px;
        }

        @media only screen and (max-width: 600px) {
            .form-image {
                display: none;
            }


        }
    </style>
</head>