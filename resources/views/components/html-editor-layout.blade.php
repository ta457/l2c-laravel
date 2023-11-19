<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased overflow-hidden">
  {{ $slot }}
</body>

<script>
  function runCode() {
    // Get the HTML code from the textarea
    var htmlCode = document.getElementById('html-code').value;

    // Get the output container
    var outputContainer = document.getElementById('output-container');

    // Clear previous content
    outputContainer.innerHTML = '';

    // Create an iframe to run the HTML code
    var iframe = document.createElement('iframe');
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = '0';
    outputContainer.appendChild(iframe);

    // Write the HTML code to the iframe
    iframe.contentDocument.write(htmlCode);
    iframe.contentDocument.close();
  }
</script>
</html>