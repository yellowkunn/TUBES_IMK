<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

     <!-- font awsome -->
     <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div class="flex flex-col gap-6 px-24 py-12">
        <div class="flex items-center gap-6">
            <a href=""><i class="fa-solid fa-arrow-left rounded-full bg-white p-3 drop-shadow-regularShadow"></i></a>

            <p class="font-semibold text-subtitle">Profile</p>
        </div>

        <div class="flex justify-center">
            <div class="w-fit relative">
                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-24 h-24 object-cover rounded-full" alt="">
                <button class="absolute bottom-0 right-0"><i class="fa-solid fa-pen text-white p-2 bg-baseBlue rounded-full"></i></button>
            </div>
        </div>
    </div>
    


@include('components.footer')
</body>
</html>