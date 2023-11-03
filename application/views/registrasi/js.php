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

$('#tblpemohon_noidentitas').keypress(function(e) {
    var key = e.which;

    if (key < 48 || key > 57) {
        e.preventDefault();
    }
});


$("#tblpemohon_npwp").on('input', function() {
    var npwpValue = $(this).val().replace(/\D/g, ''); // Hapus karakter non-angka
    var formattedValue = '';

    if (npwpValue.length > 0) {
        formattedValue += npwpValue.substring(0, 2);
    }

    if (npwpValue.length > 2) {
        formattedValue += '.' + npwpValue.substring(2, 5);
    }

    if (npwpValue.length > 5) {
        formattedValue += '.' + npwpValue.substring(5, 8);
    }

    if (npwpValue.length > 8) {
        formattedValue += '.' + npwpValue.substring(8, 9) + '-';
    }

    if (npwpValue.length > 9) {
        formattedValue += npwpValue.substring(9, 12);
    }

    if (npwpValue.length > 12) {
        formattedValue += '.' + npwpValue.substring(12, 15);
    }

    $(this).val(formattedValue);
});
</script>