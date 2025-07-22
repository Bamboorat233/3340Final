// inear.js – In-Ear Headphones Page: Slider Control

document.addEventListener("DOMContentLoaded", () => {
  const slides = Array.from(document.querySelectorAll(".slide"));
  const prev = document.getElementById("prevBtn");
  const next = document.getElementById("nextBtn");
  let current = 0;

  function showSlide(idx) {
    slides.forEach((s, i) => {
      s.classList.toggle("active", i === idx);
    });
  }

  prev.addEventListener("click", () => {
    current = (current - 1 + slides.length) % slides.length;
    showSlide(current);
  });

  next.addEventListener("click", () => {
    current = (current + 1) % slides.length;
    showSlide(current);
  });
});
