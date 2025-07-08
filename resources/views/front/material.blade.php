@extends('front.layouts.app')
@section('content')
<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md  ">
<x-navbar/>
</header>
<!-- END HEADER -->

<main id="main-content" class="px-4">

  <!-- DOCUMENTS -->
  <div id="Documents" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
    <div class="flex flex-wrap items-center gap-[30px] justify-center">
      <div class="w-full mb-20">
        <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center">
          <div class="w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-8">

            @forelse ($materials as $material)
              <!-- document 1 -->
              <div class="card bg-white flex flex-col h-full justify-center items-center p-6 rounded-[20px] border border-[#E8EAF2] hover:shadow-xl hover:border-cp-dark-blue transition-all duration-300">
                <div class="flex flex-col items-center gap-4 text-center">
                  <div class="w-[100px] h-[100px] flex shrink-0">
                    <img src="{{Storage::url($material->icon_path)}}" class="object-contain w-full h-full" alt="icon">
                  </div>
                  <p class="text-cp-black font-bold text-xl leading-tight">{{$material->tittle}}</p>
                  <div class="mt-2">
                    <a href="{{$material->unduh_link}}}}" class="bg-cp-black p-[10px_20px] w-fit rounded-xl text-white font-semibold hover:bg-cp-dark-blue transition-colors">
                      Unduh
                    </a>
                  </div>
                </div>
              </div>
            @empty
              <div class="w-full text-center text-gray-500">
                <p class="text-lg">Belum ada dokumen yang tersedia.</p>
              </div>
            @endforelse

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- END DOC -->

  
</main>
<x-footer/>

@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
@endpush