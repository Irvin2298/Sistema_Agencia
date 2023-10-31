@extends('layouts.appAgenda')

@section('content')

    <section class="section">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="section-header">
            <h3 class="page__heading">Agenda</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-1">
                        <div class="card-body">
                            <div class="color-blue">
                                <div id="calendar" class="calendar"></div> 
                            </div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

