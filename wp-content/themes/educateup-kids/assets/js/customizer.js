(function($) {

    const educateup_kids_section_lists = ['categories', 'project', 'testimonial'];
    educateup_kids_section_lists.forEach(educateup_kids_homepage_scroll_preview);

    function educateup_kids_homepage_scroll_preview(item, index) {
        // Collect information from customize-controls.js about which panels are opening.
        wp.customize.bind('preview-ready', function() {

            // Initially hide the theme option placeholders on load.
            $('.panel-placeholder').hide();
            item = item.replace('-', '_');
            wp.customize.preview.bind(item, function(data) {
                // Only on the front page.
                if (!$('body').hasClass('home')) {
                    return;
                }

                // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
                if (true === data.expanded) {
                    $('html, body').animate({
                        'scrollTop': $('#educateup_kids_' + item + '_section').position().top
                    });
                }
            });

        });
    }

}(jQuery));