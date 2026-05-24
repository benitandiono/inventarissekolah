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

    {{-- SWEETALERT SUCCESS --}}
    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Email Terkirim',
                    text: '{{ session("status") }}',
                    confirmButtonColor: '#4f46e5',
                    confirmButtonText: 'Mengerti'
                });
            });
        </script>
    @endif

    {{-- SWEETALERT ERROR --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
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
                <h1 class="text-3xl font-bold text-gray-800">Lupa Password?</h1>
                <p class="text-sm text-gray-500 mt-2">Masukkan email Anda, kami akan kirimkan link reset password</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="email"
                        class="w-full px-4 py-2 rounded-md bg-white text-gray-800 border border-gray-300 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                        placeholder="Masukkan email Anda" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button Group -->
                <div class="flex gap-3">
                    <!-- Kirim Link Button -->
                    <button type="submit"
                        class="flex-1 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md 
                               hover:bg-indigo-700 transition">
                        Kirim Link Reset
                    </button>

                    <!-- Kembali Button -->
                    <a href="{{ route('login') }}"
                        class="flex-1 py-2 px-4 bg-gray-300 text-gray-800 font-semibold rounded-md 
                               hover:bg-gray-400 transition text-center">
                        Kembali
                    </a>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Sudah ingat password? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                        Login di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>