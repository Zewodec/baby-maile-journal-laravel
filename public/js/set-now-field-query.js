const setupTimeButton = document.querySelectorAll('#setup-time');
const dateTimeInput = document.querySelectorAll('#date_time_input');

for (let i = 0; i < setupTimeButton.length; i++) {
    setupTimeButton[i].addEventListener('click', function () {
        let now = new Date();

        // Format the date and time as YYYY-MM-DDTHH:MM
        let year = now.getFullYear();
        let month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        let day = String(now.getDate()).padStart(2, '0');
        let hours = String(now.getHours()).padStart(2, '0');
        let minutes = String(now.getMinutes()).padStart(2, '0');

        // Construct the datetime string
        // Set the datetime value
        dateTimeInput[i].value = `${year}-${month}-${day}T${hours}:${minutes}`;
    });
}
