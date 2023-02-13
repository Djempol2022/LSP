<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
  {{-- <title>LSP SMK N 1 SINTANG</title> --}}
  {{-- BOOTSTRAP CSS --}}
  <link rel="stylesheet" href="/css/app.css">
  {{-- COSTUM CSS --}}
  <link rel="stylesheet" href="/css/costum.css">
  {{-- FAVICON --}}
  {{-- <link rel="shortcut icon" href="images/logo/favicon.svg" type="image/x-icon"> --}}
  <link rel="shortcut icon" href="/images/logo/favicon_lsp.png" type="image/png">
  <link rel="stylesheet" href="/extensions/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/css/simple-datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="/css/simple-datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/select2.min.css">
  <link rel="stylesheet" href="/css/select2-bootstrap-5-theme.min.css">
  <link rel="stylesheet" href="/css/bootstrap-editable.css">
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet" /> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
</head>
