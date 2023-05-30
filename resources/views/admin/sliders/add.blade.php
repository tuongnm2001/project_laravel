@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @include('admin.alert')
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu đề</label>
                        <input type="text" class="form-control" name="name" id="menu" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường dẫn</label>
                        <input type="text" class="form-control" name="url" id="menu" value="{{ old('url') }}">
                    </div>
                </div>
           </div>

            <div class="form-group">
                <label>Ảnh Slider</label>
                <input type="file" name="file" class="form-control" id="upload"/>
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb"/>
            </div>

            <div class="form-group">
                <label for="menu">Sắp xếp</label>
                <input 
                    type="number" 
                    name="sort_by" 
                    {{-- value="{{ old('price') }}"   --}}
                    class="form-control" 
                    {{-- value="{{ old('sort_by') }}" --}}
                >
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" id="active" value="1" type="radio" name="active" checked/>
                    <label for="active" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" id="no_active" value="0" type="radio" name="active"/>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Slider</button>
        </div>
        @csrf
    </form>
@endsection