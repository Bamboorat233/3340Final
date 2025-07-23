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
          // 操作成功后，可以
          // 1) 弹个提示
        } else {
          alert(data.msg || "加入购物车失败");
        }
      });
  });
});
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
          // 操作成功后，可以
          // 1) 弹个提示
        } else {
          alert(data.msg || "加入购物车失败");
        }
      });
  });
});
