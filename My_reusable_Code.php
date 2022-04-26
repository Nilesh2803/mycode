My Code 
--------------------------------

<h5>Header Menu List</h5>
<ul>
     <?php $items = wp_get_nav_menu_items('footer_2' );
     foreach ($items as $val){
        echo '<li><a href="'.$val->url.'">'.$val->title.'</a></li>';
    }
    ?>
</ul>

<ul>
     <?php $items = wp_get_nav_menu_items('My Account Footer Menu' );
     foreach ($items as $val){
        echo '<li class="'.$val->classes[0].'"><a href="'.$val->url.'">'.$val->title.'</a></li>';
    }
    ?>
</ul>					
--------------------------------------------------	

 <h5>Related Tags</h5>
                    <ul>
                    <?php
                    $tags = get_tags();
                    if ( $tags ) :
                      foreach ( $tags as $tag ) : ?>
                        <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                      <?php endforeach; ?>
                    <?php endif; ?>
                      </ul>
--------------------------------------

 <h2 class="widget-title">Categories</h2>
        <ul>
          <?php
          $categories = get_categories();
          foreach ( $categories as $category ) :
            $category_link = get_category_link( $category->term_id );
            ?>
            <li>
              <a href='<?php echo $category_link; ?>' title='<?php echo $category->name; ?>' class='<?php echo $category->slug ?>'><?php echo $category->name ?> (<?php echo $category->count ?>)</a>
            </li>
            <?php
          endforeach;
          ?>
        </ul>
		
		
----------------

Get Post 

<div class="col-md-9 col-sm-9 covidsec">
							
				 <a class="TechnicalArpFooter1" href="https://www.facebook.com/sharer/sharer.php?u=https://xyz.com/" target="_blank" title="Share this post on Facebook"> <b style="font-size: 26px;">Share fb</b>  
 </a>
					<?php
                global $query;
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $query_args = array(
              'post_type' => 'post',
              'posts_per_page' =>3,
              'paged' => $paged,
              );
              // create a new instance of WP_Query
              $query = new WP_Query( $query_args );
            ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>  
        <div class="blog-updates-box">
          <div class="row">
            <div class="col-sm-6">
              <div class="blog-box-img">
                    <?php if(has_post_thumbnail()) : ?>
           <a href="<?php the_permalink(); ?>"> <img src="<?php the_post_thumbnail_url();?>" ></a>
                    <?php else : ?>
            <a href="<?php the_permalink(); ?>"><img width="800" height="503" src="<?php bloginfo('stylesheet_directory'); ?>/images/blog-updates-ist-img.jpg" alt="" ></a>
                      <?php endif; ?>
               
              </div>
            </div>
            <div class="col-sm-6">
              <div class="blog-upadates-des">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="blog-by-date">
                </div>
                <p><?php echo get_the_excerpt(); ?> </p>
                 <a href="<?php the_permalink(); ?>" class="btn-blog-rm">Read More</a>
                
              </div>
            </div>
          </div>
        </div>  
     <?php endwhile; wp_reset_query(); ?>  

           <div class="paginationss">
                    <?php
                 $big = 99999999;
                 echo paginate_links(array(
                     'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                     'format' => '?paged=%#%',
                     'total' => $query->max_num_pages,
                     'current' => max(1, get_query_var('paged')),
                     'show_all' => false,
                     'end_size' => 2,
                     'mid_size' => 3,
                     'prev_next' => true,
                     'prev_text' => 'Previous',
                     'next_text' => 'Next',
                     'type' => ''
                 ));
             ?>  
                
         </div>
				</div>
				
				
------------------------------------

The tax_query argument specifies which term and which taxonomy to use in retrieving posts for loop.

"products" is CPT. 

"type" is a taxonomy.  like categories.

"weapons" is term as slug name.

<?php
$args = array(
'post_type' => 'products',
'tax_query' => array(
 array(
  'taxonomy' => 'type',
  'field' => 'slug',
  'terms' => 'weapons'
  )
 )
);

$products = new WP_Query( $args );
while ( $products->have_posts() ) : $products‐>the_post();
?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br /><?php
endwhile;
wp_reset_postdata();
?>				


------------------

The above code will retrieve all the terms associated with the taxonomy ‘type’.

<?php
$terms = get_terms('type');
			foreach ( $terms as $term ) {
			echo '<a href="'.site_url().'/'.$term->taxonomy.'/'.$term->name.'">'.$term->name.'</a>';
}
?>

--------------

<?php  wp_nav_menu(
	array(
		'theme_location' => 'menu-1',
		'menu_id'        => 'primary-menu',
	));
	?>
	
	
----------------------------------------------


<?php 
global $product;
//Product Gallery Image 
$attachment_ids = $product->get_gallery_attachment_ids();
//gallery Images code
foreach( $attachment_ids as $attachment_id )
{
echo $image_link = wp_get_attachment_url( $attachment_id )."<br>";
}
?>


https://www.youtube.com/watch?v=CQdMKa7C_oo
super socializer plugin For Social login in WP

-----------------------------------------------------------------------

<?php 
		// Get Images and all list from woocommerce term meta according to custom texonomy
    
	$terms = get_terms( array(
	'taxonomy' => 'product_cat', // product_cat is texonomy
	'hide_empty' => true,
	) ); // Get Terms
					foreach ($terms as $key => $value) 
{
	$metaterms = get_term_meta($value->term_id);
	$category_link = get_category_link( $value->term_id );
	$cat_name_p = $value->name;
	$thumbnail_id = get_woocommerce_term_meta($value->term_id, 'thumbnail_id', true );
	$image1 = wp_get_attachment_url( $thumbnail_id );
	
			echo '<li>
						<a href="'.$category_link.'">
							<img src="'.$image1.'" />
							<div>
								<img src="'.site_url().'/img/product/p-7.png" />													</div>
						</a>
						<div class="pric">
							<div class="product-rating">
							</div>
							<h5><a href="'.$category_link.'">' .$cat_name_p.'</a></h5>	
						</div>
					</li>';			
						} 

?>
	
--------------------------------------

//Add dropdown class in dropdown menu in li if has child menu
<?php 
function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );

?>
