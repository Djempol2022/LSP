<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{{ config('app.name') }}</title>

  {{-- BOOTSTRAP CSS --}}
  {{-- <link rel="stylesheet" href="/css/pdf.css"> --}}

</head>

<html lang="en">


<body>
  <div id="app">
    @yield('main-section')
  </div>
</body>

</html>
