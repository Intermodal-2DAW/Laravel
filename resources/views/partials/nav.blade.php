

  <nav class="navbar navbar-expand-sm bg-success  navbar-dark ps-5"> <!--bg-success navbar-light-->
    <div class="container-fluid">
      <a class="navbar-brand" href=" {{ route('posts.start')}}">Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{'posts_list'}}">List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{'posts_tab'}}">File</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{'create'}}">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{'edit/1'}}">Edit</a>
          </li>

          <li>
            @if(auth()->check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.create') }}">New Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
