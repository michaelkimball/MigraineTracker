@extends('master')

@section('title')User Profile @stop

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class='panel panel-info'>
                    <div class='panel-heading'>
                        <h2>Personal Info</h2>
                            <span>{!! link_to_action('UserController@edit', 'Edit', $user->id, ['class' => 'btn btn-primary', 'role' => 'button']) !!}</span>
                    </div>
                    <div class='panel-body'>
                        <span class="glyphicon glyphicon-user center-block text-center" aria-hidden="true"
                              style="font-size: 180px"></span>
                        <br>

                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">Username:</p>

                                <div class="pull-right">{{ $user->name }}</div>
                            </strong>
                        </div>
                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">First Name:</p>

                                <div class="pull-right">{{ $user->first_name }}</div>
                            </strong>
                        </div>
                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">Last Name:</p>

                                <div class="pull-right">{{ $user->last_name }}</div>
                            </strong>
                        </div>
                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">Email:</p>

                                <div class="pull-right">{{ $user->email }}</div>
                            </strong>
                        </div>
                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">Locale:</p>

                                <div class="pull-right">{{ $user->locale }}</div>
                            </strong>
                        </div>

                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">Gender:</p>

                                <div class="pull-right">{{ $user->gender }}</div>
                            </strong>
                        </div>
                        <div class="clearfix">
                            <strong>
                                <p class="text-primary pull-left">Birthdate:</p>

                                <div class="pull-right">{{ $user->date_of_birth }}</div>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class='panel panel-info'>
                    <div class='panel-heading'>
                        <h2>General Info</h2>
                    </div>
                    <div class='panel-body'>
                        <div class='panel-group'>
                            <div class='panel panel-info'>
                                <div class='panel-heading'>
                                    <h4>Medical History</h4>
                                </div>
                                <div class='panel-body'>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Have you been diagnosed with diabetes?</td>
                                            <td>
                                                {{ $user->has_diabetes ? 'Yes' : 'No' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Have you been diagnosed with migraines?</td>
                                            <td>
                                                {{ $user->has_migraines ? 'Yes' : 'No' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Do you wear prescription glasses?</td>
                                            <td>
                                                {{ $user->has_glasses ? 'Yes' : 'No' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>When was your last eye exam?</td>
                                            <td>
                                                {{ $user->last_eye_exam ?: 'Never' }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Advanced Info</h2>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group">
                            <div class="panel panel-info">
                                <div class="panel-heading ">
                                    <h4>Triggers</h4>
                                </div>
                                <div class="panel-body ">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Trigger Name</th>
                                            <th>Description</th>
                                            <th># of Occurrences</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($triggers as $trigger)
                                            <tr>
                                                <td>{{ $trigger->name }}</td>
                                                <td>{{ $trigger->description }}</td>
                                                <td>0</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4>Medications</h4>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>Description</th>
                                            <th>Dosage</th>
                                            <th># of Occurrences</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($medicines as $medicine)
                                            <tr>
                                                <td>{{ $medicine->name }}</td>
                                                <td>{{ $medicine->description }}</td>
                                                <td>{{ $medicine->dose }}</td>
                                                <td>0</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
