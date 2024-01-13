import "./bootstrap";
import "flowbite";
import { driver } from "driver.js";
import "driver.js/dist/driver.css";

window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;
  
    if (window.pageYOffset > fixedNav) {
      header.classList.add("navbar-fixed");
    } else {
      header.classList.remove("navbar-fixed");
    }
  };


  document.getElementById("tutorial").onclick = function() {driverObj()};
  function driverObj(){
    
  const driverObj = driver({
    showProgress: true,
    popoverClass: 'my-custom-popover-class',
    stagePadding: 4,
    nextBtnText: 'Oke, lanjut!',
    prevBtnText: 'Sebelumnya',
    doneBtnText: 'Lapor Sekarang',
    steps: [
      { element: '#tutor1', popover: { title: 'Sebelum Mulai,', description: 'Jangan lupa masukkan dan daftarkan akun anda terlebih dahulu, untuk mempermudah kami menerima laporan anda.', side: "bottom", align: 'start' }},
      { element: '#tutor2', popover: { title: 'Laporkan Segera!', description: 'Buat laporan berbentuk formulir, isi dengan data diri dan rincian pengaduan dengan sejujur-jujurnya.', side: "bottom", align: 'start' }},
      { element: '#tutor3', popover: { title: 'Lalu Bagaimana Kerja Kami?', description: 'Setelah menerima laporan yang anda kirim, kami akan memeriksa untuk diproses kemudian ditangani lebih lanjut.', side: "bottom", align: 'start' }},
      { element: '#tutor4', popover: { title: 'Saat Darurat,', description: 'Segera Hubungi Kami, akan kami arahkan langsung untuk melakukan proses telpon, mempermudah anda melaporkan yang sedang terjadi.', side: "bottom", align: 'start' }},
      { element: '#tutor5', popover: { title: 'Hasil Laporan Anda', description: 'Setelah anda mengirim, laporan akan masuk ke dalam Berita Laporan Terbaru. Anda juga dapat memeriksa status laporan anda.', side: "bottom", align: 'start' }},
    ]
  });
    driverObj.drive();
  };