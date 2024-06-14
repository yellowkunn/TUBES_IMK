@include('htmlhead')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
<div class="flex flex-col gap-4 h-screen bg-cover bg-center px-10 pt-5" style="background-image: url('/images/bg-loginRegis.png');">
        <div class="flex items-center justify-end gap-2">
            <p class="text-greyIcon mr-2">Belum punya akun?</p>
            
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="rounded-full bg-white border-2 border-baseDarkerGreen text-baseDarkerGreen font-semibold 
            px-4 md:px-7 py-1 sm:py-1.5 hover:bg-baseDarkerGreen hover:text-white">Buat akun</a>
            @endif
        </div>
      
        <div class="logo mx-auto mt-8">
            <img src="{{asset('images/logo.jpg')}}" alt="Logo" class="w-10">
        </div>

        <div class="mx-auto px-8 sm:px-10 md:px-24 py-8 sm:py-10 h-fit bg-greyBackground rounded-lg border-2 border-greyBorder md:min-w-[550px]">
            <h2 class="text-[20px] sm:text-subtitle md:text-title font-semibold mb-2 text-center">Selamat datang kembali</h2>
            <p class="text-[#717171] text-smallContent mb-6 sm:mb-8 text-center">Masukkan username dan password akun dulu ya</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="flex flex-col gap-4">
                        <input type="text" id="email" name="email" value="{{ @old('email/username') }}" required class="border-2 border-greyBorder w-full md:p-2.5 rounded" placeholder="email">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />

                        <div class="relative flex justify-between">
                            <input type="password" id="password" name="password" required class="border-2 border-greyBorder w-full md:p-2.5 rounded" placeholder="password">
                            <i class="fas fa-eye-slash eye-icon text-gray-400 hover:text-gray-600 absolute top-4 right-4"></i>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                
                        <button type="submit" class="w-full p-1.5 md:p-2.5 mt-2 sm:mt-5 mb-2 bg-baseDarkerGreen text-white font-bold rounded cursor-pointer hover:shadow-[0px_0px_5px_2px_rgba(105,212,220,0.3)] focus:bg-baseLighterGreen">
                            Masuk
                        </button>
                    </div>
            </form>
        </div>
        <div class="mx-auto mt-4">Lupa password? 
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="font-semibold text-baseDarkerGreen">Reset password</a>
            @endif
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
