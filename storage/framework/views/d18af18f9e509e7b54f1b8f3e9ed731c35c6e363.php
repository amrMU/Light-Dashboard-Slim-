<p>
	Hi <?php echo e(@$name); ?>,<br>
	We are <?php echo e(@$setting->site_name); ?>,  we recived your message and will contact with you nearly.
</p>
<table>
	<tr>
		<td>title : </td>
		<td><?php echo e(@$name); ?></td>
	</tr>
	<tr>
		<td>email : </td>
		<td><?php echo e(@$email); ?></td>
	</tr>
	<tr>
		<td>reply : </td>
		<td><?php echo @$mms; ?></td>
	</tr>
	<tr style="border-top:1px #ccc solid">
		<td>your message : </td>
		<td><?php echo @$mms; ?></td>
	</tr>
</table>