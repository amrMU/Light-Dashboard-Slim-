<p>
	Hi {{ @$name }},<br>
	We are {{@$setting->site_name}},  we recived your message and will contact with you nearly.
</p>
<table>
	<tr>
		<td>title : </td>
		<td>{{ @$name }}</td>
	</tr>
	<tr>
		<td>email : </td>
		<td>{{ @$email }}</td>
	</tr>
	<tr>
		<td>reply : </td>
		<td>{!! @$mms !!}</td>
	</tr>
	<tr style="border-top:1px #ccc solid">
		<td>your message : </td>
		<td>{!! @$mms !!}</td>
	</tr>
</table>