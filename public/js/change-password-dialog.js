// change-password-button
// close-change-password-dialog-button

const changePasswordButton = document.getElementById('change-password-button');
const closeChangePasswordDialogButton = document.getElementById('close-change-password-dialog-button');

changePasswordButton.addEventListener('click', () => {
    const dialog = document.getElementById('change-password');
    dialog.showModal();
});

closeChangePasswordDialogButton.addEventListener('click', () => {
    const dialog = document.getElementById('change-password');
    dialog.close();
});
