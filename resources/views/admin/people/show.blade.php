@extends('admin.layouts.app')

@section('content')
    <div class="row" style="margin-left: 15px; margin-bottom: 1em;">
        <a href="{{route('specialists.index')}}"><button class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-left"></i> Back</button></a>
    </div>
    <section class="col-lg-6 connectedSortable">

        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-user-md"></i>

                <h3 class="box-title">Specialist </h3>

                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @if(count($person) > 0)
                    <div class="well">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name: </th>
                                <td>{{ $person->name }}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{ $person->email }}</td>
                            </tr>
                            <tr>
                                <th>Location: </th>
                                <td>{{ $person->location }}</td>
                            </tr>
                            <tr>
                                <th>Specialties: </th>
                                <td>{{ $person->specialties }}</td>
                            </tr>
                            <tr>
                                <th>Date Joined: </th>
                                <td>{{ $person->created_at->toFormattedDateString() }}</td>
                            </tr>
                        </table>
                        <button  class="btn btn-warning btn-sm editQuote">Edit</button>
                    </div>
                @else
                    <p>Select a specialist.</p>
                @endif
            </div>
            <!-- /.chat -->
            <div class="box-footer">
                {{ Form::open(['action' => ['Admin\SpecialistsController@destroy', $person->id], 'method' => "POST", 'class' => 'pull-right']) }}
                    {{ method_field('DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>

    </section>

    <section class="col-lg-6 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-image header-icon"></i>

                <h3 class="box-title header-title">Image</h3>

                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="center-block image">
                    @if($person->image != '')
                            <img alt="specialist image" class="center-block img-responsive img-thumbnail" src="{{ asset("/storage/".$person->image) }}" />
                    @else
                        <p class="text text-center text-info">No image</p>
                    @endif
                </div>
                {!! Form::model($person, ['action' => ['Admin\SpecialistsController@update', $person->id], 'class' => 'hidden editForm', 'method' => "POST", 'enctype' => 'multipart/form-data' ]) !!}

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{Form::text('name', $person->name, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{Form::email('email', $person->email, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('location', 'Location') }}
                        {{Form::text('location', $person->location, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('specialties', 'Specialties') }}
                        {{Form::text('specialties', $person->specialties, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>

                    <div class="box-footer">
                        {{ method_field('PUT') }}
                        {{ Form::submit('Update', ['class' => 'pull-right btn btn-success btn-sm']) }}
                    </div>

                {!! Form::close() !!}
            </div>

        </div>

    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', 'button.editQuote', function(e) {
                if($('form.editForm').hasClass('hidden')) {
                    $('a.sidebar-toggle').click();
                    $('i.header-icon').removeClass('fa-image').addClass('fa-edit');
                    $('h3.header-title').text("Edit Specialist's details");
                    $('div.image').addClass('hidden');
                    $('form.editForm').removeClass('hidden');
                }else {
                    $('a.sidebar-toggle').click();
                    $('div.image').removeClass('hidden');
                    $('form.editForm').addClass('hidden');
                    $('i.header-icon').removeClass('fa-edit').addClass('fa-image');
                    $('h3.header-title').text('Image');
                }
            })
        })
    </script>
@endsection()