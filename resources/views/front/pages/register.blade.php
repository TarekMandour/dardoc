@extends('front.layout.master')
@section('content')

    <main class="home">
        <div id="innerPageTitle">
            <div class="container">
                <div class="title">
                    <h1>طلب تسجيل العيادات</h1>
                </div>
            </div>
        </div>

        <section class=" small-section pt-50" id="contact-section">
            <div class="container">
                <div class="section-title text-center">
                    <h3>طلب تسجيل <strong>العيادات</strong></h3>
                </div>

                <div class="contact-form">
                    @php $msg=session()->get("msg"); @endphp
                    @if( session()->has("msg"))
    
                            @if( $msg == "Success")
                                <div class="alert alert-success mb-0">
                                    تم الارسال بنجاح
                                </div>
                                <br>
    
                            @elseif ( $msg == "Failed")
                                <div class="alert alert-danger mb-0">
                                    عفوا ، هناك خطأ ما !
                                </div>
                                <br>
                            @endif
    
                    @endif
    
                    <form class="needs-validation form row" method="post" novalidate action="{{url('register-clinic')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="name" type="text" placeholder="اسم الدكتور بالعربي" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-user"></span></div>
                                    <div class="invalid-tooltip">اسم الدكتور بالعربي</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="clinic_name" type="text" placeholder="اسم العيادة" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">اسم العيادة</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="name_en" type="text" placeholder="اسم الدكتور بالانجليزي" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-envelope"></span></div>
                                    <div class="invalid-tooltip">اسم الدكتور بالانجليزي</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="clinic_name_en" type="text" placeholder="اسم العيادة بالانجليزي" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">اسم العيادة بالانجليزي</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" name="phone" type="number" style="width:65%;border-bottom-left-radius: 0px;border-top-left-radius: 0px;" placeholder="رقم الجوال" required>
                                    <input class="form-control" name="code" type="number" value="966" style="text-align: center;border-bottom-right-radius: 0px;border-top-right-radius: 0px;" readonly>
                                    <div class="invalid-tooltip">رقم الجوال</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="clinic_num" type="number" placeholder="السجل التجاري" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">السجل التجاري</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="email" type="email" placeholder="البريد الالكتروني" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-envelope"></span></div>
                                    <div class="invalid-tooltip">البريد الالكتروني</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="tax_num" type="number" placeholder="الرقم الضريبي" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">الرقم الضريبي</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="password" type="password" placeholder="كلمة المرور" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">كلمة المرور</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" name="phone2" type="number" placeholder="رقم جوال العيادة" required>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">رقم جوال العيادة</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <select name="city_id" style="height: 55px;" class="form-control select2"
                                            required>
                                        <option value="">أختر المدينة</option>
                                        @foreach(\App\City::all() as $city)
                                            <option
                                                value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append"><span class="input-group-text fas fa-envelope"></span></div>
                                    <div class="invalid-tooltip">أختر المدينة</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="content" placeholder="نبذه عن العيادة" required class="form-control">{!! old('content') !!}</textarea>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">نبذه عن العيادة</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="content_certificate_en" placeholder="محتوى الشهادة بالانجليزي" required class="form-control">{!! old('content') !!}</textarea>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">محتوى الشهادة بالانجليزي</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="content_certificate" placeholder="محتوى الشهادة" required class="form-control">{!! old('content') !!}</textarea>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">محتوى الشهادة</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="content_license" placeholder="محتوى الترخيص" required class="form-control">{!! old('content_license') !!}</textarea>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">محتوى الترخيص</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea name="content_license_en" placeholder="محتوى الترخيص بالانجليزي" required class="form-control">{!! old('content_license_en') !!}</textarea>
                                    <div class="input-group-append"><span class="input-group-text fas fa-phone"></span></div>
                                    <div class="invalid-tooltip">محتوى الترخيص بالانجليزي</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group text-right">
                                <label class="pull-right">صورة البروفايل</label><br>
                                <input type="file" class="filestyle" name="profile_photo"
                                       id="photo_link" data-buttonname="btn-secondary" required>
                            </div>
                            <div class="form-group text-right">
                                <label class="pull-right">صورة السجل التجاري</label><br>
                                <input type="file" class="filestyle" name="commerical_photo"
                                       id="photo_link2" data-buttonname="btn-secondary" required>
                            </div>

                            
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group text-right">
                                <label class="pull-right">صورة شهادة الضريبة</label><br>
                                <input type="file" class="filestyle" name="tax_photo"
                                       id="photo_link4" data-buttonname="btn-secondary" required>
                            </div>
                            <div class="form-group text-right">
                                <label class="pull-right">صورة الترخيص</label><br>
                                <input type="file" class="filestyle" name="license_photo"
                                       id="photo_link3" data-buttonname="btn-secondary" required>
                            </div>
                        </div>
        
                        <div class="col-sm-12"><button class="btn-gradient" type="submit"><i class="fab fa-telegram-plane"></i><span>ارسال</span></button></div>
                    </form>
                    
                        
                    
                </div>
            </div>
        </section>

    </main>

@endsection
