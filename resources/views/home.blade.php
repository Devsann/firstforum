<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Single Page Forum App</title>
  </head>
  <body>
    <div id="app">
      <v-app>
        <app-home/>
      </v-app>

    </div>
  </body>
  <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</html>
