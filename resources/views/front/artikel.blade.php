@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md  ">
<x-navbar/>
</header>
<!-- END HEADER -->

<main id="main-content" class="px-4">
  <div class="flex flex-col gap-[50px] items-center mt-10 pb-20">
    <div class="breadcrumb flex items-center justify-center gap-[30px]">
      <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
      <span class="text-cp-light-grey">/</span>
      <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Article Us</p>
    </div>
    <h2 class="font-bold text-4xl leading-[45px] text-center">Artikel<br> SATGAS PPKPT UNTAN</h2>
  </div>

  <!-- OUR ARTICLE -->
  <div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px]">
    <div id="article-list" class="flex flex-wrap items-center gap-[30px] justify-center">
    @forelse ($artikels as $artikel)
    <div class="article-card w-full flex bg-white border border-[#E8EAF2] rounded-[10px] lg:rounded-[20px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
  
  <div class="w-1/3 flex-shrink-0">
    <img src="{{ Storage::url($artikel->thumbnail) }}" class="object-cover object-center w-full h-full" alt="thumbnails">
  </div>

  <div class="flex flex-col w-2/3 p-4 lg:p-8 gap-1 lg:gap-2">
    
    <p class="title font-semibold lg:font-bold text-grey-600 text-sm lg:text-2xl lg:leading-[30px] line-clamp-3 lg:line-clamp-2">
      {{ $artikel->tittle }}
    </p>
    
    <div class="flex items-center gap-2 text-cp-light-grey text-xs lg:text-base mt-1 lg:mt-2">
      <span>{{ $artikel->TanggalIndonesia }}</span>
    </div>
    
    <div class="hidden lg:block mt-2">
      <p class="leading-[30px] text-lg text-grey-600 line-clamp-2">
        {{ Str::limit(strip_tags($artikel->content), 150, '...') }}
      </p>
    </div>
    
    <div class="flex justify-start mt-auto pt-2">
      <a href="{{ route('artikel.detail', $artikel->slug) }}" class="text-cp-dark-blue font-semibold text-sm lg:text-lg">
        READ MORE >
      </a>
    </div>

  </div>
</div>
      @empty
      <div class="w-full text-center text-gray-500">
        <p class="text-lg">Belum ada artikel yang tersedia.</p>
      </div>
      @endforelse
    </div>
    <div id="article-pagination" class="flex justify-center items-center gap-4 mt-20">
    </div>
  </div>
  <!-- END OUR ARTICLE -->



  
</main>
<x-footer/>

@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/pagination.js')}}"></script>
<script>
  setupPagination('article-list', 'article-card', 'article-pagination');
</script>
@endpush