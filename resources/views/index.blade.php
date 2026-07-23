<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-speedometer2"></i>
                Sales Dashboard
            </h2>

            <small class="text-muted">
                Manage Sales Transactions
            </small>
        </div>

        <div class="d-flex gap-2">

            <a href="#" id="btnCreateSales" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                New Transaction
            </a>
        
            <a href="{{ route('sales.uploadView') }}" class="btn btn-warning text-dark">
                <i class="bi bi-upload"></i>
                Upload Excel
            </a>
        </div>

    </div>



    <!-- Table Card -->
    <div class="card shadow border-0">

        <div class="card-header bg-white">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    Sales Transactions
                </h5>

                <div>

                    <a href="{{ route('sales.export') }}" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel"></i>
                        Export Excel
                    </a>
                    <a href="{{ route('sales.pdf') }}" class="btn btn-danger">
                        <i class="bi bi-file-earmark-pdf"></i>
                        Export PDF
                    </a>

                </div>

            </div>

        </div>

        <div class="card-body">

            <!-- Search -->


            <!-- Table -->

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                    <tr>

                        <th>#</th>
                        <th width="170">Action</th>
                        <th>Store Code</th>
                        <th>Transaction Amount</th>

                    </tr>

                    </thead>

                    <tbody>

                        @foreach ($sales as $sale)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>

                                    <!-- Edit -->
                                    <a href="{{ route('sales.edit', $sale->id) }}"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('sales.destroy', $sale->id) }}"
                                            method="POST"
                                            class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this transaction?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>
                                </td>


                                <td>{{ $sale->store_code }}</td>
                                <td>{{ $sale->transaction_amount }}</td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
<script>
    document.getElementById('btnCreateSales').addEventListener('click', function () {
        window.location.href = "{{ route('sales.create') }}";
    });
</script>
</html>