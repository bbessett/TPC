
<?php 
if (get_field('pdf_uploads', $post->ID))  {
      $attachment_id = get_field('pdf_uploads');
      $url = $attachment_id['url']; 
?>
<h6 class='list-heading'>
<span class="no-caps"><?php the_title(); ?></span>
<a class='dl-icon' target='_blank' href='<?php echo $url; ?>'>
<br/><span class="pdf-ico"></span> Download</a></h6>
<?php } else { ?>
<h6 class='list-heading'><a href="<?php the_permalink(); ?>">
<?php the_title(); ?></a></h6>

<?php } ?>





