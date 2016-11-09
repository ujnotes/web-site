<?php
  $prevId = getPrevId($id);
  $parentId = getParentId($id);
  $nextId = getNextId($id);
?>
<div class='center'>
  <a id='nav-menu-prev'
  <?php if($prevId != "") { ?>
    class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1' href='<?php echo "/".$prevId ?>' data-target='<?php echo $prevId ?>' data-title='<?php echo getComponentTitle($prevId) ?>' >
    <span class='arrow'>&#x25C1;</span><span><?php echo getComponentTitle($prevId) ?></span>
  <?php }
    else { ?>
    class='XURL_disabled sidebar-nav-norm sidebar-nav-l-1' >
    &nbsp;
  <?php } ?>
  </a>
  <a id='nav-menu-up' class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1' href='<?php echo "/".$parentId ?>' data-target='<?php echo $parentId ?>' data-title='<?php echo getComponentTitle($parentId) ?>'>
    <span><?php echo getComponentTitle($parentId) ?></span><span class='arrow'>&#x25B3;</span>
  </a>
  <a id='nav-menu-next'
  <?php if($nextId != "") {?>
    class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1' href='<?php echo "/".$nextId ?>' data-target='<?php echo $nextId ?>' data-title='<?php echo getComponentTitle($nextId) ?>' >
    <span><?php echo getComponentTitle($nextId) ?></span><span class='arrow'>&#x25B7;</span>
  <?php }
    else { ?>
    class='XURL_disabled sidebar-nav-norm sidebar-nav-l-1' >
    &nbsp;
  <?php } ?>
  </a>
</div>
