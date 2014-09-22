
 <footer class="footer" role="contentinfo">
<div class="row">
<div id="inner-footer" class="wrap clearfix">
<div class="row">
<div class="five columns">
	<img class="blk-quote" src="<?php echo site_url(); ?>/wp-content/uploads/2014/05/tpc-block-quote.jpg"/>
</div> 

	<div class="seven columns">

	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'after' => '<span class="divider">&nbsp|</span>','menu_class' => 'footer-menu','walker' => new Walker_Page_Custom, 'container' => '', 'container_class' => '' ) ); ?>

       <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> (503) 223-3113</p>
        	
</div>
</div>
</div> <!-- end #inner-footer -->
</div> <!-- end #container -->

      	</footer> <!-- end footer -->
      </div> </div>


	<?php wp_footer(); ?>

</body>
<?php if (is_page('about')) { ?>    
<div class="modal" id="modal1">
  <div class="content close"> 
    <a class="close switch pauseVideo" gumby-trigger="|#modal1"><i class="icon-cancel" /></i></a>
    <div class="row">
      <div class="ten columns centered text-center">
  
       <article class="youtube video">
        <div id="ytplayer"></div>
        </article>
        <p class="medium primary btn submit">
          <a href="#" class="switch pauseVideo" gumby-trigger="|#modal1">Close</a>
        </p>
      </div>
    </div>
  </div>
</div>

 <script type="text/javascript">
            (jQuery.noConflict())(function($) {

             $(".pauseVideo").click(function(e) {
                player.stopVideo();
              //  e.preventDefault();

           });
      });      
</script> 

<script>
// Load the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// Replace the 'ytplayer' element with an <iframe> and
// YouTube player after the API code downloads.
var player;
function onYouTubePlayerAPIReady() {
  player = new YT.Player('ytplayer', {
    height: '360',
    width: '640',
    videoId: 'qRJ71uFgkfc',
    enablejsapi: 1,
    autohide: 1,
    playerVars: {'rel': 0, 'showinfo': 0, 'hidecontrols': 1, 'modestbranding': 1, 'wmode': 'opaque', },

  });
}
</script>

<?php } ?>


</html> <!-- end page. what a ride! -->