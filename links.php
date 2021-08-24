<?php
/**
 * 友链
 *
 * @package custom
 * 核心源码提供：https://www.onesrc.cn/p/how-to-add-independent-friend-chain-pages-to-typecho.html
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->need('header.php');?>

<!DOCTYPE html>
<title>友情链接</title>
<main>
	<div class="post-links">
			<a name="top"></a>
		<p class="post-tittle">友情链接</p>
		
		 
		<article class="post-content-links">
		    
		    
		    <!--引入FancyBox灯箱Jquery插件修改-->
		    <?php
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$this->title.'" title="点击放大"></a>';
    $content = preg_replace($pattern, $replacement, $this->content);
    echo $content;
            ?>
		
		<script>
(function(){
    let a =document.getElementById("flinks");
    if(a){
        let ns = a.querySelectorAll("li");
        let nsl = ns.length;
        let str ='<div class="links-lists"><div class="links-lists-body">';
        let bgid = 0;
        const bgs =["links-bg-blue","links-bg-purple","links-bg-green","links-bg-yellow","links-bg-pink","links-bg-orange","links-bg-red"];
        for(let i = 0;i<=nsl-5;i+=5){
            bgid = Math.floor(Math.random() * 8);
            str += (`
            
            <a href="${ns[i+3].innerText}">
            <div class="links-list-item  ${bgs[bgid]}">
            
            <div class="post-list-item-container ">
            
            <div class="links-img"><img src="${ns[i+4].innerText}"></div>
            
            
            <div class="links-item-meta">
            <div><div class="links-item-title"><a href="${ns[i+3].innerText}">${ns[i].innerText}</a></div>
            <div class="linke-item-meta-iformaintion"><a>${ns[i+1].innerText}</a></div>
            <div class="linke-item-meta-iformaintion"><a>${ns[i+2].innerText}</a></div>
            <p>&nbsp;</p>
            
            </div>
            </div>
            </div>
            </div>
            </a>
            `);
        }
        str+='</div></div>';
        let n1 = document.createElement("div");
        n1.innerHTML = str;
        a.parentNode.insertBefore(n1,a);
        a.style="display: none;";
    }else{
        console.log('No such id "flinksH"');
    }
}())
 </script>
		
		</article>
		
	
	</div>
    
    
    <div class="post-comments">
	    <?php $this->need('comments.php'); ?>
	</div>

</main>
	
<?php $this->need('footer.php'); ?>
