<?php if ( $ignore_post = get_field('ignore_post')) {  ?>
<?php } else { ?> 
<article class='two-col'>
	<div class='post-content'>

	<h6 class='list-heading'>
	<a href="<?php the_permalink(); ?>">
	<?php the_title(); ?></a>
	</h6>

	<?php the_excerpt(); ?>
	</div>
</article>
<?php } ?>
