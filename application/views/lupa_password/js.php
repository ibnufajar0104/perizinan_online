<script>
var global_url = '<?= base_url('lupa_password/') ?>';
$('.form-kirim-otp').submit(function(e) {

    event.preventDefault(); // Menghentikan perilaku bawaan formulir (misalnya, mengirimkan permintaan GET)

    var url = global_url + 'kirim_otp'
    var formData = $(this).serialize();
    postWithAjax(url, formData, function(response, error) {
        if (error) {
            console.error(error);
        } else {


            if (response.status) {

                success(response.msg);
                new_location('<?= site_url('lupa_password/otp') ?>');
            } else {
                fail(response.msg);
            }


        }

        after_load('Kirim OTP');
    });

});


$('.form-verifikasi-otp').submit(function(e) {

    event.preventDefault(); // Menghentikan perilaku bawaan formulir (misalnya, mengirimkan permintaan GET)

    var url = global_url + 'verifikasi_otp'
    var formData = $(this).serialize();
    postWithAjax(url, formData, function(response, error) {
        if (error) {
            console.error(error);
        } else {


            if (response.status) {

                success(response.msg);
                new_location('<?= site_url('lupa_password/ganti_password') ?>');
            } else {
                fail(response.msg);
            }


        }

        after_load('Verifikasi');
    });

});


$('.form-ganti-password').submit(function(e) {

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

    var url = global_url + 'ganti_password_form'
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

        after_load('Simpan');
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