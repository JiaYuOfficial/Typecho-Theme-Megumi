<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="post-comment-content">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    
    
    <div class="post-comment-first">
     <?php $comments->listComments(array(
            'avatarSize'    =>  52,
            'dateFormat'    =>  'Y-m-d H:i'
            )); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div>
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="response"><?php _e('评论'); ?></h3>
    	
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            
            <div class="post-comment-text">
    		<div class="post-comment-informain">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('注销'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p>
               
    			<input type="text" name="author" id="author" class="text" placeholder="昵称*：" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p>
               
    			<input type="email" name="mail" id="mail" class="text" placeholder="邮箱 *："  value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p>
                
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            </div>
            <?php endif; ?>
            <div class="post-comment-informain2">
    		<p>
               
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
    		<p>
                <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
            </p>
            </div>
            </div>
    	</form>
    </div>
    
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    
    
    

</div>
