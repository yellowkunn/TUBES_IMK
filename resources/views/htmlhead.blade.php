<!DOCTYPE html>
<html lang="en">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const darkModeBtn = document.getElementById('darkModeBtn');
        const lightModeBtn = document.getElementById('lightModeBtn');

        function changeToDark(){
            lightModeBtn.classList.remove('hidden');
            darkModeBtn.classList.add('hidden');
            document.documentElement.classList.add('dark');
        }

        function changeToLight(){
            darkModeBtn.classList.remove('hidden');
            lightModeBtn.classList.add('hidden');
            document.documentElement.classList.remove('dark');
        }

        darkModeBtn.onclick = changeToDark;
        lightModeBtn.onclick = changeToLight;
    });
</script>