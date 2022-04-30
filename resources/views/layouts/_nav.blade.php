<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle"  href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        @foreach ($categories as $category)
            <a class="dropdown-item" href="{{ route('category.show', $category) }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</li>
