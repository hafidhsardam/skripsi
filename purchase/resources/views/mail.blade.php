<h4>Dear {{ $vendor->vendor_name }},</h4>
<h5{{ $vendor->address }}</h5>



With respect,
<br>
We hereby send our order list for {{ $vendor->vendor_name }} as follows.

<br>	
<br>	
Order Details
<br>	
<table border="1">
	<thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Unit Of Measure</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		@forelse($purchase_prods as $value) 
	        <tr>
	        	<td>{{ $value->nama_produk }}</td>
	        	<td>{{ $value->qty }}</td>
	        	<td>{{ $value->unit }}</td>
				<td>{{ $value->price }}</td>
	        </tr>
	        @empty
	    @endforelse
	</tbody>
</table>

<br>
<br>
This is our detail about ordering product,  for your attention and good cooperation, we thank you very much.
<br>
<br>
<br>
Best Regards,
<br>
Manager Purchasing
<h4>----------------------------------------------------------------------------------------------------------------------------------</h4>
<h4>Yth. {{ $vendor->vendor_name }},</h4>



Hormat kami,
<br>
Dengan ini kami mengirimkan daftar pesanan kami untuk {{ $vendor->vendor_name }} sebagai berikut.

<br>	
<br>	
Detail Pesanan
<br>	
<table border="1">
	<thead>
		<tr>
			<th>Produk</th>
			<th>Jumlah</th>
			<th>Satuan Ukuran</th>
			<th>Harga</th>
		</tr>
	</thead>
	<tbody>
		@forelse($purchase_prods as $value) 
	        <tr>
	        	<td>{{ $value->nama_produk }}</td>
	        	<td>{{ $value->qty }}</td>
	        	<td>{{ $value->unit }}</td>
				<td>{{ $value->price }}</td>
	        </tr>
	        @empty
	    @endforelse
	</tbody>
</table>

<br>
<br>
Demikian detail pemesanan produk kami, atas perhatian dan kerjasamanya yang baik, kami ucapkan banyak terima kasih.
<br>
<br>
<br>
Hormat Kami,
<br>
Manager Purchasing
