@extends('templates.main')


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item dropdown ml-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout_form').submit();" class="ml-4"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                    <form id="logout_form" style="display: none;" action="{{ route('logout') }}" method="POST">
                    @csrf
                    </form>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
