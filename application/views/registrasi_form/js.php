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

    var password = $('#tblpengguna_password');
    var konfirmasi = $('#password');


    if (!validatePassword(password)) {
        alert(
            'Password paling sedikit 6 karakter yang mengandung 1 angka, 1 huruf kapital dan 1 karakter')
        return false;
    }

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

function validatePassword(password) {
    // Define the regular expressions for each password rule
    const minLengthRegex = /.{6,}/; // Minimum 6 characters
    const uppercaseRegex = /[A-Z]/; // At least one uppercase letter
    const digitRegex = /[0-9]/; // At least one digit
    const specialCharRegex = /[$@$!%*?&]/; // At least one special character

    // Check if the password satisfies all the rules
    const isMinLengthValid = minLengthRegex.test(password);
    const isUppercaseValid = uppercaseRegex.test(password);
    const isDigitValid = digitRegex.test(password);
    const isSpecialCharValid = specialCharRegex.test(password);

    // Return true if all rules are satisfied, false otherwise
    return (
        isMinLengthValid &&
        isUppercaseValid &&
        isDigitValid &&
        isSpecialCharValid
    );
}


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