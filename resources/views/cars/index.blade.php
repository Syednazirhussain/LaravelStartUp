@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">Car Managment</div>
      <div class="panel-body">
            <form method="GET" action="{{ route('car.index') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="titlesearch" class="form-control" placeholder="Enter Title For Search" value="{{ old('titlesearch') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <th>Car</th>
                    <th>Mechanic</th>
                    <th>Added At</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->mechanic->name }}</td>
                        <td>{{ $car->created_at->diffforhumans() }}</td>
                        <td>
                            <a class="btn btn-primary" href="javascript:void(0);">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{ $cars->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
</div>
@endsection
