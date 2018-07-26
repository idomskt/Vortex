<?php 
    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_script('archive', get_stylesheet_directory_uri() . '/scripts/archive-template.js', array(), '1.0.0', true);
    });


    function custom_exclusive_permalink($url) {
        // split the string by '/' into an array
        $arr = explode('/', $url);
        // get the slug from the end of the array, at last index or second to last
        $slug = array_slice($arr, ((end($arr) == '') ? -2 : -1))[0];
        // get the post that is a custom post type of download
        $post = get_page_by_path($slug, OBJECT, 'download');
        // check if post is in custom taxonomy
        if (has_term('exclusive', 'download_category', $post)) {
            // remove substring from string, this will link to the post of page post type
            return str_replace('/downloads', '', $url);
        }
        // if not, return the url as is
        return $url;
    }
?>
<?php 
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('archive', get_stylesheet_directory_uri() . '/scripts/archive-template.js', array(), '1.0.0', true);
});
?>
<?php get_header(); ?>

<!-- Unlimited Downloads Banner -->
<div class="outerSection DA-2">
<div class="innerSection">
<a href="https://www.vortex-success.com/unlimited-downloads/" target="_blank"><img src="https://www.vortex-success.com/wp-content/uploads/2018/06/Audio-Library-Banner-4.jpg" style="width: 100%; border: 1px solid #333333; box-sizing: border-box;" alt=""></a> 
</div>
</div>
<!-- Tab Container -->
<div class="tabContainer" style="padding: 0 10px;">      
    <div class="outterSection section-row section-row-align-top sidebar-and-content-outer basic-membership">
        <div class="innerSection">
            <div class="inside-section-wrapper" style="text-align: left;">
                <div class="section-row section-row-align-top sidebar-and-content-inner"> 
                    <div class="inside-section-column-50 inside-section-column-left da-sidebar">
                        <div class="inside-section-column">
                            <?php 
                                $hidden = [
                                    'Exclusive',
                                    'Exclusive video'
                                ];
                            
                                $noButton = [
                                    'Lose Weight',
                                    'Relaxation',
                                    'Happiness',
                                    'Gratitude',
                                    'Law Of Attraction',
                                    'Pure Energy Charge',
                                    'Health And Well Being',
                                    'Chakra Healing',
                                    'Enhance Intelligence',
                                    'Positive Thinking',
                                    'Sleep Aid',
                                    'Schumann Resonance',
                                    'Solfeggio Frequencies'
                                ];

                             
//Categories List: 
//'Attract Love' => 272,
//'Attract Money' => 271,
//'Self Confidence' => 269,
//'Lose Weight' => 290,
//'Relaxation' => 5,
//'Relaxation' => 273,
//'Depression And Anxiety' => 266,
//'Personal Growth' => 818,
//'Trauma Recovery' => 278,
//'Gratitude' => 284,
//'Law Of Attraction' => 279,
//'Pure Energy Charge' => 274,
//'Health And Well Being' => 283,
//'Chakra Healing' => 277,
//'Enhance Intelligence' => 276,
//'Positive Thinking' => 275,
//'Sleep Aid' => 270,
//'Schumann Resonance' => 285,
//'Solfeggio Frequencies' => 286,
//'Exlusive' => 910,
//'Exlusive Videos' => 919,
                                $categories = get_terms([
                                    'taxonomy' => 'download_category',
                                    'include' => '272, 271, 269, 290, 5, 273, 266, 818, 278, 284, 279, 274, 283, 277, 276, 275, 270, 285, 286, 910, 919',
                                    'orderby' => 'include'
                                    
                                    ]);
                            
                            
                            ?>
                                <div class="download-search">
                                    <form class="download-search-form">
                                        <fieldset>
                                            <input type="search" name="custom_search" value="" placeholder="Search Downloads">
                                        </fieldset>
                                    </form>
                                </div>
                                
                                <div class="categoriesfilter widget-wrapper">
                                    <div class="duplicated-categories-h2">
                                        <button class="toggle">Categories:</button>
                                    </div>
                                    <div id="categories">
                                    <h2>Categories:</h2>
                                    
                                    <ul>
                                        <li><button data-group="show-all">Show All</button></li>
                                        <?php foreach ($categories as $cat) : ?>
                                            <?php if (!in_array($cat->name, $hidden)) : ?>
                                                <li><button data-group="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></button></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                    </div>
                                </div>
                                
                                <div class="sidebarUnlimitedDownloads">
                                    <div class="sidebarBanner">
                                      <a href="/unlimited-downloads"><img src="https://www.vortex-success.com/wp-content/uploads/2018/06/Archive-Downloads-Sidebar-Banner.jpg" alt="" style="border: 1px solid #333333; box-sizing: border-box;"></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="inside-section-column-50 inside-section-column-right da-content">
                        <div class="inside-section-column">
                            <ul class="tabs audio-library-tabs">
                                <li class="tab-link tab-link-1 current" data-tab="audio-library" style="margin-right: 5px;">Audio Library</li>
                                <li class="tab-link tab-link-2" data-tab="exclusive-library">Exclusive Library</li>
                            </ul>
                            <div id="audio-library" class="tab-content current">
                                <div id="filterResults" class="edd_downloads_list edd_download_columns_4">
                                    
                                </div>
                                   <div id="membershipPlans" class="edd_download_columns_4" style="display: none;">
                                    <div class="edd_download membership-plans-audio-library">
                                        <div class="edd_download_inner">
                                            <div class="edd_download_image">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/" title=""><img src="https://www.vortex-success.com/wp-content/uploads/2017/12/Basic-Plan-Audio-Library-1.jpg" alt=""></a>
                                                <div class="catInner">
                                                    <div class="catButtons">
                                                        <div class="edd_download_purchase_form">
                                                            <div class="edd_purchase_submit_wrapper">
                                                                <a href="http://www.vortex-success.com/membership/basic/" class="hoverBuyButton">Register!</a>
                                                            </div><!--end .edd_purchase_submit_wrapper-->		
                                                        </div><!--end .edd_download_purchase_form-->       
                                                    </div>
                                                <a class="moreInfoHover" href="https://www.vortex-success.com/unlimited-downloads/">More Information</a>
                                                </div>
                                            </div>
                                            <h3 class="edd_download_title">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/">Unlimited Downloads - Basic Plan</a>
                                            </h3>
                                            <div class="edd_download_excerpt">
                                                <p>Unlimited downloads of all of our 200+ audio library sessions! High quality, updated regularly, keep files forever!</p>
                                            </div>
                                            <div class="edd_download_buy_button_price">
                                                <p><span class="edd_price">Only &#36;67!</span></p>
                                            </div>
                                            <div class="edd_download_buy_button_moreinfo">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/">More Information</a>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="edd_download membership-plans-audio-library">
                                        <div class="edd_download_inner">
                                            <div class="edd_download_image">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/" title=""><img src="https://www.vortex-success.com/wp-content/uploads/2017/12/Basic-Plan-Audio-Library-1.jpg" alt=""></a>
                                                <div class="catInner">
                                                    <div class="catButtons">
                                                        <div class="edd_download_purchase_form">
                                                            <div class="edd_purchase_submit_wrapper">
                                                                <a href="http://www.vortex-success.com/membership/basic/" class="hoverBuyButton">Register!</a>
                                                            </div><!--end .edd_purchase_submit_wrapper-->		
                                                        </div><!--end .edd_download_purchase_form-->       
                                                    </div>
                                                <a class="moreInfoHover" href="https://www.vortex-success.com/unlimited-downloads/">More Information</a>
                                                </div>
                                            </div>
                                            <h3 class="edd_download_title">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/">Unlimited Downloads - Basic Plan</a>
                                            </h3>
                                            <div class="edd_download_excerpt">
                                                <p>Unlimited downloads of all of our 200+ audio library sessions! High quality, updated regularly, keep files forever!</p>
                                            </div>
                                            <div class="edd_download_buy_button_price">
                                                <p><span class="edd_price">Only &#36;67!</span></p>
                                            </div>
                                            <div class="edd_download_buy_button_moreinfo">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/">More Information</a>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="edd_download membership-plans-audio-library">
                                        <div class="edd_download_inner">
                                            <div class="edd_download_image">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/" title=""><img src="https://www.vortex-success.com/wp-content/uploads/2017/12/Basic-Plan-Audio-Library-1.jpg" alt=""></a>
                                                <div class="catInner">
                                                    <div class="catButtons">
                                                        <div class="edd_download_purchase_form">
                                                            <div class="edd_purchase_submit_wrapper">
                                                                <a href="http://www.vortex-success.com/membership/basic/" class="hoverBuyButton">Register!</a>
                                                            </div><!--end .edd_purchase_submit_wrapper-->		
                                                        </div><!--end .edd_download_purchase_form-->       
                                                    </div>
                                                <a class="moreInfoHover" href="https://www.vortex-success.com/unlimited-downloads/">More Information</a>
                                                </div>
                                            </div>
                                            <h3 class="edd_download_title">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/">Unlimited Downloads - Basic Plan</a>
                                            </h3>
                                            <div class="edd_download_excerpt">
                                                <p>Unlimited downloads of all of our 200+ audio library sessions! High quality, updated regularly, keep files forever!</p>
                                            </div>
                                            <div class="edd_download_buy_button_price">
                                                <p><span class="edd_price">Only &#36;67!</span></p>
                                            </div>
                                            <div class="edd_download_buy_button_moreinfo">
                                                <a href="https://www.vortex-success.com/unlimited-downloads/">More Information</a>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                
                                <div id="audio-library-content">
                                    <div id="controls">  
                                        <button data-section="grid">Grid</button>
                                        <button data-section="list">List</button>
                                    </div>
                                    <div id="grid" class="section">
                                    
                                    <div id="mostrecent"><h2>Most Recent Uploads</h2>
                                    <?php echo do_shortcode('[downloads number="4" columns="4" exclude_category="910" pagination="false"]'); ?></div>
                                    
                                    <?php add_filter('the_permalink', 'custom_exclusive_permalink'); ?>
                                        <?php foreach ($categories as $cat) : ?>
                                            <div id="<?php echo $cat->slug; ?>" class="download-category" <?php echo in_array($cat->name, $hidden) ? "hidden" : ''; ?>>
                                                <h2><?php echo $cat->name; ?></h2>
                                                <div class="collapsable">
                                                    <div class="storefront">
                                                        <?php echo do_shortcode('[downloads number="100" columns="4" relation="AND" category="'.$cat->slug.'" tags="storefront" orderby="title" order="ASC"]'); ?>
                                                    </div>
                                                    <div class="exclude" style="display:none;">
                                                        <?php echo do_shortcode('[downloads number="100" columns="4" category="'.$cat->slug.'" exclude_tags="storefront" orderby="title" order="ASC"]'); ?>
                                                    </div>
                                                    <?php if (!in_array($cat->name, $noButton)) : ?>
                                                    <button class="showmore-btn">Show More</button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div id="list" class="section" style="display: none;">
                                       <div id="mostrecent" class="download-category"><h2>Most Recent Uploads</h2>
                                    <?php echo do_shortcode('[downloads number="10" columns="1" thumbnails="false" Price="no" excerpt="no" full_content="no" buy_button="no" pagination="false"]'); ?></div>
                                        <?php foreach ($categories as $cat) : ?>
                                            <div id="<?php echo $cat->slug; ?>" class="download-category" <?php echo in_array($cat->name, $hidden) ? "hidden" : ''; ?>>
                                                <h2><?php echo $cat->name; ?></h2>
                                                <div class="collapsable">
                                                    <div class="storefront">
                                                    
                                                        <?php echo do_shortcode('[downloads number="100" columns="1" category="'.$cat->slug.'" thumbnails="false" Price="no" excerpt="no" full_content="no" buy_button="no" orderby="title" order="ASC"]'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php remove_filter('the_permalink', 'custom_exclusive_permalink'); ?>
                                    </div>
                                </div>
                            </div>
                            <div id="exclusive-library" class="tab-content">	                
                                <?php include('archive-template-parts/content-exclusive-library.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </div>    
</div>
<!-- End Tabs Container --> 







<?php get_footer(); ?>


<style>
.post-type-archive-download .innerSection {
max-width: 1450px;
}
.section-row, .inside-section-column, .da-sidebar, .da-content {
width: 100%;
}
.da-sidebar button, .da-sidebar form, .da-sidebar input, #controls button {
-webkit-appearance: none;
background-color: white;
border: 1px solid #cecece;
}
.download-category.show-category .exclude {
display: block !important;
}
.download-category.show-category .showmore-btn {
display: none;
}
.audio-library-tabs {
border-bottom: 3px solid #eaeaea;
margin-bottom: 20px;
}
.audio-library-tabs li.current {
margin-bottom: -2px;
border: 3px solid #eaeaea;
border-bottom: none;
border-top: 3px solid #660098;
}
form, fieldset {
margin: 0;
padding: 0;
}
.da-sidebar input {
width: 100%;
border: 1px solid #f9f9f9;
    font-size: 16px;
}
#categories ul button {
background: none;
border: none;
padding: 10px;
width: 100%;
cursor: pointer;
border-bottom: 2px solid #e0e0e0;
}
#controls {
position: absolute;
right: 0;
margin-right: 5px;
margin-top: 15px;
}
.showmore-btn {
margin-bottom: 30px;
}
    #list .edd_download .edd_download_title {
        background: transparent;
    }
    #list .edd_download_title a {
        color: black;
    }
    .sidebarUnlimitedDownloads.sticky {
        position: sticky;
        top: 10px;
    }
    #edd_download_251027 {
        display: none;
    }
@media screen and (max-width: 980px) {
.section-row, .inside-section-column, .da-sidebar, .da-content {
display: block;
box-sizing: border-box;
}
#wrapper {
margin-top: 0px;
}
.da-sidebar {
padding: 5px;
}
.da-sidebar .inside-section-column {
display: flex;
padding: 5px;
background-color: #eaeaea;
}
.download-search, .categoriesfilter {
width: 50%;
}
.download-search {
margin-right: 5px;
}
.categoriesfilter, .da-sidebar form {
margin: 0;
padding: 0;
}
.duplicated-categories-h2, .toggle {
width: 100%;
height: 100%;
}
#categories {
display: none;
position: absolute;
left: 0;
box-sizing: border-box;
width: 100%;
z-index: 1;
padding: 5px;
}
#categories h2 {
display: none;
}
#categories ul {
padding: 10px;
background-color: #f3f3f3;
}
    .exclusive-videos .inside-section-column-50 {
        width: 100%;
    }
    .sidebarUnlimitedDownloads {
        display: none;
    }
}
    
@media screen and (min-width: 768px) {
.edd_download_columns_4 .edd_download {
width: 31.5%;
}
    #list {
    display: flex;
    flex-flow: row wrap;
    }
    #list .download-category {
    width: 33%;
    box-sizing: border-box;
    padding: 0 12px;
    margin: 0 5px 30px 0;
    }
    #list .download-category:nth-child(3n) {
    margin-right: 0;
    }
}
@media screen and (min-width: 980px) {
.da-sidebar {
width: 20%;
margin-right: 1.25%;
box-sizing: border-box;
}
.duplicated-categories-h2 {
display: none;
}
#categories ul button {
text-align: left;
}
.da-content {
width: 78.75%;
}
.da-sidebar input {
padding: 15px 5px;
}
.audio-library-tabs .tab-link {
font-size: 20px;
margin: 0;
width: auto;
padding: 20px 50px;
font-weight: normal;
background: #f7f7f7;
}   
}
@media screen and (min-width: 1200px) {
.da-sidebar {
width: 18%;
}
.da-content {
width: 80.75%;
}
.edd_download_columns_4 .edd_download {
width: 23.5%;
}
}


</style>