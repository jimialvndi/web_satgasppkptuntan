@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md ">
  <x-navbar />
</header>
<!-- END HEADER -->

<main id="main-content">
  <!-- HERO SECTION -->
  @forelse ($hero_sections as $hero_section)
  <div id="HeroSections" class="flex flex-col gap-[30px] mt-10 md:mt-20 pb-10 lg:pb-20">
    <div class="container max-w-[1130px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center px-4">
      <!-- bagian text -->
      <div class="flex flex-col text-left lg:text-left order-last lg:order-first">
        <h1 class="text-2xl lg:text-4xl font-bold text-gray-900 mb-2 lg:mb-4">
          {{$hero_section->heading}}
        </h1>
        <p class="text-gray-600 text-sm mb-4 max-w-lg lg:mx-0">
          {{$hero_section->subheading}}
        </p>
        <div class="text-sm text-gray-500 italic mb-8 max-w-md border-l-4 border-cp-dark-blue pl-4 lg:mx-0">
          “{{$hero_section->review}}”
          <div class="mt-2 text-gray-700 font-semibold not-italic">— {{$hero_section->reviewer}}</div>
        </div>
        <div class="flex gap-4 flex-wrap justify-start lg:justify-start mb-2">
          <a href="{{ route('front.report') }}"
            class="bg-cp-dark-blue w-fit text-sm lg:text-lg text-white px-6 py-3 rounded-xl font-semibold lg:font-bold hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300">
            Lapor Sekarang!
          </a>
          <a href="{{ route('front.about') }}"
            class="border border-gray-300 px-6 py-3 text-sm lg:text-lg rounded-xl font-medium hover:bg-gray-100 transition">
            Tentang Satgas
          </a>
        </div>
      </div>
      <!-- bagian video -->
      <div class="aspect-video shadow-lg rounded-lg overflow-hidden">
        <iframe class="w-full h-full" src="{{$hero_section->path_video}}"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
  @empty
  <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold text-gray-900 mb-6">Hero Section Tidak Tersedia</h1>
    <p class="text-gray-600 text-lg mb-4">Mohon hubungi administrator untuk menambahkan hero section.</p>
  </div>
  @endforelse
  <!-- END HERO SECTION -->
  <!-- OUR PROGRAMS -->
  <div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-10 lg:mt-20 px-4 pb-10 lg:pb-20">
    <div class="flex items-center justify-between">
      <div class="flex flex-col gap-[14px]">
        <p class="hidden lg:block badge w-fit bg-cp-dark-blue text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">
          OUR PROGRAMS</p>
      <h2 class="font-bold text-2xl lg:text-4xl lg:leading-[45px]">Program Terbaru </h2>
      </div>
      <a href="{{ route('front.program') }}" class="hidden lg:block bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore
        More</a>
    </div>
    <div id="program-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($programs as $program)
      <!-- CARD PROGRAM-->
      <div
        class="program-card card flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
          <img src="{{Storage::url($program->thumbnail)}}" class="object-cover object-center w-full h-full" alt="thumbnails">
        </div>
        <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
          <div class="flex flex-col gap-1">
            <p class="title font-bold text-xl leading-[30px]">{{$program->tittle}}</p>
            <p class="leading-[30px] text-cp-light-grey line-clamp-2">"{{$program->theme}}"</p>

            <div class="flex items-center gap-2 text-cp-light-grey mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 object-contain" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{!!$program->TanggalIndonesia!!}</span>
            </div>

            <div class="flex items-center gap-2 text-cp-light-grey mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 object-contain" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span>{{$program->location}}</span>
            </div>
          </div>
          <div class="flex justify-start mt-auto pt-4">
            <a href="{{ route('program.detail', $program) }}"
              class="bg-cp-black p-[10px_20px] w-fit rounded-xl text-white font-semibold hover:bg-cp-dark-blue">More
              Info...</a>
          </div>
        </div>
      </div>
    @empty
      <div class="text-center text-gray-500">
        <p class="text-lg">Belum ada program yang tersedia.</p>
      </div>
    @endforelse
    </div>
    <div class="flex gap-4 flex-wrap justify-left mb-2 lg:hidden">
      <a href="{{ route('front.artikel') }}"
        class="bg-cp-dark-blue w-fit text-sm lg:text-lg text-white px-6 py-3 rounded-xl font-semibold hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300">
        Program Lainnya...
      </a>
    </div>
  </div>
  <!-- END OUR PROGRAM -->

  <!-- OUR ARTICLE -->
  <div id="OurArticles" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] px-4 mt-10 lg:mt-20">
    <div class="flex items-center justify-between">
      <div class="flex flex-col gap-[14px]">
        <p class="hidden lg:block badge w-fit bg-cp-dark-blue text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">
          OUR ARTICLES</p>
        <h2 class="font-bold text-2xl lg:text-4xl lg:leading-[45px]">Artikel Terbaru </h2>
      </div>
      <a href="{{ route('front.artikel') }}" class="hidden lg:block bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore
        More</a>
    </div>

    <div class="flex flex-wrap items-center gap-[30px] justify-center">
      @forelse ($artikels as $artikel)
      <!-- CARD ARTIKEL 1-->
      <div
        class="card w-full flex bg-white border border-[#E8EAF2] rounded-[10px] lg:rounded-[20px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail  w-1/3 flex-shrink-0">
          <img src="{{Storage::url($artikel->thumbnail)}}" class="object-cover object-center w-full h-full" alt="thumbnails">
        </div>

        <div class="flex flex-col  lg:p-8 p-4 gap-1 w-2/3">
          <div class="flex flex-col gap-1">
            <p class="title font-semibold lg:font-bold text-grey-600 text-sm lg:text-2xl lg:leading-[30px] line-clamp-3 lg:line-clamp-2">{{$artikel->tittle}}</p>
            <div class="flex items-center gap-2 text-cp-light-grey text-sm lg:text-lg lg:mt-2">
              <span>{{$artikel->TanggalIndonesia}}</span>
            </div>
            <div class="hidden lg:block ">
              <p class="leading-[30px] text-lg text-grey-600 line-clamp-2">{{ Str::limit(strip_tags($artikel->content), 150, '...') }}</p>
            </div>
            <div class="flex justify-start lg:justify-start lg:mt-2">
              <a href="{{route('artikel.detail', $artikel)}}" class="text-cp-dark-blue text-sm font-semibold lg:text-lg lg:font-semibold">READ MORE ></a>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="w-full text-center text-gray-500">
        <p class="text-lg">Belum ada artikel yang tersedia.</p>
      </div>
      @endforelse
    </div>

    <div class="flex gap-4 flex-wrap justify-left mb-2 lg:hidden">
      <a href="{{ route('front.artikel') }}"
        class="bg-cp-dark-blue w-fit text-sm lg:text-lg text-white px-6 py-3 rounded-xl font-semibold hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300">
        Artikel Lainnya...
      </a>
    </div>
  </div>
  <!-- END OUR ARTICLE -->


  <!-- DOKUMEN/MATERI -->
 <div id="Materials" class="bg-cp-black w-full mt-20">
  <div class="container max-w-[1000px] mx-auto py-10">
    <div class="flex flex-col md:flex-row md:flex-wrap items-center md:justify-between gap-10 p-[10px]">
      
      @forelse ($materials as $material)
      <a href="{{$material->unduh_link}}" class="block hover:opacity-50 transition-opacity duration-300">
        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
          <div class="w-[64px] h-[64px] lg:w-[100px] lg:h-[100px] flex shrink-0 overflow-hidden">
            <img src="{{Storage::url($material->icon_path)}}" class="object-contain w-full h-full" alt="icon">
          </div>
          <p class="text-cp-pale-orange font-bold text-lg lg:text-2xl leading-[16px] lg:leading-[32px]">{{$material->tittle}}</p>
        </div>
      </a>
      @empty
      <div class="w-full text-center text-gray-500">
        <p class="text-lg">Belum ada materi yang tersedia.</p>
      </div>
      @endforelse

    </div>
  </div>
</div>
  <!-- END DOKUMEN/MATERI -->


  <!-- OUR TEAMS -->
  <div id="Teams" class="bg-[#F6F7FA] w-full px-4 mt-10">
    <!-- TIM SATGAS -->
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center mb-20 px-4">
      <div class="flex flex-col gap-[50px] items-center">
        <h2 class="font-bold text-2xl lg:text-4xl lg:leading-[45px] text-center">Tim SATGAS PPKPT <br> Universitas Tanjungpura</h2>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-[30px] justify-center">
        <div class="w-full flex flex-col items-center gap-8">
          <h3 class="font-bold text-2xl text-center">Ketua Satgas</h3>
          <div class="flex justify-center">
            @if(isset($teams['Ketua Satgas']))
            @foreach($teams['Ketua Satgas'] as $team)
            <div
              class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
              <div
                class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-cp-dark-blue">
                <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                  <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
                </div>
              </div>
              <div class="flex flex-col gap-1 text-center">
                <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
                <p class="text-cp-light-grey">{{$team->keterangan}}</p>
              </div>
            </div>
            @endforeach
            @else
            <p class="text-cp-light-grey">Data belum tersedia.</p>
            @endif
          </div>
        </div>

        <div class="w-full flex flex-col items-center gap-8">
          <h3 class="font-bold text-2xl text-center">Sekretaris</h3>
          <div class="flex justify-center">
            @if(isset($teams['Sekretaris Satgas']))
            @foreach($teams['Sekretaris Satgas'] as $team)
            <div
              class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
              <div
                class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                  <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
                </div>
              </div>
              <div class="flex flex-col gap-1 text-center">
                <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
                <p class="text-cp-light-grey">{{$team->keterangan}}</p>
              </div>
            </div>
            @endforeach
            @else
            <p class="text-cp-light-grey">Data belum tersedia.</p>
            @endif
          </div>
        </div>
      </div>

      <!-- PREVENSI -->
      <div class="w-full flex flex-col items-center gap-8">
        <h3 class="font-bold text-2xl text-center">Divisi Prevensi</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-[30px] justify-center">
          @if(isset($teams['Anggota Divisi Prevensi']))
          @foreach($teams['Anggota Divisi Prevensi'] as $team)
          <div
            class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div
              class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
              <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
              </div>
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
              <p class="text-cp-light-grey">{{$team->keterangan}}</p>
            </div>
          </div>
          @endforeach
          @else
          <p class="text-cp-light-grey">Data belum tersedia.</p>
          @endif
        </div>
      </div>

      <!-- INTERVENSI -->
      <div class="w-full flex flex-col items-center gap-8">
        <h3 class="font-bold text-2xl text-center">Divisi Intervensi</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-[30px] justify-center">
          @if(isset($teams['Anggota Divisi Intervensi']))
          @foreach($teams['Anggota Divisi Intervensi'] as $team)
          <div
            class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div
              class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
              <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
              </div>
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
              <p class="text-cp-light-grey">{{$team->keterangan}}</p>
            </div>
          </div>
          @endforeach
          @else
          <p class="text-cp-light-grey">Data belum tersedia.</p>
          @endif
        </div>
      </div>

      <!-- ADVOKASI -->
      <div class="w-full flex flex-col items-center gap-8">
        <h3 class="font-bold text-2xl text-center">Divisi Advokasi</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-[30px] justify-center">
          @if(isset($teams['Anggota Divisi Advokasi']))
          @foreach($teams['Anggota Divisi Advokasi'] as $team)
          <div
            class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div
              class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
              <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
              </div>
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
              <p class="text-cp-light-grey">{{$team->keterangan}}</p>
            </div>
          </div>
          @endforeach
          @else
          <p class="text-cp-light-grey">Data belum tersedia.</p>
          @endif
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-[14px] items-center mb-4 mt-8">
      <a href="team.html" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white text-center">Lihat
        Anggota Lainnya</a>
    </div>
  </div>
  <!-- END OUR TEAMS -->

  <!-- FAQ -->
  <div id="FAQ" class="bg-[#F6F7FA] w-full py-20 px-[10px] mb-10">
    <div class="container max-w-[1000px] mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-[50px] sm:gap-[70px] items-center">
        <div class="flex flex-col gap-[30px]">
          <div class="flex flex-col gap-[10px] items-center lg:items-start">
            <h2 class="font-bold text-2xl lg:text-4xl leading-[45px] text-center lg:text-start">Frequently Asked Questions</h2>
          </div>
          <div class="flex flex-col gap-[14px] items-center lg:items-start">
            <a href="/" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white text-center">Contact Us</a>
          </div>
        </div>
        <div class="flex flex-col gap-[30px] sm:w-[603px] shrink-0">
          <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
            <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
              <span class="font-bold text-base lg:text-lg leading-[27px] text-left">Can installments be beneficial for both?</span>
              <div class="arrow w-9 h-9 flex shrink-0">
                <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
              </div>
            </button>
            <div id="accordion-faq-1" class="accordion-content hide">
              <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the
                max level so that we chose the best one from Jakarta, Indonesia will also protect post building
                finished
                completed ahead one.</p>
            </div>
          </div>
          <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
            <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
              <span class="font-bold text-base lg:text-lg leading-[27px] text-left">What kind of framework you popular with?</span>
              <div class="arrow w-9 h-9 flex shrink-0">
                <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
              </div>
            </button>
            <div id="accordion-faq-2" class="accordion-content hide">
              <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the
                max level so that we chose the best one from Jakarta, Indonesia will also protect post building
                finished
                completed ahead one.</p>
            </div>
          </div>
          <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
            <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
              <span class="font-bold text-base lg:text-lg leading-[27px] text-left">What insurance provider do you use?</span>
              <div class="arrow w-9 h-9 flex shrink-0">
                <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
              </div>
            </button>
            <div id="accordion-faq-3" class="accordion-content hide">
              <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the
                max level so that we chose the best one from Jakarta, Indonesia will also protect post building
                finished
                completed ahead one.</p>
            </div>
          </div>
          <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
            <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
              <span class="font-bold text-base lg:text-lgleading-[27px] text-left">What if we have other questions?</span>
              <div class="arrow w-9 h-9 flex shrink-0">
                <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
              </div>
            </button>
            <div id="accordion-faq-4" class="accordion-content hide">
              <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the
                max level so that we chose the best one from Jakarta, Indonesia will also protect post building
                finished
                completed ahead one.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END FAQ -->


  <x-footer />

</main>
@endsection


@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{asset('js/accordion.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{asset('js/navbar.js')}}"></script>

@endpush