
<!-- Include Styles and Scripts -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 h-screen w-64 bg-gray-700 shadow-xl">
        <div class="mb-2 p-4">
            <h5 class="text-white text-xl font-semibold">
                {{ __('Profile') }}
            </h5>
        </div>

        <!-- Navigation Links -->
        <nav class="flex flex-col gap-1 p-2 text-white">
            <!-- Profile Section -->
            <div x-data="{ open: false }">
                <div @click="open = !open" class="flex items-center w-full p-3 rounded-lg transition-all hover:bg-gray-400 focus:bg-gray-700 active:bg-gray-700">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    Profile
                </div>
                <div x-show="open" class="ml-8 mt-2">
                    <a href="{{ route('profile.edit') }}" class="block p-2 rounded-lg hover:bg-gray-700">Edit Profile</a>
                </div>
            </div>

            <!-- Dashboard Link -->
            <a href="{{ route('umkm.index') }}" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-400">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M3 5.25a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5A.75.75 0 013 10.75v-5.5zm11 0a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5a.75.75 0 01-.75-.75v-5.5zM3 15.75a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5A.75.75 0 013 21.25v-5.5zm11 0a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5a.75.75 0 01-.75-.75v-5.5z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                Dashboard
            </a>

            <!-- Add UMKM Link -->
            <a href="{{ route('umkm.create') }}" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-400">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v8.25h8.25a.75.75 0 010 1.5H12.75v8.25a.75.75 0 01-1.5 0v-8.25H3.75a.75.75 0 010-1.5h8.25V3a.75.75 0 01.75-.75z" clip-rule="evenodd"/>
                    </svg>
                </div>
                Tambahkan UMKM
            </a>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-400">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M14.75 2.25a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-3h-6v12h6v-3a.75.75 0 011.5 0v4.5a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-15a.75.75 0 01.75-.75h7.5zm4.53 7.22a.75.75 0 00-1.06-1.06l-3 3a.75.75 0 000 1.06l3 3a.75.75 0 001.06-1.06l-2.22-2.22h4.72a.75.75 0 000-1.5h-4.72l2.22-2.22z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    Log Out
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="py-12 pl-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Form -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
