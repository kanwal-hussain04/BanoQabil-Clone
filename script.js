document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.slider');
    const cardWidth = document.querySelector('.card').offsetWidth + 10; // Adjusted for margin
    const numCards = document.querySelectorAll('.card').length;
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let currentIndex = 0;

    nextBtn.addEventListener('click', function () {
        if (currentIndex < numCards - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateSlider();
    });

    prevBtn.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = numCards - 1;
        }
        updateSlider();
    });

    slider.addEventListener('wheel', function (event) {
        if (event.deltaY > 0) {
            if (currentIndex < numCards - 1) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
        } else {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = numCards - 1;
            }
        }
        updateSlider();
        event.preventDefault();
    });

    function updateSlider() {
        const translateValue = -currentIndex * cardWidth + 'px';
        slider.style.transform = 'translateX(' + translateValue + ')';
    }
});