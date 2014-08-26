<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php if ($block->subject): ?>
  <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
<?php endif;?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
    OR DID IT!?
  </div>
</div>
