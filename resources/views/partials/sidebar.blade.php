<div id="sidebar"
    class="fixed shadow-lg inset-y-0   md:left-0 z-50 w-72 sidebar-gradient transform transition-transform duration-500 ease-in-out -translate-x-full lg:translate-x-0">
    <div class="flex items-center justify-center mt-5 h-20 relative overflow-hidden">
        <div class=" absolute inset-0 opacity-20"></div>
       <img src="{{asset('storage/'.setting('site_logo'))}}" class="w-14 h-14" alt="">
       <h1 class="text-xl uppercase text-black font-bold">{{setting('site_name')}}</h1>
    </div>

    <nav class="mt-2 px-4">
        <div class="space-y-3">
            <a href="{{ route('dashboard') }}"
                class="nav-item  flex items-center {{ request()->is('dashboard*') ? 'active text-gray-100' : '' }} px-6 py-4   rounded-xl">
                <i class="fas fa-home mr-4 text-blue-400 text-lg"></i>
                <span class="font-semibold ">Dashboard</span>
            </a>
            {{-- <a href="#" class="nav-item  flex items-center px-6 py-4 text-gray-300  rounded-xl">
                <i class="fas fa-users mr-4 text-purple-400 text-lg"></i>
                <span class="font-semibold ">Users</span>
            </a> --}}
            <a href="{{ route('periodes.index') }}"
                class="nav-item  {{ request()->is('periode*') ? 'active text-gray-100' : '' }} flex items-center px-6 py-4   rounded-xl">
                <i class="fa-solid fa-calendar mr-4 text-blue-600"></i>
                <span class="font-semibold ">Menu Anggaran</span>
            </a>

            <a href="{{ route('transactions.index') }}"
                class="nav-item   {{ request()->is('transactions*') ? 'active text-gray-100' : '' }} flex items-center px-6 py-4    rounded-xl">
                <i class="fa-solid fa-file-invoice mr-4 text-green-400 text-lg"></i>
                <span class="font-semibold">Transaksi</span>
            </a>

            <a href="{{ route('category.index') }}"
                class="nav-item   {{ request()->is('category*') ? 'active text-gray-100' : '' }} flex items-center px-6 py-4   rounded-xl">
                <i class="fa-solid fa-layer-group mr-4 text-cyan-400 text-lg"></i>
                <span class="font-semibold ">Kategory</span>
            </a>

            <a href="{{ route('assets.index') }}"
                class="nav-item   {{ request()->is('assets*') ? 'active text-gray-100' : '' }} flex items-center px-6 py-4   rounded-xl">
                <i class="fa-solid fa-boxes-stacked mr-4 text-pink-500 text-lg"></i>
                <span class="font-semibold ">Asset</span>
            </a>

            <a href="{{route('setting.update')}}" {{ request()->is('setting') ? 'active text-gray-100' : '' }} class="nav-item  flex items-center px-6 py-4   rounded-xl">
                <i class="fas fa-cog mr-4 text-yellow-400 text-lg"></i>
                <span class="font-semibold ">Settings</span>
            </a>
            
            <a href="{{route('profile.edit')}}" {{ request()->is('profile*') ? 'active text-gray-100' : '' }} class="nav-item  flex items-center px-6 py-4   rounded-xl">
                <i class="fas fa-user mr-4 text-violet-400 text-lg"></i>
                <span class="font-semibold ">Profile</span>
            </a>

            <form action="{{ route('logout') }}" class="w-full" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="nav-item  flex items-center px-6 py-4   rounded-xl">
                    <i class="fas fa-sign-out-alt mr-4 text-red-400 text-lg"></i>
                    <span class="font-semibold ">Logout</span>
                </button>
            </form>
        </div>
    </nav>
</div>


<!-- Mobile sidebar overlay -->
<div id="sidebarOverlay"
    class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm lg:hidden hidden transition-all duration-300"></div>
