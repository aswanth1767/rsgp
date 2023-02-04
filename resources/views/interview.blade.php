@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Interview Question
                    </div>
                    <div class="card-body">
                        @if(!empty($question->question))
                        {{ $question->question }}
                        <form name="questionForm" method="POST" action="{{ route('save.question') }}"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="answer">Answer</label>
                                    <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer"></textarea>

                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 form-group mt-2">

                                <button type="submit" class="btn btn-success">Submit Answer</button>
                            </div>
                        </form>
                        @else

                        There is no interview question available at the moment.....Please contact us at admin@xyz.com for more information.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
