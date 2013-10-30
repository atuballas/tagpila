<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php if( isset( $page_title ) ) echo $page_title; ?></title>	
	<?php if( APPDIR == '' ): ?>		
		<base href="<?php echo BASEURL.'/'; ?>" />
	<?php else: ?>
		<base href="<?php echo BASEURL.APPDIR.'/'; ?>" />
	<?php endif; ?>	
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo THEMESCSSFOLDER;?>reset.css" type="text/css" media="screen" charset="utf-8">	
	<link rel="stylesheet" href="<?php echo THEMESCSSFOLDER;?>style.css" type="text/css" media="screen" charset="utf-8">		
	<!--[if lt IE 9]>
  	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->
</head>

<body>
	<div id="wrapper">
		<!-- dynamic part requested by loadView() method from controller file -->
		<?php include_once( VIEWSFOLDER . $view . EXT ); ?>
	</div>
</body>

</html>