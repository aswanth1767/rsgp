@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Interview
                    </div>

                    <div class="card-body">
                        <div class="alert alert-danger d-none" id="error_banner"></div>
                        <form name="interviewForm" method="POST" action="{{ route('get.question') }}"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="row">
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
                                    <select name="expertise" id="expertise"
                                        class="form-control @error('expertise') is-invalid @enderror">
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
                                <div class="col-md-12 form-group mt-2">

                                    <button type="submit" class="btn btn-success">Get Your Question</button>
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
        let technology = document.forms["interviewForm"]["technology"].value;
        let expertise = document.forms["interviewForm"]["expertise"].value;
        let errorText = "";
      if(technology == "")
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
