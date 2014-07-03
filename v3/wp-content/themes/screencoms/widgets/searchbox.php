            
                <div class="align-right" style="width:300px; display:inline-block;"> 
            



<form role="search" method="get" id="searchform" action="<?php  echo home_url();?>" class="input-prepend input-append filter-search ui-colour fx-type--border-default">
	<!-- label class="screen-reader-text" for="s">Search for:</label -->
   
   <input type="text" name="s" id="s" placeholder="Enter Search Term&hellip;" value="<?php the_search_query() ?>" class="filter-search-box">
   <button type="submit" class="filter-submit _btn-info  _btn-danger" style="margin-left:0px; border-bottom-left-radius:0px; border-top-left-radius:0px;"><i class='icon-search icon-2x'></i></button>
</form>

</div>