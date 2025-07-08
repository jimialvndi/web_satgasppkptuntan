<footer class="bg-cp-black w-full relative overflow-hidden mt-10">
    <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-start justify-between gap-10 lg:gap-4 py-[50px] lg:pt-[100px] lg:pb-[100px] relative z-10 px-4">
        
        <div class="flex flex-col lg:flex-row lg:items-center gap-4 lg:gap-3">
            <div class="flex items-center gap-3">
                <div class="flex shrink-0 h-[64px] lg:h-[80px] overflow-hidden">
                    <img src="{{asset('assets/logo/logountan.png')}}" class="object-contain w-full h-full" alt="logo">
                    <img src="{{asset('assets/logo/logosatgasppkpt.png')}}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div class="flex flex-col">
                <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">Satuan Tugas PPKPT UNTAN</p>
                <p id="CompanyTagline" class="text-cp-light-grey pt-[8px]">
                    Jl. Profesor Dokter H. Hadari Nawawi, <br>Bansir Laut, Kec. Pontianak Tenggara,
                    <br>Kota Pontianak, Kalimantan Barat,<br>Indonesia 78124
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-10 lg:gap-[24px] text-left">
            {{-- ... sisa kode kolom link tidak perlu diubah ... --}}
            <div class="flex flex-col w-[140px] gap-1">
                <p class="font-bold text-lg text-white">Tentang Kami</p>
                <a href="{{ route('front.about') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Tentang Satgas</a>
                <a href="{{ route('front.team') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Struktur Tim</a>
                <a href="{{ route('front.program') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Program</a>
            </div>
            <div class="flex flex-col w-[140px] gap-1">
                <p class="font-bold text-lg text-white">Sumber Daya</p>
                <a href="{{ route('front.artikel') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Artikel</a>
                <a href="{{ route('front.material') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Unduh Materi</a>
            </div>
            <div class="flex flex-col w-[240px] gap-1">
                <p class="font-bold text-lg text-white">Bantuan dan Dukungan</p>
                <a href="{{ route('front.report') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Lapor Sekarang</a>
                <a href="#" class="text-cp-light-grey hover:text-white transition-all duration-300">Prosedur Pelaporan</a>
                <a href="#" class="text-cp-light-grey hover:text-white transition-all duration-300">FAQ (Tanya Jawab)</a>
                <a href="#" class="text-cp-light-grey hover:text-white transition-all duration-300">Kontak Kami</a>
            </div>
        </div>
    </div>
    
    <div class="w-full border-t border-cp-light-grey py-4 text-sm text-cp-light-grey">
        {{-- ... sisa kode sub-footer tidak perlu diubah ... --}}
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row justify-between items-center gap-4 px-4">
            <p>© 2025 Satgas PPKPT Untan. Hak Cipta Dilindungi.</p>
            <div class="flex items-center gap-4">
                <a href=""><img src="{{asset('assets/icons/youtube.svg')}}" class="w-5 h-5 object-contain" alt="youtube"></a>
                <a href=""><img src="{{asset('assets/icons/whatsapp.svg')}}" class="w-5 h-5 object-contain" alt="whatsapp"></a>
                <a href=""><img src="{{asset('assets/icons/facebook.svg')}}" class="w-5 h-5 object-contain" alt="facebook"></a>
                <a href=""><img src="{{asset('assets/icons/instagram.svg')}}" class="w-5 h-5 object-contain" alt="instagram"></a>
            </div>
        </div>
    </div>
</footer>