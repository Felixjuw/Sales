<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Sales Transaction</title>

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
                        Upload Sales Transaction
                    </h4>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('sales.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <!-- Excel File -->
                        <div class="mb-3">
                            <label for="file" class="form-label fw-semibold">
                                Excel File
                            </label>
                    
                            <input
                                type="file"
                                name="file"
                                id="file"
                                class="form-control"
                                accept=".xlsx,.xls,.csv"
                                required>
                    
                            <small class="text-muted">
                                Supported formats: .xlsx, .xls, .csv
                            </small>
                        </div>
                    
                        <hr>
                    
                        <div class="d-flex justify-content-end gap-2">
                    
                            <button
                                type="button"
                                class="btn btn-secondary"
                                id="btnBackToIndex">
                                <i class="bi bi-x-circle"></i>
                                Cancel
                            </button>
                    
                            <button
                                type="submit"
                                class="btn btn-warning">
                                <i class="bi bi-upload"></i>
                                Upload
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
        window.location.href = "{{ route('home') }}";
    });
</script>
</html>