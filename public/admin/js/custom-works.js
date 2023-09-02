document.addEventListener('DOMContentLoaded', function () {

    const addHomesForm = document.getElementById('add-homes-form');
    const addUrbanDesignForm = document.getElementById('add-urbandesign-form');
    const addInstitutionForm = document.getElementById('add-institution-form');
    const addCommercialForm = document.getElementById('add-commercial-form');

    const editHomes = document.getElementById('edit-homes-form');
    const editUrbanDesign = document.getElementById('edit-urbandesign-form');
    const editInstitution = document.getElementById('edit-institution-form');
    const editCommercial = document.getElementById('edit-commercial-form');

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

    if (editHomes) {
        editHomes.addEventListener('submit', function (event) {
            handleFormSubmission(event, editHomes);
        });
    }

    if (editUrbanDesign) {
        editUrbanDesign.addEventListener('submit', function (event) {
            handleFormSubmission(event, editUrbanDesign);
        });
    }

    if (editInstitution) {
        editInstitution.addEventListener('submit', function (event) {
            handleFormSubmission(event, editInstitution);
        });
    }

    if (editCommercial) {
        editCommercial.addEventListener('submit', function (event) {
            handleFormSubmission(event, editCommercial);
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

    const deleteHomesForm = document.getElementById('delete-homes-form');
    const deleteUrbanDesignForm = document.getElementById('delete-urbandesign-form');
    const deleteInstitutionForm = document.getElementById('delete-institution-form');
    const deleteCommercialForm = document.getElementById('delete-commercial-form');

    if (deleteHomesForm) {
        deleteHomesForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteHomesForm);
        });
    }

    if (deleteUrbanDesignForm) {
        deleteUrbanDesignForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteUrbanDesignForm);
        });
    }

    if (deleteInstitutionForm) {
        deleteInstitutionForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteInstitutionForm);
        });
    }

    if (deleteCommercialForm) {
        deleteCommercialForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteCommercialForm);
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
                    if (data.status == true) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                        console.log(data.error);
                    }
                })
                .catch((error) => {
                    alert("An error occurred. Please try again later.");
                    console.log("Error: ", error)
                });
        }
    }


    const tabButtons = document.querySelectorAll('.nav-item .nav-link');
    const tabContents = document.querySelectorAll('.tab-content .tab-pane');
    
    function setActiveTab(tabId) {
        localStorage.setItem('activeTab', tabId);
    }

    tabButtons.forEach(function (tabButton) {
        tabButton.addEventListener('click', function () {
            const tabId = tabButton.getAttribute('data-tab-id');
            setActiveTab(tabId);
            showTabContent(tabId);
        });
    });

    function getActiveTab() {
        return localStorage.getItem('activeTab');
    }

    function showTabContent(tabId) {
        tabContents.forEach(function (tabContent) {
            const id = tabContent.getAttribute('id');
            const isActiveTab = id === tabId;
            tabContent.classList.toggle('show', isActiveTab);
            tabContent.classList.toggle('active', isActiveTab);
        });
    }

    const activeTab = getActiveTab();

    if (!activeTab || (activeTab != 'homes' && activeTab != 'urbandesign' && activeTab !='institution' && activeTab != 'commercial')) {
        const firstTabButton = tabButtons[0];
        const firstTabId = firstTabButton.getAttribute('data-tab-id');
        setActiveTab(firstTabId);
        showTabContent(firstTabId);
        firstTabButton.classList.toggle('active', isTabActive);
        firstTabButton.setAttribute('aria-selected', isTabActive ? 'true' : 'false');
    } else {
        showTabContent(activeTab);
    }
    
    tabButtons.forEach(function (tabButton) {
        const tabId = tabButton.getAttribute('data-tab-id');
        const isTabActive = tabId === activeTab;
        tabButton.classList.toggle('active', isTabActive);
        tabButton.setAttribute('aria-selected', isTabActive ? 'true' : 'false');
    });
    
    
})