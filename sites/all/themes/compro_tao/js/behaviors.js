/**
 * @file Implementation of Drupal behavior.
 */

(function($) {
/**
 * Wrapper function for Google Analytics events
 */
function ga_event(params) {
  params.splice(0, 0, "_trackEvent");
  if (typeof _gaq === "object") {
    _gaq.push(params);
  }
}

/**
 * jQuery when the DOM is ready.
 */
$(document).ready(function(){
  // Give external links target="_blank"
  var $a = $('a');
  $a.each(function(i) {
    if (this.href.length && this.hostname !== window.location.hostname) {
      $(this).attr('target','_blank');
    }
  });
  
  // Activate fancy tooltips on non-touch screens.
  if (!('ontouchstart' in window) && !('onmsgesturechange' in window)) {
    $('[title]').tipsy();
  }
});

})(jQuery);
