@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md  ">
<x-navbar/>
</header>
<!-- END HEADER -->

<main id="main-content" class="px-4">

  <div id="ProgramDetails" class="container max-w-[1130px] mx-auto flex flex-col gap-10">
    <div class="mt-10">
      <div class="full max-w-6xl mx-auto rounded-xl overflow-hidden">
        <img src="{{Storage::url($program->thumbnail)}}" class="object-contain w-full h-full" alt="thumbnail">
      </div>
    </div>
    <div class="flex flex-col gap-[50px] items-start">
      <h2 class="font-bold text-4xl leading-[45px] text-start">{{$program->tittle}}</h2>
    </div>
    <div id="descriptions" class="prose prose-lg max-w-none flex flex-col gap-[14px] items-start">
      <p class="leading-[30px] text-lg text-grey-600 text-justify">
        {!!$program->description!!}
      </p>
    </div>

    <div class="flex flex-col gap-[14px] items-start">
      <p class="badge w-fit bg-cp-dark-blue text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">Waktu &
        Tempat</p>
      <p class="prose leading-[30px] text-lg text-grey-600 text-justify">
        {{$program->tittle}} akan dilaksanakan pada:
        <br>
        <strong>Waktu:</strong> {!!$program->TanggalIndonesia!!}
        <br>
        <strong>Tempat:</strong> {{$program->location}}
      </p>
    </div>
    <div class="flex justify-start gap-3">
      <a href="{{$program->regist_link}}"
        class="bg-cp-black p-[10px_20px]  w-fit rounded-xl text-white font-semibold hover:bg-cp-dark-blue">Link
        Daftar</a>
      <a href="{{$program->location_link}}"
        class="bg-cp-black p-[10px_20px]  w-fit rounded-xl text-white font-semibold hover:bg-cp-dark-blue">Lokasi</a>
      <a href="{{route('front.program')}}"
        class="bg-cp-black p-[10px_20px]  w-fit rounded-xl text-white font-semibold hover:bg-cp-dark-blue">Lihat
        Program Lainnya...</a>
    </div>
  </div>


</main>
<x-footer/>


@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
@endpush