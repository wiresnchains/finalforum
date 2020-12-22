<div class="bg-light p-3 mb-3">
  <a href="/"><h3 class="m-0" style="display: inline"><?php echo $locale_home ?></h3></a>
  <?php
  if (!empty($_SESSION['npb-5jkl'])) {
    echo "<p style='display: inline'> </p>";
    echo "<a href='/admin'><h3 class='m-0' style='display: inline'>" . $locale_admin . "</h3></a>";
  }
  if (!empty($_SESSION['nkm-5jkl'])) {
    echo "<p style='display: inline'> </p>";
    echo "<a href='/profiles/my'><h3 class='m-0' style='display: inline'>" . $locale_my_profile . "</h3></a>";
  }
  else {
    echo "<p style='display: inline'> </p>";
    echo "<a href='/profiles/login'><h3 class='m-0' style='display: inline'>" . $locale_login . "</h3></a>";
    echo "<p style='display: inline'> </p>";
    echo "<a href='/profiles/register'><h3 class='m-0' style='display: inline'>" . $locale_register . "</h3></a>";
  }
  ?>
</div>
