@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="p-2">
                            <a class="btn btn-primary" href="{{route('form')}}">Add Question</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Expertise Level</th>
                                    <th scope="col">Technology</th>
                                    <th scope="col">Answer</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($questions as $question)

                                <tr>
                                    <th scope="row">{{ $question->id }}</th>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->exp_level }}</td>
                                    <td>{{ implode(', ',json_decode($question->technology)) }}</td>
                                    <td>{{ $question->answer }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {!! $questions->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
