<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<label>
<input type="search" id="s"
 placeholder="<?php echo esc_attr_x( 'Søk', 'placeholder' ) ?>"
  onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo esc_attr_x( 'Søk', 'placeholder' ) ?>'"
   value="<?php echo get_search_query() ?>" name="s" autocomplete="off" title="" />
</label>
    <i class="fa fa-search fa-2" type="icon"></i>
</form>
