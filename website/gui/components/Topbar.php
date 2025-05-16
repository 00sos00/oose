<?php
require_once __DIR__ . '/../GUI.php';

GUI::getInstance()->addComponentRenderFunction('TopBar', function($props = []) {
    $avatar = isset($props['avatar']) ? $props['avatar'] : 'assets/avatar.jpg';
    $username = isset($props['username']) ? $props['username'] : 'User Name';
    $role = isset($props['role']) ? $props['role'] : 'Admin';
    $bell = isset($props['bell']) ? $props['bell'] : 'assets/bell.svg';
    ob_start();
    ?>
    <div class="top-bar">
      <div class="notification">
        <button id="bell-btn">
          <img src="<?php echo htmlspecialchars($bell); ?>" alt="Bell" class="bell-img">
          <span id="notif-dot" class="notification-dot"></span>
        </button>
      </div>
      <div class="user-info">
        <img src="<?php echo htmlspecialchars($avatar); ?>" alt="User" class="avatar">
        <div>
          <span class="name"><?php echo htmlspecialchars($username); ?></span>
          <span class="role"><?php echo htmlspecialchars($role); ?></span>
        </div>
      </div>
    </div>
    <?php
    return ob_get_clean();
});
?>
