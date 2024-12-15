$(document).ready(function () {

    // TODO Quitar los Console.logs

    // Rellenar Cookies en caso de error en el pago

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    const cookieFields = {
        firstName: '#firstName',
        lastName: '#lastName',
        email: '#email',
        address: '#address',
        country: '#country',
        city: '#city',
        zip: '#zip',
        phone: '#phone',
        samebilling: '#samebilling'
    };

    let url = new URL(window.location.href);
    const params = url.searchParams;
    const paramValue = params.get('action');
    url.searchParams.delete('action');
    url += "/../resources/get_cities.php";

    function getCities(country) {

        $.ajax({
            url: url, // Archivo PHP que devolverá las ciudades
            type: 'POST',
            data: { country: country },
            dataType: 'json',
            success: function (data) {

                $('#city').prop('disabled', false);

                $.each(data, function (index, city) {
                    var selected = (city.value === getCookie('city')) ? ' selected' : '';
                    $('#city').append('<option value="' + city.value + '"' + selected + '>' + city.name + '</option>');
                });
            },
            error: function () {
                alert('Error al cargar las ciudades.');
            }
        });
    }

    if (paramValue === "error_inesperado" || paramValue === "error_pay_out" || paramValue === "cancel_check_out") {

        for (const [cookieName, fieldSelector] of Object.entries(cookieFields)) {

            const cookieValue = getCookie(cookieName);

            if (cookieName === "city") {
                getCities(getCookie('country'));
            }
            if (cookieName !== ("city" && "samebilling")) {
                $(fieldSelector).val(decodeURIComponent(cookieValue));
            }
            if (cookieName === "samebilling") {
                $(fieldSelector).prop('checked', cookieValue === "1");
            }
        }
    }

    $('#country').change(function () {

        var country = $(this).val();

        $('#city').empty().append('<option value="">Select a city</option>').prop('disabled', true);

        if (country) {
            getCities(country);
        }
    });

    // Validacion de Email

    $('#email').on('input', function () {
        var emailInput = $(this).val();
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(emailInput)) {
            email.classList.remove('is-invalid');
            email.classList.add('is-valid');
            // email.classList.add('bg-primary');
        } else {
            email.classList.remove('is-valid');
            email.classList.add('is-invalid');
        }
    });
});