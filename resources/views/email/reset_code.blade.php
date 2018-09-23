<p>
	Hi {{ @$find_user->name }},<br>
	We are app Mully, We are sad for your loss your password, followed this message to know your verify Code.
</p>
<table>
	<tr>
		<td>Code Verify Owner:</td>
		<td>{{ @$generate_code }}</td>
	</tr>
</table>