<?php $journals = $user->journals->sortByDesc('created_at')->take(5); ?>
<div class='panel panel-default'>
    <div class='panel-heading'>
        
    </div>
    <div class='panel-body'>
        @foreach($journals as $journal)
            <div class='panel panel-info'>
                <div class='panel-heading'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                {!! link_to_action('JournalController@show', $journal->name, $journal->id, []) !!}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                {{ $journal->description }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel-body'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-6'>
                                {{$journal->has_nausea ? 'Nauseous' : 'Not Nauseous'}}
                            </div>
                            <div class='col-sm-6'>
                                {{$journal->has_vomitted ? 'Vomitted' : 'Has not vomitted'}}
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        @endforeach
    </div>
    <div class='panel-footer'>
        <div class='row'>
            <div class='col-sm-10'>
                {!! link_to_action('JournalController@create', 'Add Journal', array(), ['class' => 'btn btn-info btn-block btn-primary']) !!}
            </div>
            <div class='col-sm-2 pull-right btn btn-link'>
                {!! link_to_action('JournalController@index', 'View All') !!}
            </div>
        </div>
    </div>
</div>