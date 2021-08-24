<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->need('header.php');?>

<title><?php $this->title() ?></title>
<main>
	<div class="post-main">
			<a name=“top”></a>
		<p class="post-tittle"><?php $this -> title() ?></p>
		<article class="post-content">
		    
		    
		    <!--引入FancyBox灯箱Jquery插件修改-->
		    <?php
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$this->title.'" title="点击放大"></a>';
    $content = preg_replace($pattern, $replacement, $this->content);
    echo $content;
            ?>
		
		</article>
		      
	</div>
    
    
    <div class="post-comments">
	    <?php $this->need('comments.php'); ?>
	</div>
	
		
			</main>
<?php $this->need('footer.php'); ?>
 
 <!--原版（删除斜杆）-->
 <?php // $this->content(); ?> 
