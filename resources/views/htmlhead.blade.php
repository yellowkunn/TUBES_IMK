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
            localStorage.setItem('darkMode', 'true');
        }

        function changeToLight(){
            darkModeBtn.classList.remove('hidden');
            lightModeBtn.classList.add('hidden');
            document.documentElement.classList.remove('dark');
            localStorage.setItem('darkMode', 'false');
        }

        darkModeBtn.onclick = function() {
            changeToDark();
        };
        lightModeBtn.onclick = function() {
            changeToLight();
        };

        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        if (isDarkMode) {
            changeToDark();
        } else {
            changeToLight();
        }
    });
</script>