@extends('layouts.main')
@section('container')

<section id="post" class="text-white">
  <div class="flex flex-col py-16 container">
    <div class="flex flex-col justify-center items-center text-prime mb-10">
      <h1>Laporan Berita</h1>
      <p>Berbagai laporan dan pengaduan yang pihak kami terima, telah dicatat ke dalam data.</p>
    </div>
    @if ($post->images)
        <div id="postGambar">
          <div class="carousel carousel-main overflow-hidden rounded-lg" data-flickity='{ "adaptiveHeight": true, "fade": true, "imagesLoaded": true, "autoPlay": 2000, "pauseAutoPlayOnHover": false }'>
            @foreach($post->images as $image)
            <div class="carousel-post max-h-[40vh] flex items-center ">
              <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                class="carousel-post-image rounded-lg" >
            </div>
            @endforeach
          </div>
          <div class="carousel carousel-nav overflow-hidden pt-2" data-flickity='{"asNavFor": ".carousel-main", "contain": true, "pageDots": false}'>
            @foreach($post->images as $image)
            <div class="carousel-post">
              <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                class="carousel-post-image rounded-lg">
            </div>
            @endforeach
          </div>
        </div>
      @else
    @endif
    <div class="p-10 bg-[#19323C] h-auto rounded-xl">
      <div class="flex flex-col gap-4">
        <h2>{{ $post->title }}</h2>
        <h3>Status Laporan : {{$post->category->name}}</h3>
        <p>Rincian Laporan :</p>
        <trix-editor class="leading-none my-5">
          <p>{!! $post->body !!}</p>
        </trix-editor>
        <p>Tanggal Laporan Diterima : {{ $post->created_at->diffForHumans() }}</p>
        <p>Pembuat Laporan : {{$post->author->name}}</p>
      </div>
    </div>
  </div>

</section>

{{-- <section id="post" class="bg-secondary text-hitam">
  <div class="w-full bg-primary h-[10vh] md:h-[12vh] overflow-hidden relative">
    <div class="duration-700 ease-in-out" data-carousel-item>
      @if($post->images)
        <img src="{{ asset('storage/' . $post->images[0]) }}" class="carouselHeroImg brightness-[.45] absolute block lg:w-full max-w-none h-max -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
      @else
      @endif
    </div>
    <div class="absolute -translate-y-1/2 top-[5vh] md:top-[6vh]  left-1/2 -translate-x-1/2">
      <h1 class="font-bold text-lg text-white leading-loose tracking-wider uppercase">{{ $post->category->name }}</h1>
    </div>
  </div>
  <div class="md:container md:p-0 md:mx-auto mx-2 md:h-auto">
    <div class="grid md:grid-cols-2 grid-cols-1 gap-6 md:pt-12 md:pb-4 pb-4 pt-8 break-all">
      <div id="postArtikel" class="flex items-center">
        <div>
          <div class="md:text-lg text-sm">{{ $post->created_at->diffForHumans() }}</div>
          <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide break-words line-clamp-[10]">{{ $post->title }}</h1>
          <div class="flex flex-row items-center">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
              </svg>
            </div>
            <div class="px-2 py-2">
              <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none font-bold text-primary">{{ $post->author->name }}</a> di kategori <a class="font-bold text-primary" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
            </div>
          </div>
        </div>
      </div>
      @if ($post->images)
        <div id="postGambar">
          <div class="carousel carousel-main overflow-hidden rounded-lg" data-flickity='{ "adaptiveHeight": true, "fade": true, "imagesLoaded": true, "autoPlay": 2000, "pauseAutoPlayOnHover": false }'>
            @foreach($post->images as $image)
            <div class="carousel-post max-h-[40vh] flex items-center ">
              <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                class="carousel-post-image rounded-lg" >
            </div>
            @endforeach
          </div>
          <div class="carousel carousel-nav overflow-hidden pt-2" data-flickity='{"asNavFor": ".carousel-main", "contain": true, "pageDots": false}'>
            @foreach($post->images as $image)
            <div class="carousel-post">
              <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                class="carousel-post-image rounded-lg">
            </div>
            @endforeach
          </div>
        </div>
      @else
      @endif
    </div>
  </div>
  <section class="md:container md:p-0 md:mx-auto mx-2 pb-6 break-words">
    <div class="mx-2">
      
      <trix-editor class="container text-base tracking-normal font-medium text-hitam text-left">
        <p>{!! $post->body !!}</p>
      </trix-editor>
    </div>
  </section>
</section> --}}


@endsection