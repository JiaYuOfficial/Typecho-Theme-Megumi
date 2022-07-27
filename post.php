<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->need('header.php');?>


<title><?php $this->title() ?></title>
<main>
	<div class="post-main">
			<a name=“top”></a>
		<p class="post-tittle"><?php $this -> title() ?></p>
		<p class="post-dateusr"><i class="bi bi-person-circle"></i><a><?php $this->author(); ?></a>&nbsp;&nbsp;
		<i class="bi bi-calendar3"></i><?php $this->date('Y-m-d'); ?></p>
		 
		 <div class="post-tree">
		    <?php getCatalog(); ?>
		 
	     </div>
		<article class="post-content">
		    
		    
		    <!--引入FancyBox灯箱Jquery插件修改-->
		    <?php
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$this->title.'" title="点击放大"></a>';
    $content = preg_replace($pattern, $replacement, $this->content);
    echo $content;
            ?>
		
		</article>
		
		<div class="post-page-change">
        <ul>
            <li>上一篇：<?php $this->thePrev('%s', '没有了'); ?></li>
            <li>下一篇：<?php $this->theNext('%s', '没有了'); ?></li>
        </ul>
	    </div>
	</div>
    
    <!--此处源码参照：https://github.com/Dreamer-Paul/Single-->
    <?php if($this -> options -> author_text): ?>
        <div class="post-information">
            
            <figure class="post-information-author">
                <?php $this -> author -> gravatar(200); ?>
            </figure>
            <div class="post-information-meta">
                <p>作者：<?php $this -> author(); ?></p>
                <p><?php $this -> options -> author_text() ?></p>
            </div>
        </div>
    
    <?php endif; ?>
    
    <div class="post-comments">
	    <?php $this->need('comments.php'); ?>
	</div>
	
	
	
    <a  onclick="tree()"type="button"><div id="tree"><i class="bi bi-file-text"></i></a>
    <a  onclick="tree2()"type="button"><div id="tree2"><i class="bi bi-file-text"></i></a>
    <div id="post-tree2"> <?php getCatalog(); ?></div>

</main>
	
<?php $this->need('footer.php'); ?>

 
 <!--原版（删除斜杆）-->
 <?php // $this->content(); ?> 
