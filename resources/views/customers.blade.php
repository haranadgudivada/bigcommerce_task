@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
    <thead>
        <tr>
            <th align="left">Customer Name</th>
            <th align="left">Email ID</th>
            <th align="left">Created Date</th>
            <th align="center"># of Orders</th>
            <th align="center">View</th>
        </tr>
    </thead>
    <tbody>
        {{-- Details go here --}}
        @if(count($customers_info) > 0)
        @foreach($customers_info as $customer_info)
        <tr>                        
        <td align="left">{{  $customer_info['customer_name'] }}</td>
        <td align="left">{{  $customer_info['customer_email'] }}</td>
        <td align="left">{{  $customer_info['date_created'] }}</td>
        <td align="center">{{  $customer_info['orders_count'] }}</td>
        <td align="center">
        @if($customer_info['orders_count'] > 0)
        <a href="/customer_details/{{  $customer_info['customer_id'] }}">View</a>
        @endif
        </td>
        </tr>
        @endforeach
        <tr>
        <td colspan="5" height="50" v-align="center" align="center">
        <a href="/customers/1">First</a>&nbsp;&nbsp;
        <a href="/customers/{{  $prev_page }}">< Prev</a>&nbsp;&nbsp;
        <a href="/customers/{{  $next_page }}">Next ></a>&nbsp;&nbsp;
        <a href="/customers/{{  $last_page }}">Last</a>
        </td>
        </tr>
        @else
        <tr>
        <td colspan="5" height="50" v-align="center" align="center">No Records Found</td>
        </tr>
        @endif
    </tbody>
    </table>
@endsection
