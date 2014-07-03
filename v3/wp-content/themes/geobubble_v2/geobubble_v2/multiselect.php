<?php get_header(); 

/**
 * Template Name: Multiselect
 */

?>
   
    <div class="page-content  container">
    
    
     <label for="id_select">Test label YEag</label>
    <select id="id_select" class="selectpicker bla bla bli" multiple data-live-search="true">
        <option>cow</option>
        <option>bull</option>
        <option class="get-class" disabled>ox</option>
        <optgroup label="test" data-subtext="another test" data-icon="icon-ok">
            <option>ASD</option>
            <option selected>Bla</option>
            <option>Ble</option>
        </optgroup>
    </select>

    <div class="container">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label for="bs3Select" class="col-lg-2 control-label">Test bootstrap 3 form</label>
                <div class="col-lg-10">
                    <select id="bs3Select" class="selectpicker show-tick form-control" multiple data-live-search="true">
                        <option>cow</option>
                        <option>bull</option>
                        <option class="get-class" disabled>ox</option>
                        <optgroup label="test" data-subtext="another test" data-icon="icon-ok">
                            <option>ASD</option>
                            <option selected>Bla</option>
                            <option>Ble</option>
                        </optgroup>
                    </select>
                </div>
              </div>
        <form>
    </div>
    </div>
       
    <?php get_footer(); ?>