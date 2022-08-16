@extends('dashboard.dashboard')
@section('indexCA')
<h1>الرسائل</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        الرسائل الواردة
                        
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!-- begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                <thead>
                <tr>
                    <th>##</th>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <!-- <th>الرسالة</th> -->
                    <th>الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as  $index=>$record)
                    <tr>
                        <td>{{$index+1 }}</td>
                        <td>{{$record->name  }}</td>
                        <td>{{ $record->email }}</td>
                        <!-- <td>{{$record->message  }}</td> -->
                        <td>
                            <a href="{{ route('contacts.show', $record->id) }}" class="btn btn-default">
                                <i class="fa fa-eye"></i> عرض
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@endsection
