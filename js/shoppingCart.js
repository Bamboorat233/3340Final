// shoppingCart.js – Shopping Cart Page: Render & Manage Cart Items

document.addEventListener("DOMContentLoaded", () => {
  const cartList = document.getElementById("cart-list");
  const totalPriceEl = document.getElementById("total-price");
  const clearBtn = document.getElementById("clear-btn");
  const checkoutBtn = document.getElementById("checkout-btn");
  const disclaimerBtn = document.getElementById("disclaimer-btn");
  const disclaimerOv = document.getElementById("disclaimer-overlay");
  const disclaimerClose = document.getElementById("disclaimer-close");

  function renderCart() {
    const cartItems = JSON.parse(localStorage.getItem("cartItems") || "[]");
    cartList.innerHTML = "";
    let total = 0;
    cartItems.forEach((item) => {
      const li = document.createElement("li");
      li.innerHTML = `<span>${item.name}</span><span>$${item.price.toFixed(
        2
      )}</span>`;
      cartList.appendChild(li);
      total += item.price;
    });
    totalPriceEl.textContent = total.toFixed(2);
  }

  clearBtn.addEventListener("click", () => {
    localStorage.removeItem("cartItems");
    renderCart();
  });

  disclaimerBtn.addEventListener("click", () => {
    disclaimerOv.classList.add("active");
  });
  disclaimerClose.addEventListener("click", () => {
    disclaimerOv.classList.remove("active");
  });

  renderCart();
});
