<nav x-data="{ open: false }" class="container mx-auto max-w-[1130px] p-4 md:flex md:items-center md:justify-between">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="flex shrink-0 h-[48px] md:h-[64px] overflow-hidden">
                <img src="{{asset('assets/logo/logountan.png')}}" class="object-contain w-full h-full" alt="logo">
                <img src="{{asset('assets/logo/logosatgasppkpt.png')}}" class="object-contain w-full h-full" alt="logo">
            </div>
            <div class="flex flex-col">
                <p id="CompanyName" class="font-extrabold text-lg md:text-xl leading-[30px]">SATGAS PPKPT</p>
                <p id="CompanyTagline" class=" text-xs md:text-sm text-cp-light-grey">Universitas Tanjungpura</p>
            </div>
        </div>

        <button @click="open = !open" class="md:hidden p-2 rounded-md text-gray-800 hover:bg-gray-100 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-4 6h4"></path>
            </svg>
        </button>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden md:flex md:items-center md:justify-end mt-5 lg:mt-0">
        <ul class="flex flex-col md:flex-row md:items-center gap-y-4 md:gap-x-[30px]">
            <li class="{{request()->routeIs('front.index') ? 'text-cp-dark-blue' : ''}} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                <a href="{{route('front.index')}}">Home</a>
            </li>
            
            <li class="{{ request()->routeIs('front.about') || request()->routeIs('front.team') ? 'text-cp-dark-blue' : ''}} font-semibold hover:text-cp-dark-blue transition-all duration-300 relative group">
                <div class="flex items-center gap-2 cursor-pointer">
                    <span>Profil</span>
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-xl w-48 z-10">
                    <ul class="py-2">
                        <li><a href="{{route('front.about')}}" class="block px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-cp-dark-blue">Tentang SATGAS</a></li>
                        <li><a href="{{route('front.team')}}" class="block px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-cp-dark-blue">Struktur Organisasi</a></li>
                    </ul>
                </div>
            </li>

            <li class="{{ request()->routeIs('front.program') || request()->routeIs('program.detail') ? 'text-cp-dark-blue' : ''}} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                <a href="{{route('front.program')}}">Program</a>
            </li>
            <li class="{{ request()->routeIs('front.artikel')  || request()->routeIs('artikel.detail') ? 'text-cp-dark-blue' : ''}} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                <a href="{{route('front.artikel')}}">Artikel</a>
            </li>
            <li class="{{request()->routeIs('front.material') ? 'text-cp-dark-blue' : ''}} font-semibold hover:text-cp-dark-blue transition-all duration-300">
                <a href="{{route('front.material')}}">Unduh Materi</a>
            </li>
            <a href="{{route('front.report')}}" class="{{request()->routeIs('front.report') ? 'shadow-[0_12px_30px_0_#312ECB66]' : ''}} mt-4 md:mt-0 md:ml-6 bg-cp-dark-blue p-[14px_20px] w-full text-center md:w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Lapor!</a>
        </ul>

    </div>
</nav>