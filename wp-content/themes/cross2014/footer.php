<?php
/**
 * フッター
 *
 */
?>
<footer id="mainFtr">
	<div class="container">
		<p class="text-center">エンジニアサポートCROSS 2014 実行委員会</p>
	</div>
</footer>


<?php wp_footer();?>
<script type="text/javascript" src="/wp-content/themes/cross2014/js/fancybox/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/cross2014/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="/wp-content/themes/cross2014/js/jquery.smooth-scroll.min.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxHeight : 500,
			minWidth : 320,
			width : 'auto',
			beforeShow : function(){
				$('body').addClass("popup-view")
			},
			afterClose : function(){
				$('body').removeClass("popup-view");
				location.reload();
			}
		});
		$('.carousel').carousel()
	});
</script>
<script src="/wp-content/themes/cross2014/js/bootstrap.min.js"></script>
<script src="/wp-content/themes/cross2014/js/bootswatch.js"></script>
<script src="/wp-content/themes/cross2014/js/bootstrap-scrollspy.js"></script>

</body>
</html>