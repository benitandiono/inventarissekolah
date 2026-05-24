<x-guest-layout>
    <style>
        body {
            background-image: url('{{ asset('images/bg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SWEETALERT ERROR LOGIN --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Ditolak',
                    text: '{{ $errors->first() }}',
                    confirmButtonColor: '#4f46e5',
                    confirmButtonText: 'Mengerti'
                });
            });
        </script>
    @endif

    <div class="min-h-screen flex items-center justify-center px-8 py-10">
        <div class="w-full max-w-lg p-10 bg-white/80 backdrop-blur-md rounded-xl shadow-md 
                    transition duration-300 ease-in-out hover:shadow-2xl hover:ring-4 hover:ring-white">

            <!-- Header -->
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang👋</h1>
                <p class="text-sm text-gray-500">Masukkan kredensial Anda untuk melanjutkan</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="username"
                        class="w-full px-4 py-2 rounded-md bg-white text-gray-800 border border-gray-300 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm text-gray-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" required
                        autocomplete="current-password"
                        class="w-full px-4 py-2 rounded-md bg-white text-gray-800 border border-gray-300 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2">Ingat saya</span>
                    </label>
                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md 
                               hover:bg-indigo-700 transition">
                        MASUK
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
