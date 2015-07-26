
<script src="<?=base_url()?>js/jquery.php.js"></script>

<script type="text/javascript">
var i = 0;
window.setInterval (
	function () {
		//alert('sdsd');
		$.php('<?=base_url()?>index.php/prestasi/index4');
	},
1500); //loop 1 stgh saat sekali
</script>