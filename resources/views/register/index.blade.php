@extends('layouts.main')

@section('container')

<section id="login" class="w-full h-full">
  <div class="flex flex-row">
    <div class="w-1/3 bg-white h-[100vh] flex items-center">
      <div class="container">
        <h1>Daftar.</h1>
        <p>Daftarkan akun anda untuk masuk.</p>
        <form action="/register" method="post">
        @csrf
        <div class="py-[8vh]">
          <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <img src="/images/username.png" alt="" class="w-[2vh]">
            </div>
            <input type="text" required value="{{old('name')}}" name="name" id="name" placeholder="Nama" class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="name@flowbite.com">
            @error('name')
            <p class="peer-invalid:visible text-red-700 font-semibold">
               {{ $message }}
            </p>
            @enderror
          </div>
          <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <img src="/images/password.png" alt="" class="w-[2vh]">
            </div>
            <input type="text" required value="{{old('username')}}" name="username" id="username" placeholder="Username" required class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="name@flowbite.com">
            @error('username')
            <p class="peer-invalid:visible text-red-700 font-semibold">
               {{ $message }}
            </p>
            @enderror
          </div>
          <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <img src="/images/password.png" alt="" class="w-[2vh]">
            </div>
            <input
            type="email" required value="{{old('email')}}" name="email" id="email" placeholder="Email" required class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
            @error('email')
            <p class="peer-invalid:visible text-red-700 font-semibold">
               {{ $message }}
            </p>
            @enderror
          </div>
          <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <img src="/images/password.png" alt="" class="w-[2vh]">
            </div>
            <input
            type="text" required name="password" id="password" placeholder="Password" class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
            @error('password')
            <p class="peer-invalid:visible text-red-700 font-semibold">
               {{ $message }}
            </p>
            @enderror
          </div>
          <div class="relative mb-6">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <img src="/images/password.png" alt="" class="w-[2vh]">
            </div>
            <input type="text" required name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
            @error('password_confirmation')
            <p class="peer-invalid:visible text-red-700 font-semibold">
               {{ $message }}
            </p>
            @enderror
          </div>
          <button class="buttons bg-button-prime w-full mb-6">Daftar</button>
          <div class="flex flex-row">
            <p>Sudah punya akun?</p><a href="/login" class="underline mx-1">Masuk Disini.</a>
          </div>
        </div>
        </form>
        <div>
          <a href="/" class="buttons bg-button-prime">< Kembali ke Beranda</a>
        </div>
      </div>
    </div>
    <div class="w-2/3 bg-text-prime h-[100vh]">
      <div class="flex w-full h-full items-center justify-center">
        <img src="/images/daftar.png" alt="" class="h-[60vh]">
      </div>
    </div>
  </div>

</section>

{{-- <div id="container-main" class="flex flex-wrap relative">
   <div id="container-register" class="w-1/3 h-screen bg-[#14272E] absolute left-0 z-20">
     <div id="form-container" class="ml-6 mt-[100px] p-3 font-pop ">
       <h1 class="text-slate-400 font-semibold text-4xl">Daftar</h1>
       <p class="mt-4 font-pop font-normal text-slate-400">
         Daftarkan akun anda untuk masuk.
       </p>
       <div id="form" class="mt-6">
         <form action="/register" method="post">
            @csrf
           <div class="">
             <p class="mb-3 font-pop font-normal text-slate-400">Nama</p>
           </div>
           <div class="my-4 mr-5 flex">
             <input
             type="text" required value="{{old('name')}}" name="name" id="name" placeholder="Name"
               size="45"
               class="border-slate-900 border-2 rounded-md"
             />
             @error('name')
            <p class="peer-invalid:visible text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
           </div>
           <div class="">
             <p class="mb-3 font-pop font-normal text-slate-400">Nama User</p>
           </div>
           <div class="my-4 mr-5 flex">
             <input
             type="text" required value="{{old('username')}}" name="username" id="username" placeholder="Username"
               size="45"
               class="border-slate-900 border-2 rounded-md"
             />
             @error('username')
            <p class="peer-invalid:visible text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
           </div>
           <div class="">
             <p class="mb-3 font-pop font-normal text-slate-400">Email</p>
           </div>
           <div class="my-4 mr-5 flex">
             <input
             type="email" required value="{{old('email')}}" name="email" id="email" placeholder="Email"
               size="45"
               class="border-slate-900 border-2 rounded-md"
             />
             @error('email')
            <p class="peer-invalid:visible text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
           </div>
             <p class="mb-3 mt-4 font-pop font-normal text-slate-400">
               Kata Kunci
             </p>
           </div>
           <div class="my-4 mr-5 flex">
             <input
             type="text" required name="password" id="password" placeholder="Password"
               size="45"
               class="border-slate-900 border-2 rounded-md"
             />
             @error('password')
            <p class="peer-invalid:visible text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
           </div>
           <div class="mb-3 mt-4 font-pop font-normal text-slate-400">
             <p>
               Konfirmasi Kata Kunci
             </p>
           </div>
           <div class=" my-4 mr-5 flex">
             <input
             type="text" required name="password_confirmation" id="password_confirmation" placeholder="Password"
               value=""
               size="45"
               class="border-slate-900 border-2 rounded-md"
             />
             @error('password_confirmation')
            <p class="peer-invalid:visible text-red-700 font-semibold">
                {{ $message }}
            </p>
            @enderror
           </div>
           <div class="w-full px-4 mt-8">
             <button
             class="text-base font-semibold text-white bg-button-second py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">
               Daftar
             </button>
           </div>
         </form>
       </div>
       <div class="flex justify-center my-11">
         <a href="./landing.html"><img src="/build/media/LogoLaporin.png" alt="logo" class="w-[260px] h-[80px]"></a>
       </div>
   </div>
   <div class=" bg-gradient-to-l from-[#14272E] from-30% to-slate-500 h-screen w-full absolute z-10 flex">
   </div>
</div> --}}


@endsection