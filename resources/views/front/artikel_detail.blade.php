@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md  ">
<x-navbar/>
</header>
<!-- END HEADER -->

<main id="main-content" class="px-4">
  <div id="ArticleDetails" class="container max-w-[1130px] mx-auto flex flex-col gap-10">
    <div class="mt-10">
      <div class="full max-w-6xl mx-auto rounded-xl overflow-hidden">
        <img
          src="{{Storage::url($artikel->thumbnail)}}"
          class="object-contain w-full h-full" alt="logo">
      </div>
      <div class="flex flex-col gap-[50px] items-start pt-10 pb-3">
        <h2 class="font-bold text-4xl leading-[45px] text-start">{{$artikel->tittle}}</h2>
      </div>
      <div class="flex flex-col items-start">
        <h2 class="text-cp-light-grey text-lg leading-[45px] text-start">{{$artikel->TanggalIndonesia}}</h2>
        <h2 class="text-cp-light-grey text-lg leading-[45px] text-start">Penulis: {{$artikel->writer}}</h2>
      </div>


      <div class="font-sans my-2 border-y border-gray-200 py-4">
        <h4 class="text-lg font-semibold text-gray-600 mb-4">Bagikan Artikel Ini:</h4>
        <div class="flex flex-wrap items-center gap-3">

          <a id="share-whatsapp" href="#" target="_blank" rel="noopener noreferrer"
            class="inline-flex items-center gap-2 rounded-md bg-[#25D366] py-2 px-4 text-sm font-bold text-white transition-opacity duration-300 hover:opacity-90">
            <i class="fab fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>

          <a id="share-facebook" href="#" target="_blank" rel="noopener noreferrer"
            class="inline-flex items-center gap-2 rounded-md bg-[#1877F2] py-2 px-4 text-sm font-bold text-white transition-opacity duration-300 hover:opacity-90">
            <i class="fab fa-facebook-f"></i>
            <span>Facebook</span>
          </a>

          <button id="copy-link"
            class="inline-flex items-center gap-2 rounded-md bg-gray-600 py-2 px-4 text-sm font-bold text-white transition-all duration-300 hover:opacity-90">
            <i class="fas fa-link"></i>
            <span id="copy-link-text">Salin Link</span>
          </button>
        </div>
      </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
      <div class="md:col-span-2">
        <div id="descriptions" class="prose max-w-none">
          {!! $artikel->content !!}
        </div>
      </div>
      <div class="md:col-span-1">
        <h3 class="text-xl font-bold mb-4">Artikel Terbaru</h3>
        <div class="flex flex-col gap-4">
          @forelse ($latestArtikels as $latest)
          <!-- CARD ARTIKEL -->
           <a href="{{ route('artikel.detail', $latest->slug) }}" class="block group">
          <div
            class="article-card w-full flex bg-white border border-[#E8EAF2] rounded-[10px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
            <div class="thumbnail w-1/3 flex-shrink-0">
              <img src="{{Storage::url($latest->thumbnail)}}" class="object-cover object-center w-full h-full" alt="thumbnails">
            </div>
            <div class="flex flex-col p-4 gap-1 w-2/3">
              <div class="flex flex-col gap-1">
                <p class="title font-semibold text-grey-600 text-sm line-clamp-3">{{$latest->tittle}}</p>
                <div class="flex justify-start mt-2">
                  <span class="text-cp-dark-blue text-sm font-semibold">READ MORE ></span>
                </div>
              </div>

            </div>
          </div>
          </a>
          @empty
          <div class="w-full text-center text-gray-500">
            <p class="text-lg">Belum ada artikel yang tersedia.</p>
          </div>
          @endforelse
        </div>
      </div>

    </div>


    <div class="flex justify-start gap-3">
      <a href="{{Route('front.artikel')}}"
        class="bg-cp-black p-[10px_20px]  w-fit rounded-xl text-white font-semibold hover:bg-cp-dark-blue">Lihat
        Artikel Lainnya...</a>
    </div>
  </div>

</main>
<x-footer/>

@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/share_article.js')}}"></script>

@endpush