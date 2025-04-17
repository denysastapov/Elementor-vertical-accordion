jQuery(document).ready(function ($) {
  $(".vertical-accordion-widget .accordion-item")
    .first()
    .addClass("active")
    .find(".accordion-content")
    .show();

  $(".vertical-accordion-widget .accordion-header").on("click", function () {
    var $item = $(this).parent(".accordion-item");

    if (!$item.hasClass("active")) {
      $(".vertical-accordion-widget .accordion-item")
        .removeClass("active")
        .find(".accordion-content")
        .hide();

      $item.addClass("active").find(".accordion-content").show();
    }
  });
});
