const setupTimeButton = document.getElementById('setup-time');
const dateTimeInput = document.getElementById('date_time_input');

setupTimeButton.addEventListener('click', function () {
    var now = new Date();

    // Format the date and time as YYYY-MM-DDTHH:MM
    var year = now.getFullYear();
    var month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var day = String(now.getDate()).padStart(2, '0');
    var hours = String(now.getHours()).padStart(2, '0');
    var minutes = String(now.getMinutes()).padStart(2, '0');

    // Construct the datetime string
    // Set the datetime value
    dateTimeInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
});
