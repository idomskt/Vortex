<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<main>
         <div class="UDBar">
    <p>This recording is included in the unlimited downloads packages. <a href="https://www.vortex-success.com/unlimited-downloads/" target="_blank">Start Downloading!</a></p>
</div>


<a href="https://www.vortex-success.com/unlimited-downloads/" target="_blank"><img src="https://www.vortex-success.com/wp-content/uploads/2016/10/Recording-Banner.jpg" alt="" style="border: 1px solid black; margin-bottom: 30px; width: 100%"></a>  


               
 <section>     
               
<div id="content" class="<?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">

	<?php get_template_part( 'loop-header', get_post_type() ); ?>

	<?php if ( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta', get_post_type() ); ?>
                
				<div class="post-entry">
				

			<?php
//if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
//the_post_thumbnail( 'full' );
//}
?>
              
             
                <!-- This is the first part above the more tag -->
                     <p class="backToAL"><a href="https://www.vortex-success.com/downloads/">Back to audio library</a></p>
                     <article>  
                    <?php
                    // show first half of the content
                    $content = split_content();
                    echo $content[0];
                    ?>
                   
                    <!-- The buttons -->
                      <div class="CTAButtons"><?php echo do_shortcode('[purchase_link text="Add to Cart" style="button" color="blue"]'); ?> <p class="alternativeCTA"><a href="https://www.vortex-success.com/unlimited-downloads/" target="_blank"><span style="font-size: 12pt;">Free</span> (for members only)</a></p>                           </div>
                    
                    
            <div class="tabContainer">

	            <ul class="tabs">
		        <li class="tab-link current" data-tab="description">Description</li>
		        <li class="tab-link" data-tab="reviews">Reviews</li>
                <li class="tab-link" data-tab="how-to-use">How To Use</li>
	            </ul>

	            <div id="description" class="tab-content current">
	        	    <?php 
                    if (isset($content[1]) AND !empty($content[1])) { // shows content after the more link 
                    echo $content[1];
                    } 
                    ?>
                    <p style="display: inline-block; text-align: center; margin-top: 8px; background-color: #FFF82A; border: 3px dashed black; padding: 12px;"><strong><span style="color: #ff0000;">The soundtrack of the video above is coded with powerful subliminal messages.<br>For maximum results download the original, uncompressed & conversion-free HQ file.</span> </strong><br></p>
	            </div>
	            <div id="reviews" class="tab-content">
               <?php echo do_shortcode('[WPCR_INSERT]'); ?>
               <p><a href="https://www.vortex-success.com/reviews/" target="_blank">Read all testimonials</a></p>
                
	            </div>
                
                
                 <div id="how-to-use" class="tab-content">
                   <img src="https://www.vortex-success.com/wp-content/uploads/2017/12/How-To-Use-Our-Recordings.png">
                
	            </div>
	            
	            
            </div>
                  
                    
                    </article>
                    
                    <!-- This is the the stuff after the content -->
                    
                    
                    <div class="AddToCart section-row">
                        <div class="inside-section-column-33 inside-section-column-left">
                                <?php echo do_shortcode('[purchase_link text="Add to Cart" style="button" color="blue"]'); ?>
                        </div>
                        <div class="inside-section-column-33 inside-section-column-middle">
                            Or
                        </div>
                        <div class="inside-section-column-33 inside-section-column-right">
                                <a href="https://www.vortex-success.com/unlimited-downloads/" target="_blank"><img src="https://www.vortex-success.com/wp-content/uploads/2018/11/FreeForMembers1.png" alt=""></a>
                            </div>
                    </div>
                    
                    <aside class="outterSection section-row WDFU">
<div class="innerSection">
<div class="inside-section-wrapper">
<h2 style="margin-bottom: 1.5em;">Why Download From Us</h2>
<div class="section-row section-row-align-top">
<div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column">
          <img src="https://www.vortex-success.com/wp-content/uploads/2015/07/UncompressedFiles.png" alt=""><h3>Uncompressed Files</h3><p>Our original files are uncompressed & convertion-free. highest quality guaranteed.</p>
    </div>
    </div>
<div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column">
        <img src="https://www.vortex-success.com/wp-content/uploads/2016/09/Paradigm-Shifting.png" alt=""><h3>Paradigm Shifting Sessions</h3><p>The revolutionary combination of subliminals with healing frequencies is the best tool to shift your subconscious conditioning.</p>
   </div>     
   </div>     
        <div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column">
       <img src="https://www.vortex-success.com/wp-content/uploads/2016/09/High-Quality.png" alt=""><h3>No Data Loss</h3><p>Original HQ files. No loss of data on any of the affirmations or frequency recordings.</p>
        </div>   
        </div>   
        <div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column">
   <img src="https://www.vortex-success.com/wp-content/uploads/2016/09/Research.png" alt=""><h3>Based On Scientific Research</h3><p>A lot of thought is put into creating these life-changing programs. We keep up with the latest research to provide you the best results.</p>
       </div>   
       </div>   
        </div>   
    <div class="section-row section-row-align-top">
        <div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column">
       <img src="https://www.vortex-success.com/wp-content/uploads/2015/07/NoWifi.png" alt=""><h3>No WiFi Needed</h3><p>After downloading, listen anywhere, anytime, offline and without using cellular data.</p>
    </div>   
       </div>  
        
         <div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column"><img src="https://www.vortex-success.com/wp-content/uploads/2015/11/KeepTheFilesForever.png" alt=""><h3>Keep Forever</h3><p>A download link will be sent to your email address. Download the files and keep it forever.</p>
    </div>   
       </div> 
        
        <div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column"><img src="https://www.vortex-success.com/wp-content/uploads/2015/07/Ad-Free.png" alt=""><h3>Ads Free</h3><p>Fully enjoy ad-free audio. Easily change your brain without any disturbances or obstructions.</p> </div>   
       </div>
        
        <div class="inside-section-column-50 inside-section-column-left">
<div class="inside-section-column"><img src="https://www.vortex-success.com/wp-content/uploads/2016/09/Secured-Payments.png" alt=""><h3>Secure Payments</h3><p>We accept all major cards and PayPal. Our site is safe and secured with SSL certificate.</p></div>   
       </div>
       </div>
       </div>
       </div>
        
        
          </aside>     
     
                    
                    <!-- This is the related items -->
<!--
                   <?php $inst = array( 
                        'title' => 'You May Also Like',
                        'number' => 3,
                        'taxcat' => true,
                        );
                        $args = array(
                            'before_widget' => '<div id="isa-related-downloads" class="widget">',// make it grid-style
                            'after_widget' => '</div>',
                        );
                        the_widget('edd_related_downloads_widget', $inst, $args); ?>
                            
-->
                            
                       <!-- Display the Jetpack sharing buttons -->     
                      <?php
                         if ( function_exists( 'sharing_display' ) ) {
                         sharing_display( '', true );
                         }
	                  ?>
            
                    
                    
					<?php if ( get_the_author_meta( 'description' ) != '' ) : ?>

						<div id="author-meta">
							<?php if ( function_exists( 'get_avatar' ) ) {
								echo get_avatar( get_the_author_meta( 'email' ), '80' );
							} ?>
							<div class="about-author"><?php _e( 'About', 'responsive' ); ?> <?php the_author_posts_link(); ?></div>
							<p><?php the_author_meta( 'description' ) ?></p>
						</div><!-- end of #author-meta -->

					<?php endif; // no description, no author's meta ?>

					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->
                
				<div class="navigation">
					<div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
					<div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
				</div><!-- end of .navigation -->

				<?php get_template_part( 'post-data', get_post_type() ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

	else :

		get_template_part( 'loop-no-posts', get_post_type() );

	endif;
	?>

</div><!-- end of #content --></section>
<aside class="sidebar">
<?php get_sidebar(); ?></aside>
</main>
<?php get_footer(); ?>
