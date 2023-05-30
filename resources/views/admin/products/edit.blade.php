@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @include('admin.alert')
           <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Sản Phẩm</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        id="menu" 
                        value="{{ $products->name }}"
                    >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Danh mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach ($menus as $item)
                                <option value="{{ $item->id }}" {{ $products->menu_id === $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
            </div>

             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input 
                            type="number" 
                            name="price" 
                            class="form-control" 
                            value="{{ $products->price }}"
                        >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input 
                            type="number" 
                            name="price_save" 
                            value="{{ $products->price_save }}"  
                            class="form-control" 
                        >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" class="form-control" >{{ $products->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{ $products->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="file" class="form-control" id="upload"/>
                <div id="image_show">
                    <a href="{{ $products->thumb }}" target="_blank">
                        <img src="{{ $products->thumb }}" width="100px"/>
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{ $products->thumb }}"/>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input 
                        class="custom-control-input" 
                        id="active" 
                        value="1" 
                        type="radio" 
                        name="active" 
                        {{ $products->active === 1 ? 'checked=""' : '' }}
                    />
                    <label for="active" class="custom-control-label">Có</label>
            </div>

                <div class="custom-control custom-radio">
                    <input 
                        class="custom-control-input" 
                        id="no_active" 
                        value="0" 
                        type="radio" 
                        name="active"
                        {{ $products->active === 0 ? 'checked=""' : '' }}
                    />
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection