(function($){
    $(document).ready(function(){
        clickEvent();
        widthParent();
    })
    function clickEvent() {
        $('.custom-tabs .custom-tab-nav ul li a').on('click',function(event){
            event.preventDefault();
            if(!$(this).parent().hasClass('active')) {
                $('.custom-tabs .custom-tab-nav ul li').removeClass();
                $(this).parent().addClass('active');

            
                var custom_tabs = $('.custom-tabs .custom-tab-content .custom-tab-body-content .custom-tab-item');
                custom_tabs.removeClass('active');
                var tabs = $(this).attr('rel');
                $('#'+tabs).addClass('active');

                var position =  custom_tabs.width() * ( $(this).parent().index());

                if(position != 0) {
                    position = '-' + position;
                }
                custom_tabs.parent().stop(true, false).animate({"left":position}, 700);
            }
        })  
    }

    function widthParent() {
        var custom_tabs = $('.custom-tabs .custom-tab-content .custom-tab-body-content .custom-tab-item');
        var width_tab = custom_tabs.width();
        var parent_tab = width_tab * custom_tabs.length;

        custom_tabs.width(width_tab);
        if(!custom_tabs.hasClass('default-tab')) {
            $('.custom-tabs .custom-tab-content .custom-tab-body-content').width(parent_tab);
            $('.custom-tabs .custom-tab-content .custom-tab-body-content').css("display","flex");
        } else {
            $('.custom-tabs .custom-tab-content .custom-tab-body-content').css('width','100%');
            $('.custom-tabs .custom-tab-content .custom-tab-body-content').css("display","block");
        }
    }



})(jQuery);