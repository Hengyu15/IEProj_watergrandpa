(function(api) {

    const educateup_kids_section_lists = ['categories', 'project', 'testimonial'];

    educateup_kids_section_lists.forEach(educateup_kids_homepage_scroll);

    function educateup_kids_homepage_scroll(item, index) {
        // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
        item = item.replace('-', '_');
        wp.customize.section('educateup_kids_' + item + '_section', function(section) {
            section.expanded.bind(function(isExpanding) {
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                wp.customize.previewer.send(item, { expanded: isExpanding });
            });
        });
    }

})(wp.customize);