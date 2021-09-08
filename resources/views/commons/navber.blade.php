<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">タスクリスト</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          @if (Auth::check())
            {{-- ログアウトへのリンク --}}
            <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト',[],['class'=>'nav-link']) !!}</li>
          @else
            {{-- ユーザ登録ページへのリンク --}}
          <li class="nav-item">
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}
          </li>
          {{-- ログインページへのリンク --}}
          <li class="nav-item">
            {!! link_to_route('login.get', 'ログイン', [], ['class'=>'nav-link']) !!}
          </li>
          @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>