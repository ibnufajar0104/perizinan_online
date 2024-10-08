<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center bg-dark p-3">

            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0" />

        <div class="p-4">
            <h6 class="mb-3">Layout</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                <label class="form-check-label" for="layout-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                <label class="form-check-label" for="layout-horizontal">Horizontal</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                <label class="form-check-label" for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                <label class="form-check-label" for="layout-mode-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild"
                    onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                <label class="form-check-label" for="layout-width-fuild">Fluid</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed"
                    onchange="document.body.setAttribute('data-layout-size', 'boxed'),document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                    value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                <label class="form-check-label" for="layout-position-fixed">Fixed</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
                    value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light"
                    onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark"
                    onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                    value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">Default</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                    value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small"
                    onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light"
                    onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">Light</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark"
                    onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand"
                    onchange="document.body.setAttribute('data-sidebar', 'brand')">
                <label class="form-check-label" for="sidebar-color-brand">Brand</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Direction</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                    value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                    value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<script src="<?= base_url() ?>tmp/assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>tmp/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>tmp/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url() ?>tmp/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>tmp/assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>tmp/assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="<?= base_url() ?>tmp/assets/libs/pace-js/pace.min.js"></script>

<script src="<?= base_url() ?>tmp/assets/js/app.js"></script>

<!-- form validation -->
<script src="<?= base_url() ?>tmp/assets/js/pages/form-validation.init.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url() ?>tmp/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>tmp/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>


<!-- Responsive examples -->
<script src="<?= base_url() ?>tmp/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<!-- alertifyjs js -->
<script src="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/alertify.min.js"></script>


<!-- choices js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- init js -->


<script>
<?php if ($this->session->userdata('error')) : ?>
alertify.error('<?= $this->session->userdata('error') ?>');
<?php endif ?>


<?php if ($this->session->userdata('success')) : ?>
alertify.success('<?= $this->session->userdata('success') ?>');
<?php endif ?>
</script>



<?php if (isset($js)) {
    $this->load->view($js);
} ?>

<script>
// $('#tblizinpermohonan_id').change(function() {
//     persyaratanDinamis($(this).val());
// });

// function updateLabel(id) {
//     if (id === 79) {
//         $('.nama_usaha').text('Nama Universitas/Organisasi');
//         $('.alamat_usaha').text('Alamat Universitas/Organisasi');
//     }
// }



// function persyaratanDinamis(id) {
//     const idPendaftaran = $('#tblizinpendaftaran_id').val();

//     $.ajax({
//         url: "<?php echo site_url('permohonan/get_persyaratan') ?>",
//         type: 'POST',
//         data: {
//             id: id,
//             id_pendaftaran: idPendaftaran
//         },
//         dataType: 'html',
//         success: function(response) {
//             $('.persyaratan').html(response);
//         },
//         error: function(xhr) {
//             console.error(xhr.responseText);
//         }
//     });
// }

function showSuccessMessage(msg) {
    alertify.success(msg);
}

function showErrorMessage(msg) {
    alertify.error(msg);
}

function postWithAjax(url, data, callback) {
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function() {
            $("button[type='submit']").attr('disabled', 'disabled').text('Loading...');
        },
        success: function(response) {
            if (callback) callback(response, null);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (callback) callback(null, 'Error: ' + errorThrown);
        }
    });
}

function postFileWithAjax(url, data, callback) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function() {
            $("button[type='submit']").attr('disabled', 'disabled').text('Loading...');
        },
        success: function(response) {
            if (callback) callback(response, null);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (callback) callback(null, 'Error: ' + errorThrown);
        }
    });
}

function afterLoad(val) {
    $("button[type='submit']").removeAttr('disabled').text(val);
}

function redirectTo(url) {
    setTimeout(function() {
        window.location.href = url;
    }, 1000);
}
</script>


</body>

</html>