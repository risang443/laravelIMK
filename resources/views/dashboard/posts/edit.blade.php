@extends('dashboard.layouts.main')
@section('container')

    <div class="pt-6 px-4">
        <div class="bg-white shadow rounded-lg p-4 border-b">
            <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex flex-col gap-y-5">
                        <div>
                            <input type="text" value="{{ old('namad', $post->namad) }}" autofocus required name="namad" id="namad" placeholder="Nama Depan" class="@error('namad')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('namad')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" value="{{ old('nik', $post->nik) }}" autofocus required name="nik" id="nik" placeholder="Nomor Induk Kependudukan (NIK)" class="@error('nik')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('nik')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" value="{{ old('email', $post->email) }}" autofocus required name="email" id="email" placeholder="Alamat Email" class="@error('email')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('email')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" value="{{ old('alamat', $post->alamat) }}" autofocus required name="alamat" id="alamat" placeholder="Alamat Rumah" class="@error('alamat') peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full h-[15vh]"/>
                            @error('alamat')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-5 ">
                        <div>
                            <input type="text" value="{{ old('namab', $post->namab) }}" autofocus required name="namab" id="namab" placeholder="Nama Belakang" class="@error('namab')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('namab')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" value="{{ old('ttl', $post->ttl) }}" autofocus required name="ttl" id="ttl" placeholder="Tanggal Lahir" class="@error('ttl')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('ttl')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" value="{{ old('notelp', $post->notelp) }}" autofocus required name="notelp" id="notelp" placeholder="Nomor Telepon" class="@error('notelp')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('notelp')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" value="{{ old('slug', $post->slug) }}" name="slug" id="slug" placeholder="Slugs" class="hidden focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                            @error('slug')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <select id="category" name= "category_id" class="hidden bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                                @foreach ($categories as $category)
                                @if(old('category_id', $post->category) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="pt-8 pb-5">
                        <h2 class="font-bold text-lg">Rincian Pengaduan</h2>
                    </div>
                    <div class="pb-5">
                        <input type="text" value="{{ old('title', $post->title) }}" autofocus required name="title" id="title" placeholder="Judul Laporan" class="@error('title')peer-invalid:visible border-red-700 @enderror peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                        @error('title')
                        <p class="peer-invalid:visible text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body" class="peer bg-white border border-prime rounded py-3 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full h-[35vh] overflow-auto"></trix-editor>
                    @error('body')<p class="peer-invalid:visible text-red-700">{{ $message }}</p>@enderror
                </div>
                <div class="py-5">
                    <div>
                        <label class="block" for="images">
                            
                            @if($post->images)
                            @foreach ($post->images as $image)
                            <div class="images-preview-div w-1/3 grid grid-cols-5 gap-2"><img src="{{ asset('/storage/' . $image) }}" alt=""></div>
                            @endforeach
                            @else
                            <div class="images-preview-div w-1/3 grid grid-cols-5 gap-2"></div>
                            @endif
                            <div class="flex items-center justify-center w-full">
                                <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-prime border-dashed rounded-lg cursor-pointer bg-prime/5">
                                   
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <img src="/images/Upload.png" alt="" class="pb-4">
                                        <p class="mb-2 text-lg font-semibold text-gray-500">Seret & Lepas file atau Telusuri</p>
                                        <p class="text-sm text-gray-500">Format yang didukung : JPEG, PNG, GIF, MP4, PDF.</p>
                                    </div>
                                    <input multiple type="file" id="image" name="images[]" onchange="previewImages()" class="@error('images')peer-invalid:visible file:text-red-700 file:bg-red-50 file:border-red-700 @enderror peer hidden" />
                                </label>
                            </div> 
                            @error('image')
                            <p class="peer-invalid:visible text-red-700">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>
                    </div>
                </div>
                <button type="submit" class="buttons w-[18vh] bg-button-prime text-prime">
                    Kirim
                </button>
            </form>
        </div>
    </div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' +title.value)
        .then(response => response.json())
        .then(data=>slug.value=data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    // function previewImage(){
    //     const image = document.querySelector('#images');
    //     const imgPreview = document.querySelector('.img-preview');

    //     imgPreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(image.files[0]);
    //     oFReader.onload = function(oFREvent){
    //         imgPreview.src = oFREvent.target.result;
    //     }
    // }

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script >
$(function() {
// Multiple images preview with JavaScript
var previewImages = function(input, imgPreviewPlaceholder) {
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
};
$('#image').on('change', function() {

    previewImages(this, 'div.images-preview-div');
});
});
</script>
@endsection