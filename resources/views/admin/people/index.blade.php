@extends('admin.layouts.app')

@section('content')
    <section class="col-lg-12 connectedSortable specialists">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Users <span class="text text-info">({{ count($people) }})  </span></h3>
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @if(count($people) > 0)
                    <div class="table">
                        <table  class="table table-bordered table-hover table-striped datatable">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date Joined</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($people as $key => $value)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        {{ Form::open(['action' => ['Admin\PeopleController@destroy', $value->id], 'method' => "POST"]) }}
                                        {{ method_field('DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'delete btn btn-sm btn-danger']) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p>{{ $people->links() }}</p>
                @else
                    <p>No User.</p>
                @endif
            </div>
        </div>

    </section>

@endsection()