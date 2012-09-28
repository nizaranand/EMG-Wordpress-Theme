/*
 * Aligns the center and left sections on the home page to have the same height.
 * The feed height will always be slightly less than the center height.
 */ 

(function ($) {
    $(document).ready(function () {
        if (wordpress_template_used === "template-home.php") {
          var home_col_center_height = $("#home-center-column").height();
          while (home_col_center_height < $("#home-left-column").height()) {
            $(".feed-post-left").last().remove();
          }
        }
    });
})(jQuery);