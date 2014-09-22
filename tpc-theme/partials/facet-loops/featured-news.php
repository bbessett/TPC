<div class="row">
<article class='twelve columns'>
<div class='post-content feature-post'>
<div class="inner-block">
<?php if ( has_post_thumbnail()) : ?>
<div class="post-image">
   <a class="left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
   <?php the_post_thumbnail(); ?>
   </a>
</div>
<?php endif; ?>
<h4 class='list-heading'><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h4>
<p><?php the_excerpt();?></p>
</div>
</div>
</article>
</div>
