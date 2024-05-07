document.addEventListener('DOMContentLoaded', function () {
    var toggleSwitch = document.getElementById('toggle-switch');
    var circle = document.querySelector('.circle');

    var bottomSwitchText = document.getElementById('switch-bottom-text');
    var arrowUpImage = document.getElementById('image-arrow-up')

    var signUpForm = document.getElementById('sign-up-form');
    var signInForm = document.getElementById('sign-in-form');

    toggleSwitch.addEventListener('change', function () {
        circle.innerHTML = toggleSwitch.checked ? 'В' : 'Р';
        bottomSwitchText.innerHTML = toggleSwitch.checked ? 'Перейти на форму<br/>реєстрації' : 'Перейти на форму<br/>входу';
        arrowUpImage.src = toggleSwitch.checked ? 'images/arrow-up2.png' : 'images/arrow-up.png';

        signUpForm.classList.toggle('hidden');
        signInForm.classList.toggle('hidden');
    });

    // Set initial value
    circle.innerHTML = toggleSwitch.checked ? 'В' : 'Р';
});