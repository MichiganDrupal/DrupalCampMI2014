<?php if (!empty($pre_object)) print render($pre_object) ?>

<div class="<?php print $classes ?>" <?php print ($attributes) ?>>
  <?php if (!empty($title_prefix)) print render($title_prefix); ?>
  <?php if (!empty($title_suffix)) print render($title_suffix); ?>
  
  <?php if (!empty($submitted)): ?>
    <div class="submitted"><?php print $submitted ?></div>
  <?php endif; ?>

  <?php if (!empty($content)): ?>
    <div class="content">
      <?php print render($content) ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($links)): ?>
    <div class="links">
      <?php print render($links) ?>
    </div>
  <?php endif; ?>
</div>

<?php if (!empty($post_object)) print render($post_object) ?>
