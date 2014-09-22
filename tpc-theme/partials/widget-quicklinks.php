<div class="row">	
<div class="index-nav twelve columns">
<div class="block-inner">
<ul>
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
<div class="row">
<div id="slide-wrap">
<div class="block-inner topics">
<?php while( have_rows('faq_content_blocks') ): the_row(); 
$block_topic = get_sub_field('faq_content_tp_title'); $count2++; ?> 
<div class="topic-content" data-target='toggle_<?php echo $count2++;?>'>
<h5 class="topic-title"><?php echo $block_topic?></h5>
<?php while( have_rows('faq_topic_content') ): the_row(); 
	$topic_title = get_sub_field('faq_topic_title'); 
	$topic_content = get_sub_field('faq_topic_description'); 
    $topic_media = get_sub_field('sub_topic_media'); 
    if (get_sub_field('sub_topic_media'))  { 
      $attachment_id = get_sub_field('sub_topic_media'); 
      $download = $attachment_id['url'];
 	 }
	$cc++; ?>
	 <h5 class="heading-small list-heading">
	 <a href="#" class="toggle" gumby-trigger=".slide-content.slide-0<?php echo $cc;?>"><i class="icon-up-dir"></i><?php echo $topic_title; ?></a>
	 </h5>
			<div class="slide-content slide-0<?php echo $cc;?>">  
			<div class="slide-desc"><?php echo $topic_content;?>

<?php if (get_sub_field('sub_topic_media'))  { ?><br/><a class='dl-icon' target='_blank' href='<?php echo $download; ?>'><span class="pdf-ico"></span>Download</a><?php }?></div>
			</div>
		
		<?php endwhile;?>
	</div>
	<?php endwhile; wp_reset_postdata();?>	
		</div>	
	</div>
</div>
