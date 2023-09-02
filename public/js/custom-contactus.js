document.addEventListener('DOMContentLoaded', function () {
    const contactUsForm = document.getElementById('contact-form');
    const preloader = document.getElementById('partialblock');

    contactUsForm.addEventListener('submit', function (event){
        event.preventDefault();
        form = event.target;
        const formData = new FormData(form);

        preloader.style.display = 'block';

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            }
        })

        .then((response) => response.json())
            .then((data) => {
                preloader.style.display = 'none';
                if (data.status == true) {
                    alert(data.message);
                    form.reset();
                }
                else {
                    alert(data.message);
                    console.log(data.error);
                }
            })
            .catch((error) => {
                alert("An error occured. Please try again later.");
                console.log("Error: ", error)
            })
    });     
    
});