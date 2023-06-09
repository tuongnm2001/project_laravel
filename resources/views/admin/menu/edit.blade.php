@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @include('admin.alert')

            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" class="form-control" name="name" value="{{ $menu->name }}"/>
            </div>

            <div class="form-group">
                <label for="menu">Danh mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $menu->parent_id === 0 ?  'selected':'' }}>Danh mục cha</option>
                    @foreach ($menus as $item)
                        <option value="{{ $item->id }}" {{ $menu->parent_id === $item->id ? 'selected':'' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
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
                        {{ $menu->active == 1 ? 'checked=""' : '' }}
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
                        {{ $menu->active == 0 ? 'checked=""' : '' }}
                    />
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection