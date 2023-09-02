document.addEventListener('DOMContentLoaded', function () {

    const addAboutUsForm = document.getElementById('add-aboutus-form');
    const addAwardsForm = document.getElementById('add-awards-form');
    const addPeopleForm = document.getElementById('add-people-form');
    const addContactsForm = document.getElementById('add-contacts-form');

    const editAboutUs = document.getElementById('edit-aboutus-form');
    const editAwards = document.getElementById('edit-awards-form');
    const editPeople = document.getElementById('edit-people-form');
    const editContacts = document.getElementById('edit-contacts-form');

    if (addAboutUsForm) {
        addAboutUsForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addAboutUsForm);
        });
    }

    if (addAwardsForm) {
        addAwardsForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addAwardsForm);
        })
    }

    if (addPeopleForm) {
        addPeopleForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addPeopleForm);
        });
    }

    if (addContactsForm) {
        addContactsForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addContactsForm);
        });
    }

    if (editAboutUs) {
        editAboutUs.addEventListener('submit', function (event) {
            handleFormSubmission(event, editAboutUs);
        });
    }

    if (editAwards) {
        editAwards.addEventListener('submit', function (event) {
            handleFormSubmission(event, editAwards);
        });
    }

    if (editPeople) {
        editPeople.addEventListener('submit', function (event) {
            handleFormSubmission(event, editPeople);
        });
    }

    if (editContacts) {
        editContacts.addEventListener('submit', function (event) {
            handleFormSubmission(event, editContacts);
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

    const deleteAboutUsForm = document.getElementById('delete-aboutus-form');
    const deleteAwardsForm = document.getElementById('delete-awards-form');
    const deletePeopleForm = document.getElementById('delete-people-form');
    const deleteContactsForm = document.getElementById('delete-contacts-form');

    if (deleteAboutUsForm) {
        deleteAboutUsForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteAboutUsForm);
        });
    }

    if (deleteAwardsForm) {
        deleteAwardsForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteAwardsForm);
        });
    }

    if (deletePeopleForm) {
        deletePeopleForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deletePeopleForm);
        });
    }

    if (deleteContactsForm) {
        deleteContactsForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteContactsForm);
        });
    }

    function handleDeleteFormSubmission(event, form) {
        event.preventDefault();
        if (form) 
        {
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'DELETE',
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

    if (!activeTab || (activeTab != 'aboutus' && activeTab != 'awards' && activeTab != 'people' && activeTab !='contact')) {
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