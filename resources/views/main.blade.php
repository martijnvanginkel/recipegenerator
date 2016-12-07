<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
  <main>
      <img id="logo" src="https://lh3.googleusercontent.com/lHnhHsMON9OT-eFx_gyJz3DT865VpaRJbip-qHCIwakETdJzHbTBz0kCXvGcQ-Amp6vaAzrhztGYyw=w1600-h770-rw" alt="De Sjef Logo">
      @yield('content')
  </main>
  @include('partials._footer')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
