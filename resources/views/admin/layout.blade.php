<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="/admin/menus">Admin Restoran</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/admin/menus">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/tables">Meja</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/orders">Pesanan</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
