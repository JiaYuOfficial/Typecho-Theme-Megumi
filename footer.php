	<a href="#top"><div class="top"><i class="bi bi-arrow-up"></i></div></a>
	<a href="#" onclick="javascript:history.back(-1);"><div class="back"><i class="bi bi-arrow-return-left"></i></div></a>
	<a href="#bottom"><div class="bottom"><i class="bi bi-chat-dots"></i></div></a>	
	<a href="<?php $this->options->siteUrl(); ?>"><div class="home"><i class="bi bi-house"></i></div></a>
	
	<footer>
		 <a name="bottom"></a>
	
		<p>Powered By <a href="http://typecho.org/">Typecho</a> • Theme By<a target="_blank"href="https://github.com/JiaYuOfficial/Typecho-Theme-Megumi"> Megumi</a></p>
		<p>Copyright &copy <?php echo date("Y") ?> <?php $this->options->title() ?></p>

		<div class="footer-cutom">
		<?php $this -> options -> footers(); ?>
		</div>
	
	</footer>