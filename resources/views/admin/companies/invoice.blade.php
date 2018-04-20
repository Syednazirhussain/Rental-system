
<style type="text/css">

	p { font-size: 13px; font-family: Arial, Helvetica, sans-serif; }

	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	    font-family: Arial, Helvetica, sans-serif;
	}

	th, td {
	    padding: 10px;
	    font-size: 13px;
	    font-family: Arial, Helvetica, sans-serif;
	}

</style>
@unless(empty($Invoice))
<div>

	<div>
		
		<div style="width: 50%; padding: 10px; display: inline-block;">
			<h1 style="color: #48af4d;">HIGHNOX</h1>
		</div>

		<div style="width: 30%; padding: 10px; display: inline-block;">
<!-- 			<p style="margin: 10px 0;"><strong>Ph: 012-3456788-9</strong></p> -->
<!-- 			<p style="margin: 10px 0;"><strong>Office # 12, 7th Floor, Crown Towers, 13-C, Downtown.</strong></p> -->
			<p style="margin: 10px 0;"><strong>{{ $Invoice['Company']->phone }}</strong></p>
			<p style="margin: 10px 0;"><strong>{{ $Invoice['Company']->address }}</strong></p>
		</div>

	</div>


	<div >

		<div style="width: 50%; padding: 10px; display: inline-block;">
			<p style="margin: 10px 0;"><strong>Date: {{ \Carbon\Carbon::parse(date('Y-m-d'))->format('F d, Y') }}</strong></p>
		</div>

		<div style="width: 20%; padding: 10px; display: inline-block;">
			<p style="margin: 10px 0; font-size: 14px;"><strong><u>Invoice # {{ $Invoice['Invoice_id'] }}</u></strong></p>
		</div>

		<div style="width: 20%; padding: 10px; display: inline-block;">
			<p style="margin: 10px 0; font-size: 14px;"><strong><u>Contract # {{ $Invoice['Contract']->number }}</u></strong></p>
		</div>

	</div>


	<div style="margin-top: 10px;">
		
		<div style="width: 45%; padding: 10px; display: inline-block; vertical-align: top;">
			<div style="border: 1px solid #000; padding: 10px 20px;">
				<h4 style="margin: 10px 0;">Bill To</h4>
				<hr>
				<p style="margin: 10px 0;"><strong>{{ $Invoice['Company']->name }}</strong></p>
				<p style="margin: 10px 0;"><strong>{{ $Invoice['Company']->address }}</strong></p>
				<p style="margin: 10px 0;"><strong>{{ $Invoice['Company']->zipcode}}, {{ $Invoice['Company']['city']->name }}, {{ $Invoice['Company']['state']->name }}, {{ $Invoice['Company']['country']->name }}.</strong></p>
				<p style="margin: 10px 0;"><strong>Ph: {{ $Invoice['Company']->phone}}</strong></p>
			</div>
		</div>

		<div style="width: 45%; padding: 10px; display: inline-block; vertical-align: top;">
			<div style="border: 1px solid #000; padding: 10px 20px;">
				<h4 style="margin: 10px 0;">From</h4>
				<hr>
				<p style="margin: 10px 0;"><strong>{{ $Invoice['general_setting']->title }}</strong></p>
				<p style="margin: 10px 0;"><strong>{{ $Invoice['general_setting']->address }}</strong></p>
				<p style="margin: 10px 0;"><strong>{{ $Invoice['general_setting']->zip_code }}, {{ $Invoice['names']['city'] }}, {{ $Invoice['names']['state'] }}, {{ $Invoice['names']['country'] }} </strong></p>
				<p style="margin: 10px 0;"><strong>Ph: {{ $Invoice['general_setting']->phone }}</strong></p>
			</div>
		</div>


	</div>



	<div style="margin-top: 10px; padding: 10px;">

		<table style="width: 100%;">
			<thead style="background-color: #ddd; color: #333;">
				<tr>
					<td width="30px">Sr. #</td>
					<td>ITEMS / SERVICES</td>
					<td width="100px">AMOUNT</td>
				</tr>
			</thead>
			<tbody>
				@for ($i = 0; $i < count($Invoice['Modules']['company_module']); $i++)
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $Invoice['Modules']['company_module'][$i]['module_name']  }}</td>
					<td width="100px">{{ $Invoice['Modules']['company_module'][$i]['module_price']  }}</td>
				</tr>
				@endfor
			</tbody>

			@if(isset($Invoice['Modules']['additional_charges']))

			<thead style="background-color: #ddd; color: #333;">
				<tr>
					<td width="30px">Sr. #</td>
					<td>ADDITIONAL CHARGES</td>
					<td width="100px">AMOUNT</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Finance Services</td>
					<td width="100px">500.00 USD</td>
				</tr>
			</tbody>

			@endif

			<thead style="background-color: #ddd; color: #333;">
				<tr>
					<td colspan="3"></td>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td colspan="2" style="text-align: right;">SUBTOTAL</td>
					<td width="100px">{{ $Invoice['Discount']['Total'] }} </td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: right;">DISCOUNT</td>
					<td width="100px">{{ $Invoice['Discount']['Discount'] }} </td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: right;">TOTAL</td>
					<td width="100px">{{ $Invoice['Discount']['SubTotal'] }} </td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: right;">Tax</td>
					<td width="100px">{{ $Invoice['Discount']['VAT'] }} </td>
				</tr>
			</tbody>

			<thead style="background-color: #ddd; color: #333;">
				<tr>
					<td colspan="2" style="text-align: right;"><strong>NET TOTAL</strong></td>
					<td width="100px"><strong>{{ $Invoice['Discount']['FinalAmount'] }} </strong></td>
				</tr>
			</thead>

		</table>

		<br>
		<p style="margin-left: 50px; margin-right: 50px; text-align: center;">
			<strong>Contract Due Date : </strong> {{ $Invoice['Discount']['ContractRemainingDays'] }}
		</p>
		<p style="margin-left: 50px; margin-right: 50px; text-align: center;">
			<strong>Thank you</strong> for visiting us and making your first purchase! We’re glad that you found what you were looking for. It is our goal that you are always happy with what you bought from us, so please let us know if your buying experience was anything short of excellent. We look forward to seeing you again. Have a great day!
		</p>
	</div>
</div>
@endunless

