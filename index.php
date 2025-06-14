<?php
session_start();
$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username = $is_logged_in ? $_SESSION['username'] : '';
$email = $is_logged_in ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fairway Friends</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <nav>
    <div class="nav-container">
      <div class="nav-left">
        <div class="logo-circle">
          <!-- Target SVG Icon -->
          <svg width="24" height="24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <circle cx="12" cy="12" r="6"/>
            <circle cx="12" cy="12" r="2"/>
          </svg>
        </div>
        <div>
          <h1>Fairway Friends</h1>
          <p class="subtitle">Score. Compete. Connect on the green.</p>
        </div>
      </div>
      <div class="nav-right">
        <a class="active" href="index.php">Home</a>
        <a href="weather.html">Weather</a>
        <a href="courses.html">Courses</a>
        <a href="leaderboard.html">Leaderboard</a>
        <?php if ($is_logged_in): ?>
          <div class="user-profile">
            <div class="profile-icon"><?php echo strtoupper($username[0]); ?></div>
            <div class="profile-dropdown">
              <a href="profile.html">Profile</a>
              <a href="settings.html">Settings</a>
              <div class="divider"></div>
              <a href="logout.php">Logout</a>
            </div>
          </div>
        <?php else: ?>
          <a href="login.php" class="btn-outline">Login</a>
          <a href="signup.php" class="btn-primary">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <main>
    <section class="welcome-card">
      <h2>Welcome to Fairway Friends</h2>
      <p>Ready to hit the green? Let's get your round started!</p>
      <div class="welcome-actions">
        <button class="btn-primary">+ New Match</button>
        <button class="btn-outline">Join Match</button>
      </div>
    </section>
    <section class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">
          <svg width="32" height="32" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="16" cy="16" r="14"/>
            <circle cx="16" cy="16" r="8"/>
            <circle cx="16" cy="16" r="3"/>
          </svg>
        </div>
        <div class="stat-value">12.5</div>
        <div class="stat-label">Current Handicap</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <svg width="32" height="32" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="28 10 18 22 11 14 4 28"/>
            <polyline points="22 10 28 10 28 16"/>
          </svg>
        </div>
        <div class="stat-value">85</div>
        <div class="stat-label">Best Round</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <svg width="32" height="32" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M8 12H6a3 3 0 0 1 0-6h2"/>
            <path d="M24 12h2a3 3 0 0 0 0-6h-2"/>
            <path d="M6 28h20"/>
            <path d="M13 20v4c0 .8-.7 1.4-1.5 1.7C9.7 26.5 8 29 8 32"/>
            <path d="M19 20v4c0 .8.7 1.4 1.5 1.7C22.3 26.5 24 29 24 32"/>
            <path d="M24 4H8v10a8 8 0 0 0 16 0V4Z"/>
          </svg>
        </div>
        <div class="stat-value">3</div>
        <div class="stat-label">Active Tournaments</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <svg width="32" height="32" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M24.5 28H12a12 12 0 1 1 11.5-15.5h3a7.5 7.5 0 1 1 0 15Z"/>
          </svg>
        </div>
        <div class="stat-value">72°F</div>
        <div class="stat-label">Perfect Weather</div>
      </div>
    </section>
    <section class="bottom-grid">
      <div class="activity-card">
        <h3><svg width="20" height="20" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle"><circle cx="9" cy="7" r="4"/><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Friends Activity</h3>
        <p class="card-subtitle">See what your friends are up to</p>
        <div class="activity-list">
          <div class="activity">
            <div class="avatar">JD</div>
            <div>
              <div class="activity-title">John shot 78 at Pebble Beach</div>
              <div class="activity-desc">2 hours ago</div>
            </div>
          </div>
          <div class="activity">
            <div class="avatar">MS</div>
            <div>
              <div class="activity-title">Mike joined Spring Championship</div>
              <div class="activity-desc">1 day ago</div>
            </div>
          </div>
        </div>
        <a href="#" class="view-link">View Leaderboard</a>
      </div>
    </section>
  </main>
  <script src="auth.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const profileIcon = document.querySelector('.profile-icon');
      const dropdown = document.querySelector('.profile-dropdown');
      if (profileIcon && dropdown) {
        profileIcon.addEventListener('click', function(e) {
          e.stopPropagation();
          dropdown.classList.toggle('active');
        });
        document.addEventListener('click', function() {
          dropdown.classList.remove('active');
        });
      }
    });
  </script>
</body>
</html>