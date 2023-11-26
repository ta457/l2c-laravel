<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>L2C</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  {{ $slot }}
</body>

<script>
    // Handle filter items by search keyword in Tutorials/Exercises 
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchKeyword = this.value.trim().toLowerCase();
        // Hide all items
        document.querySelectorAll('.list-item').forEach(function (item) {
            item.style.display = 'none';
        });
        // Show only the items that match the search keyword
        document.querySelectorAll('.list-item').forEach(function (item) {
            let list = item.getAttribute('data-list').toLowerCase();
            let listItem = item.getAttribute('data-item').toLowerCase();

            if (list.includes(searchKeyword) || listItem.includes(searchKeyword)) {
                item.style.display = 'block';
            }
        });
    });

    // Handle exercise page interactions
    // show answer
    function showAnswer() {
        const answer = document.getElementById('exercise-answer');
        const btn = document.getElementById('show-answer-btn');
        answer.classList.toggle('hidden');
        if (answer.classList.contains('hidden')) {
            btn.innerText = 'Show Answer';
        } else {
            btn.innerText = 'Hide Answer';
        }
    }
</script>
</html>