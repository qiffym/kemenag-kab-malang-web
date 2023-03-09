const parallax = document.getElementById("heading-section");
window.addEventListener("scroll", function () {
    let offset = window.pageYOffset;
    parallax.style.backgroundPositionY = offset * 0.9 + "px";
});

document.addEventListener("DOMContentLoaded", function () {
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {
        // close all inner dropdowns when parent is closed
        document
            .querySelectorAll(".navbar .dropdown")
            .forEach(function (everydropdown) {
                everydropdown.addEventListener(
                    "hidden.bs.dropdown",
                    function () {
                        // after dropdown is hidden, then find all submenus
                        this.querySelectorAll(".submenu").forEach(function (
                            everysubmenu
                        ) {
                            // hide every submenu as well
                            everysubmenu.style.display = "none";
                        });
                    }
                );
            });

        document
            .querySelectorAll(".dropdown-menu a")
            .forEach(function (element) {
                element.addEventListener("click", function (e) {
                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains("submenu")) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        if (nextEl.style.display == "block") {
                            nextEl.style.display = "none";
                        } else {
                            nextEl.style.display = "block";
                        }
                    }
                });
            });
    }
    // end if innerWidth
});
// DOMContentLoaded  end

var nav = document.querySelector("nav");
var mainSection = document.querySelector(".main-row");
if (window.innerWidth < 992) {
    nav.style.backgroundColor = "#003638";
}

if (window.location.href === "http://kemenagkabmalang.test/") {
    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 90) {
            // nav.style.backgroundColor = "#184d47";
            nav.style.backgroundColor = "#003638";
        } else {
            if (window.innerWidth < 992) {
                nav.style.backgroundColor = "#003638";
            } else {
                nav.style.backgroundColor = "";
            }
        }
    });
} else {
    nav.style.backgroundColor = "#003638";
}

if (window.location.href !== "http://kemenagkabmalang.test/") {
    mainSection.classList.add("mt-5");
    mainSection.classList.add("pt-5");
}

$(document).ready(function () {
    // PTSP
    $("#heading-section .icon-ptsp").mouseover(function () {
        $("#heading-section .text-menu-header h1").html(
            "Pusat Layanan Terpadu Transformasi Digital"
        );
        $("#heading-section .text-menu-header h3").html(
            "KEMENTERIAN AGAMA KABUPATEN MALANG"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah. <br> Free, Easy, Fast, Accountable"
        );
    });
    $("#heading-section .icon-ptsp").mouseout(function () {
        $("#heading-section .text-menu-header h1").html("SELAMAT DATANG,");
        $("#heading-section .text-menu-header h3").html(
            "Di Website Kementerian Agama Kabupaten Malang"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah"
        );
    });
    // PTSP

    // Pendidikan
    $("#heading-section .icon-pend").mouseover(function () {
        $("#heading-section .text-menu-header h1").html("Pendidikan");
        $("#heading-section .text-menu-header h3").html(
            "KEMENTERIAN AGAMA KABUPATEN MALANG"
        );
        $("#heading-section .text-menu-header h5").html(
            "Pengurusan dan Pengajuan Lebih mudah dari Rumah Pemohon"
        );
    });
    $("#heading-section .icon-pend").mouseout(function () {
        $("#heading-section .text-menu-header h1").html("SELAMAT DATANG,");
        $("#heading-section .text-menu-header h3").html(
            "Di Website Kementerian Agama Kabupaten Malang"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah"
        );
    });
    // Pendidikan

    // PPID
    $("#heading-section .icon-ppid").mouseover(function () {
        $("#heading-section .text-menu-header h1").html("PPID");
        $("#heading-section .text-menu-header h3").html(
            "KEMENTERIAN AGAMA KABUPATEN MALANG"
        );
        $("#heading-section .text-menu-header h5").html(
            "Mencakup Berbagai Layanan Yang Ada di Kemenag Kab. Malang"
        );
    });
    $("#heading-section .icon-ppid").mouseout(function () {
        $("#heading-section .text-menu-header h1").html("SELAMAT DATANG,");
        $("#heading-section .text-menu-header h3").html(
            "Di Website Kementerian Agama Kabupaten Malang"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah"
        );
    });
    // PPID

    // Haji dan Umrah
    $("#heading-section .icon-haji").mouseover(function () {
        $("#heading-section .text-menu-header h1").html("Haji dan Umrah");
        $("#heading-section .text-menu-header h3").html(
            "KEMENTERIAN AGAMA KABUPATEN MALANG"
        );
        $("#heading-section .text-menu-header h5").html(
            "Pengurusan Haji & Umrah Mudah dan Cepat"
        );
    });
    $("#heading-section .icon-haji").mouseout(function () {
        $("#heading-section .text-menu-header h1").html("SELAMAT DATANG,");
        $("#heading-section .text-menu-header h3").html(
            "Di Website Kementerian Agama Kabupaten Malang"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah"
        );
    });
    // Haji dan Umrah

    // Kantor Urusan Agama
    $("#heading-section .icon-kua").mouseover(function () {
        $("#heading-section .text-menu-header h1").html("Kantor Urusan Agama");
        $("#heading-section .text-menu-header h3").html(
            "KEMENTERIAN AGAMA KABUPATEN MALANG"
        );
        $("#heading-section .text-menu-header h5").html(
            "Pengurusan KUA Lebih Mudah dan Cepat"
        );
    });
    $("#heading-section .icon-kua").mouseout(function () {
        $("#heading-section .text-menu-header h1").html("SELAMAT DATANG,");
        $("#heading-section .text-menu-header h3").html(
            "Di Website Kementerian Agama Kabupaten Malang"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah"
        );
    });
    // Kantor Urusan Agama

    // Info Layanan
    $("#heading-section .icon-info").mouseover(function () {
        $("#heading-section .text-menu-header h1").html("INFO LAYANAN");
        $("#heading-section .text-menu-header h3").html(
            "KEMENTERIAN AGAMA KABUPATEN MALANG"
        );
        $("#heading-section .text-menu-header h5").html(
            "Mencakup Berbagai Layanan Yang Ada di Kemenag Kab. Malang"
        );
    });
    $("#heading-section .icon-info").mouseout(function () {
        $("#heading-section .text-menu-header h1").html("SELAMAT DATANG,");
        $("#heading-section .text-menu-header h3").html(
            "Di Website Kementerian Agama Kabupaten Malang"
        );
        $("#heading-section .text-menu-header h5").html(
            "Layanan Digital Mudah dan Cepat Langsung dari Rumah"
        );
    });
    // Info Layanan
});

$("#video .owl-carousel").owlCarousel({
    loop: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: true,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
            nav: true,
        },
    },
});

$("#satker .owl-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    responsiveClass: true,
    responsive: {
        0: {
            items: 3,
            nav: true,
        },
        600: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 5,
            nav: true,
        },
    },
});

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("so-item")) {
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-image").src = src;
        const myModal = new bootstrap.Modal(
            document.getElementById("so-images")
        );
        myModal.show();
    }
});
