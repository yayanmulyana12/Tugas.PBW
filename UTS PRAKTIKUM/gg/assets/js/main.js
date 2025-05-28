document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("paymentModal");
  const gameNameEl = document.getElementById("modalGameName");
  const gamePriceEl = document.getElementById("modalGamePrice");
  const hiddenGameName = document.getElementById("hiddenGameName");
  const hiddenGamePrice = document.getElementById("hiddenGamePrice");
  const closeButton = document.querySelector(".close-button");

  if (!modal || !gameNameEl || !gamePriceEl || !closeButton) {
    console.warn("Elemen modal tidak ditemukan di halaman");
    return;
  }

  document.querySelectorAll(".buy-now").forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const gameName = button.dataset.game;
      const gamePrice = button.dataset.price;

      gameNameEl.textContent = gameName;
      gamePriceEl.textContent = `$${gamePrice}`;
      hiddenGameName.value = gameName;
      hiddenGamePrice.value = gamePrice;
      modal.style.display = "flex";
    });
  });

  closeButton.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // Klik di luar modal
  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});
