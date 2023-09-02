document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', function (event) {
        const form = event.target;
        if (form.id == 'login-form') 
        {
            event.preventDefault();

            const recaptchaResponse = grecaptcha.getResponse();

            const formData = new FormData(form);
            formData.append('g-recaptcha-response', recaptchaResponse);

            if(!recaptchaResponse)
            {
                alert("Please verify that you are not a robot.");
                return false;
            }

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                }
            })

                .then((response) => response.json())
                .then((data) => {
                    if (data.status == true) {
                        localStorage.setItem('username', data.currentusername);
                        window.location.href = '/management/dashboard';
                    }
                    else {
                        alert(data.message);
                        form.reset();
                        grecaptcha.reset();
                    }
                })
                .catch((error) => {
                    alert("An error occured. Please try again later.");
                    console.log("Error: ", error)
                    form.reset();
                    grecaptcha.reset();
                })
        }
    })

});