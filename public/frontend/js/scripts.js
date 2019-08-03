$(function(){
    $('.container-news').on('click', '.news-load-more', function(){
        var newsContainer = $("#news-container");
        var url = $('#news-container').attr('data-url');
        var skip = $('#news-container').attr('data-skip');
        $.ajax({
            url: url,
            type:'GET',
            data: {
                skip:skip
            },
            success: function(data){
                var result = jQuery.parseJSON(data);
                    $.each(result, function(idx, obj) {
                        // console.log(obj.result);
                        newsContainer.attr('data-skip', obj.skip);
                        $(obj.result).hide().appendTo(newsContainer).fadeIn('slow');    
                        if(obj.result == ''){
                            $('.news-load-more').css({"display": "none"});
                        }                    
                    });
            }
        });
    });
});