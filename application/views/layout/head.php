<!DOCTYPE html>

<head>

    <title> <?= $title ?></title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
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


    <!-- DataTables -->
    <link href="<?= base_url() ?>tmp/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>tmp/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>tmp/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- alertifyjs Css -->
    <link href="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet"
        type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet"
        type="text/css" />

    <!-- choices css -->
    <link href="<?= base_url() ?>tmp/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet"
        type="text/css" />



    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />




    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }


    body,
    p {
        font-family: 'Roboto', sans-serif;
    }



    /* body {
        font-size: 14px;
    } */


    .form-control-2 {
        height: 45px;
    }

    /* th,
    td {
        vertical-align: middle;
    } */

    /* Mengatur tinggi elemen Select2 */
    .select2-container .select2-selection--single {
        height: 45px;
        /* Atur tinggi yang diinginkan */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 45px;
        /* Sesuaikan dengan tinggi elemen */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 48px;
        /* Sesuaikan dengan tinggi elemen */
    }


    .title {
        font-weight: bold;
        color: #333;
        margin-bottom: 0.2rem;
    }

    .value {
        color: #555;

    }

    label {
        color: #333;
        font-weight: bold;
    }

    .card {
        border: 1px solid #e0e0e0;
        /* Warna border card */
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        /* Menambahkan efek bayangan */
    }

    .progress {
        margin-top: 20px;
    }

    .progress-bar {
        background-color: #007bff;
        color: white;
        text-align: center;
        line-height: 25px;
    }
    </style>
</head>

<body data-layout="horizontal" data-topbar="dark">