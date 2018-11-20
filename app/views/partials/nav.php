<ul class="menu padding-vertical-1">
  <li><a href="/">Home</a></li>
  <li><a href="/about">About</a></li>
  <li><a href="/features">Features</a></li>
  <li><a href="/contact">Contact</a></li>
</ul>
<ul class="menu padding-vertical-1">
    <li><a href="/admin">Admin</a></li>
    <?php if (isset($_SESSION['username'])): ?>
      <li><a href="/logout">Logout</a></li>
    <?php endif; ?>
</ul>