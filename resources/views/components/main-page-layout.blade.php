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
    // Handle filter by search keyword in Tutorial page
    document.addEventListener('DOMContentLoaded', function() {
        let searchBar = document.getElementById('searchBar');
        let groups = document.querySelectorAll('.list-group');

        searchBar.addEventListener('input', function() {
            let searchTerm = searchBar.value.toLowerCase();

            groups.forEach(function(group) {
                let groupName = group.querySelector('h1').textContent.toLowerCase();
                let items = group.querySelectorAll('li');

                // Show all items before applying the filtering logic
                items.forEach(item => {
                    item.style.display = 'block';
                });

                let groupMatch = groupName.includes(searchTerm);
                let itemsMatch = Array.from(items).some(function(item) {
                    return item.textContent.toLowerCase().includes(searchTerm);
                });

                if (searchTerm === '' || groupMatch || itemsMatch) {
                    group.style.display = 'block';
                } else {
                    group.style.display = 'none';
                }

                // If the search term is not empty and there is no group match, hide items without the search term
                if (searchTerm !== '' && !groupMatch) {
                    items.forEach(item => {
                        if (!item.textContent.toLowerCase().includes(searchTerm)) {
                            item.style.display = 'none';
                        }
                    });
                }
            });

            // If the search bar is empty, show all groups and items
            if (searchTerm === '') {
                groups.forEach(function(group) {
                    group.style.display = 'block';
                });
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