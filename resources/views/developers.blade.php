<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
</head>
<body>

    <div id="app" class="container my-3">
        {{-- form --}}
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" id="image" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Gender</label>
                            <div class="col-md-9">
                                <label for="male" class="mr-3">
                                    <input type="radio" value="male" id="male"> Male
                                </label>
                                <label for="female">
                                    <input type="radio" value="female" id="female"> Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Skills</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <label for="male" class="col-md-4">
                                        <input type="checkbox" value="male" id="male"> Male
                                    </label>
                                    <label for="male" class="col-md-4">
                                        <input type="checkbox" value="male" id="male"> Male
                                    </label>
                                    <label for="male" class="col-md-4">
                                        <input type="checkbox" value="male" id="male"> Male
                                    </label>
                                    <label for="male" class="col-md-4">
                                        <input type="checkbox" value="male" id="male"> Male
                                    </label>
                                    <label for="male" class="col-md-4">
                                        <input type="checkbox" value="male" id="male"> Male
                                    </label>
                                    <label for="male" class="col-md-4">
                                        <input type="checkbox" value="male" id="male"> Male
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 offset-md-3">
                                <input type="submit" value="Submit" class="text-uppercase btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- List of data --}}
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Gender</th>
                        <th>Skills</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script src="{{ asset('assets/vue.js') }}"></script>
    <script src="{{ asset('assets/scripts.js') }}"></script>
</body>
</html>
