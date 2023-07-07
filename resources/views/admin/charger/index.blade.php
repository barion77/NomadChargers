@extends('admin.layouts.default')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Зарядрные станции</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Зарядрные станции</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.charger.create') }}" class="btn btn-primary">Добавить зарядную станцию</a>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Адрес</th>
                                    <th>Координаты</th>
                                    <th>Мощность</th>
                                    <th>Цена</th>
                                    <th>Занято</th>
                                    <th>Создан</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


@endsection

@section('scripts')

    <script>

        let columns = [
            {"data": "id", "name": "id"},
            {"data": "name", "name": "name"},
            {"data": "address", "name": "address"},
            {"data": "coordinates", "name": "coordinates"},
            {"data": "power", "name": "power"},
            {"data": "price", "name": "title"},
            {"data": "busy", "name": "busy"},
            {"data": "created", "name": "created"},
            {"data": "actions", "name": "actions", orderable: false, searchable: false},
        ];

        $(function () {
            $('#table').DataTable({
                "paging": true,
                "pageLength": 25,
                "processing": true,
                "serverSide": true,
                "columns": columns,
                "ajax": {
                    "url": "{{ route('admin.charger.data') }}",
                    "dataSrc": "data",
                },
            });
        });

    </script>

@endsection
