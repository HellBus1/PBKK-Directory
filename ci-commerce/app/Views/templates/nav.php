<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><strong>SHOPII</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="mb-2 navbar-nav me-auto mb-lg-0">
        <?php if (session('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/cart">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/transactions">Orders</a>
          </li>
        <?php endif ?>
      </ul>
      <form class="d-flex">
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <?php if (session('logged_in')) : ?>
              <a class="nav-link" href="/logout">Logout</a>
            <?php else : ?>
              <a class="nav-link" href="/login">Login</a>
            <?php endif ?>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>