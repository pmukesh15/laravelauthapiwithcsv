@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Imported Data</div>

                <div class="card-body">
                    <table>
                      <thead>
                        <tr>
                          <th>Product Name </th>
                          <th>Price </th>
                          <th>SKU </th>
                          <th>Description </th>
                        </tr>
                      </thead>
                      <tbody>
                      @if($imports)
                      @foreach($imports as $imp)
                        <tr>
                          <td>{{$imp['product_name']}}</td>
                          <td>{{$imp['price']}} </td>
                          <td>{{$imp['sku']}} </td>
                          <td>{{$imp['description']}} </td>
                        </tr>
                      @endforeach
                      @else
                      <tr>No data found !!!</tr>
                      @endif
                      <tbody>
                    </table>
                    <a class="links link" href="{{route('home')}}"> Go Home !!!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
