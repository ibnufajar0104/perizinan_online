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

    var password = $('#tblpengguna_password').val();
    var konfirmasi = $('#konfirmasi').val();


    if (!validatePassword(password)) {
        $('.validasi').text(
            'Password paling sedikit 6 karakter yang mengandung 1 angka, 1 huruf kapital dan 1 karakter')
        return false;
    }



    if (password != konfirmasi) {
        $('.validasi').text('konfirmasi password tidak sama');
        return false;
    }


    $('.validasi').text('');

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


$('#tblpemohon_noidentitas, #tblpemohon_npwp').keypress(function(e) {
    var key = e.which;

    if (key < 48 || key > 57) {
        e.preventDefault();
    }
});



$('.toggle-password').on('click', function() {
    const targetId = $(this).data('target');
    const passwordField = $('#' + targetId);
    const passwordFieldType = passwordField.attr('type');

    // Toggle the password field type
    passwordField.attr('type', passwordFieldType === 'password' ? 'text' : 'password');

    // Toggle the eye icon
    const eyeIcon = $(this).find('i');


    eyeIcon.toggleClass('fa-eye-slash fa-eye');
});
</script>