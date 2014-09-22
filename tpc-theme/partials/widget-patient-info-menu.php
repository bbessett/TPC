<div class="row">	
<div class="index-nav twelve columns">
<div class="block-inner">
<ul class="two_up tiles">
<?php while( have_rows('faq_content_blocks') ): the_row(); 
$block_topic_link = get_sub_field('faq_content_tp_title');
$count1++; 
?> 
<li class="list-heading" > 
<a class="skip" gumby-update gumby-offset="-40" gumby-goto="[data-target='toggle_<?php echo $count1++; ?>']" href="#"><?php echo $block_topic_link ?></a>
</li>
<?php endwhile; wp_reset_postdata(); ?>	
</ul>
</div>
</div>
</div>