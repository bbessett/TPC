<?php $relationships = get_field('specialty_child_page'); ?>	

<?php if( $relationships ): ?>
  <div class="grid-block related">
	<div class="block-inner">
		<div class="widget-content">
		<h5> <?php // the_title();?> Speciality Services </h5>
			    <ul style="margin-top:10px;" class="meta-list">
		<?php foreach( $relationships as $p): ?>
				<?php setup_postdata($p); ?>
				 <li>
				 <a class="list-heading"  href="<?php echo get_the_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
				 </li>
		<?php endforeach; ?>
				</ul>
			 <?php wp_reset_postdata();?>
			</div>
			</div>
		</div>
	 <?php endif; ?>
