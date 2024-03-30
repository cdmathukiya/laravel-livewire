<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Include any CSS or meta tags here -->
<style>
    .modal-backdrop {
    backdrop-filter: blur(1px); /* Adjust the blur intensity as needed */
    background-color: transparent !important;
}
</style>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Your navigation or header content -->

    <!-- Yield the Livewire component content -->
    @yield('content')
    <!-- Your footer content or other scripts -->
    @livewireScripts
</body>
</html>
