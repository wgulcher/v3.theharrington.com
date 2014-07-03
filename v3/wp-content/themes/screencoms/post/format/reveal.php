<section style="background: #FFFFFF; ">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'article image-attachment row' ); ?>>
    <div class="hentry-wrap clearfix">
      <div class="entry-attachment no-span-margin span8" style="">
        <div class="attachment attachment-image" style="text-align:left">
          <?php getMediaFromPost('','full','100%'); ?>
        </div>
      </div>
      <div class="hentry-text-wrap attachment-text-wrap" style="height:100%; width:100%; padding-left:20px;">
        <header class="entry-header">
          <h2 class="entry-title">
            <?php the_title() ?>
          </h2>
        </header>
        <?php the_excerpt(); ?>
        <?php get_template_part('template_parts/image-meta'); ?>
        <div id="galleryItem-group" class="gallery-item span4 btn-group pull-right_ ui-colour" data-toggle="buttons-radio" data-toggle-name="itemShape" style="width: 140px; margin-left:0px;">
          <button title="Back to Search" class="btn btn-dark btn-removeReveal active" style="width:140px"><i class="icon-resize-full icon-2x icon-white"></i>Back to Search</button>
        </div>
        <div class="navigation" style="float: right;
margin-bottom: 20px; ">
          <div class="btn-group ui-colour btn-group-two" style="margin-right:0px; padding:2px;"> <a rel="prev" onclick="Reveal.prev();" style="border-right:1px solid #000000; height:56px;">&lt;&lt; Prev</a><a rel="next" style="height:56px;" onclick="Reveal.next();"> Next &gt;&gt;</a> </div>
        </div>
      </div>
    </div>
  </article>
</section>