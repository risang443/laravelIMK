@extends('layouts.main')
@section('container')

<section class="w-full bg-secondary pt-6">
    <div class="bg-white md:container  md:py-4 py-2 rounded-t-3xl ring-2 ring-slate-200 shadow-md md:mx-auto mx-2">
        <div class="flex flex-col justify-center items-center" id="title">
            <h1 class="font-black uppercase text-3xl md:text-5xl text-primary md:px-4 px-7">{{ $title }}</h1>
            <p class="md:text-left text-center text-hitam/80 tracking-wide text-sm md:text-base px-2">aaa</p>
        </div>
        <div class="py-4 px-2">
            <div>
                <form action="/blog">    
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <label for="default-search" class="mb-2 text-sm font-medium text-hitam sr-only ">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" id="default-search" name="search" class="block p-4 pl-10 w-full text-sm text-hitam bg-secondary rounded-lg border border-gray-300 focus:ring-primary focus:border-primary " 
                        placeholder="Telusuri.." value="{{ request('search') }}">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-button hover:bg-buttonh duration-150 transition ease-out focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm uppercase px-6 py-2 ">
                            Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid justify-center md:justify-start pt-2 px-2">
          <div>
            <h1 class="font-black uppercase text-xl md:text-2xl text-primary md:text-left text-center">Kategori</h1>
          </div>
        </div>

        <form action="/blog">
        <div class="carousel px-4 py-2" data-flickity='{ "freeScroll": true, "contain": true, "pageDots": false }'>
            <button class="py-2 px-0.5" value="">
                <div class="carousel-cell rounded-lg ring-2 ring-secondary px-10 py-2">Semua</div>
            </button>
            @foreach ($categories as $category)
            <button class="py-2 px-0.5"  name="category" value="{{ $category->slug }}">
                <div class="carousel-cell rounded-lg ring-2 ring-secondary px-10 py-2">{{ $category->name }}</div>
            </button>
            @endforeach
        </div>
        </form>
        <div>
            @if ($posts->count())
            <div class="md:container md:p-0 md:mx-auto mx-2  h-auto md:h-[40vh]">
              <a href="/posts/{{ $posts[0]->slug }}">
                <div class="grid md:grid-cols-2 grid-rows-2 md:grid-rows-none bg-white rounded-lg ring-1 ring-slate-200 shadow-md group">
                  <div class="w-full md:h-[400px] h-[300px] overflow-hidden rounded-lg md:rounded-r-none rounded-b-none md:rounded-bl-lg">
                    @if($posts[0]->images)
                      <img src="{{ asset('storage/' . $posts[0]->images[0]) }}" alt="{{ $posts[0]->category->name }}" class="h-full w-[90vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out">
                    @else           
                      <img class="h-full w-[90vh] object-cover group-hover:scale-105 transition duration-200 ease-in-out" src="https://source.unsplash.com/800x600/?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->title }}">
                    @endif
                  </div>
                  <div class="md:py-8 py-3 px-3 md:px-8  relative">
                    <div>
                      <h1 class="md:text-4xl text-3xl break-all line-clamp-4 font-semibold logo text-hitam group-hover:text-primary/50 transition duration-200 ease-in-out">{{ $posts[0]->title }}</h1>
                      <h3 class="font-light leading-relaxed break-all line-clamp-4 md:line-clamp-6 text-hitam">{{ Str::limit($posts[0]->excerpt, 500) }}</h3>
                    </div>
                    <div class="absolute bottom-3 md:bottom-8 flex flex-row">
                      <div>
                        <a href="/blog?category={{ $posts[0]->category->slug }}">
                          <h3 class="text-base font-normal text-primary hover:text-primary/50 transition duration-200 ease-in-out">{{ $posts[0]->category->name }} </h3>
                        </a>
                      </div>
                      <div class="px-0.5">
                      <h3 class="text-base font-normal text-hitam"><span class="text-hitam/40">|</span> {{ $posts[0]->created_at->diffForHumans() }}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
      
      
            <div class="grid md:grid-cols-4 grid-cols-1 gap-3 my-3 md:container md:p-0 md:mx-auto mx-2">
              @foreach ($posts->skip(1) as $post)
                <div class="md:grid-cols-1 grid-cols-2 grid content-start h-[25vh]  md:h-[45vh] bg-white rounded-lg ring-1 ring-slate-200 shadow-md overflow-hidden relative group"  data-aos="fade-down" data-aos-anchor-placement="center-bottom">
                    <div class="md:h-[20vh] h-[25vh]">
                      @if($post->images)
                      <a href="/posts/{{ $post->slug }}">
                          <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->category->name }}" class="h-full w-[400px] object-cover group-hover:scale-105 transition duration-200 ease-in-out">
                      </a>
                      @else           
                      <a href="/posts/{{ $post->slug }}">
                          <img class="h-full w-[400px] object-cover group-hover:scale-105 transition duration-200 ease-in-out" src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" alt="{{ $post->title }}">
                      </a>
                      @endif
                    </div>
                    <div class="pb-2 px-4 py-2 relative">
                        <h5 class="logo pb-0.5 md:text-xl text-lg font-semibold tracking-tight text-hitam break-all line-clamp-4 group-hover:text-primary/50 transition duration-200 ease-in-out"><a href="/posts/{{ $post->slug }}">{{ $post->title }}  </a></h5>
                                      
                        <p class="md:block hidden font-light text-sm leading-relaxed break-all line-clamp-4 md:line-clamp-6 text-hitam">{{ Str::limit($post->excerpt, 100) }}</p>
                        <div class="flex absolute bottom-2 left-4 md:hidden flex-row">
                          <div>
                            <a href="/blog?category={{ $post->category->slug }}">
                              <h3 class="text-sm font-normal text-primary hover:text-primary/50 transition duration-200 ease-in-out">{{ $post->category->name }} </h3>
                            </a>
                          </div>
                          <div class="px-0.5">
                          <h3 class="text-sm font-normal text-hitam"><span class="text-hitam/40">|</span> {{ $post->created_at->diffForHumans() }}</h3>
                          </div>
                        </div>
                    </div>
                    <div class="hidden absolute bottom-4 left-4 md:flex flex-row">
                      <div>
                        <a href="/blog?category={{ $post->category->slug }}">
                          <h3 class="text-sm font-normal text-primary hover:text-primary/50 transition duration-200 ease-in-out">{{ $post->category->name }} </h3>
                        </a>
                      </div>
                      <div class="px-0.5">
                      <h3 class="text-sm font-normal text-hitam"><span class="text-hitam/40">|</span> {{ $post->created_at->diffForHumans() }}</h3>
                      </div>
                    </div>
                </div>
              @endforeach
            </div>
              @else
      <div class="py-16">
<p class="text-center text-xl px-4 text-hitam/80">Tidak ada artikel tersebut, coba cari di Kategori lainnya.</p>
</div>
          @endif
        </div>

    </div>
</section>

@endsection