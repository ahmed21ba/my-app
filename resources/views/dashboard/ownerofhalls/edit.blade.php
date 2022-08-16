@extends('dashboard.dashboard')

@section('e')

    <div class="card">
        <div class="card-header">

            <!-- Page Heading -->
            مالكين الصالات
            <a href="{{ asset('dashboard/ownerofhalls') }}" class="float-right">عرض</a>

        </div>
        <div class="card-body">
            <form method="post" action={{route('ownerofhalls.update',$ownerOfHalls->id)}}>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group">
                        <label for="name">الاسم:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$ownerOfHalls->name}}">
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group">
                        <label for="email">الايميل :</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$ownerOfHalls->email}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group">
                        <label for="phone">رقم الهاتف :</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$ownerOfHalls->phone}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group">
                        <label for="is_active">مفعل :</label>

                        <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_active1" @if($ownerOfHalls->is_active == 1) checked @endif name="is_active" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="is_active1">نعم</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_active2" @if($ownerOfHalls->is_active == 0) checked @endif name="is_active" class="custom-control-input" value="0">
                        <label class="custom-control-label"  for="is_active2">لا</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 form-group">
                        <button type="submit" class="btn btn-info">تعديل</button>
                    </div>
                </div>

            </form>

            <hr/>

            <div class="alert alert-danger"> إذا كنت تريد إزالة هذا السجل ، فانقر فوق حذف</div>
            <form method="post" action={{route('ownerofhalls.destroy',$ownerOfHalls->id)}}>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="{alert('Are you sure?')}">حذف</button>
            </form>

        </div>
    </div>

@endsection
