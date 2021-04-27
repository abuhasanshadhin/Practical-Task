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

                        <form @@submit.prevent="saveDeveloperInfo" method="post">

                            <div class="form-group row">
                                <label for="name" class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" v-model.trim="developer.name" id="name" required class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" v-model.trim="developer.email" id="email" required class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" @@change="onChangeImage" ref="image" id="image" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3">Gender</label>
                                <div class="col-md-9">
                                    <label for="male" class="mr-3">
                                        <input type="radio" v-model="developer.gender" value="male" id="male"> Male
                                    </label>
                                    <label for="female">
                                        <input type="radio" v-model="developer.gender" value="female" id="female"> Female
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3">Skills</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <label v-for="(skill, i) in skills" :key="i" :for="`male-${i}`" class="col-md-4">
                                            <input type="checkbox" v-model="developerSkills" :value="skill" :id="`male-${i}`"> @{{ skill }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" value="Submit" :disabled="isDisabled" class="text-uppercase btn btn-primary">
                                </div>
                            </div>

                        </form>

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
                <tbody>
                    <tr v-for="(dev, i) in developers" :key="i">
                        <td>@{{ i + 1 }}</td>
                        <td>@{{ dev.name }}</td>
                        <td>@{{ dev.email }}</td>
                        <td>
                            <img v-if="dev.dev_image" :src="dev.dev_image" height="50">
                        </td>
                        <td>@{{ capitalize(dev.gender) }}</td>
                        <td>
                            <template v-for="(skill, i) in (dev.skills).split(',')">
                                <div class="badge badge-success mr-1"> @{{ skill }} </div>
                            </template>
                        </td>
                        <td>
                            <button @@click.prevent="editDeveloper(dev)" class="btn btn-sm btn-info">Edit</button>
                            <button @@click.prevent="deleteDeveloper(dev.id)" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('assets/vue.js') }}"></script>
    <script src="{{ asset('assets/axios.min.js') }}"></script>
    <script src="{{ asset('assets/scripts.js') }}"></script>
</body>
</html>
