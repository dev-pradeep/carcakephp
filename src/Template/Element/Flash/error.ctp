<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
	var simple = '<?php echo $message; ?>';	
	toastr.error(simple);
</script>
