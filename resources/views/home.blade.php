@extends('layouts.main')
@section('container')

<!-- Hero Start -->
<section id="hero" class="pt-[12vh] bg-prime w-full">
  <div class="grid grid-cols-2 gap-8">
    <div class="container pt-[6vh] ">
      <p class="text-white">Jika Anda pernah menyaksikan atau menjadi korban kejahatan harap lapor kepada kami.</p>
      <h1 class="text-white">LAPORKAN DI LAPOR.IN!</h1>
      <p class="text-white/80">Laporan ditangani oleh ruang kendali kami dengan cara yang persis sama, baik Anda melaporkannya secara online atau melalui telepon.</p>
      <div class="flex flex-row mt-[10vh] gap-8">
        <a href="/dashboard/posts/create" id="tutor2" class="buttons bg-button-prime">Buat Laporan</a>
        <a href="/kerjakami" id="tutor3" class="buttons bg-button-second">Kerja Kami</a>
      </div>
    </div>
    <div class="w-full">
      <img src="/images/asset2.jpg" alt="" class="h-[70vh] w-full object-cover rounded-tl-[80px] overflow-hidden">
    </div>
  </div>
  <div class="w-full bg-gradient-to-b from-prime from-70% to-white h-[10vh]"></div>
</section>
<section id="kerjakami" class="w-full bg-white relative">
  <div class="container absolute -top-10">
    {{-- <div class="bg-secondary h-[5vh] rounded-xl">
    </div> --}}
  </div>
  <div class="text-center py-[20vh]">
    <h1>Bagaimana Cara Kami Bekerja?</h1>
    <p>Lapor.in selalu memprioritaskan Kerahasiaan dan kemudahan bagi pengguna.</p>
    <div class="relative container py-[6vh]">
      <div class="absolute -translate-y-1/2 -translate-x-1/2 top-[33%] left-1/2">
        <div class="grid grid-cols-2 gap-[20vh]">
          <div><img src="/images/line.svg" alt="" class="w-[95vh]"></div>
          <div><img src="/images/line.svg" alt="" class="w-[95vh]"></div>
        </div>

      </div>
      <div class="grid grid-cols-3 gap-[4vh]">
        <div class="flex flex-col items-center">
          <img src="/images/data.png" alt="" class="w-[84px] pb-8">
          <h2>Menerima Laporan Anda</h2>
          <p>Laporan anda akan kami terima dengan tanggap dan pastinya tanpa biaya layanan</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="/images/restore.png" alt="" class="w-[84px] pb-8">
          <h2>Memproses Laporan</h2>
          <p>Kami Pastikan setiap laporan akan kami proses dan ditangani lebih lanjut</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="/images/acceptance.png" alt="" class="w-[84px] pb-8">
          <h2>Menangani Kasus Anda</h2>
          <p>Setelah diterima dan diproses, pihak kami akan menangani lebih lanjut, mengenai kejahatan yang anda rasakan atau anda lihat.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="darurat" class="w-full bg-secondary">
  <div class="py-[8vh] container">
    <div class="text-white text-center">
      <h1>Laporkan Kejahatan atau Kirim Pengaduan</h1>
      <p>Laporan ditangani oleh ruang kendali kami dengan cara 
        yang persis sama, baik Anda melaporkannya secara online atau melalui telepon.</p>
    </div>
    <div class="grid grid-cols-2 text-white mt-[13vh] container">
      <div class="pr-[10vh] tracking-wide leading-loose text-justify">
        <h1 class="font-medium">Keadaan Darurat?</h1>
        <p class="mb-10">Apakah rasanya situasi akan menjadi panas atau penuh kekerasan dalam waktu dekat? Apakah seseorang berada dalam bahaya? Apakah Anda memerlukan dukungan segera? Jika iya, silakan hubungi <span class="underline">112/110</span> sekarang.
          <br><br>
          Jika Anda memiliki gangguan pendengaran atau bicara, gunakan layanan SMS kami di <span class="underline">021-78833610</span> jika Anda telah melakukan praregistrasi pada layanan SMS darurat .</p>
          {{-- <div class="flex flex-row items-center gap-5 py-10">
            <img src="images/stock.jpg" alt="" class="h-[7vh] rounded-full overflow-hidden">
            <p>112</p>
          </div> --}}
          <a href="/call" id="tutor4" class="buttons bg-button-prime text-text-prime">Hubungi Kami</a>
      </div>
      <div>
        <img src="/images/asset3.jpg" alt="" class="rounded-tr-[200px] rounded-bl-[200px] h-[700px]">
      </div>
    </div>
  </div>

</section>
<section id="laporan" class="w-full bg-white">
  <div class="py-[8vh] text-center">
    <h1>Berita Laporan Terbaru</h1>
    <p class="pt-6">Berbagai laporan dan pengaduan yang pihak kami terima, telah dicatat ke dalam data.</p>
  </div>
  <div class="bg-[#F3F3F3] h-[65vh]">
    <div class="container grid grid-cols-3 gap-4 py-14 h-[70vh] justify-items-center">
      <div class="p-6 bg-white rounded-lg h-[53vh] w-[40vh] flex flex-col justify-between">
        @if($posts[0]->images)
          <img src="{{ asset('storage/' . $posts[0]->images[0]) }}" alt="{{ $posts[0]->title }}" class="h-[36vh] w-[36vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out">
        @else           
          <img class="h-[36vh] w-[36vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out" src="https://source.unsplash.com/800x600/?{{ $posts[0]->title }}" alt="{{ $posts[0]->title }}">
        @endif
        <div>
          <h3 class="font-bold mb-4 mt-4">{{$posts[0]->title}}</h3>
          <p class="text-sm font-semibold">Status Laporan : {{$posts[0]->category->name}}</p>
          <p class="text-sm">{{ $posts[0]->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex justify-end">
          <a href="/posts/{{ $posts[0]->slug }}" class="buttons text-sm bg-prime text-white">Selengkapnya</a>
        </div>
      </div>
      <div id="tutor5" class="p-6 bg-white rounded-lg h-[53vh] w-[40vh] flex flex-col justify-between">
        @if($posts[1]->images)
          <img src="{{ asset('storage/' . $posts[1]->images[0]) }}" alt="{{ $posts[1]->title }}" class="h-[36vh] w-[36vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out">
        @else           
          <img class="h-[36vh] w-[36vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out" src="https://source.unsplash.com/800x600/?{{ $posts[1]->title }}" alt="{{ $posts[1]->title }}">
        @endif
        <div>
          <h3 class="font-bold mb-4 mt-4">{{$posts[1]->title}}</h3>
          <p class="text-sm font-semibold">Status Laporan : {{$posts[1]->category->name}}</p>
          <p class="text-sm">{{ $posts[1]->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex justify-end">
          <a href="/posts/{{ $posts[1]->slug }}" class="buttons text-sm bg-prime text-white">Selengkapnya</a>
        </div>
      </div>
      <div class="p-6 bg-white rounded-lg h-[53vh] w-[40vh] flex flex-col justify-between">
        @if($posts[2]->images)
          <img src="{{ asset('storage/' . $posts[2]->images[0]) }}" alt="{{ $posts[2]->title }}" class="h-[36vh] w-[36vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out">
        @else           
          <img class="h-[36vh] w-[36vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out" src="https://source.unsplash.com/800x600/?{{ $posts[2]->title }}" alt="{{ $posts[2]->title }}">
        @endif
        <div>
          <h3 class="font-bold mb-4 mt-4">{{$posts[2]->title}}</h3>
          <p class="text-sm font-semibold">Status Laporan : {{$posts[2]->category->name}}</p>
          <p class="text-sm">{{ $posts[2]->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex justify-end">
          <a href="/posts/{{ $posts[2]->slug }}" class="buttons text-sm bg-prime text-white">Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="statistik" class="w-full bg-white">
  <div class="text-center pt-[8vh] container">
    <h1>Data Laporan Kejahatan yang Kami Terima</h1>
    <p class="pt-6">Berbagai laporan dan pengaduan yang pihak kami terima, telah dicatat ke dalam data. </p>
  </div>
  <div class="container flex justify-center pb-[8vh]">
    <div id="column-chart" class="w-[90vh]"></div>
      <div class="grid grid-cols-1 items-center border-gray-200 border-t justify-between">
      </div>
      
    <script>
      // ApexCharts options and config
      window.addEventListener("load", function() {
        const options = {
              colors: ["#838F9E", "#B4BECA"],
              series: [
                {
                  name: "Kasus Diterima",
                  color: "#838F9E",
                  data: [
                    { x: "Januari", y: 231 },
                    { x: "Februari", y: 122 },
                    { x: "Maret", y: 63 },
                    { x: "April", y: 421 },
                    { x: "Mei", y: 122 },
                    { x: "Juni", y: 323 },
                    { x: "Juli", y: 111 },
                  ],
                },
                {
                  name: "Kasus Selesai",
                  color: "#B4BECA",
                  data: [
                    { x: "Januari", y: 232 },
                    { x: "Februari", y: 113 },
                    { x: "Maret", y: 341 },
                    { x: "April", y: 224 },
                    { x: "Mei", y: 522 },
                    { x: "Juni", y: 411 },
                    { x: "Juli", y: 243 },
                  ],
                },
              ],
              chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                  show: false,
                },
              },
              plotOptions: {
                bar: {
                  horizontal: false,
                  columnWidth: "40%",
                  borderRadiusApplication: "end",
                  borderRadius: 10,
                  
                },
              },
              tooltip: {
                shared: true,
                intersect: false,
                style: {
                  fontFamily: "Inter, sans-serif",
                },
              },
              states: {
                hover: {
                  filter: {
                    type: "darken",
                    value: 1,
                  },
                },
              },
              stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
              },
              grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                  left: 2,
                  right: 2,
                  top: -14
                },
              },
              dataLabels: {
                enabled: false,
              },
              legend: {
                show: false,
              },
              xaxis: {
                floating: false,
                labels: {
                  show: true,
                  style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                  }
                },
                axisBorder: {
                  show: false,
                },
                axisTicks: {
                  show: false,
                },
              },
              yaxis: {
                show: false,
              },
              fill: {
                opacity: 1,
              },
            }

            if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
              const chart = new ApexCharts(document.getElementById("column-chart"), options);
              chart.render();
            }
      });
    </script>
  </div>
</section>
  <!-- Berita Laporan Terbaru End -->

    
@endsection