<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sales Transaction</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-cart-check"></i>
                        Edit Sales Transaction
                    </h4>
                </div>

                <div class="card-body p-4">

                    <form action="{{route('sales.update', $sale->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Store Code
                            </label>

                            <input type="text" name="store_code"
                                class="form-control"
                                placeholder="Enter Store Code" value="{{ $sale->store_code }}">
                        </div>



                        <!-- Amount -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Transaction Amount
                            </label>

                            <input
                                type="number" name="transaction_amount"
                                class="form-control"
                                placeholder="Enter transaction amount" value="{{ $sale->transaction_amount }}">
                        </div>


                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <button
                                type="button"
                                class="btn btn-secondary" id="btnBackToIndex">
                                <i class="bi bi-x-circle"></i>
                                Cancel
                            </button>


                            <button
                                type="submit"
                                class="btn btn-success">
                                <i class="bi bi-check-circle"></i>
                                Save
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
<script>
    document.getElementById('btnBackToIndex').addEventListener('click', function () {
        window.location.href = "{{ route('sales.index') }}";
    });
</script>
</html>