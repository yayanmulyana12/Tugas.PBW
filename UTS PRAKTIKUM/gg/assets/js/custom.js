(function ($) {
  "use strict";

  // Page loading animation
  $(window).on("load", function () {
    $("#js-preloader").addClass("loaded");
  });

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    var box = $(".header-text").height();
    var header = $("header").height();

    if (scroll >= box - header) {
      $("header").addClass("background-header");
    } else {
      $("header").removeClass("background-header");
    }
  });

  var width = $(window).width();
  $(window).resize(function () {
    if (width > 767 && $(window).width() < 767) {
      location.reload();
    } else if (width < 767 && $(window).width() > 767) {
      location.reload();
    }
  });

  const elem = document.querySelector(".trending-box");
  const filtersElem = document.querySelector(".trending-filter");
  if (elem) {
    const rdn_events_list = new Isotope(elem, {
      itemSelector: ".trending-items",
      layoutMode: "masonry",
    });
    if (filtersElem) {
      filtersElem.addEventListener("click", function (event) {
        if (!matchesSelector(event.target, "a")) {
          return;
        }
        const filterValue = event.target.getAttribute("data-filter");
        rdn_events_list.arrange({
          filter: filterValue,
        });
        filtersElem.querySelector(".is_active").classList.remove("is_active");
        event.target.classList.add("is_active");
        event.preventDefault();
      });
    }
  }

  // Menu Dropdown Toggle
  if ($(".menu-trigger").length) {
    $(".menu-trigger").on("click", function () {
      $(this).toggleClass("active");
      $(".header-area .nav").slideToggle(200);
    });
  }

  // Menu elevator animation
  $(".scroll-to-section a[href*=\\#]:not([href=\\#])").on("click", function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        var width = $(window).width();
        if (width < 991) {
          $(".menu-trigger").removeClass("active");
          $(".header-area .nav").slideUp(200);
        }
        $("html,body").animate(
          {
            scrollTop: target.offset().top - 80,
          },
          700
        );
        return false;
      }
    }
  });

  // Page loading animation
  $(window).on("load", function () {
    if ($(".cover").length) {
      $(".cover").parallax({
        imageSrc: $(".cover").data("image"),
        zIndex: "1",
      });
    }

    $("#preloader").animate(
      {
        opacity: "0",
      },
      600,
      function () {
        setTimeout(function () {
          $("#preloader").css("visibility", "hidden").fadeOut();
        }, 300);
      }
    );
  });
})(window.jQuery);
const modal = document.getElementById("paymentModal");
const gameNameEl = document.getElementById("modalGameName");
const gamePriceEl = document.getElementById("modalGamePrice");

document.querySelectorAll(".buy-now").forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault();
    const game = link.getAttribute("data-game");
    const price = link.getAttribute("data-price");
    gameNameEl.textContent = game;
    gamePriceEl.textContent = price;

    // Pastikan tampil kembali dengan display:flex
    modal.style.display = "flex";
    // Tambahkan class aktif untuk transisi
    setTimeout(() => {
      modal.classList.add("active");
    }, 10); // delay kecil agar transition bekerja
  });
});

// Fungsi tutup modal
function hideModal() {
  modal.classList.remove("active");
  setTimeout(() => {
    modal.style.display = "none";
  }, 400); // sesuai waktu transisi di CSS
}

// Tombol X
document.querySelector(".close-button").addEventListener("click", hideModal);

// Klik di luar modal
window.addEventListener("click", (e) => {
  if (e.target === modal) hideModal();
});
document.querySelectorAll(".buy-now").forEach((button) => {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    const game = button.dataset.game;
    const price = button.dataset.price;

    document.getElementById("hiddenGameName").value = game;
    document.getElementById("hiddenGamePrice").value = price;

    // Tampilkan modal atau langsung submit tergantung desain kamu
  });
});
