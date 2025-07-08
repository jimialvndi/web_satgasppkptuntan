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
      <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Our Team</p>
    </div>
    <h2 class="font-bold text-4xl leading-[45px] text-center">Tim SATGAS PPKPT<br> Universitas Tanjungpura</h2>
  </div>
  <div id="Teams" class=" bg-[#F6F7FA] w-full px-[10px] relative z-10 mt-10">
    <!-- TIM SATGAS -->
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center mb-20">
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

    <!-- Duta SATGAS -->
    <div class="w-full border-t border-gray-200 mb-10">
      <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center mt-20">
        <div class="flex flex-col gap-[50px] items-center">
          <h2 class="font-bold text-4xl leading-[45px] text-center">Duta <br> Anti Kekerasan Untan</h2>
        </div>
        <div class="w-full flex flex-col items-center gap-16">
          <div class="w-full flex flex-col items-center gap-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-[30px] justify-center">
              @if(isset($teams['Anggota Duta']))
              @foreach($teams['Anggota Duta'] as $team)
              <div
                class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                <div
                  class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                  <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                    <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
                  </div>
                </div>
                <div class="flex flex-col gap-1 text-center">
                  <p class="font-bold text-xl leading-[30px]"> {{$team->name}}</p>
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
      </div>
    </div>

    <!-- THE GUARDIAN -->
    <div class="w-full border-t border-gray-200 mb-10">
      <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center mt-20">
        <div class="flex flex-col gap-[50px] items-center">
          <h2 class="font-bold text-4xl leading-[45px] text-center">The Guardian <br> SATGAS PPKPT Untan</h2>
        </div>
        <div class="w-full flex flex-col items-center gap-16">
          <div class="w-full flex flex-col items-center gap-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-[30px] justify-center">
              @if(isset($teams['Anggota The Guardian']))
              @foreach($teams['Anggota The Guardian'] as $team)
              <div
                class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                <div
                  class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                  <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                    <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
                  </div>
                </div>
                <div class="flex flex-col gap-1 text-center">
                  <p class="font-bold text-xl leading-[30px]"> {{$team->name}}</p>
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
      </div>
    </div>

    <!-- Volunteer SATGAS -->
    <div class="w-full border-t border-gray-200 mb-10">
      <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center mt-20">
        <div class="flex flex-col gap-[50px] items-center">
          <h2 class="font-bold text-4xl leading-[45px] text-center">Volunteer <br> SATGAS PPKPT Untan</h2>
        </div>
        <div class="w-full flex flex-col items-center gap-16">
          <div class="w-full flex flex-col items-center gap-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-[30px] justify-center">
              @if(isset($teams['Anggota Volunteer']))
              @foreach($teams['Anggota Volunteer'] as $team)
              <div
                class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                <div
                  class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                  <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                    <img src="{{Storage::url($team->photo)}}" class="object-cover w-full h-full object-center" alt="photo">
                  </div>
                </div>
                <div class="flex flex-col gap-1 text-center">
                  <p class="font-bold text-xl leading-[30px]"> {{$team->name}}</p>
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
      </div>
    </div>




  </div>
</main>
<x-footer />


@endsection

@push('after-scripts')
<!-- script JS -->
<script src="{{asset('js/navbar.js')}}"></script>
@endpush