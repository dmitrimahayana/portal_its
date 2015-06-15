<script type="text/javascript">
<!--
$(document).ready(function(){
	/* Date Picker */
	$("<?php echo $date_start; ?>").datepick({dateFormat: 'dd-mm-yyyy', defaultDate: '0', selectDefaultDate: true});
	$("<?php echo $date_end; ?>").datepick({dateFormat: 'dd-mm-yyyy', defaultDate: '+2w', selectDefaultDate: true});
});
-->
</script>