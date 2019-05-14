<div class="flash-message">
  @foreach (['danger', 'warning', 'success'] as $msg)
    @if(Session::has($msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
      <script>
        var s = document.getElementsByClassName('flash-message')[0].style;
        s.opacity = 1;
        (function fade(){(s.opacity-=.05)<0?s.opacity=0:setTimeout(fade,200)})();
      </script>    
    @endif
  @endforeach

</div>