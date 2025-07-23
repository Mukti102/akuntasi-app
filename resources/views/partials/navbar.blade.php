 <!-- Navbar -->
        <header class=" bg-white shadow-md z-[10000] border-b border-white/10">
            <div class="flex items-center justify-between px-8 py-3">
                <div class="flex items-center">
                    <button id="sidebarToggle" class="lg:hidden text-white hover:text-blue-400 mr-6 text-xl transition-colors">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                
                <div class="flex items-center space-x-6">
                    <!-- Search -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search..." class="futuristic-input w-64 px-4 py-2 rounded-xl pl-10">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    
                    
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <a href="{{route('profile.edit')}}" id="profileBtn" class="flex items-center space-x-4 text-white hover:text-blue-400 focus:outline-none transition-colors">
                            <div class="avatar-ring rounded-full">
                                <img src="https://tse2.mm.bing.net/th/id/OIP.0CZd1ESLnyWIHdO38nyJDAHaGF?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile" class="w-12 h-12 rounded-full">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>