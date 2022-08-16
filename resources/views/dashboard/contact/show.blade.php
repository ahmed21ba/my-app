@extends('dashboard.dashboard')
@section('indexCA')
<h1>تفاصيل الرسالة</h1>
    
الاسم   : {{ $record->name  }} <br><br>
الايميل  : {{ $record->email }} <br><br>
الرسالة : {{ $record->message  }} <br><br>


<a href="{{ route('contacts.index') }}" class="btn btn-default">
    عودة
</a>

@endsection
