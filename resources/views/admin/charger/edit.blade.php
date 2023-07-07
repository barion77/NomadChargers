@extends('admin.layouts.default')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование зарядной станции</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.charger.update', $charger->id) }}" method="POST" class="w-50" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Название..." value="{{ $charger->name }}">
                                @error('name')
                                <div class="text-danger mb-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Адрес</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Адрес..." value="{{ $charger->address }}">
                                @error('address')
                                <div class="text-danger mb-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Координаты</label>
                                <input type="text" class="form-control @error('coordinates') is-invalid @enderror" name="coordinates" placeholder="Координаты..." value="{{ $charger->coordinates }}">
                                @error('coordinates')
                                <div class="text-danger mb-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Мощность (КВТ)</label>
                                <input type="text" class="form-control @error('power') is-invalid @enderror" name="power" placeholder="Мощность..." value="{{ $charger->power }}">
                                @error('power')
                                <div class="text-danger mb-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Цена за минуту</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Цена..." value="{{ $charger->price }}">
                                @error('price')
                                <div class="text-danger mb-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-success" value="Изменить">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
