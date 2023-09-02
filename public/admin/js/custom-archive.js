document.addEventListener('DOMContentLoaded', function () {

    const addPublicationsForm = document.getElementById('add-publications-form');
    const addChinthaerForm = document.getElementById('add-chinthaer-form');

    const editPublications = document.getElementById('edit-publications-form');
    const editChinthaer = document.getElementById('edit-chinthaer-form');

    if (addPublicationsForm) {
        addPublicationsForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addPublicationsForm);
        });
    }

    if (addChinthaerForm) {
        addChinthaerForm.addEventListener('submit', function (event) {
            handleFormSubmission(event, addChinthaerForm);
        })
    }

    if (editPublications) {
        editPublications.addEventListener('submit', function (event) {
            handleFormSubmission(event, editPublications);
        });
    }

    if (editChinthaer) {
        editChinthaer.addEventListener('submit', function (event) {
            handleFormSubmission(event, editChinthaer);
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

    const deletePublicationsForm = document.getElementById('delete-publications-form');
    const deleteChinthaerForm = document.getElementById('delete-chinthaer-form');

    if (deletePublicationsForm) {
        deletePublicationsForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deletePublicationsForm);
        });
    }

    if (deleteChinthaerForm) {
        deleteChinthaerForm.addEventListener('submit', function (event) {
            handleDeleteFormSubmission(event, deleteChinthaerForm);
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

    if (!activeTab || (activeTab != 'publications' && activeTab != 'chinthaer')) {
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