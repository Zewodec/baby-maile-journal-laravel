const burgerButton = document.querySelector('.burger-button');
const burgerMenu = document.querySelector('.burger-menu');
const burgerCloseMenu = document.querySelector('.burger-menu__header__close-btn');

const changeChildButton = document.getElementById('change-child-button');
const mainMenu = document.getElementById('main-menu');
const changeChildMenu = document.getElementById('select-child-menu');
const returnToMainMenuButton = document.getElementById('return-to-main-manu-btn');

burgerButton.addEventListener('click', () => {
    burgerMenu.classList.toggle('open');
});

burgerCloseMenu.addEventListener('click', () => {
    burgerMenu.classList.remove('open');
});

changeChildButton.addEventListener('click', () => {
    mainMenu.classList.toggle('hidden');
    changeChildMenu.classList.toggle('hidden');
});

returnToMainMenuButton.addEventListener('click', () => {
    mainMenu.classList.toggle('hidden');
    changeChildMenu.classList.toggle('hidden');

});

// коли нажмаю всюди крім меню, меню закривається
document.addEventListener('click', (e) => {
    if (!e.target.closest('.burger-menu') && !e.target.closest('.burger-button')) {
        burgerMenu.classList.remove('open');
    }
});

const addChildrenButton = document.getElementById('add-child-btn');

addChildrenButton.addEventListener('click', () => {
    const dialog = document.getElementById('add-child-dialog');
    dialog.showModal();
    burgerMenu.classList.remove('open');
});

const closeDialogButton = document.getElementById('close-dialog-button');

closeDialogButton.addEventListener('click', () => {
    const dialog = document.getElementById('add-child-dialog');
    dialog.close();
});