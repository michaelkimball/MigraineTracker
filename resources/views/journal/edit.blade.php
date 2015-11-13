@extends('master')


@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@stop


@section('header')

@stop


@section('content')
<div class='panel panel-info'>
    <div class='panel-heading'>
        <div class="row">
            <div class="h3 col-sm-3 ">{{ $journal->name }}</div>
        @unless(empty($journal->description))
            <div class='h3 col-sm-offset-1 col-sm-8 '>{!! nl2br($journal->description) !!}</div>
        @endunless
        </div>
    </div>
    <div class='panel-body'>
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($journal, ['action' => ['JournalController@update', $journal->id], 'method' => 'PATCH']) !!}
                <div class="col-ms-12">
                    <div class="row">
                                {!! Form::label('location', 'Location', ['class' => 'form-label']) !!}
                                {!! Form::text('location', null, ['placeholder' => 'City, ST'] ) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Name', 'Entry Name' ,['class' => 'form-label'] ) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Entry Description' , ['class' => 'form-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class='row'>
                                <div class='col-xs-6'>
                                    {!! Form::label('weather_pressure', 'Barometric Pressure', ['class' => 'form-label']) !!}
                                    {!! Form::text('weather_pressure', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class='col-xs-6'>
                                    {!! Form::label('weather_temperature', 'Temperature', ['class' => 'form-label']) !!}
                                    {!! Form::text('weather_temperature', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('severity', 'Severity', ['class' => 'form-label']) !!}
                                        {!! Form::select('severity',
                                            [
                                                '' => '',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                            ],
                                            null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('sound_level', 'Sound Level', ['class' => 'form-label']) !!}
                                        {!! Form::select('sound_level',
                                            [
                                                '' => '',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10'
                                            ],
                                            null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('light_level', 'Light Level', ['class' => 'form-label']) !!}
                                        {!! Form::select('light_level',
                                            [
                                                '' => '', // No response response
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10'
                                            ],
                                             null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        {!! Form::label('still_suffering', 'Still Suffering?', ['class' => 'form-label']) !!}
                                        {!! Form::select('still_suffering', [ '' => '', 'True' => 'true', 'False' => 'false'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('weather', 'Weather', ['class' => 'form-label']) !!}
                                {!! Form::text('weather', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('common_triggers_id', 'Common Triggers', ['class' => 'form-label']) !!}
                                        {!! Form::select('common_triggers_id[]', $common_triggers, $journal->common_triggers->lists('id')->toArray(), ['id' => 'common_triggers_list', 'class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('triggers_id', 'Triggers', ['class' => 'form-label']) !!}
                                        {!! Form::select('triggers_id[]', $triggers, $journal->triggers->lists('id')->toArray(), ['id' => 'trigger_list', 'class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('medicines_id', 'Medications' . ':', ['class' => 'form-label']) !!}
                                        {!! Form::select('medicines_id[]', $medicines, $journal->medicines->lists('id')->toArray(), ['id' => 'medicine_list', 'class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('start_time', 'Start Time', ['class' => 'form-label']) !!}
                                        {!! Form::input('datetime-local', 'start_time', '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('end_time', 'End Time', ['class' => 'form-label']) !!}
                                        {!! Form::input('datetime-local', 'end_time', '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_aura', 'Experiencing Aura?', ['class' => 'form-label']) !!}
                                        {!! Form::select('has_aura', [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('aura_description', 'Aura Description', ['class' => 'form-label']) !!}
                                        {!! Form::text('aura_description', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_nausea', 'Nauseous?', ['class' => 'form-label']) !!}
                                        {!! Form::select('has_nausea',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_vomitted', 'Vomitted?', ['class' => 'form-label']) !!}
                                        {!! Form::select('has_vomitted',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_light_sensativity', 'Light Sensativity', ['class' => 'form-label']) !!}
                                        {!! Form::select('has_light_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_sound_sensativity', 'Sound Sensativity', ['class' => 'form-label']) !!}
                                        {!! Form::select('has_sound_sensativity',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('has_disrupted', 'Disruptions', ['class' => 'form-label']) !!}
                                        {!! Form::select('has_disrupted',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('missed_workschool', 'Missed Work or School', ['class' => 'form-label']) !!}
                                        {!! Form::select('missed_workschool',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('missed_routines', 'Missed Other Activities', ['class' => 'form-label']) !!}
                                        {!! Form::select('missed_routines',  [ '' => '', 'true' => 'Yes', 'false' => 'No'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('social_plans', 'Missed Social Events', ['class' => 'form-label']) !!}
                                {!! Form::text('social_plans', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('activities', 'Missed Other Events', ['class' => 'form-label']) !!}
                                {!! Form::text('activities', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class='form-group'>
                                {!! Form::submit('Submit', ['class' => 'btn btn-block btn-lg btn-primary btn-default']) !!}
                                <div class='col-sm-2'><span class="pull-right" style="margin-bottom: 15px">{!! link_to_action('JournalController@show', 'Cancel Edit', $journal->id) !!} </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
    </div>
@stop


@section('footer')
    <script type="text/javascript">
        $('#trigger_list').select2({
            placeholder: "Select Triggers"
        });
        $('#medicine_list').select2({
            placeholder: "Select Medicines"
        });
        
        $('#common_triggers_list').select2({
            placeholder: "Select CommonTriggers"
        });
    </script>

@stop