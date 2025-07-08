@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md  ">
<x-navbar/>
</header>
<!-- END HEADER -->

<main id="main-content" class="px-4">
  <div class="flex flex-col gap-[50px] items-center py-10">
    <h2 class="font-bold text-4xl leading-[45px] text-center">Alur Pelaporan<br>Kasus Kekerasan</h2>
  </div>

  <div id="Reports" class="container max-w-[1130px] mx-auto flex flex-col gap-10 items-center justify-center">
    @forelse ($reports as $report)
    <div
      class="flex flex-col p-[30px] rounded-[20px] gap-[18px] bg-white shadow-[0_10px_30px_0_#D1D4DF40] w-full md:w-[700px] shrink-0">
      <div class="flex items-center gap-[18px]">
        <div class="w-full max-w-6xl mx-auto rounded-xl overflow-hidden">
          <img src="{{Storage::url($report->poster_path)}}" class="object-contain w-full h-full" alt="poster">
        </div>
      </div>
      <a href="{{$report->gform_link}}"
        class="bg-cp-dark-blue text-center text-xl p-5 w-full rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Lapor
        Sekarang!
      </a>
    </div>
    @empty
    <div class="w-full text-center text-gray-500">
      <p class="text-lg">Belum ada laporan yang tersedia.</p>
    </div>
    @endforelse

  </div>

</main>
<x-footer/>

@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
@endpush