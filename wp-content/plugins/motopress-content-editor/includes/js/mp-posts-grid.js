(function(c){c(function(){function k(a){var b;a=a.children(".motopress-filter").find(".motopress-active-filter");a.length?(b={},a.each(function(){var a=c(this).closest(".motopress-filter-group").attr("data-group"),e=c(this).attr("data-filter");b[a]=""!==e?[e]:[]})):b=!1;return b}function n(a,b){var d=a.attr("data-shortcode-attrs"),e=a.attr("data-post-id");c.post(MPCEPostsGrid.admin_ajax,{action:"motopress_ce_posts_grid_filter",nonce:MPCEPostsGrid.nonces.motopress_ce_posts_grid_filter,shortcode_attrs:d,
filters:b,post_id:e,page_has_presets:0!==c("#motopress-ce-presets-styles").length},function(b){if(b.success){var p=c(b.data.items),d=c(b.data.load_more),e=c(b.data.pagination);a.children(":not(.motopress-filter)").remove().end().append(p,d,e);b.hasOwnProperty("custom_styles")&&l(b.custom_styles)}})}function q(a,b,d){var e=a.attr("data-shortcode-attrs"),f=a.attr("data-post-id");c.post(MPCEPostsGrid.admin_ajax,{action:"motopress_ce_posts_grid_load_more",nonce:MPCEPostsGrid.nonces.motopress_ce_posts_grid_load_more,
shortcode_attrs:e,filters:d,page:b,post_id:f,page_has_presets:0!==c("#motopress-ce-presets-styles").length},function(b){if(b.success){var d=a.children(".motopress-paged-content"),e=parseInt(d.attr("data-columns")),f=b.data.items,k=c(b.data.load_more);a.children(":not(.motopress-filter, .motopress-paged-content)").remove();for(var g=d.children(".motopress-filter-row:last"),h=g.children(".motopress-filter-col").length;h<e;h++)f.length&&g.append(f.shift());var m=g.clone().empty();c.each(f,function(a,
b){m.append(c(b));if(0===(a+1)%e||f.length===a+1)d.append(m.clone()),m.empty()});b.hasOwnProperty("custom_styles")&&l(b.custom_styles);d.after(k)}})}function l(a){var b=c("#motopress-ce-private-styles");if(a.hasOwnProperty("private")){var d=""!==b.attr("data-posts")?b.attr("data-posts").split(","):[];c.each(d,function(b){delete a["private"][b]});var e=b.text();c.each(a["private"],function(a,b){e+=b;d.push(a)});b.text(e);b.attr("data-posts",d.join(","))}a.hasOwnProperty("presets")&&!c("#motopress-ce-presets-styles").length&&
b.before(a.presets)}function r(a,b,d){var e=a.attr("data-shortcode-attrs"),f=a.attr("data-post-id");c.post(MPCEPostsGrid.admin_ajax,{action:"motopress_ce_posts_grid_turn_page",nonce:MPCEPostsGrid.nonces.motopress_ce_posts_grid_turn_page,shortcode_attrs:e,filters:d,page:b,post_id:f,page_has_presets:0!==c("#motopress-ce-presets-styles").length},function(b){if(b.success){var d=c(b.data.items),e=c(b.data.pagination);a.children(":not(.motopress-filter)").remove().end().append(d,e);b.data.hasOwnProperty("custom_styles")&&
l(b.data.custom_styles)}})}function g(a){a.addClass("ui-state-loading")}var h=c(".motopress-posts-grid-obj");h.on("click",".motopress-filter [data-filter]:not(.motopress-active-filter)",function(a){a.preventDefault();a.stopPropagation();a=c(this).closest(".motopress-posts-grid-obj");var b=c(this).closest(".motopress-filter-group");g(a.children(".motopress-paged-content"));b.find(".ui-state-active").removeClass("ui-state-active motopress-active-filter");c(this).addClass("ui-state-active motopress-active-filter");
a.find(".motopress-filter");b=k(a);n(a,b)});h.on("click",".motopress-posts-grid-pagination a[data-page]",function(a){a.preventDefault();a.stopPropagation();g(c(this).parent());a=c(this).closest(".motopress-posts-grid-obj");var b=c(this).attr("data-page"),d=k(a);r(a,b,d)});h.on("click",".motopress-load-more",function(a){a.preventDefault();a.stopPropagation();a=c(this).closest(".motopress-posts-grid-obj");var b=c(this).attr("data-page"),d=k(a);g(c(this).parent());q(a,b,d)})})})(jQuery);