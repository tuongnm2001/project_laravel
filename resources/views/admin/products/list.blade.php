@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="">ID</th>
                <th>Tến sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Active</th>
                <th>Update</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $item)          
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                {{-- <td>{{ $item->menu->name }}</td> --}}
                <td>{{ $item->price }}</td>
                <td>{{ $item->price_sale }}</td>
                <td> 
                    <a class="btn btn-warning" href="/admin/menus/edit/'.$menu->id.'">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="#" class="btn btn-danger" onclick="removeRow('.$menu->id.')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection