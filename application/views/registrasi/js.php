<script>
var global_url = '<?= base_url('registrasi/') ?>';
$('document').ready(function() {


    $('.npwp').hide();
    $('.nik').hide();
    $("button[type='submit']").attr('disabled', 'disabled');
    $('.form-cek-pendaftaran').trigger('reset');
});

$('#jenis').change(function() {

    jenis_pemohon($(this).val());
});

function jenis_pemohon(id) {
    if (id == 1) {
        $('.npwp').show();
        $('.nik').hide();
        $("#tblpemohon_npwp").prop('required', true);
        $("#tblpemohon_noidentitas").prop('required', false);
        after_load('Cek Pernah Daftar');
    } else if (id == 2) {
        $('.npwp').hide();
        $('.nik').show();

        $("#tblpemohon_npwp").prop('required', false);
        $("#tblpemohon_noidentitas").prop('required', true);
        after_load('Cek Pernah Daftar');
    } else {
        $('.npwp').hide();
        $('.nik').hide();
        $("button[type='submit']").attr('disabled', 'disabled');
    }
}


$('.form-cek-pendaftaran').submit(function(e) {

    event.preventDefault(); // Menghentikan perilaku bawaan formulir (misalnya, mengirimkan permintaan GET)

    var url = global_url + 'cek'
    var formData = $(this).serialize();
    postWithAjax(url, formData, function(response, error) {
        if (error) {
            console.error(error);
        } else {

            if (response.status) {

                success(response.msg);
                new_location(global_url + 'form');
            } else {
                fail(response.msg);
            }


        }

        after_load('Cek Pernah Mendaftar');
    });

});

$('#tblpemohon_noidentitas, #tblpemohon_npwp').keypress(function(e) {
    var key = e.which;

    if (key < 48 || key > 57) {
        e.preventDefault();
    }
});
</script>