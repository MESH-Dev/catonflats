<?php 

	//This redirects any call that leads to a 404 page back to the homepage
	$home=esc_url( home_url( '/' ) );
	if(is_404()){
		header('Location: '.$home);
		//We don't want to create a loop, so we just end execution if it doesn't pass
		die();
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Type
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Slab:100,300,400,700|Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<script src="https://use.typekit.net/qrz4kju.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header>
			<div class="nav-position">
				<div class="navigation container">
					<div class="row">
							<div class="sidr-trigger">MENU <i class="fa fa-fw fa-bars"></i></div>
							<nav class="main-navigation">
								<div class="close">CLOSE <i class="fa fa-fw fa-times-circle fa-lg"></i></div>
							<?php if(has_nav_menu('main_nav')){
								$defaults = array(
									'theme_location'  => 'main_nav',
									'menu'            => 'main_nav',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'main',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								); wp_nav_menu( $defaults );
							}else{
								echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
					
				</nav>
			</div>
	</header>
