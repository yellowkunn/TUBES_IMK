<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
    <div class="flex flex-col gap-4 h-screen bg-cover bg-center px-10 pt-5" style="background-image: url('{{ asset('images/bg-loginRegis.png') }}')">

        <div class="flex items-center justify-end gap-2.5">
            <p class="text-greyIcon mr-2">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="rounded-full bg-white border-2 border-baseDarkerGreen text-baseDarkerGreen font-semibold 
            px-7 py-1.5 hover:bg-baseDarkerGreen hover:text-white">Masuk</a>
        </div>
      
        <div class="logo mx-auto">
            <img src="{{asset('images/logo.jpg')}}" alt="Logo" class="w-10">
        </div>

        <div class="mx-auto px-24 py-10 h-fit bg-greyBackground rounded-lg border-2 border-greyBorder md:min-w-[550px]">
            <h2 class="text-title font-semibold mb-2 text-center">Selamat datang</h2>
            <p class="text-[#717171] text-smallContent mb-8 text-center">Masukkan email, username dan password Anda</p>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="flex flex-col gap-4">
                        <input autocomplete="off" type="email" id="email" name="email" required class="border-2 border-greyBorder w-full p-2.5 rounded" placeholder="Email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <input autocomplete="off" type="text" id="username" name="username" required class="border-2 border-greyBorder w-full p-2.5 rounded" placeholder="Username">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />

                        <div class="relative flex justify-between">
                            <input type="password" id="password" name="password" required class="border-2 border-greyBorder w-full p-2.5 rounded" placeholder="Password">
                            <i class="fas fa-eye-slash eye-icon text-gray-400 hover:text-gray-600 absolute top-4 right-4"></i>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="relative flex justify-between">
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="border-2 border-greyBorder w-full p-2.5 rounded" placeholder="Confirm Password">
                            <i class="fas fa-eye-slash eye-icon text-gray-400 hover:text-gray-600 absolute top-4 right-4"></i>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <input type="hidden" name="role" id="role" value="user">
                
                        <button type="submit" class="w-full p-2.5 mt-4 mb-2 bg-baseDarkerGreen text-white font-bold rounded cursor-pointer hover:shadow-[0px_0px_5px_2px_rgba(105,212,220,0.3)] focus:bg-baseLighterGreen">
                            Daftar
                        </button>
                    </div>
            </form>
        </div>
    </div>

<script>
    const eyeIcons = document.querySelectorAll('.eye-icon');
    eyeIcons.forEach(icon => {
        icon.addEventListener('click', () => {
            const inputField = icon.previousElementSibling;
            const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
            inputField.setAttribute('type', type);
            icon.classList.toggle('fa-eye-slash');
            icon.classList.toggle('fa-eye');
        });
    });
</script>
</body>
</html>
