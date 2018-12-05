@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>
                {{ session('username') }}&#64;{{ session('host') }}
            </h4>
            <div class="card">
                {{--<div class="card-header">Dashboard</div>--}}

                <div class="card-body">
                    <div class="float-right">
                        <address-create-component></address-create-component>
                    </div>
                    <h2>
                        Balance: {{ $balance }} BTC
                    </h2>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h4>Addresses</h4>
                            <ul class="list-group">
                                @foreach($addresses as $address)
                                    <li class="list-group-item">
                                        <h5>{{ $address['address'] }}</h5>
                                        <div>
                                            <span class="badge badge-info">
                                                Amount: {{ $address['amount'] }}
                                            </span>
                                            <span class="badge badge-success">
                                                Confirmations: {{ $address['confirmations'] }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4>Transactions</h4>
                            <ul class="list-group">
                                @foreach($transactions as $transaction)
                                    <li class="list-group-item">
                                        {{ json_encode($transaction) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
