<?php
session_start();
echo '<nav class="navbar">';
echo '<ul>';
echo '<li><a href="admin.php">Home <i class="fas fa-home"></i></a></li>';
echo '<li class="dropdown">';
echo '<a href="#">Training Management<i class="fas fa-bars"></i></a>';
echo '<div class="dropdown-content">';
echo '<a href="add_training.php">Add Training</a>';
echo '<a href="searchTraining.php">Edit Training</a>';
echo '</div>';
echo '</li>';
echo '<li><a href="manage_request.php">Request Management<i class="fas fa-bell"></i></a></li>';
echo '<li><a href="#">Booking Management<i class="fas fa-calendar"></i></a></li>';
echo '<li><a href="#">Chat<i class="fas fa-comments"></i></a></li>';
echo '<li class="navbar-item"><a href="login.php">Logout <i class="fas fa-user-circle"></i></a></li>';
echo '</ul>';
echo '</nav>';
