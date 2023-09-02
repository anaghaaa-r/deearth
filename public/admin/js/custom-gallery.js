document.addEventListener('DOMContentLoaded', function () {
    const addHomesForm = document.getElementById('add-home-form');
    const addUrbanDesignForm = document.getElementById('add-urbandesign-form');
    const addInstitutionForm = document.getElementById('add-institution-form');
    const addCommercialForm = document.getElementById('add-commercial-form');

    if (addHomesForm) {
        addHomesForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addHomesForm);
        });
    }

    if (addUrbanDesignForm) {
        addUrbanDesignForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addUrbanDesignForm);
        })
    }

    if (addInstitutionForm) {
        addInstitutionForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addInstitutionForm);
        });
    }

    if (addCommercialForm) {
        addCommercialForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addCommercialForm);
        });
    }

    function handleFormSubmission(event, form) {
        event.preventDefault()
        const formData = new FormData(form);

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
                    alert(data.message);
                    location.reload();
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
    }

    const deleteForm = document.getElementById('delete-form');

    if (deleteForm) {
        deleteForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteForm);
        });
    }

    function handleDeleteFormSubmission(event, form) {
        event.preventDefault();
        if (form) 
        {
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'DELETE', // You might use DELETE here if your server supports it
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                }
            })

                .then((response) => response.json())
                .then((data) => {
                    console.log("data: ", data)
                    if (data.status == true) {
                        // alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                        console.log(data.error);
                    }
                })
                .catch((error) => {
                    alert("An error occurred. Please try again later.");
                    // location.reload();
                    console.log("Error: ", error)
                });
        }
    }
})