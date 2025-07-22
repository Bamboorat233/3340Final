// cart.js – Product Listing Page: Add-to-Cart Functionality

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".add-cart").forEach((btn) => {
    btn.addEventListener("click", () => {
      const name = btn.dataset.name;
      const price = parseFloat(btn.dataset.price);
      const cart = JSON.parse(localStorage.getItem("cartItems") || "[]");
      cart.push({ name, price });
      localStorage.setItem("cartItems", JSON.stringify(cart));
      alert(
        `${name} has been added to your cart! You now have ${
          cart.length
        } items, totaling $${cart
          .reduce((sum, i) => sum + i.price, 0)
          .toFixed(2)}`
      );
    });
  });
});
