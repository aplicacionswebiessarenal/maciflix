const miboton = document.getelementbyid("miboton");
const minav = document.getelementbyid("miboton");

miboton.addeventListener('click', () => {
  minav.classList.toggle('show');
});
