<script src="<?= base_url() ?>tmp/assets/libs/jquery/jquery.min.js"></script>
<!-- alertifyjs js -->
<script src="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/alertify.min.js"></script>


<script>
<?php if ($this->session->userdata('error')) : ?>
alertify.error('<?= $this->session->userdata('error') ?>');
<?php endif ?>


<?php if ($this->session->userdata('success')) : ?>
alertify.success('<?= $this->session->userdata('success') ?>');
<?php endif ?>

function success(msg) {
    alertify.success(msg);
}

function fail(msg) {
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
            if (callback) {
                callback(response, null);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (callback) {
                callback(null, 'Error: ' + errorThrown);
            }
        }
    });
}

function after_load(val) {
    $("button[type='submit']").removeAttr('disabled').text(val);
}

function new_location(url) {
    setTimeout(function() {
        window.location.href = url
    }, 1000);
}
</script>


<?php if (isset($js)) {
    $this->load->view($js);
} ?>