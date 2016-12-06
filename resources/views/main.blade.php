<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>
  <main>
      @yield('content')
  </main>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @include('partials._footer')
</body>
</html>
