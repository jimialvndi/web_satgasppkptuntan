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
      <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Program Us</p>
    </div>
    <h2 class="font-bold text-4xl leading-[45px] text-center">Program<br> SATGAS PPKPT UNTAN</h2>
  </div>


  <!-- OUR PROGRAMS -->
  <div class="container max-w-[1130px] mx-auto">
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
    <div id="program-pagination" class="flex justify-center items-center gap-4 mt-20">
    </div>
  </div>
  <!-- END OUR PROGRAM -->



</main>
<x-footer/>

@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/pagination.js')}}"></script>
<script>
  setupPagination('program-list', 'program-card', 'program-pagination');
</script>
@endpush