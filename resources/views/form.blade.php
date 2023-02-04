@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-header">Question form</div>



                    <div class="card-body">

                        <div class="alert alert-danger d-none" id="error_banner">

                        </div>

                        <form name="questionForm" method="POST" action="{{ route('save.question') }}" onsubmit="return validateForm()" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control  @error('question') is-invalid @enderror"
                                        id="question" name="question">
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="question">Technology</label>
                                    <select name="technology[]" id="technology"
                                        class="form-control @error('technology') is-invalid @enderror" multiple>
                                        <option value="PHP">PHP</option>
                                        <option value="Javascript">Javascript</option>
                                        <option value="Java">Java</option>
                                        <option value="CSS">CSS</option>
                                        <option value="Angular">Angular</option>
                                        <option value="React.js">React.js</option>
                                    </select>
                                    @error('technology')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="expertise">Expertise Level</label>
                                    <select name="expertise"  id="expertise" class="form-control @error('expertise') is-invalid @enderror">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="4">5</option>
                                    </select>
                                    @error('expertise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="answer">Answer</label>
                                    <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer"></textarea>

                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-12 form-group mt-2">

                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            let question = document.forms["questionForm"]["question"].value;
            let technology = document.forms["questionForm"]["technology"].value;
            let expertise = document.forms["questionForm"]["expertise"].value;
            let errorText = "";
            if (question == "") {
                document.getElementById('error_banner').classList.remove('d-none');
                document.getElementById('error_banner').innerHTML = 'Question must be filled out';
                return false;
            }else if(technology == "")
            {
                document.getElementById('error_banner').classList.remove('d-none');
                document.getElementById('error_banner').innerHTML = 'Technology must be filled out';
                return false;
            }
            else if(expertise == "")
            {
                document.getElementById('error_banner').classList.remove('d-none');
                document.getElementById('error_banner').innerHTML = 'Expertise must be Selected';
                return false;
            }
            else{
                return true;
            }
        }
    </script>
@endsection
