<?php
include('sessionManager.php');
new sessionManager();
echo $_SESSION['username'];