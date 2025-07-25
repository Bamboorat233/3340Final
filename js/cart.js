document.querySelectorAll(".add-cart").forEach((btn) => {
  btn.addEventListener("click", () => {
    const id = btn.dataset.id;
    const qty = btn.dataset.qty;
    fetch("addToCart.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, qty }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          alert("seccussfully added to cart");
        } else {
          alert(data.msg || "Failed to add to cart");
        }
      });
  });
});
