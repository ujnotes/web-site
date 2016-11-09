<div class='center'>
<?php
  $memIDs = getSubComponents($id);
  foreach ($memIDs as $key => $value) {
?>
    <a class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1' href='<?php echo '/'.$value[0] ?>' data-target='<?php echo $value[0] ?>' data-title='<?php echo $value[1] ?>'>
      <span><?php echo $value[1] ?></span>
    </a>
<?php
  }
  {
    if(count($memIDs) > 5 && count($memIDs) % 5) {
      for($i = 5 - count($memIDs) % 5; $i > 0; $i--) {
      ?>
        <div class='sidebar-nav-norm placeholder-empty'></div>
      <?php
      }
    }
  }
?>
</div>
