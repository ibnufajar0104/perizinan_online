<script>
var global_url = '<?= base_url('registrasi/') ?>';
$('document').ready(function() {

    $('#jenis').val('');
    $('.npwp').hide();
    $('.nik').hide();

    $('#jenis').change(function() {

        if ($(this).val() == 1) {
            $('.npwp').show();
            $('.nik').hide();
            $("#tblpemohon_npwp").prop('required', true);
            $("#tblpemohon_noidentitas").prop('required', false);
        } else {
            $('.npwp').hide();
            $('.nik').show();

            $("#tblpemohon_npwp").prop('required', false);
            $("#tblpemohon_noidentitas").prop('required', true);
        }
    });
});


$('.form-daftar').submit(function(e) {

    event.preventDefault(); // Menghentikan perilaku bawaan formulir (misalnya, mengirimkan permintaan GET)

    var url = global_url + 'daftar'
    var formData = $(this).serialize();
    postWithAjax(url, formData, function(response, error) {
        if (error) {
            console.error(error);
        } else {


            if (response.status) {

                success(response.msg);
                new_location('<?= site_url('login') ?>');
            } else {
                fail(response.msg);
            }


        }

        after_load('Mendaftar');
    });

});
</script>