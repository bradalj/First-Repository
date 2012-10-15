<?php
/*
Template Name: page-blog
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
		if(window.location.href=='<?php echo site_url().'/blog/';?>')
		{
			searchQuery = $('.blog-searchInput').val();
			window.location.href = window.location.href.replace("blog/","/?s="+searchQuery + "&page=blog");
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
        <span style="border-right: 1px solid #999;">Blog</span>
        </div>
<div id="sub-menu-search"><img style="margin: 0px 17px 4px 0px;" src="../wp-content/themes/twentyten/images/menu-arrow.png" alt="" />	
	<form id="searchform" action="<?php echo site_url();?>" method="get" role="search"><input class="sub-menu-search-input" name="s" type="text" value="search" /> <input id="searchsubmit" class="sub-menu-search-button" type="submit" value="GO" />	
	</form>	
         </div>
    </div>
<div id="blog-header">
    	<div id="blog-header-content">
        <font style="font-size:36px; color:#FFF;">Thinking</font>&nbsp;&nbsp;&nbsp;Provoking ideas.Inspiring conversation.
        <p style="float:right; margin-top:50px;">
        <a href="https://twitter.com/extensionengine" target="_blank"><img src="../wp-content/themes/twentyten/images/blog-twitter.png" alt="twitter" /></a>
        <a href="http://www.linkedin.com/company/617636?trk=tyah" target="_blank"><img src="../wp-content/themes/twentyten/images/blog-linkedin.png" alt="linkedin" /></a>
        <a href="http://www.facebook.com/extensionEngine" target="_blank"><img src="../wp-content/themes/twentyten/images/blog-facebook.png" alt="facebook" /></a>
        </p>
        </div>
    </div>

<div id="blog-content-holder">
    	
        <div id="blog-content-left">
            
            <div id="blog-left-column">
		<a href="<?php echo site_url().'/blog/';?>"><img src="../wp-content/themes/twentyten/images/blog-home.png" alt="" /></a>
            <br /><br />
            <span class="blog-blue-category">CATEGORIES</span> <img src="../wp-content/themes/twentyten/images/blog-icon-categories.png" alt="" /><br />

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
		<br />
            <br />
            <br />
            <span class="blog-blue-category">ARCHIVES</span> <img src="../wp-content/themes/twentyten/images/blog-icon-archives.png" alt="" /><br />
            <a href="<?php echo get_year_link('2012'); ?>">2012</a><br />
            <a href="<?php echo get_year_link('2011'); ?>">2011</a><br />
            <a href="<?php echo get_year_link('2010'); ?>">2010</a><br />
            <a href="<?php echo get_year_link('2009'); ?>">2009</a><br />
       	  </div>
            
            <div id="blog-right-column">
		<?php while(have_posts()) : the_post(); ?>
		<?php
			$myposts = get_posts('numberposts=1');
			foreach($myposts as $post) : setup_postdata($post);
		?>

		<div class="blog-right-column-article" style="font-size:15px;">
		<img src="<?php echo catch_that_image(); ?>"class="thumb-large"/>
		<a href="<?php echo get_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
	<span style="font-size:11px; color:#999;">Posted on <?php the_time('F j, Y') ?> by <?php the_author_meta('first_name');echo" "; the_author_meta('last_name');?></span><br />
		<p style="font-size:12px;"><?php the_excerpt(); ?></p>
		</div>

		<?php $displayed = $post->ID; ?>

		<?php endforeach; ?>
		<?php endwhile; ?>






		<?php while(have_posts()) : the_post(); ?>
	
		<?php
			$myposts = get_posts('numberposts=-1');
			foreach($myposts as $post) : setup_postdata($post);
			if ($post->ID == $displayed) continue;
		?>

		<div class="blog-right-column-article">
		<img class="thumb-small" style="width:79px; height:65px;" src="<?php echo catch_that_image(); ?>" />
		<a href="<?php echo get_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
	<span style="font-size:11px; color:#999;">Posted on <?php the_time('F j, Y') ?> by <?php the_author_meta('first_name');echo" "; the_author_meta('last_name');?></span><br />
		<?php the_excerpt(); ?>
		</div>
		<?php endforeach; ?>
		<?php endwhile; ?>

                </div-->   
		</div>
  		</div>
        
        <div id="blog-content-right">

		<span id="blog-search-box">
		<form action="">
		<input name="" type="text" value="Search the Blog" class="blog-searchInput" />
		<input name="" type="button" class="blog-searchButton" />
		</form>
		</span>
        
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

		<?php while(have_posts()) : the_post(); ?>
		<?php
			$myposts = get_posts('numberposts=5');
		$i=0;
		$even=2;
		$odd=1;
		foreach($myposts as $post) : setup_postdata($post);
			$i++;
		?>
		<div class="posts-box-<?php if($i%2==0) echo $even; else echo $odd; ?>">
		<img style="width:36px; height:36px;" src="<?php echo catch_that_image(); ?>"/>
			<p><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
		</div>

		<?php endforeach; ?>
		<?php endwhile; ?>

                </div-->
                
            </div>
            
            <div id="blog-content-right-subscribe">
                <!--div id="blog-newsletter">
                <form action="">
                <input name="" type="text" value="you@email.com" class="inputNewsletter" />
                <input name="" type="button" value="SUBMIT" class="buttonNewsletter" />
                </form>
                </div-->
                
                <!--div style="border-bottom:1px solid #DDD; border-top:1px solid #FFF; margin:20px 0px;"></div-->
                
                <font style="color:#4767A9;">SUBSCRIBE</font> TO OUR FEEDS
                <br /><br />
                <img src="../wp-content/themes/twentyten/images/rss.jpg" alt="rss" />
                <br /><br />
            </div>
            
            
            <!--div id="blog-content-right-video">
            	<img src="../wp-content/themes/twentyten/images/video-thumb.jpg" width="270" height="190" alt="video" />
            </div-->

            <span style="color:#000; margin-left:15px; float:left;"><strong>Tag Cloud</strong></span>
            <div id="blog-content-right-tagcloud">
		 <?php wp_tag_cloud( $args ); ?> 


            </div>
        
        
        </div>
        
  		<div style="clear:both;"></div>

</div>  
</body>
</html>


<?php get_footer(); ?>