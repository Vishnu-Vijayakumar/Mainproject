const slider = document.querySelector('.slider-track');
const cards = document.querySelectorAll('.card');
const cardWidth = cards[0].offsetWidth;
let currentSlide = 0;

document.querySelector('.next-button').addEventListener('click', () => {
  currentSlide++;
  if (currentSlide > cards.length - 3) {
    currentSlide = 0;
  }
  slider.style.transform = `translateX(-${cardWidth * currentSlide}px)`;
});

document.querySelector('.prev-button').addEventListener('click', () => {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = cards.length - 3;
  }
  slider.style.transform = `translateX(-${cardWidth * currentSlide}px)`;
});
