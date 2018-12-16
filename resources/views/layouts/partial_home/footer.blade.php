@auth
<footer>
  <div class="container">
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="{{ action('PiekarzController@index') }}">Piekarz</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ action('PieczywoController@index') }}">Pieczywo</a>
    </li>
  </ul>
  </div>
</footer>
@endauth