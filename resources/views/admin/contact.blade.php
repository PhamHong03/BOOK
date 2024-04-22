@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên người liên hệ </th>
                <th>Email </th>
                <th>Vấn đề </th>
                <th>Mô tả vấn đề </th>
                <th>Ngày liên hệ</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $key => $contact)          
            
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->problem }}</td>
                    <td>{{ $contact->description }}</td>
                    <td>{{ $contact->created_at }}</td>
                    
                    <td>
                        {{-- <a class="btn btn-primary btn-sm" href="/admin/contact/view/{{ $contact->id }}" >
                            <i class="fa-solid fa-eye"> </i> 
                            
                        </a> --}}
                        <a class="btn btn-warning btn-sm" href ="/admin/customers/edit/{{ $contact->id }}" >
                            <i class="fa-solid fa-reply"></i>                        </a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{-- {!! $customers->links() !!} --}}
@endsection
