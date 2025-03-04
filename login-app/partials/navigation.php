


<nav>
  <ul>
  <li>
    <a class="<?php echo setActiveClass('index.php'); ?>" href="index.php">Home</a>
    </li>
    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <li>
      <a class="<?php echo setActiveClass('admin.php'); ?>" href="admin.php">Admin</a>
    </li>
    <li>
      <a class="<?php echo setActiveClass('logout.php'); ?>" href="logout.php">Logout</a>
    </li>
    <?php else: ?>
      <li>
      <a class="<?php echo setActiveClass('register.php'); ?>" href="register.php">Register</a>
    </li>  
      <li>
      <a class="<?php echo setActiveClass('login.php'); ?>" href="login.php">Login</a>
    </li>
    <?php endif; ?>
    </ul>
    </nav>