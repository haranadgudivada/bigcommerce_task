@extends('layouts.app')

@section('title', $customer_details->first_name . "'s Order History")

@section('content')
    <table>
        <thead>
            <tr>
                <th align="left">Date</th>
                <th align="center"># of Products</th>
                <th align="right">Total</th>
            </tr>
        </thead>
        <tbody>
            @if($order_history)
            <?php $lifeTimeValue = 0; ?>
            @foreach($order_history as $order_details)
            <?php $order_value = round($order_details->total_inc_tax, 2); ?>
            <tr>
                <td align="left"><?php echo date('d-m-Y', strtotime($order_details->date_created)); ?></td>
                <td align="center">{{ $order_details->items_total }}</td>
                <td align="right">$ {{ $order_value }}</td>
            </tr>
            <?php $lifeTimeValue = $lifeTimeValue +  $order_value; ?>
            @endforeach
            <tr>
                <td colspan="2" align="right"><b>Lifetime Value: </b></td>
                <td align="right">${{ $lifeTimeValue }}</td>
            </tr>
            @else
            <tr>
                <td colspan="3" height="50" v-align="center" align="center">No records Found</td>
            </tr>
            @endif

        </tbody>
    </table>
@endsection
