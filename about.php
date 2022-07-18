<?php
/**
 * 关于
 *
 * @package custom
 * 
 */
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->need('header.php');?>


<main>
	
	<div class="page-about">
	    <a name=“top”></a>
	    <div class="page-about-index">
	        
	        <div class="page-about-custom">
	            <figure class="page-about-custom-img">
                    <?php $this -> author -> gravatar(220); ?>
                </figure>
	        </div>
	        <div class="page-about-informaintion">
	            <div class="page-about-informaintion-text1">
	                <h2><?php $this->author(); ?></h2>
	                <p><?php $this -> options -> custom_talk() ?></p>
	            </div>
	        <div class="page-about-informaintion-text2">
	            <p><?php $this -> options -> custom_informaintion() ?></p>
	        </div>
	       
        </div>
	             
	        </div>
	    </div>
	</div>
	
	<div class="post-main">
			
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
			
</main>

<?php $this->need('footer.php'); ?>