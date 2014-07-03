<?php 
	$post_format = get_post_format();
	$post_number = $wp_query->current_post + 1;			 
?>
<article wp2js_postnumber="<?php echo $post_number; ?>" wp2js_permalink="<?php the_permalink() ?>" id="post-<?php the_id() ?>" <?php post_class('hentry fx-type--bg-gradient-default fx-type--border-default global_content_background_color hentry-contentheight'); ?> >
  <?php if(is_search()){
	}else{
     if($post_format != ''){
		 the_content();
	}}?>
  <div id="main-media-item-<?php the_id() ?>" class="post-thumb-wrap-varied" >
    <?php getMediaFromPost('jpg','large',''); ?>
  </div>
  <div class="hentry-wrap clearfix">
    <div class="content-flip" style="display: none;">
      <p>xxx</p>
    </div>
    <h2 class="entry-title">
      <?php the_title() ?>
    </h2>
    <?php if($post_format == '' || $post_format == 'default' || $post_format == 'standard'){
				 the_excerpt();
			}?>
    <div class="taxonomy_holder">
      <?php

$thecategories = the_category(', ');

if($thecategories != ""){ ?>
      <h3>Categories:</h3>
      <p><?php echo $thecategories; ?><br>
      </p>
      <?php } ?>
      <?php

 
$posttags = get_the_tags();
$count=0;
if ($posttags) {
echo "<h3 class='tags-title'>Tags:</h3><p>";
  foreach($posttags as $tag) {
    
      echo "<a href='?tag=" . $tag->slug ."' >" . $tag->name . "</a>, ";
    
  }
echo "</p>";
}
?>
    </div>
  </div>
  <!-- Flash Attachments -->
  <?php if($post_mime_type == 'application/flash' || $post_mime_type == 'application/x-shockwave-flash'){ ?>
  <script type="text/javascript" >
                	var flashvars = {
						scale : "showAll",
                        wmode : "transparent",
						bgcolor : "#ff6600"
					};
					var params = {
						wpDataForFlashTest : "Hello Flash from wordpress!!!"
					};
					var attributes = { 
						styleclass : "wp-flash-file" 
					};
					swfobject.embedSWF(	"<?php echo $main_flash_src; ?>",
										"main-media-item-<?php the_id() ?>",
										"150",
										"100",
										"9.0.0",
										false,
										flashvars,
										params,
										attributes
									);
                </script>
  <?php } ?>
</article>
