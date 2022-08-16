
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

            @foreach($records as  $record)
                <tr class="font-weight-bold">
                    <td>{{$loop->index +1 }}</td>
                    <td>{{$record->name  }}</td>
                    <td>{{ $record->governorate->name }}</td>
                    <td>{{$record->address  }}</td>
                    <td>{{$record->created_at }}</td>
{
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
                            </tr>
                            </thead>

                        @foreach($record->reserves as  $reserve )

                           <tr>

                               <td>{{ $reserve->status }}</td>
                               <td>{{ $reserve->start_time }}</td>
                               <td>{{ $reserve->end_time }}</td>
                               <td>{{ $reserve->occasionType($reserve->occasion) }}</td>
                               <td>{{ $reserve->customer->name }}</td>
                           </tr>
                        @endforeach
                        </table>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
