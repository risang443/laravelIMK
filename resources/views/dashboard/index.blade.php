@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="w-full bg-white h-[80vh] flex items-center justify-center">
   <div class="flex flex-col justify-center items-center">
      <img src="/images/success.png" alt="" class="h-[20vh]">
      <h2 class="border-b-prime border-b-[3px] text-prime px-10 py-2 mb-3 font-extrabold">{{ session('success')}}</h2>
      <div class="flex flex-row gap-x-14">
         <a href="/" class="underline text-button-prime font-semibold tracking-wide text-lg"><p>Kembali ke menu utama</p></a>
         <a href="/dashboard/posts" class="underline text-button-prime font-semibold tracking-wide text-lg">Cek Status Laporan</a>
      </div>
   </div>
</div>
@else
<div class="h-[100vh]">
   <p>Selamat datang</p>

</div>

@endif
@endsection