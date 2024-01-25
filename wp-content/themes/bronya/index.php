<?php get_header(); ?>
<!-- Основная часть -->
<section class="first_section">
	<div class="abs"><img src="<?php help_images('flag.svg'); ?>" alt=""></div>

	<div class="cont flex">
		<div class="column">
			<?php if (ot_get_option('first_section_subtitle')) : ?>
			<div class="subtitle"><?php echo ot_get_option('first_section_subtitle'); ?></div>
			<?php endif; ?>

			<?php if (ot_get_option('first_section_title')) : ?>
			<h1 class="title"><?php echo ot_get_option('first_section_title'); ?></h1>
			<?php endif; ?>
		</div>

		<div class="column">
			<?php if (ot_get_option('first_section_desc')) : ?>
			<div class="desc"><?php echo ot_get_option('first_section_desc'); ?></div>
			<?php endif; ?>

			<?php if (ot_get_option('first_section_link')) : ?>
			<div class="link_join">
				<a href="<?php echo ot_get_option('first_section_link'); ?>">
					Приєднатися

					<span class="icon">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.30188 9.02661H15.6981L7.86775 1.30199" stroke="currentColor" stroke-width="1.62066"/>
							<path d="M7.79016 17.1133L12.1988 12.7709" stroke="currentColor" stroke-width="1.62066"/>
						</svg>
					</span>
				</a>
			</div>
			<?php endif; ?>
		</div>

		<?php if (ot_get_option('first_section_video_switcher') == 'youtube') : ?>
			<?php if (ot_get_option('first_section_video_link')) : ?>
			<div class="link_video">
				<a href="<?php echo ot_get_option('first_section_video_link'); ?>" class="fancy_img">
					<img src="<?php help_images('sheet_img.png'); ?>" alt="">

					<span class="icon">
						<svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22.906 12.221C24.2393 12.9908 24.2393 14.9153 22.906 15.6851L3.47648 26.9027C2.14315 27.6725 0.47648 26.7103 0.47648 25.1707V2.73538C0.47648 1.19578 2.14315 0.233524 3.47648 1.00332L22.906 12.221Z" fill="currentColor"/>
						</svg>
					</span>
				</a>
			</div>
			<?php endif; ?>
		<?php elseif (ot_get_option('first_section_video_switcher') == 'load'):?>
			<?php if (ot_get_option('first_section_video_video')) : ?>
			<div class="link_video">
				<a href="<?php echo ot_get_option('first_section_video_video'); ?>" class="fancy_img">
					<img src="<?php help_images('sheet_img.png'); ?>" alt="">

					<span class="icon">
						<svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22.906 12.221C24.2393 12.9908 24.2393 14.9153 22.906 15.6851L3.47648 26.9027C2.14315 27.6725 0.47648 26.7103 0.47648 25.1707V2.73538C0.47648 1.19578 2.14315 0.233524 3.47648 1.00332L22.906 12.221Z" fill="currentColor"/>
						</svg>
					</span>
				</a>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>


<?php if (ot_get_option('about_on_off') != 'off') : ?>
<section id="sect_about" class="sect_about">
	<div class="cont">
		<?php if (ot_get_option('about_section_subtitle')) : ?>
		<div class="subtitle"><?php echo ot_get_option('about_section_subtitle'); ?></div>
		<?php endif; ?>

		<?php if (ot_get_option('about_title')) : ?>
		<div class="main_title"><?php echo ot_get_option('about_title'); ?></div>
		<?php endif; ?>

		<?php if (ot_get_option('about_list_items')) : ?>
		<div class="grid flex">
			<?php
			$about_items = ot_get_option('about_list_items');

			foreach ($about_items as $item) :
				if ($item['about_list_item_switcher'] == "textblock"):
			?>
			<div class="item bord">
				<div class="icon">
					<img data-src="<?php echo $item['about_list_item_icon']; ?>" alt="" class="lozad">
				</div>

				<div class="text_block"><?php echo $item['about_list_item_content']; ?></div>
			</div>
			<?php elseif($item['about_list_item_switcher'] == "image"): ?>
			<div class="item img">
				<img data-src="<?php echo $item['about_list_item_image']; ?>" alt="" class="lozad">
			</div>
			<?php
				endif;
			endforeach;
			?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>


<?php if (ot_get_option('for_whom_on_off') != 'off') : ?>
<section id="for_whom" class="for_whom">
	<div class="cont">
		<div class="wrap_title flex">
			<?php if (ot_get_option('for_whom_title')) : ?>
			<div class="main_title black"><?php echo ot_get_option('for_whom_title'); ?></div>
			<?php endif; ?>

			<?php if (ot_get_option('for_whom_quote_text')) : ?>
			<div class="block_quote flex">
				<?php if (ot_get_option('for_whom_quote_photo')) : ?>
				<div class="photo">
					<img data-src="<?php echo ot_get_option('for_whom_quote_photo'); ?>" alt="" class="lozad">
				</div>
				<?php endif; ?>

				<div>
					<div class="text"><?php echo ot_get_option('for_whom_quote_text'); ?></div>

					<?php if (ot_get_option('for_whom_quote_author')) : ?>
					<div class="name"><?php echo ot_get_option('for_whom_quote_author'); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<?php if (ot_get_option('for_whom_list_items')) : ?>
		<div class="grid flex">
			<?php
			$for_whom_items = ot_get_option('for_whom_list_items');

			foreach ($for_whom_items as $key => $item) :
				$key = $key + 1;
				if ($key < 10) {
					$key = '0' . $key;
				}
			?>
			<div class="item">
				<div class="number"><?php echo $key; ?>.</div>

				<div class="data"><?php echo $item['title']; ?></div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>


<?php if (ot_get_option('advantages_on_off') != 'off') : ?>
<section id="advantages" class="advantages">
	<div class="cont">
		<?php if (ot_get_option('advantages_title')) : ?>
		<div class="main_title"><?php echo ot_get_option('advantages_title'); ?></div>
		<?php endif; ?>

		<?php if (ot_get_option('advantages_list_items')) : ?>
		<div class="grid flex">
			<?php
			$advantages_items = ot_get_option('advantages_list_items');

			foreach ($advantages_items as $key => $item) :
				$key = $key + 1;
				if ($key < 10) {
					$key = '0' . $key;
				}
			?>
			<div class="item">
				<div class="top flex">
					<div class="icon">
						<img data-src="<?php echo $item['advantages_list_item_icon']; ?>" alt="" class="lozad">
					</div>

					<div class="number"><?php echo $key; ?></div>
				</div>

				<div class="text_block"><?php echo $item['advantages_list_item_content']; ?></div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php
		if (ot_get_option('advantages_gallery')) : ?>
		<div class="swiper gallery">
			<div class="swiper-wrapper">
				<?php
				$images = explode(',', ot_get_option('advantages_gallery'));
				foreach ($images as $key => $img) :
					$imgSmall = wp_get_attachment_image_src($img, 'medium');
					$imgLarge = wp_get_attachment_image_src($img, 'full');

				?>
				<div class="swiper-slide slide">
					<a href="<?php echo $imgLarge[0]; ?>" class="img fancy_slider">
						<img src="<?php echo $imgSmall[0]; ?>" alt="">
					</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>


<?php if (ot_get_option('sect_join_on_off') != 'off') : ?>
<section id="sect_join" class="sect_join">
	<div class="cont flex">
		<div class="data">
			<?php if (ot_get_option('sect_join_title')) : ?>
			<div class="main_title black"><?php echo ot_get_option('sect_join_title'); ?></div>
			<?php endif; ?>


			<?php if (ot_get_option('sect_join_events_list_items')) : ?>
			<div class="events flex">
				<?php
				$ivents_items = ot_get_option('sect_join_events_list_items');

				foreach ($ivents_items as $item) :
				?>
				<div class="item text_block"><?php echo $item['sect_join_events_list_item_content']; ?></div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>


			<?php if (ot_get_option('sect_join_plans_list_items')) : ?>
			<div class="pricing flex">
				<?php
				$plans_items = ot_get_option('sect_join_plans_list_items');

				foreach ($plans_items as $item) :
				?>
				<div class="item">
					<?php if ($item['title']) : ?>
					<div class="name"><?php echo $item['title']; ?></div>
					<?php endif; ?>

					<?php if ($item['sect_join_plans_list_item_bonus']) : ?>
					<div class="bonus"><?php echo $item['sect_join_plans_list_item_bonus']; ?></div>
					<?php endif; ?>

					<div class="box_price">
						<?php if ($item['sect_join_plans_list_item_old_price']) : ?>
						<div class="old_price"><span><?php echo $item['sect_join_plans_list_item_old_price']; ?></span></div>
						<?php endif; ?>

						<div class="price">
							<b><?php echo $item['sect_join_plans_list_item_price']; ?></b> <span>/<?php echo $item['sect_join_plans_list_item_period']; ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>

		<form action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" class="form ajax_submit">
			<?php if (ot_get_option('sect_join_form_title')) : ?>
			<div class="title"><?php echo ot_get_option('sect_join_form_title'); ?></div>
			<?php endif; ?>
			<input type="hidden" name="action" value="order_data">

			<div class="line_form">
				<input type="text" name="name" class="input" placeholder="ПІБ">
			</div>

			<div class="line_form">
				<input type="tel" name="phone" class="input" placeholder="Номер телефону">
			</div>

			<div class="line_form">
				<input type="text" name="sphere" class="input" placeholder="Сфера діяльності">
			</div>

			<div class="submit">
				<button type="submit" class="submit_btn">Приєнатися</button>
			</div>
		</form>
	</div>
</section>
<?php endif; ?>

<!-- End Основная часть -->
<?php get_footer(); ?>