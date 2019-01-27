<ul class="menu padding-vertical-1">
  <li><a href="/">Home</a></li>
  <li><a href="/about">About</a></li>
  <li><a href="/features">Features</a></li>
  <li><a href="/contact">Contact</a></li>
</ul>
<ul class="menu padding-vertical-1">
    <?php if (!isset($_SESSION['username'])): ?>
      <li><a href="/admin">Login</a></li>
    <?php endif; ?>
    <?php if (isset($_SESSION['username'])): ?>
      <li><a href="/admin">Dashboard</a></li>
      <li><a href="/logout">Logout</a></li>
    <?php endif; ?>
</ul>