@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md  ">
  <x-navbar />
</header>
<!-- END HEADER -->

<main id="main-content" class="px-4">
  <div class="flex flex-col gap-[50px] items-center mt-10 pb-10 lg:pb-20">
    <div class="breadcrumb flex items-center justify-center gap-[30px]">
      <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
      <span class="text-cp-light-grey">/</span>
      <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">About Us</p>
    </div>
    <h2 class="font-bold text-4xl leading-[45px] text-center">Tentang<br> SATGAS PPKPT UNTAN</h2>
  </div>


  <div id="abouts" class="container max-w-[1130px] mx-auto flex flex-col gap-10">
    @forelse ($abouts as $about)
    <div>
      <div class="full max-w-6xl mx-auto rounded-xl overflow-hidden">
        <img src="{{Storage::url($about->thumbnail)}}" class="object-contain w-full h-full" alt="logo">
      </div>
    </div>
    <div class="prose max-w-none">
        {!! $about->content !!}
    </div>
    @empty
    <div class="w-full text-center text-gray-500">
      <p class="text-lg">Belum ada about yang tersedia.</p>
    </div>
    @endforelse


  </div>

  
</main>
<x-footer />



@endsection

@push('after-scripts')
<script src="{{asset('js/navbar.js')}}"></script>

@endpush