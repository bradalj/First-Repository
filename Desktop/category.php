<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>


<?php get_header(); ?>

<html>
<body>
<div id="head">
<script>
$(document).ready(function(){
	$("#menu-bottom li").removeClass("selected");
	$("#thinking").addClass("selected");
	$("#sub-menu-search").hide();

	var search=0;				

	$(".search").click(function(){
		if(search==0)
		{
			$("#sub-menu-content").hide();
			$("#sub-menu-search").show();
			search=1;
		}
		else
		{
			$("#sub-menu-search").hide();
			$("#sub-menu-content").show();
			search=0;
		}
	});

	$("#blog-search-box").bind("clickoutside", function(event){
		$('.blog-searchInput').val('Search the Blog');
	});

	$('.blog-searchInput').bind('click', function() {
		  $('.blog-searchInput').val('');
	});

	$searchQuery="";
	$('.blog-searchButton').click(function(){
	if(window.location.pathname!="")
	{
	searchQuery = $('.blog-searchInput').val();
	window.location.href = window.location.href.replace(window.location.pathname,"/?s="+searchQuery + "&page=blog");
	}
	});

	$('.blog-searchInput').keypress(function(e){
		if(e.which == 13)
		{
			$('.blog-searchButton').click();
			return false;
		}
	});
});
</script>
    </div>
    <div id="sub-menu-holder">     	
        <div id="sub-menu-content">
        <span style="border-right: 1px solid #999;"><a href="<?php echo site_url().'/blog/';?>">Blog</span>
        </div>
<div id="sub-menu-search"><img style="margin: 0px 17px 4px 0px;" src="/wp-content/themes/twentyten/images/menu-arrow.png" alt="" />	
	<form id="searchform" action="<?php echo site_url();?>" method="get" role="search"><input class="sub-menu-search-input" name="s" type="text" value="search" /> <input id="searchsubmit" class="sub-menu-search-button" type="submit" value="GO" />	
	</form>	
         </div>
    </div>
<div id="blog-header">
    	<div id="blog-header-content">
        <font style="font-size:36px; color:#FFF;">Thinking</font>&nbsp;&nbsp;&nbsp;Provoking ideas.Inspiring conversation.
        <p style="float:right; margin-top:50px;">
        <a href="#"><img src="/wp-content/themes/twentyten/images/blog-twitter.png" alt="twitter" /></a>
        <a href="#"><img src="/wp-content/themes/twentyten/images/blog-linkedin.png" alt="linkedin" /></a>
        <a href="#"><img src="/wp-content/themes/twentyten/images/blog-facebook.png" alt="facebook" /></a>
        </p>
        </div>
    </div>

<div id="blog-content-holder">
    	
        <a href="<?php echo site_url().'/blog/';?>"><img src="/wp-content/themes/twentyten/images/blog-home.png" alt="" /></a>
        <br /><br />
        <!--p class="subtitle-3" style="float:left;">OUR BLOG (SHOULD NAME IT)</p-->
        
        <span id="blog-search-box">
        <form action="">
        <input name="" type="text" value="Search the Blog" class="blog-searchInput" />
        <input name="" type="button" class="blog-searchButton" />
        </form>
        </span>
        
        
		<div style="clear:both;"></div>
        
        <div id="blog-content-left">
        
        <!--div id="favorite-posts">
        	<p><span class="blog-blue-category">FAVORITE POSTS</span></p>
            <a href="#"><img src="/wp-content/themes/twentyten/images/blog-fp-thumb.jpg" alt="" class="thumb-favorite-posts" style="margin-right:40px;" /></a>
            <a href="#"><img src="/wp-content/themes/twentyten/images/blog-fp-thumb.jpg" alt="" class="thumb-favorite-posts" style="margin-right:40px;" /></a>
            <a href="#"><img src="/wp-content/themes/twentyten/images/blog-fp-thumb.jpg" alt="" class="thumb-favorite-posts" /></a>
       	</div-->
            
            <div id="blog-left-column">
            <span class="blog-blue-category">CATEGORIES</span> <img src="/wp-content/themes/twentyten/images/blog-icon-categories.png" alt="" /><br />

<?php
$args=array(
  'orderby' => 'name',
  'order' => 'ASC'
  );
$categories=get_categories($args);
  foreach($categories as $category) { 
    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name . '('. $category->count . ')' . '</a>'.'<br>';
    //echo '<p> Description:'. $category->description . '</p>';
    /*echo '<p> Post Count: '. $category->count . '</p>';*/  } 
?>
            <!--a href="#">Enterprise IT (8)</a><br />
            <a href="#">General (23)</a><br />
            <a href="#">Industry (5)</a><br />
            <a href="#">Observations (4)</a><br />
            <a href="#">Technology (14)</a--><br />
            <br />
            <!--span class="blog-blue-category">TAG CLOUD</span> <img src="/wp-content/themes/twentyten/images/blog-icon-tag.png" alt="" /><br /-->
            <!--a href="#">Books</a><br />
            <a href="#">Brands</a><br />
            <a href="#">Current Affairs</a><br />
            <a href="#">Diversity</a><br />
            <a href="#">Education</a><br />
            <a href="#">Employment</a><br />
            <a href="#">Environment</a><br />
            <a href="#">Favorites</a><br />
            <a href="#">Film</a><br />
            <a href="#">Food and Drink</a><br />
            <a href="#">Government</a><br />
            <a href="#">Music</a><br />
            <a href="#">Operations</a><br />
            <a href="#">Personal</a><br />
            <a href="#">Science</a><br />
            <a href="#">Service</a><br />
            <a href="#">Sports</a><br />
            <a href="#">Technology</a><br />
            <a href="#">Television</a><br />
            <a href="#">Travel</a><br />
            <a href="#">Web/Tech</a><br />
            <a href="#">Weblogs</a--><br />
            <br />
            <span class="blog-blue-category">ARCHIVES</span> <img src="/wp-content/themes/twentyten/images/blog-icon-archives.png" alt="" /><br />
            <a href="<?php echo get_year_link('2012'); ?>">2012</a><br />
            <a href="<?php echo get_year_link('2011'); ?>">2011</a><br />
            <a href="<?php echo get_year_link('2010'); ?>">2010</a><br />
            <a href="<?php echo get_year_link('2009'); ?>">2009</a><br />
       	  	</div>
            
            <div id="blog-right-column">
            <!--img src="/wp-content/themes/twentyten/images/blog-thumb-large.jpg" alt="" class="thumb-large" />
            <h1>Not Your Father\u2019s IBM!</h1>
			<p style="font-size:11px;">Nov 22, 2011 by <a href="#">BOB ALLARD</a></p>
Legendary investor Warren Buffett\u2019s $10.7 billion investment in IBM Corp. (NYSE: IBM) has taken the tech world, as much as Wall Street, by surprise. What is one to make of an investor, arguably the world\u2019s most famous, who never placed a pretty penny on tech stocks, not even during the Internet boom, now making his largest quarterly commitment of cash in 15 years on a <a href="#">single technology</a> company?<br />
In the hullabaloo about Berkshire Hathaway\u2019s huge investment in IBM, many may have missed the fact that Buffett also placed a smaller bet on Intel ($232 million), too... <a href="#">MORE</a-->


<h1><?php
					printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>


                
	</div>
</div> 
          
        <div id="blog-content-right">
        
        	<div id="blog-content-right-posts-box">
                <ul>
                <li class="posts-selected">RECENT POSTS</li>
                <li><a href="#" style="text-decoration:none; color:#999;">COMMENTED</a></li>
                <!--li><a href="#" style="text-decoration:none; color:#999;">FAVORITE</a></li-->
                </ul>
                
                <div id="sub-list">
                <!--span>TODAY</span>
                <span><a href="#">WEEK</a></span>
                <span><a href="#">MONTH</a></span-->
                </div>

                
                <div class="posts-box-1">
                <a href="#"><img src="/wp-content/themes/twentyten/images/posts-thumb_32.jpg" alt="" /></a>
                <p><a href="#">Solving the Dark Data Puzzle</a></p>
                </div>
                
                <div class="posts-box-2">
                <a href="#"><img src="/wp-content/themes/twentyten/images/posts-thumb_32.jpg" alt="" /></a>
                <p><a href="#">Solving the Dark Data Puzzle</a></p>
                </div>
                
                <div class="posts-box-1">
                <a href="#"><img src="/wp-content/themes/twentyten/images/posts-thumb_32.jpg" alt="" /></a>
                <p><a href="#">Solving the Dark Data Puzzle</a></p>
                </div>
                
                <div class="posts-box-2">
                <a href="#"><img src="/wp-content/themes/twentyten/images/posts-thumb_32.jpg" alt="" /></a>
                <p><a href="#">Solving the Dark Data Puzzle</a></p>
                </div>
                
                <div class="posts-box-1">
                <a href="#"><img src="../wp-content/themes/twentyten/images/posts-thumb_32.jpg" alt="" /></a>
                <p><a href="#">Solving the Dark Data Puzzle</a></p>
                </div>
  
                
            </div>
            
            <div id="blog-content-right-subscribe">
                <!--font style="color:#4767A9;">SUBSCRIBE</font> TO OUR ENEWSLETTER
                <div id="blog-newsletter">
                <!--form action="">
                <input name="" type="text" value="you@email.com" class="inputNewsletter" />
                <input name="" type="button" value="SUBMIT" class="buttonNewsletter" />
                </form>
                </div-->
                
                <!--div style="border-bottom:1px solid #DDD; border-top:1px solid #FFF; margin:20px 0px;"></div-->
                
                <font style="color:#4767A9;">SUBSCRIBE</font> TO OUR FEEDS
                <br /><br />
                <img src="/wp-content/themes/twentyten/images/rss.jpg" alt="rss" />
                <br /><br />
            </div>
            
            
            <!--div id="blog-content-right-video">
            	<img src="/wp-content/themes/twentyten/images/video-thumb.jpg" width="270" height="190" alt="video" />
            </div-->
        
        </div>
        
  		<div style="clear:both;"></div>

</div>  
</body>
</html>

<?php get_footer(); ?>