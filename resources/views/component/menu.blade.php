<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;border: 1px #000 solid;border-radius: 12px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Menu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                My Passwords
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Password Categories
            </a>
        </li>
        <li>
            <a href="{{ route('violated') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Violated Passwords
            </a>
        </li>
        <li>
            <a href="{{ route('security') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Security Advice
            </a>
        </li>

    </ul>
    <hr>
</div>