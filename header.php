	
	
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/style.css">
		<link rel="stylesheet" href="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/bootstrap/bootstrap-icons.css">
		 <script src="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/megumi.js"></script>
		<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
		<?php $this->header(); ?>
		<link rel="icon" href="<?php $this -> options -> logoUrl(); ?>" sizes="192x192"/>
	    <title><?php $this -> archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('含关键词 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); $this -> options -> title(); ?></title>
	    <style type="text/css"><?php $this -> options -> custom_css(); ?></style>

        
        <link rel="stylesheet"href="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/prism.css">
        <script src="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/prism.js"></script>
	   
	
	    
	    		 <!--灯箱-->
		 <script type="text/javascript">$(document).ready(function () {$( ".fancybox").fancybox();});</script>
        <script type="text/javascript" src="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/jquery.min.js"></script> 
        <!--如果主题已经引用了jQuery库，可以忽略这条-->
        <link rel="stylesheet" href="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/fancybox/jquery.fancybox.min.css">
        <script src="<?php $this->options->siteUrl(); ?>usr/themes/Megumi/other/fancybox/jquery.fancybox.min.js"></script>

        <style>
        body:before{opacity: 0.1;}
        </style>

        <?php if($this -> options -> background): ?>
        <style>body:before{background-image: url(<?php $this -> options -> background(); ?>)}
        body:before{opacity: <?php $this -> options -> background_other(); ?>;}
        </style>
        <?php endif; ?>
	
	</head>
	
	<header>
			<nav class="index-nav">
				<div class="index-nav-tittle"><?php $this->options->title() ?></div>
				<div  class="index-nav-links">
					<a href="<?php $this->options->siteUrl(); ?>">主页</a>
			
					<a class="nav-second-menu">分类</a>
					<div class="nav-menu1">
					    <?php $this -> widget('Widget_Metas_Category_List') -> parse('<a href="{permalink}">{name}</a>'); ?>
					</div>
				
					
					<?php $this->widget('Widget_Contents_Page_List')
					   ->parse('<a href="{permalink}">{title}</a>'); ?>
				</div>
			</nav>
	</header>