<?php
/**
 * Megumi Typecho主题
 * 
 *
 * @package Typecho Megumi Theme 
 * @author 甲鱼呀
 * @version 0.8.3
 * @link https://github.com/JiaYuOfficial/Typecho-Theme-Megumi
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
		
		<a name=“top”></a>
		<main>
			<?php while($this->next()): ?>
			<div class="index-post">
				<div class="index-post-item">
					<a href="<?php $this->permalink() ?>"><h1><?php $this->title() ?></h1></a>
					<div class="index-post-item-text">
					<p><?php $this->excerpt(150 , '...');?>
					   
					</p>
					<div style="background-image: url(<?php echo getPostImg($this); ?>)" class="index-post-item-img"></div>
					</div>
				<p class="index-dateusr"><i class="bi bi-folder"></i><?php $this->category(','); ?>&nbsp;&nbsp;<i class="bi bi-calendar3"></i><?php $this->date('Y-m-d'); ?>&nbsp;&nbsp;<i class="bi bi-chat-left-dots"></i><?php $this -> commentsNum(); ?></p>
				</div>
				
			</div>
			
			<?php endwhile; ?>
		    
		    <a href="#top"><div class="top"><i class="bi bi-arrow-up"></i></div></a>
		    <!--<a href="#" onclick="javascript:history.back(-1);"><div class="back"><i class="bi bi-arrow-return-left"></i></div></a>-->
		    <div class="index-page-navigator">
		    <?php $this->pageNav(); ?>
		    </div>
		</main>

<footer class="index-footer">
        
        <a name="bottom"></a>

		<p>Powered By <a href="http://typecho.org/">Typecho</a> • Theme By<a target="_blank"href="https://github.com/JiaYuOfficial/Typecho-Theme-Megumi"> Megumi</a></p>
		<p style="display: inline;">Copyright &copy <?php echo date("Y") ?> </p> <a style="color:#6f9fc7;" href="<?php $this -> options -> adminUrl(); ?>" target="_blank"><?php $this->options->title() ?></a>

		<div class="footer-cutom">
		<?php $this -> options -> footers(); ?>
		</div>
		<div class="footer-cutom"><?php $this -> options -> footers(); ?></div>

</footer>

