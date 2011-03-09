google.load('search','1');

(function($){
    $.fn.wordToPic = function( callback ) {
        var imageSearch = new google.search.ImageSearch();
        imageSearch.setRestriction(google.search.ImageSearch.RESTRICT_IMAGESIZE, google.search.ImageSearch.IMAGESIZE_LARGE);
        imageSearch.setResultSetSize(8);
        imageSearch.setSearchCompleteCallback(this,function(o,e,t){
                o.empty();
                o.append('<img style="height:150px;" alt="'+t+'" src="'+e.results[Math.floor(Math.random()*(e.results.length-1))].tbUrl+'" />');
                callback(o);
            }, [this, imageSearch, this.text()]);
        imageSearch.execute(this.text());
    }
})(jQuery);

$(document).ready( function() {
    if($('#share').length > 0) {
        $('#share').submit(function(e){
            e.preventDefault();
            return false;
        });
    }

    $('#entry').submit(function (event) {
        event.preventDefault();
        var images = $("#getwords").val().replace(/\s+/g,' ').replace(/[:;,.\\\/\'\"!?&]+/g,' ').split(' ');
        if (images.length == 3) {
            var container = $('#result');
            container.addClass('result');
            container.empty();

            container.append('<div class="thumbs"></div>');

            if(container.find('div.thumbs')) {
                container.find('div.thumbs').append('<span id="one">'+images[0]+'</span><span id="two">'+images[1]+'</span><span id="three">'+images[2]+'</span>');
            }
            container.append('<form id="share"><input type="submit" value="Share this 3pic!"/></form>');

            container.find('div.thumbs').find('span').each(function(){
                    $(this).hide();
                    $(this).wordToPic(function(o){
                            o.show();
                        });
                });

            $('#share').submit(function(event) {
                event.preventDefault();
                var one = $('span#one').find('img:first');
                var two = $('span#two').find('img:first');
                var three= $('span#three').find('img:first');
                var words = images;
                $.post("save.php", {
                    story : words[0] + " " + words[1] + " " + words[2],
                    image1 : one.attr('src'),
                    image2 : two.attr('src'),
                    image3 : three.attr('src') 
                    }, function(data) {
                        $('#share').find('input').remove();
                        $('#share').append('<label>Link to this page: <input type="text" value="'+location.href.replace(/\.(...?)\/.*/,".$1/")+data.replace(/\s+/g,'')+'" /></label>');
                        $('#share').find('input[type="text"]').click(function(){$(this).select();});
                        $('#share').unbind('submit');
                        $('#share').submit(function(e){e.preventDefault();return false;});
                    });
                return false;
            });
        }
        return false;
    });
});


