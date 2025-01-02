$(function () {
    $(document).scroll(function () {
        let $nav = $("nav");
    
        if($(this).scrollTop() > 800) {
            $nav.removeClass('bg-transparent')
            $nav.addClass('bg-secondary')
        } else {
            $nav.removeClass('bg-secondary')
            $nav.addClass('bg-transparent')
        }
    });
  });