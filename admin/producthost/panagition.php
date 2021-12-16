<div id="pagination">
<?php

if ($current_page > 2) {
  $first_page = 1;
?>
  <a class="page-item" href="?per_page=<?= $item_page ?>&page=<?= $first_page ?>">First</a>
<?php }
if ($current_page > 1) {
  $prev_page = $current_page-1;
?>
  <a class="page-item" href="?per_page=<?= $item_page ?>&page=<?= $prev_page ?>">Prev</a>
<?php
}
?>

<?php for ($num = 1; $num <= $totalPage; $num++) { ?>
  <?php if ($num != $current_page) { ?>
    <?php if ($num > $current_page - 2 && $num < $current_page + 2) { ?>
      <a class="page-item" href="?per_page=<?= $item_page ?>&page=<?= $num ?>"><?= $num ?></a>
    <?php } ?>
  <?php } else { ?>
    <strong class="current-item page-item "><?= $num ?></strong>
  <?php } ?>
<?php } ?>

<?php
if ($current_page < $totalPage - 1) {
  $next_page = $current_page+1;
?>
  <a class="page-item" href="?per_page=<?= $item_page ?>&page=<?= $next_page ?>">Next</a>
<?php }
if ($current_page < $totalPage - 2) {
  $end_page = $totalPage
?>
  <a class="page-item" href="?per_page=<?= $item_page ?>&page=<?= $end_page ?>"> Last</a>
<?php
}
?>
</div>