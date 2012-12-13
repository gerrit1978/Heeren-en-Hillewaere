<?php if ($header_bg_image): ?>
<div class='background'>
  <img src='<?php print $header_bg_image; ?>' />
</div>
<?php endif; ?>

<?php if ($header_title): ?>
<h1><?php print $header_title; ?></h1>
<?php endif; ?>

<?php if ($header_text) : ?>
<div class='content'>
  <?php print $header_text; ?>
</div>
<?php endif; ?>

<?php if ($header_icon): ?>
	<img src='<?php print $header_icon; ?>' />
<?php endif; ?>