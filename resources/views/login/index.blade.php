@extends('layouts.main')

@section('container')
    
    @if(session()->has('success'))
    <div class="flex bg-green-100 rounded-lg p-4  text-sm text-green-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">{{ session('success')}}</span> Please login.
        </div>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="flex bg-red-100 rounded-lg p-4  text-sm text-red-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">{{ session('loginError')}}</span> Try again.
        </div>
    </div>
    @endif
    
    <section id="login" class="w-full h-full">
      <div class="flex flex-row">
        <div class="w-1/3 bg-white h-[100vh] flex items-center">
          <div class="container">
            <h1>Masuk.</h1>
            <p>Masuk untuk melanjutkan</p>
            <form action="/login" method="POST">
            @csrf
            <div class="py-[8vh]">
              <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <img src="/images/username.png" alt="" class="w-[2vh]">
                </div>
                <input type="text" autofocus required value="{{old('username')}}" name="username" id="username" placeholder="Username" class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="name@flowbite.com">
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
                <input type='password' name='password' id='password' placeholder="********" required class="bg-white border border-prime text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="name@flowbite.com">
              </div>
              <div class="flex flex-row items-center gap-4 mb-6">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Buat saya tetap masuk</label>
              </div>
              <button class="buttons bg-button-prime w-full mb-6">Masuk</button>
              <div class="flex flex-row">
                <p>Belum punya akun?</p><a href="/register" class="underline mx-1">Daftar Disini.</a>
              </div>
            </div>
            </form>
            <div>
              <a href="/" class="buttons bg-button-prime">< Kembali ke Beranda</a>
            </div>
          </div>
        </div>
        <div class="w-2/3 bg-text-prime h-auto">
          <div class="flex w-full h-full items-center justify-center">
            <img src="/images/login.png" alt="" class="h-[60vh]">
          </div>
        </div>
      </div>

    </section>
@endsection