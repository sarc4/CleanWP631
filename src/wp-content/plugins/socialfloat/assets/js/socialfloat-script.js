jQuery(document).ready(function($) {
    
    // For each article
    $("article .inside-article").each(function() {

        var figure  = $(this).find("figure");
        var img     = figure.find("img");
        var socialfloat_feed_container = $(this).find(".socialfloat-feed-container");

        var entry_has_image = ( (img.length > 0) ? true : false );

        if ( entry_has_image ) {
            // Entry with image
            img.css("width", "600");
            img.css("height", "400");
            
            socialfloat_feed_container.css("float", "right");
            figure.append(socialfloat_feed_container);
            
        } else {
            // Entry without image
            var socialfloat_feed_list = socialfloat_feed_container.find("ul.socialfloat-feed-list");
            socialfloat_feed_list.removeClass("socialfloat-feed-list");
            socialfloat_feed_list.addClass("socialfloat-feed-list-horizontal");
            
            var entry_meta = $(this).find("footer.entry-meta");
            entry_meta.after(socialfloat_feed_container);

        }
        
    });

    

});
