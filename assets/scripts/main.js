/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions
  var krNamespace = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        krFunctions.globalController();
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        console.log($('.open-content'));
        // JavaScript to be fired on the home page
        krFunctions.homeController();
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = krNamespace;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


// Declare additional namespaces
var krFunctions = krFunctions || {};
var $j = jQuery;
krFunctions = {

  settings: {
    name: "foo",
    selector: "home"
  }, /* END settings */

  /* Reference: http://getbootstrap.com/css/#grid-options
  xs: width <768px
  sm: width 768-992
  md: width 992-1200
  lg: width >1200
  */
  globalController: function() {
    var k = this;
    k.p(this.settings.name);
    k.p(this.settings.selector);
  }, /* END globalController */

  homeController: function() {
    var k = this;
    var x = $('.open-content');
    k.p(x);
  }, /* END homeController */

  p: function(printTarget) {
    if (!arguments.length) {
      console.log("needs input");
      return false;
    }
    console.log(printTarget);  
    return true;
  } /* END p */

};