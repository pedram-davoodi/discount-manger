<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/vendor/discount/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-3 mb-3">Create an offer</h1>

    <form action="{{route('discount.offer.store')}}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label class="mb-1">Code</label>
            <input type="text" name="code" class="form-control">
            <div id="" class="form-text">Offer code</div>
        </div>

        <div class="form-group mb-3">
            <label class="mb-1">Type</label>
            <select class="form-control" name="type">
                <option value="FIXED">fixed</option>
                <option value="PERCENTAGE">percentage</option>
            </select>
            <div id="" class="form-text">type of offer</div>
        </div>

        <div class="form-group mb-3">
            <label class="mb-1">Amount</label>
            <input type="text" name="amount" class="form-control">
            <div id="" class="form-text">amount of offer code</div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>
<script src="/vendor/discount/js/bootstrap.bundle.js"></script>
</body>
</html>
