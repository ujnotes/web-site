<?php
  $prevId = getPrevId($id);
  $parentId = getParentId($id);
  $nextId = getNextId($id);
?>
<div id='nav-list' class='center'>
  <a id='nav-menu-prev'
  <?php if($prevId != "") { ?>
    class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1' href='<?php echo "/".$prevId ?>' data-target='<?php echo $prevId ?>' data-title='<?php echo getComponentTitle($prevId) ?>' >
    <div class='arrow'>&#x25C1;</div><div><?php echo getComponentTitle($prevId) ?></div>
  <?php }
    else { ?>
    class='XURL_disabled sidebar-nav-norm sidebar-nav-l-1' >
    &nbsp;
  <?php } ?>
  </a>
  <a id='nav-menu-next'
  <?php if($nextId != "") {?>
    class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1' href='<?php echo "/".$nextId ?>' data-target='<?php echo $nextId ?>' data-title='<?php echo getComponentTitle($nextId) ?>' >
    <div><?php echo getComponentTitle($nextId) ?></div><div class='arrow'>&#x25B7;</div>
  <?php }
    else { ?>
    class='XURL_disabled sidebar-nav-norm sidebar-nav-l-1' >
    &nbsp;
  <?php } ?>
  </a>
	<a id='nav-menu-up' class='XURL XURL_ sidebar-nav-norm sidebar-nav-l-1 <?php if($parentId == "root") echo 'center center-arrow'?>' href='<?php echo "/".$parentId ?>' data-target='<?php echo $parentId ?>' data-title='<?php echo getComponentTitle($parentId) ?>'>
		<div><?php if($parentId != "root") echo getComponentTitle($parentId); ?></div><div class='arrow'>&#x25B3;</div>
	</a>
</div>
