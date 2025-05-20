<?php
require_once __DIR__ . '/../GUI.php';

GUI::getInstance()->addComponentRenderFunction('TopBar', function($props = []) {
    $avatar = isset($props['avatar']) ? $props['avatar'] : '../../assets/avatar.jpg';
    $username = isset($props['username']) ? $props['username'] : 'User Name';
    $role = isset($props['role']) ? $props['role'] : 'Admin';
    $bell = isset($props['bell']) ? $props['bell'] : '../../assets/bell.svg';
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

<style>
.top-bar {
  background: #181818;
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 60px;
  padding: 0 32px;
  width: 100%;
  box-sizing: border-box;
}
.notification {
  position: relative;
  display: flex;
  align-items: center;
}
#bell-btn {
  background: none;
  border: none;
  cursor: pointer;
  outline: none;
  padding: 0;
  position: relative;
}
.bell-img {
  width: 38px;
  height: 38px;
  display: block;
}
.notification-dot {
  position: absolute;
  top: 4px;
  right: 4px;
  width: 14px;
  height: 14px;
  border-radius: 50%;
  border: 2px solid #fff;
  background: #3ec46d;
  transition: background 0.2s;
  box-sizing: border-box;
}
.notification-dot.active {
  background: #e53935;
}
.user-info {
  display: flex;
  align-items: center;
  gap: 10px;
}
.avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #fff;
}
.name {
  font-weight: bold;
  display: block;
}
.role {
  font-size: 0.85em;
  color: #ccc;
  display: block;
}
</style>