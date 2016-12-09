<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
  <main>
      <img id="logo" src={{asset('img/Sjef_logo.png')}} alt="De Sjef Logo">
      <p class="tagline">Laat De Sjef een recept voor je genereren!</p>
      @yield('content')
  </main>
  @include('partials._footer')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
