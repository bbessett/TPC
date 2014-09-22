<div id="ur-care" class="four columns tablet-view-alpha">
	<div class="grid-block medium-block">
		<div class="heading-tabs">
			<div class="block-heading row">
				<h4 class="block-heading-title left">Urgent Care</h4>
				<a href="/specialties/after-normal-business-hoursurgent-care/" class="icon-tab uc-icon right"></a>
			</div>
		</div>
		<div class='block-inner'>
			<p class="ovr-content"> <?php the_field('uc_description', 4); ?></p>
			<div class="block-content">
				<?php while(has_sub_field( 'ucl_fp_home_content', 4)): ?>
					<div class="post-content">
						<h5 class="heading-small"><?php the_sub_field ('ucl_title')?></h5>
						<p>
							<?php the_sub_field ('ucl_description')?>
							<span class="info">
								<?php the_sub_field ('ucl_phone_link')?> | <a class="dirc-lnk" target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php the_sub_field ('ucl_lat')?>,<?php the_sub_field ('ucl_lng')?>">Directions</a></span>
							</span>
						</p>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<div style="display:none;" class="four large-six tablet-view med-eight columns ovr alpha-full-left">
	<div id="hschedule" class="grid-block medium-block">
		<div class="heading-tabs">
			<div class="block-heading row">
				<h4 class="block-heading-title left">Holiday Schedule</h4>
				<a class="icon-tab star-icon right"></a>
			</div>
		</div>
		<div class='block-inner'><p>When you need immediate care after normal business hours, call 503-221-0161. A Portland Clinic physician may be reached 24 hours a day. You will receive a return phone call from the physician on-call within at least one hour of your message.</p><p>In case of a medical emergency call 911.</p>
		</div>
	</div>
</div>

<div class="four large-six  tablet-view med-eight columns ovr alpha-full-left">
	<div id="afterHours" class="grid-block medium-block">
		<div class="heading-tabs">
			<div class="block-heading row">
				<h4 class="block-heading-title left">After Hours Care</h4>
				<a href="/specialties/after-normal-business-hoursurgent-care/" class="icon-tab cal-icon right"></a>
			</div>
		</div>
		<div class='block-inner'><p>When you need immediate care after normal business hours, call 503-221-0161. A Portland Clinic physician may be reached 24 hours a day. You will receive a return phone call from the physician on-call within at least one hour of your message.</p><p>In case of a medical emergency call 911.</p>
		</div>
	</div>
</div>


