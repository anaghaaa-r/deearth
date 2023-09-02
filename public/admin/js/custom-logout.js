document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    fetch(event.target.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': event.target.querySelector('input[name="_token"]').value,
        }
    })

    .then((response) => response.json())
    .then((data) => {
        if(data.status == true)
        {
            localStorage.removeItem('username');
            localStorage.removeItem('activeTab');
            window.location.href = '/management';
        }
        else
        {
            alert(data.message);
        }
    })
    .catch((error) => 
    {
        alert("An error occurred. Please try again later.");
        console.log("Error: ", error)
    });
})