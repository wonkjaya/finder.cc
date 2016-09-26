
	<script src="<?=base_url('assets/jquery-components/js/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/bootstrap-components/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/bootstrap-components/js/bootstrap-datepicker.js')?>"></script>
	<script src="<?=base_url('assets/bootstrap-components/js/bootstrap-table.js')?>"></script>
<?php
if($header['menu_aktif'] == 1){
?>
	<script src="<?=base_url('assets/lumino/js/chart.min.js')?>"></script>
	<script src="<?=base_url('assets/lumino/js/chart-data.js')?>"></script>
	<script src="<?=base_url('assets/lumino/js/easypiechart.js')?>"></script>
	<script src="<?=base_url('assets/lumino/js/easypiechart-data.js')?>"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
<?php
}
?>
</body>

</html>
