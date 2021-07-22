<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple CRUD</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>

    <h1>Simple CRUD</h1>

    <div class="accordion" id="accordionExample">
        <!-- show all -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Show All Form
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col" col-span="3"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>









                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- show one-->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Show One Form
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">

                                <form method="POST" action="{{route('showOne')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Name:</label>
                                        <select class="form-select" name="id">
                                            <option>Select one</option>
                                            @foreach ($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Show One</button>

                                </form>
                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- create -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Create Item Form
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">

                                <form method="POST" action="{{route('create')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description:</label>
                                        <input name="description" type="text" class="form-control" id="description">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>

                                </form>
                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- update -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Update Form
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col" col-span="3"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <form method="GET" action="{{route('update')}}">


                                            

                                            <input class="form-control d-none" name="id" value="{{$item->id}}"></input>
                                            
                                            <td><input class="form-control" name="name" value="{{$item->name}}"></input></td>
                                            <td><input class="form-control" name="description" value="{{$item->description}}"></input></td>
                                            <td><button type="submit" class="btn btn-success"><span class="material-icons">edit</span></button></td>
                                            </form>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>









                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    Delete Item Form
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">

                                <form method="GET" action="{{route('delete')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <select class="form-select" name="id">
                                            <option>Select one</option>
                                            @foreach ($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>