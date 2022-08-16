@extends('website.main')

@section('contact')

<div style="background: white;padding-bottom: 60px;padding-top: 60px;">
<div class="container">
    <div class="content">
        <div class="left-side">

            <div class="phone details">
                <i class="fas fa-phone-alt"></i>
                <div class="topic">رقم الهاتف</div><br>
                <div class="text-one"> 599790089 00790</div>
                <div class="text-two"> 5923219479 00790</div>
            </div>


            <br><br>


            <div class="email details">
                <i class="fas fa-envelope"></i>
                <div class="topic">البريد الالكتروني</div><br>
                <div class="text-one">Reserveation@gmail.com</div>

            </div>
        </div>
        <div class="right-side">
            <div class="topic-text" style="padding-top: 30px">للتواصل معنا</div>
            <br><br>
            <div class="m-2">
                @if(session('success'))
                    <span class="alert alert-success d-block">{{ session('success') }}</span>
                @endif
            </div>
            <br><br>
            <form action="{{ url('/contact') }}" method="post">
                @csrf
                <div class="input-box">
                    <input type="text" name="name" placeholder="أدخل اسمك" required>
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="أدخل بريدك الالكتروني" required>
                </div>
                <div class="input-box message-box">
                                        <textarea name="message" placeholder="أدخل رسالتك" required></textarea>
                                    </div>

                                    <div class="input_wrap" >

                                        <input type="submit" class="submit_btn" style="width: 100%;
    background: #0d6ad7;
    padding: 10px;
    border: 0;
    color: white;
    font-size: 17px;
    border-radius: 3px;
    text-transform: uppercase;
    letter-spacing: 2px;
    cursor: pointer; " value="أرسل الان" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
</div>


@endsection
