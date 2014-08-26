<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[module]--[key].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
  <?php if ($css): ?>
    <style type="text/css">
      <!--
      <?php print $css ?>
      -->
    </style>
  <?php endif; ?>
  <style type="text/css" media="print">
  </style>
</head>
<body id="mimemail-body" <?php if ($module && $key): print 'class="' . $module . '-' . $key . '"'; endif; ?>>
<table class="body"><tr><td class="center" align="center" valign="top"><center>

  <!-- Header -->
  <table class="row header"><tr><td class="center" align="center"><center>
    <table class="inner"><tr><td>
      <a href="<?php print $base_url; ?>">
        <img src="http://www.galaxiecorp.com/<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
      </a>
      <?php if (isset($region['header'])) print render($region['header']) ?>
    </td></tr></table>
  </center></td></tr></table>

  <!-- Subhead -->
  <table class="row subhead"><tr><td class="center" align="center"><center>
    <table class="inner"><tr><td>
      <h1 class="subject"><?php print $subject; ?></h1>
      <?php if (isset($region['subhead'])) print render($region['subhead']) ?>
    </td></tr></table>
  </td></tr></table>

  <!-- Spacing -->
  <br /><br />
  
  <!-- Body -->
  <table class="row body-content"><tr><td class="center" align="center"><center>
    <table class="inner"><tr><td>
      <?php print $body; ?>
      <?php if (isset($region['content'])) print render($region['content']) ?>
    </td></tr></table>
  </td></tr></table>

  <!-- Spacing -->
  <br /><br />

  <!-- Footer -->
  <table class="row footer"><tr><td class="center" align="center"><center>
    <table class="inner"><tr><td>
      <?php if (isset($region['footer'])) print render($region['footer']) ?>
      <div>
        <p class="tpad bpad">Galaxie Corporation, North American Headquarters<br>4935 Hannan Road, Wayne, MI 48184 USA</p>
        <p><strong>Phone</strong>: <a href="tel:734-727-0600" value="+17347270600" target="_blank">734-727-0600</a></p>
        <p><strong>Fax</strong>: <a href="tel:734-727-0601" value="+17347270601" target="_blank">734-727-0601</a></p>
        <p class="bpad"><strong>Email</strong>: <a href="mailto:machking@galcorp.com" target="_blank">machking@galcorp.com</a></p>   
      </div>
    </td></tr></table>
  </td></tr></table>

</center></td></tr></table>
</body></html>
