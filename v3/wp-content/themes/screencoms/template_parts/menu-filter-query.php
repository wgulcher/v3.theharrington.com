

<!-- Element 1 -->

<!-- div class="btn-group ui-colour btn-dropdown span2 post-query-dropdown media-query-wrap-item" style="margin-left:0px">

	<?php
		$post_args = array(
		'numberofposts' => 100,
		'post_status' => 'publish'
		);
		$post_list = wp_get_recent_posts($post_args);
    ?>
             
    <button class="btn ">Most Recent</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu ui-colour fx-type--border-default">
		<?php 
        foreach( $post_list as $post ){ ?>
            <li><a href="<?php echo home_url(); ?>?p=<?php echo $post['ID']; ?>"><?php echo $post['post_title']; ?></a></li>
        <?php }; ?>
    </ul>
</div -->

<!-- Element 2 -->
<div class="btn-group ui-colour btn-dropdown span2 categories-query-dropdown media-query-wrap-item" style="margin-left:0px">
    <button class="btn ">Categories</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu ui-colour fx-type--border-default">
    
         <?php wp_list_categories( 'title_li=0' ); ?> 
    </ul>
    
</div>



<!-- Element 3 -->

<div class="btn-group ui-colour btn-dropdown span2 mostviewedpost-query-dropdown media-query-wrap-item">
	 <?php
		$viewed = new WP_Query(array(
		'orderby' => 'meta_value_num',
		'ignore_sticky_posts' => true,
		'posts_per_page' => 5,
		'meta_key' => 'pageviews',
		'meta_query' => array(
			array(
				'key' => 'pageviews'
			)
		)
	)); 
	?>
    <button class="btn ">Most Viewed</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu ui-colour fx-type--border-default">
        <?php if ($viewed->have_posts()) : while ($viewed->have_posts()) : $viewed->the_post(); ?>
        <li>
        <a><?php the_title(); echo "(" . get_post_meta(get_the_ID(), 'pageviews', true) . ")" ?></a>
        </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </ul>
</div>

<!-- Element 4 -->
 
 <div class="btn-group ui-colour btn-dropdown span2 comments-query-dropdown media-query-wrap-item">
	 <?php 
		$commented = new WP_Query(array(
				'ignore_sticky_posts' => true,
				'orderby' => 'comment_count',
				'posts_per_page' => 5,
		)); ?>
    <button class="btn ">Comments</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu ui-colour fx-type--border-default">
		<?php 
        foreach( $post_list as $post ){ ?>
			<?php if ($commented->have_posts()) : while ($commented->have_posts()) : $commented->the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                        <em>
                            <?php comments_number('0', '1', '%') ?>
                        </em>
                    </a>
                </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        <?php }; ?>
    </ul>
</div>



  
  
<!-- Element 5 -->


<div class="btn-group ui-colour btn-dropdown span2 sortby-query-dropdown media-query-wrap-item">
    <button class="btn">Sort By</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu ui-colour fx-type--border-default">
		        
            <li><a href="<?php echo home_url(); ?>?orderby=date">Date</a></li>
        <li><a href="<?php echo home_url(); ?>?orderby=title">A-Z</a></li>
        
       <li><a href="<?php echo home_url(); ?>?orderby=comments">Comments</a></li>
        <li><a href="<?php echo home_url(); ?>?orderby=random">Random</a></li>
        
    </ul>
</div>

<div class="btn-group ui-colour btn-dropdown span2 network-query-dropdown media-query-wrap-item">
        <button class="btn ">Network</button>
        <button class="btn dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu ui-colour fx-type--border-default">
             <li><a href="<?php echo home_url(); ?>?cat=Instagram"><i class="icon-cloud icon-border"></i> Instagram</a></li>
            <li><a href="<?php echo home_url(); ?>?orderby=date"><i class="icon-twitter icon-border"></i> Twitter</a></li>
           <li><a href="<?php echo home_url(); ?>?orderby=date"><i class="icon-youtube icon-border"></i> You Tube</a></li>
            <li><a href="<?php echo home_url(); ?>?orderby=date"><i class="icon-cloud icon-border"></i> SoundCloud</a></li>
            <li><a href="<?php echo home_url(); ?>?orderby=date"><i class="icon-cloud icon-border"></i> Spotify</a></li>
           
         <!-- li><a><i class="icon-linkedin icon-border"></i> Linked In</a></li>
            <li><a><i class="icon-pinterest icon-border"></i> Pinterest</a></li>
            <li><a><i class="icon-google-plus icon-border"></i> Google Plus</a></li>
               <li><a><i class="icon-facebook icon-border"></i> Facebook</a></li>
            <li><a><i class="icon-rss icon-border"></i> RSS Feed</a></li>
            <li><a><i class="icon-github icon-border"></i> GitHub</a></li -->
        </ul>
    </div>


 
 <!-- Element 6 -->
 
 
  <!-- div class="span2 users-query-form media-query-wrap-item">
    <form action="<?php echo home_url(); ?>" method="get">
      <?php wp_dropdown_users(array(
			'show_option_all' => 'Users',
			'name' => 'author',
			'exclude' => '',
			'class' => 'standard-dropdown'
		)); ?>
    </form>
  </div -->
  


<!--div class="span2 post-query-form media-query-wrap-item no-left-margin">
<div class="ui-colour" style="height:60px;">
    <form action="<?php echo home_url(); ?>" method="get">
      <select name="p" id="posts" class="standard-dropdown">
        <option>Posts</option>
        <?php 
				foreach( $post_list as $post ){ ?>
        <option value="<?php echo $post['ID']; ?>"><?php echo $post['post_title']; ?></option>
        <?php }; ?>
      </select>
    </form>
    </div>
</div -->

<div class="span2 post-categories-form media-query-wrap-item no-left-margin">
<div class="ui-colour" style="height:60px;">
    <form action="<?php echo home_url(); ?>" method="get">
		  <?php wp_dropdown_categories(array(
            'show_option_all' => 'Categories',
            'hide_empty' => '1',
            'id' => 'categories',
            'class' => 'standard-dropdown'
        )); ?>
    </form>
    </div>
</div>



<div class="span2 mostviewedpost-query-form media-query-wrap-item">
<div class="ui-colour" style="height:60px;">
    <form action="<?php echo home_url(); ?>">
      <select name="p" id="orderby" class="standard-dropdown">
        <option value="#">Most Viewed</option>
        <?php if ($viewed->have_posts()) : while ($viewed->have_posts()) : $viewed->the_post(); ?>
        <option value="<?php the_id() ?>">
        <?php the_title(); echo "(" . get_post_meta(get_the_ID(), 'pageviews', true) . ")" ?>
        </option>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </select>
    </form>
</div>
</div>



<div class="span2 comments-query-form media-query-wrap-item no-left-margin">
<div class="ui-colour" style="height:60px;">
    <form action="<?php echo home_url(); ?>">
      <select name="p" id="orderby" class="standard-dropdown">
        <option value="#">Most Comments</option>
        <?php if ($commented->have_posts()) : while ($commented->have_posts()) : $commented->the_post(); ?>
        <li>
        <a href="<?php the_permalink() ?>">
        <?php the_title() ?>
        </a>
        </li>
        <option value="<?php the_id() ?>">
        <?php the_title(); ?>
        <em>
        <?php comments_number('0', '1', '%') ?>
        </em></option>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </select>
    </form>
  </div>
  </div>
  
 <div class="span2 sortby-query-form media-query-wrap-item">
 <div class="ui-colour" style="height:60px;">
    <form action="<?php echo home_url(); ?>" action="get">
    <select name="orderby" id="orderby" class="standard-dropdown">
      <option value="title">&mdash; Sort By &mdash;</option>
      <option value="date">Date</option>
      <option value="comments">Comments</option>
      <option value="random">Random</option>
    </select>
    </form>
  </div>
  </div>
  
  <div class="span2 network-query-form media-query-wrap-item no-left-margin" style="margin-right: 20px; ">
  <div class="ui-colour" style="height:60px;">
      <select id="network" class="standard-dropdown">
        	<option>All Networks</option>
        	 <option><a><i class="icon-twitter icon-border"></i> Twitter</a></option>
           <option><a><i class="icon-cloud icon-border"></i> SoundCloud</a></option>
            <option><a><i class="icon-linkedin icon-border"></i> YouTube</a></option>
            <option><a><i class="icon-pinterest icon-border"></i> Spotify</a></option>
            <option><a><i class="icon-google-plus icon-border"></i> Instagram</a></option>
            <!-- option><a><i class="icon-linkedin icon-border"></i> Linked In</a></option>
            <option><a><i class="icon-pinterest icon-border"></i> Pinterest</a></option>
            <option><a><i class="icon-google-plus icon-border"></i> Google Plus</a></option>
            <option><a><i class="icon-facebook icon-border"></i> Facebook</a></option>
            <option><a><i class="icon-rss icon-border"></i> RSS Feed</a></option>
            <option><a><i class="icon-github icon-border"></i> GitHub</a></option -->
      </select>
</div>
</div>
 
            
  
   <div class="span2 tag-wrap-item media-query-wrap-item" style="margin-left: 20px; ">
    <div class="tag-cloud-wrap">
    <div class="ui-colour fx-type--border-default" style="width:140px; display:inline-block;">             
         
        <a class="btn tagCloudButton" style="padding: 0;">
            <i class="icon-tags"></i> Tag Cloud</a>
            </div>
    </div>
  </div>
</div>




<div class="tag-cloud row-fluid" style="margin-bottom:-20px">
  <div class="fx-type--border-default fx-type--padding-default fx-type--height-default" style="width: 100%;" >
    <ul>
      <?php wp_tag_cloud(array(
                                        'smallest' => 8,
                                        'largest' => 26,
                                        'number' => 150
                                    )); ?>
    </ul>
    <ul>
      <?php wp_tag_cloud(array(
										'post_status' => 'inherit',
                                        'taxonomy' => 'att_tag',
										'smallest' => 8,
                                        'largest' => 26,
                                        'number' => 1500
                                    )); ?>
    </ul>
    
    
    
    
      
                
  </div>





