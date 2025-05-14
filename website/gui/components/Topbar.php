<?php
$strippedFileName = basename(__FILE__, ".php");

$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    ob_start();
?>
    <style>
        .topbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .topbar-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            margin: 0;
            font-weight: bold;
            cursor: pointer;
        }

        .user-role {
            margin: 0;
            font-size: 12px;
            color: gray;
        }

        .profile-pic img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
        }

        /* Notification Styles */
        .notification-wrapper {
            position: relative;
        }

        .notifications-dropdown {
            position: absolute;
            top: 40px;
            right: 0;
            background: #2b2b2b;
            color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 250px;
            z-index: 1000;
        }

        .notifications-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #444;
        }

        .notifications-header h3 {
            margin: 0;
            font-size: 16px;
            color: #f5c518;
        }

        .notifications-header a {
            font-size: 12px;
            color: #fff;
            text-decoration: none;
        }

        .notifications-header a:hover {
            text-decoration: underline;
        }

        .notification-list {
            padding: 10px 15px;
            max-height: 200px;
            overflow-y: auto;
        }

        .notification-list p {
            margin: 5px 0;
            padding: 5px;
            font-size: 14px;
            border-bottom: 1px solid #444;
        }

        .notifications-footer {
            padding: 10px 15px;
            text-align: center;
            border-top: 1px solid #444;
        }

        .notifications-footer a {
            font-size: 12px;
            color: #fff;
            text-decoration: none;
        }

        .notifications-footer a:hover {
            text-decoration: underline;
        }

        /* Dot color for unread notifications */
        .notification-unread .topbar-icon {
            position: relative;
        }

        .notification-unread .topbar-icon::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background: red;
            border-radius: 50%;
        }
    </style>

    <div class="Topbar">
        <div class="Topbar-right">
            <!-- Notification Icon -->
            <div class="notification-wrapper">
                <img src="assets/notification-icon.svg" alt="Notifications" class="Topbar-icon" id="notification-icon" />
                <!-- Notification Dropdown -->
                <div class="notifications-dropdown" style="display: none;">
                    <div class="notifications-header">
                        <h3>Notifications</h3>
                        <a href="#" id="mark-all-read">Mark all as read</a>
                    </div>
                    <div class="notification-list">
                        <!-- Notifications will be added dynamically via JavaScript -->
                    </div>
                    <div class="notifications-footer">
                        <a href="#" id="view-all-notifications">View All</a>
                    </div>
                </div>
            </div>

            <div class="user-info">
                <p class="user-name" id="user-name"><?= $props["user-name"] ?? "User Name" ?></p>
                <p class="user-role"><?= $props["user-role"] ?? "Role" ?></p>
            </div>

            <div class="profile-pic">
                <img src="<?= $props["profile-img"] ?? 'assets/default-profile.svg' ?>" alt="Profile Picture" id="profile-img" />
                <input type="file" id="profile-img-input" accept="image/*" style="display: none;" />
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // DOM Elements
            const notificationIcon = document.querySelector('#notification-icon');
            const notificationDropdown = document.querySelector('.notifications-dropdown');
            const notificationList = document.querySelector('.notification-list');
            const markAllReadLink = document.querySelector('#mark-all-read');
            const viewAllLink = document.querySelector('#view-all-notifications');

            // Sample notification data 

            let notifications = [
                { id: 1, message: "You have a new request", read: false },
                { id: 2, message: "System updated", read: true }
            ];

            // Function to render notifications
            function renderNotifications() {
                notificationList.innerHTML = ''; // Clear the list
                let hasUnread = false;

                if (notifications.length === 0) {
                    const p = document.createElement('p');
                    p.textContent = 'No notifications';
                    p.style.textAlign = 'center';
                    p.style.color = '#888';
                    notificationList.appendChild(p);
                } else {
                    notifications.forEach(notification => {
                        const p = document.createElement('p');
                        p.textContent = notification.message;
                        if (!notification.read) {
                            p.style.fontWeight = 'bold';
                            p.style.color = '#fff';
                            hasUnread = true;
                        }
                        notificationList.appendChild(p);
                    });
                }

                // Change dot color if there are unread notifications
                if (hasUnread) {
                    notificationIcon.parentElement.classList.add('notification-unread');
                } else {
                    notificationIcon.parentElement.classList.remove('notification-unread');
                }
            }

            // Show/hide notification dropdown on click
            notificationIcon.addEventListener('click', (e) => {
                e.stopPropagation();
                const isVisible = notificationDropdown.style.display === 'block';
                notificationDropdown.style.display = isVisible ? 'none' : 'block';

                if (!isVisible) {
                    renderNotifications();
                }
            });

            // Hide dropdown when clicking outside
            document.addEventListener('click', () => {
                notificationDropdown.style.display = 'none';
            });

            // Mark all as read
            markAllReadLink.addEventListener('click', (e) => {
                e.preventDefault();
                notifications = notifications.map(notif => ({ ...notif, read: true }));
                renderNotifications();
            });

            // View All (replace the link if you have a full notifications page)
            viewAllLink.addEventListener('click', (e) => {
                e.preventDefault();
                window.location.href = 'all-notifications.html'; // Replace with your link
            });

            // Simulate a new notification (for testing, replace with API or WebSocket)
            setTimeout(() => {
                notifications.push({ id: 3, message: "New notification!", read: false });
                renderNotifications();
            }, 5000);
        });
    </script>
<?php
    return ob_get_clean();
});
?>