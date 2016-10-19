<div class="container">
    <h2>You are in the View: application/view/home/index.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be the homepage.</p>
</div>

<form action="<?php echo URL; ?>home/search" method="POST">
  First name: <input type="text" name="fname"><br>
  <input type="submit" value="Submit">
</form>