jQuery( document ).ready(function( $ ) {
  
    /*------------------------------------------------
                        Portfolio  
    ------------------------------------------------*/
    var $container = $('#primary div.blog-portfolio');

    var pageNumber = 1;
    var categoryId = $('#main nav.portfolio-filter ul li.active').attr('id')

    function kids_education_load_category_posts(){
        pageNumber++;

        $.ajax({
            type: "POST",
            dataType: "html",
            url: kids_education.ajaxurl,
            data: {action: 'kids_education_pagination_ajax_handler',
                pageNumber: pageNumber,
                categoryId: categoryId,
            },
            success: function(data){
                if( data.length > 0 ){
                    console.log(data);
                    // $container.append(data);
                    // $("#portfolio-loader").addClass("hide");
                    // $("#Ploadmore").removeClass("hide");
                } else {
                    // $("#Ploadmore").addClass("hide");
                    // $("#portfolio-loader").addClass("hide");
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }


    $('#home-pagination').removeAttr('href');
    $("#home-pagination").click(function(e){ // When btn is pressed.
        e.preventDefault();
        kids_education_load_category_posts();
    });

});