<?php
  if($id == 'root')
    echo '&nbsp;';
  else {
?>
  <a class='XURL content-link' href='/' data-target='root' data-title=''>&#8962; </a>
  <span class='path-separator'>\</span>
<?php
    foreach (getComponentPathStylized($id) as $key => $value) {
?>
    <a class='XURL content-link' href='<?php echo '/'.$value[0] ?>' data-target='<?php echo $value[0] ?>' data-title='<?php echo $value[1] ?>'>
      <?php echo $value[1] ?>
    </a>
    <span class='path-separator'>\</span>
<?php
    }
  }
?>
