
<form class="twelve columns" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
   <input type="hidden" name="search-type" value="header" />
<ul>
   	<li class="prepend append field">
        <input class="xwide text input" type="text" value="" name="s" id="s" size="15" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
     
	<div class="medium primary btn searchsubmit"><button type="submit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>"></button></div>
   </li>
   </ul>

</form>   