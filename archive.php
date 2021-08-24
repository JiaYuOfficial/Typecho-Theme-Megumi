 <!--本页源码参照：https://github.com/Dreamer-Paul/Single-->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->need('header.php');?>
<!DOCTYPE html>
<title><?php $this->title() ?></title>
<main>
	<div class="post-main">
			<a name=“top”></a>
		<p class="post-tittle"><?php $this -> archiveTitle(array(
            'category' => _t('%s'),
            'search'   => _t('含关键词“%s”的文章'),
            'tag'      => _t('含标签“%s”的文章'),
            'author'   => _t('“%s”发布的文章')
            ), ""); ?>
         
        </p>
        <p class="post-dateusr"><?php if($this -> is('category')): ?><?php echo $this -> getDescription('“%s”') ?><?php endif; ?></p>
		 
		 
		<article class="post-content">
		    <?php if($this -> have()): ?>
            <?php while($this -> next()): ?>   
		            <div class="archive-item">
                        
                        <p><a href="<?php $this -> permalink(); ?>"><?php $this -> title(); ?></a></p>
                        <p><?php $this -> excerpt(100); ?></p>
                    
                    <div class="archive-post-meta">
                    <p class="index-dateusr"><i class="bi bi-calendar3"></i>
                    <?php $this->date('Y-m-d'); ?>&nbsp;&nbsp;<i class="bi bi-chat-left-dots"></i><?php $this -> commentsNum(); ?></p>
                    </div>
                    
                    </div>
            <?php endwhile; ?>
		<?php else: ?>
            <p style="font-size:1.6em; text-align:center;">!!!∑(ﾟДﾟノ)ノ找不到结果~</p>
        <?php endif; ?>
		</article>
		
	</div>
    
    

</main>
	
<?php $this->need('footer.php'); ?>