<header class="p-3">
    <div class="container-fluid"> 
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo URLROOT; ?>" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="<?php echo URLROOT . '/about'; ?>" class="nav-link px-2">About</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn me-2"><a class="text-secondary" href="<?php echo URLROOT . '/users/login'; ?>">Login</a></button>
                <button type="button" class="btn btn-warning"><a class="text-secondary" href="<?php echo URLROOT . '/users/register'; ?>">Sign-up</a></button>
            </div>
        </div>
    </div>
</header>