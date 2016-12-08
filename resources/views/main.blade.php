<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
  <main>
      <img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo">
      @yield('content')
  </main>
  @include('partials._footer')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
