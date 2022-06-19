<h4>Dear {{ $vendor->vendor_name }},</h4>
<br>	
Order is on state : {{ $purchase_reqs->status }}<br>
<br>	
For Product
<br>	
<table border="1">
	<thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Unit Of Measure</th>
		</tr>
	</thead>
	<tbody>
		@forelse($purchase_prods as $value) 
	        <tr>
	        	<td>{{ $value->nama_produk }}</td>
	        	<td>{{ $value->qty }}</td>
	        	<td>{{ $value->unit }}</td>
	        </tr>
	        @empty
	    @endforelse
	</tbody>
</table>

<br>
<br>
Thanks.
