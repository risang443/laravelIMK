    <!-- Navbar Starts -->
    <header
    class="bg-prime sticky w-full z-10 h-[100px] flex items-center"
  >
    <div class="container">
      <div class="flex items-center justify-between relative">
        <div class="px-4">
          <a
            href="#home"
            ><img src="/images/LogoLaporin.png" alt="logo" class="w-18 h-auto"></a
          >
        </div>
        <div class="flex items-center px-4">
          <button
            id="hamburger"
            name="hamburger"
            type="button"
            class="block absolute right-4 lg:hidden"
          >
            <span
              class="hamburger-line transition duration-300 ease-in-out origin-top-left"
            ></span>
            <span
              class="hamburger-line transition duration-300 ease-in-out"
            ></span>
            <span
              class="origin-bottom-left hamburger-line transition duration-300 ease-in-out"
            ></span>
          </button>

          <nav
            id="nav-menu"
            class="hidden absolute py-5 bg-white shadow-lg rounded-lg md:max-w-[450px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none"
          >
            <ul class="block lg:flex">
              <li class="group">
                <a
                  href="/"
                  class="text-base {{ ($title === "Laporin") ? 'text-text-second' : 'text-white' }} py-2 mx-5 flex group-hover:text-primary"
                  >Beranda</a
                >
              </li>
              <li class="group">
                <a
                  href="/"
                  class="text-base {{ ($title === "Aktivitas") ? 'text-text-second' : 'text-white' }} py-2 mx-5 flex group-hover:text-primary"
                  >Cara Kerja</a
                >
              </li>
              <li class="group">
                <a
                  href="/"
                  class="text-base {{ ($title === "Aktivitas") ? 'text-text-second' : 'text-white' }} py-2 mx-5 flex group-hover:text-primary"
                  >Telepon Darurat</a
                >
              </li>
              <li class="group">
                <a
                  href="/"
                  class="text-base {{ ($title === "Aktivitas") ? 'text-text-second' : 'text-white' }} py-2 mx-5 flex group-hover:text-primary"
                  >Berita Laporan</a
                >
              </li>
            </ul>
          </nav>
          <div
            id="register-login"
            class="flex {{ ($title === "Aktivitas") ? 'text-text-second' : 'text-white' }} items-center mx-5 hidden lg:flex lg:static lg:static lg:inset-y-0 lg:right-0"
          >
            <a href="/">Tutorial</a><span class="mx-5">|</span>
            @guest
            <a href="/register" class="mr-5">Daftar</a>
            @endguest
            @guest
            <a href="/login" class="buttons bg-button-prime text-text-prime">Masuk</a>
            @endguest
            @auth
            @if($title === "Laporan")
            <a href="/dashboard/posts/create" class="buttons bg-button-prime text-prime">Lapor</a>
            @else
            <a href="/dashboard/posts" class="text-button-prime underline ">Laporan</a>
            @endif
            <form action="/logout" method="post">
               @csrf
               <button type="submit" class="ml-5 buttons bg-merah text-white">keluar</button>
            </form>
            @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
    <!-- Navbar Ends -->