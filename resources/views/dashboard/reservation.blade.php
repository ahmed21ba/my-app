
Hello Owner

<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

@extends('dashboard.dashboard')
@section('indexCA')

    <div class="m-portlet__body">

    @foreach($records as  $record)

        <div class="d-block mb-4">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample_{{ $record->id }}" role="button" aria-expanded="true" aria-controls="collapseExample_{{ $record->id }}">
                {{$record->name  }}
            </a>
            <div class="collapse show" id="collapseExample_{{ $record->id }}">
                <div class="card card-body">
                
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                    <tr class="font-weight-bold">
                        <th class="font-weight-bold">##</th>
                        <th class="font-weight-bold">الاسم</th>
                        <th class="font-weight-bold">المنطقة</th>
                        <th class="font-weight-bold">العنوان</th>

                        <th class="font-weight-bold">تاريخ الانشاء</th>
                    </tr>
                    </thead>
                    <tbody>
                                
                        <tr class="font-weight-bold">
                            <td>{{$loop->index +1 }}</td>
                            <td>{{$record->name  }}</td>
                            <td>{{ $record->governorate->name }}</td>
                            <td>{{$record->address  }}</td>
                            <td>{{$record->created_at }}</td>
                        </tr>

                        <tr>
                            <td colspan="7">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>حالة الطلب</th>
                                        <th>وقت بدء الحجز</th>
                                        <th>وقت نهاية الحجز</th>
                                        <th>المناسبة</th>
                                        <th>الزبون</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>

                                @foreach($record->reserves as  $reserve )

                                <tr>

                                    <td>
                                        @if($reserve->status == 1)
                                            <span class="badge text-bg-primary" style="background: green; color: #fff;">تم الموافقة</span>
                                        @else
                                        <span class="badge text-bg-primary" style="background: yellow; color: #000;">في انتظار الموافقة</span>
                                        @endif
                                    </td>
                                    <td>{{ $reserve->start_time }}</td>
                                    <td>{{ $reserve->end_time }}</td>
                                    <td>{{ $reserve->occasionType($reserve->occasion) }}</td>
                                    <td>{{ $reserve->customer->name }}</td>
                                    <td>
                                            @if($reserve->status == 1)
                                            <a class="btn btn-danger" href="{{ url('/dashboard/reservation/'. $reserve->id.'/0') }}">رفض</a>
                                            @else
                                            <a class="btn btn-primary" href="{{ url('/dashboard/reservation/'. $reserve->id.'/1') }}">اعتماد</a>
                                            @endif
                                            
                                        
                                    </td>
                                </tr>
                                @endforeach
                                </table>
                            </td>

                        </tr>
                    </tbody>
                </table>

                </div>
            </div>
        </div>

    @endforeach 

    </div>



@endsection
