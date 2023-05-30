@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="">ID</th>
                <th>Tiêu đề</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($sliders as $item)          
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->url }}</td>
                <td>
                    <a href="{{ $item->thumb }}" target="_blank">
                        <img src="{{ $item->thumb }}" height="40px"/>
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper :: active($item->active) !!}</td>
                <td>{{ $item->updated_at }}</td>
                <td> 
                    <a class="btn btn-warning" href="/admin/sliders/edit/{{ $item->id }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="#" class="btn btn-danger" onclick="removeRow({{ $item->id }},'/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $sliders->links() !!}
@endsection