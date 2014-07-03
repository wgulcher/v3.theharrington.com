<div class="btn-group ui-colour btn-dropdown span2 categories-view-dropdown media-query-wrap-item">
    <button class="btn ">Keywords</button>
    <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu ui-colour fx-type--border-default">
         <?php wp_list_categories( $args ); ?> 
    </ul>
    </ul>
</div>
      
       
   
  
      
    
    <div class="btn-group ui-colour btn-dropdown span2 network-view-dropdown media-query-wrap-item">
        <button class="btn ">Network</button>
        <button class="btn dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu ui-colour fx-type--border-default">
            <li><a><i class="icon-cloud icon-border"></i> SoundCloud</a></li>
            <li><a><i class="icon-linkedin icon-border"></i> Linked In</a></li>
            <li><a><i class="icon-pinterest icon-border"></i> Pinterest</a></li>
            <li><a><i class="icon-google-plus icon-border"></i> Google Plus</a></li>
            <li><a><i class="icon-twitter icon-border"></i> Twitter</a></li>
            <li><a><i class="icon-facebook icon-border"></i> Facebook</a></li>
            <li><a><i class="icon-rss icon-border"></i> RSS Feed</a></li>
            <li><a><i class="icon-github icon-border"></i> GitHub</a></li>
        </ul>
    </div>






<div class="span2 post-tags-form">
<div class="ui-colour" style="height:60px;">
    <form action="<?php  echo home_url(); ?>" method="get">
		  <?php wp_dropdown_categories(array(
            'show_option_all' => 'Keywords',
            'hide_empty' => '1',
            'id' => 'categories',
            'class' => 'standard-dropdown'
        )); ?>
    </form>
    </div>
</div>





  <div class="span2 network-query-form">
  <div class="ui-colour" style="height:60px;">
      <select id="network" class="standard-dropdown">
        	<option>All Networks</option>
        	<option><a><i class="icon-cloud icon-border"></i> SoundCloud</a></option>
            <option><a><i class="icon-linkedin icon-border"></i> Linked In</a></option>
            <option><a><i class="icon-pinterest icon-border"></i> Pinterest</a></option>
            <option><a><i class="icon-google-plus icon-border"></i> Google Plus</a></option>
            <option><a><i class="icon-twitter icon-border"></i> Twitter</a></option>
            <option><a><i class="icon-facebook icon-border"></i> Facebook</a></option>
            <option><a><i class="icon-rss icon-border"></i> RSS Feed</a></option>
            <option><a><i class="icon-github icon-border"></i> GitHub</a></option>
      </select>
</div>
</div>