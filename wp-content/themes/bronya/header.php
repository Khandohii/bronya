<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset') ?>">
		<!-- Переключение IE в последнию версию, на случай если в настройках пользователя стоит меньшая -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Адаптирование страницы для мобильных устройств -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Запрет распознования номера телефона -->
		<meta name="format-detection" content="telephone=no">
		<meta name="SKYPE_TOOLBAR" content ="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

		<!-- Заголовок страницы -->
		<title><?php echo get_bloginfo() ?></title>

		<!-- Данное значение часто используют(использовали) поисковые системы -->
		<meta name="description" content="<?php echo get_bloginfo('description') ?>">
		<meta name="keywords" content="">

		<?php wp_head(); ?>
	</head>

	<body>
		<div class="wrap">
			<div class="main">
				<!-- Шапка -->
				<header>
					<div class="cont">
						<div class="box flex">
							<?php
							$custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

							if ($custom_logo__url):
							?>
							<div class="logo"><img src="<?php echo $custom_logo__url[0]; ?>" alt=""></div>
							<?php endif; ?>

							<div class="wrap_menu flex">
								<?php if (ot_get_option('header_sect_menu_items')) : ?>
								<nav class="menu flex">
									<?php
									$menu_items	= ot_get_option('header_sect_menu_items');

									foreach ($menu_items as $item) :
										$offset = $item['header_sect_menu_item_offset'];
										$offsetText = '';
										if ($offset != 0) {
											$offsetText = 'data-offset="' . $offset . '"';
										}
									?>
									<div class="item">
										<a href="/" class="scroll_link" data-anchor="<?php echo $item['header_sect_menu_item_link']; ?>" <?php echo $offsetText; ?> >
											<?php echo $item['title']; ?>
										</a>
									</div>
									<?php endforeach; ?>
								</nav>
								<?php endif; ?>

								<?php if (ot_get_option('header_sect_contact_tg') || ot_get_option('header_sect_contact_insta')) : ?>
								<div class="contact flex">
									<div class="contact_text">
										<span>Є питання?</span> Пиши
									</div>

									<div class="line"></div>

									<div class="socials flex">
										<?php if (ot_get_option('header_sect_contact_tg')) : ?>
										<a href="<?php echo ot_get_option('header_sect_contact_tg'); ?>" class="soc" target="_blank">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M20.665 3.71682L2.93497 10.5538C1.72497 11.0398 1.73197 11.7148 2.71297 12.0158L7.26497 13.4358L17.797 6.79082C18.295 6.48782 18.75 6.65082 18.376 6.98282L9.84297 14.6838H9.84097L9.84297 14.6848L9.52897 19.3768C9.98897 19.3768 10.192 19.1658 10.45 18.9168L12.661 16.7668L17.26 20.1638C18.108 20.6308 18.717 20.3908 18.928 19.3788L21.947 5.15082C22.256 3.91182 21.474 3.35082 20.665 3.71682Z" fill="currentColor"/>
											</svg>
										</a>
										<?php endif; ?>

										<?php if (ot_get_option('header_sect_contact_insta')) : ?>
										<a href="<?php echo ot_get_option('header_sect_contact_insta'); ?>" class="soc" target="_blank">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 8.87579C10.2797 8.87579 8.87577 10.2797 8.87577 12C8.87577 13.7203 10.2797 15.1242 12 15.1242C13.7203 15.1242 15.1242 13.7203 15.1242 12C15.1242 10.2797 13.7203 8.87579 12 8.87579ZM21.3703 12C21.3703 10.7063 21.382 9.42423 21.3094 8.13283C21.2367 6.63283 20.8945 5.30158 19.7976 4.2047C18.6984 3.10548 17.3695 2.76564 15.8695 2.69298C14.5758 2.62033 13.2937 2.63204 12.0023 2.63204C10.7086 2.63204 9.42655 2.62033 8.13515 2.69298C6.63515 2.76564 5.3039 3.10783 4.20702 4.2047C3.1078 5.30392 2.76796 6.63283 2.6953 8.13283C2.62265 9.42658 2.63436 10.7086 2.63436 12C2.63436 13.2914 2.62265 14.5758 2.6953 15.8672C2.76796 17.3672 3.11015 18.6985 4.20702 19.7953C5.30624 20.8945 6.63515 21.2344 8.13515 21.307C9.4289 21.3797 10.7109 21.368 12.0023 21.368C13.2961 21.368 14.5781 21.3797 15.8695 21.307C17.3695 21.2344 18.7008 20.8922 19.7976 19.7953C20.8969 18.6961 21.2367 17.3672 21.3094 15.8672C21.3844 14.5758 21.3703 13.2938 21.3703 12ZM12 16.807C9.33983 16.807 7.19296 14.6602 7.19296 12C7.19296 9.33986 9.33983 7.19298 12 7.19298C14.6601 7.19298 16.807 9.33986 16.807 12C16.807 14.6602 14.6601 16.807 12 16.807ZM17.0039 8.11876C16.3828 8.11876 15.8812 7.6172 15.8812 6.99611C15.8812 6.37501 16.3828 5.87345 17.0039 5.87345C17.625 5.87345 18.1266 6.37501 18.1266 6.99611C18.1267 7.14359 18.0978 7.28966 18.0415 7.42595C17.9851 7.56224 17.9024 7.68607 17.7981 7.79036C17.6939 7.89464 17.57 7.97733 17.4337 8.03368C17.2974 8.09004 17.1514 8.11895 17.0039 8.11876Z" fill="currentColor"/>
											</svg>
										</a>
										<?php endif; ?>
									</div>
								</div>
								<?php endif; ?>
							</div>

							<button type="button" class="mob_menu_link">
								<span></span>
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</header>
				<!-- End Шапка -->