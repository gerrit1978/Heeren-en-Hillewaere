<?php if ($header_bg_image): ?>
<div class='header-background'>
  <?php print $header_bg_image; ?>
</div>
<?php endif; ?>

<div class='header-content <?php print $header_classes; ?>'>

<?php if ($header_title): ?>
<h1><?php print $header_title; ?></h1>
<?php endif; ?>

<?php if ($header_text) : ?>
<div class='header-text'>
  <?php print $header_text; ?>
</div>
<?php endif; ?>

</div>

<?php if ($header_icon): ?>
<div class='header-icon'>
  <?php print $header_icon; ?>
</div>
<?php endif; ?>