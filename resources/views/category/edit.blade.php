<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Category Edit</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Category Edit</h3>
                        <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $category->name }}" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Slug</label>
                                <input type="text" class="form-control" value="{{ $category->slug }}" name="slug" placeholder="Enter slug">
                            </div>
                            <div class="form-group mb-3">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                @if ($category->image)
                                <img src="{{ asset('storage/'.$category->image) }}" class="mt-3" alt="" width="100">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>