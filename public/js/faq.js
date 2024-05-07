const tick1 = document.getElementById('tick1');
const answer1 = document.getElementById('answer1');

tick1.addEventListener('click', () => {
    answer1.classList.toggle('visible');

    if (answer1.classList.contains('visible')) {
        tick1.src = 'images/minus.svg';
    } else {
        tick1.src = 'images/plus.svg';
    }
});

const tick2 = document.getElementById('tick2');
const answer2 = document.getElementById('answer2');

tick2.addEventListener('click', () => {
    answer2.classList.toggle('visible');

    if (answer2.classList.contains('visible')) {
        tick2.src = 'images/minus.svg';
    } else {
        tick2.src = 'images/plus.svg';
    }
});

const tick3 = document.getElementById('tick3');
const answer3 = document.getElementById('answer3');

tick3.addEventListener('click', () => {
    answer3.classList.toggle('visible');

    if (answer3.classList.contains('visible')) {
        tick3.src = 'images/minus.svg';
    } else {
        tick3.src = 'images/plus.svg';
    }
});

const tick4 = document.getElementById('tick4');
const answer4 = document.getElementById('answer4');

tick4.addEventListener('click', () => {
    answer4.classList.toggle('visible');

    if (answer4.classList.contains('visible')) {
        tick4.src = 'images/minus.svg';
    } else {
        tick4.src = 'images/plus.svg';
    }
});

const tick5 = document.getElementById('tick5');
const answer5 = document.getElementById('answer5');

tick5.addEventListener('click', () => {
    answer5.classList.toggle('visible');

    if (answer5.classList.contains('visible')) {
        tick5.src = 'images/minus.svg';
    } else {
        tick5.src = 'images/plus.svg';
    }
});