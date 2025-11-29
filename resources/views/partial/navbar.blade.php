    <nav class="bg-white shadow-lg fixed w-full z-50 top-0 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" onclick="showPage('home')" class="flex items-center text-indigo-600 font-bold text-xl hover:text-indigo-800 transition">
                        <i class="fa-solid fa-layer-group mr-2"></i>
                        BrandLogo
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" onclick="showPage('home')" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition border-b-2 border-transparent hover:border-indigo-600">Beranda</a>
                    <a href="#" onclick="showPage('about')" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition border-b-2 border-transparent hover:border-indigo-600">Tentang</a>
                    <a href="#" onclick="showPage('services')" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition border-b-2 border-transparent hover:border-indigo-600">Layanan</a>
                    <a href="#" onclick="showPage('contact')" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition border-b-2 border-transparent hover:border-indigo-600">Kontak</a>
                    
                    <!-- CTA Button -->
                    <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-indigo-700 transition shadow-md transform hover:-translate-y-0.5">
                        Login
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button type="button" onclick="toggleMobileMenu()" class="text-gray-500 hover:text-gray-700 focus:outline-none p-2 rounded-md">
                        <i class="fa-solid fa-bars text-xl" id="menuIcon"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div class="md:hidden hidden bg-white border-t" id="mobileMenu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" onclick="showPage('home')" class="block text-gray-700 hover:text-indigo-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="#" onclick="showPage('about')" class="block text-gray-700 hover:text-indigo-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Tentang</a>
                <a href="#" onclick="showPage('services')" class="block text-gray-700 hover:text-indigo-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Layanan</a>
                <a href="#" onclick="showPage('contact')" class="block text-gray-700 hover:text-indigo-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            </div>
        </div>
    </nav>