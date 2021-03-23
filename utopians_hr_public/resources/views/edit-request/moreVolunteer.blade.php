@extends('layouts.app')

@section('content')

<div class="more_volunteer wrapper rtl" id="wrapper" style="text-align:right;" >
    <div class="inner">
        
<form method="POST" enctype="multipart/form-data" action="updateacceptvolunteer">
          @csrf
        <p style="text-align: center;"><img src="{{asset('logo.png')}}" height="150"></p>
        
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
          
        <br><h3 id="ar">بيانات المـتـطــوع</h3>
        <div> <input name="id" value="{{ $volunteer->id }}" hidden /> </div>

        <div class="section">
            <div class="first_section">
                <div id="ar" class="section_name">  أولاً: المعلومات الشخصية </div>
                <div class="form-holder">
                  <b>  الاسم </b>
                  <p>{{ $volunteer->First_Name }}</p>
                </div>
                <div class="form-holder">
                  <b>  اسم العائلة </b>
                  <p>{{ $volunteer->Family_Name }}</p>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  اسم الأب</b></label>
                  <p>{{ $volunteer->Father_Name }}</p>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  تاريخ الميلاد</b></label>
                  <p>{{ $volunteer->Date_Of_Birth }}</p>
                </div>
                <div class="form-holder">
                  <b>  Country of residence: (Ex: Syria, Cairo, .. )</b>
                  <p>{{ $volunteer->Current_Country }}</p>
                </div>
                <div class="form-holder">
                  <b>  اسم المدينة: (مثال: دمشق، حمص، القاهرة ...)</b>
                  <p>{{ $volunteer->Current_City }}</p>
                </div>
                <div class="form-holder">
                  <b>  الجنسية: (مثال: سوري، فلسطيني، ..)</b>
                  <p>{{ $volunteer->Nationality }}</p>
                </div>  
            </div>  
        </div>
          
        <div class="section">
            <div class="second_section">
                <div id="ar" class="section_name"> ثانياً: معلومات الاتصال </div>
                <div class="form-holder">
                  <b>رقم الموبايل: (مثال: 00963935740646)</b>
                  <p>{{ $volunteer->Phone_Number }}</p> 
                </div>
                <div class="form-holder">
                  <b>  عنوان البريد الإلكتروني</b>
                  <p>{{ $volunteer->Email }}</p>
                </div>
                <div class="form-holder">
                  <b>  رابط صفحتك الشخصية على فيسبوك</b>
                  <p>{{ $volunteer->Facebook_Page }}</p>
                </div>
            </div>
        </div>
          
        <div class="section">
            <div class="third_section">
                <div id="ar" class="section_name"> ثالثاً: المعلومات الأكاديمية </div>
                <div class="form-holder">
                  <b>أخر شهادة علمية حاصل عليها</b> 
                  <p>{{ $volunteer->Degree }}</p>
                </div>
                <div class="form-holder">
                  <b>  التخصص الدراسي (مثال: اقتصاد) </b>
                  <p>{{ $volunteer->Specialization }}</p>
                </div>
                <div class="form-holder">
                  <b>  اسم الجامعة، المعهد، المدرسة، الأكاديمية (مثال: جامعة دمشق،) </b>
                  <p>{{ $volunteer->University }}</p>
                </div>
                <div class="form-holder">
                  <b>  مستوى اللغة الانجليزية </b>
                  <p>{{ $volunteer->English_Level }}</p>
                </div>
            </div>
        </div>
          
        <div class="section">
            <div class="forth_section">
                <div id="ar" class="section_name"> رابعاً: الخبرة </div>
                <div class="form-holder">
                    <label id="ar"><b> المنصب الوظيفي: (مثال: مساعد موارد بشرية) </b></label>
                    <p>{{ $volunteer->Position }}</p>
                </div>
                <div>
                    <b>  اسم الشركة، المنظمة، المؤسسة التي عملت أو تطوعت بها</b>
                    <p>{{ $volunteer->Company }}</p>
                </div>
            </div>
        </div>
          
        <div class="section">
            <div class="fifth_section">
              <div id="ar" class="section_name"> خامساً: التطوع </div>
                  <div class="form-holder">
                      <b>  القسم المرغوب للتطوع</b>
                      <p>{{ $volunteer->Department }}</p>
                </div>
                <div class="form-holder">
                    <label id="ar"><b>  لماذا قمت باختيار هذا القسم؟ </b></label>
                    <p>{{ $volunteer->Department_Reason }}</p>
                </div>
                <div class="form-holder">
                    <b> لماذا ترغب التطوع في المبادرة؟ </b>
                    <p>{{ $volunteer->Voluntary_Reason }}</p>
                </div>
                
                <div class="form-holder">
                  <b>هل يمكنك الالتزام بالتطوع لمدة ستة أشهر على الأقل؟</b>
                  <p>{{ $volunteer->Six_Months }}</p>
                </div>
                        
            </div>
        </div>
    
    <div class="section">
        <div class="six_section">
          <div id="ar" class="section_name"> سادساً: بيانات قبول طلبات المتطوع </div>
              <div class="form-holder">
                  <b> القسم المقبول التطوع به</b>
                  <p>{{ $details->Accepting_Status }}</p>
            </div>

            <div class="form-holder">
                 <b>تاريخ المتطوع في المبادرة</b>
                <div>{!! $details->Volunteer_History !!}</div>
            </div>

            <div class="form-holder">
                <b>ملاحظات</b>
                <div>{!! $details->Notes !!}</div>
            </div>
        </div>
    </div>
    
    <div class="section">
        <div class="seven_section">
          <div id="ar" class="section_name">سابعاً: الوثائق الخاصة بالمتطوع </div>
              <div class="form-holder">
                  <b> الصورة الشخصية</b>
                    <ul>
                      @foreach ($file_pic as $pic)
                        <li><p><a target="_blank" href="{{ asset($pic->file_path) }}">{{ $pic->name }}</a></p></li><br>
                      @endforeach
                    </ul>
              </div>
            <br>
              <div class="form-holder">
                 <b>المستندات الأخرى</b>
                    <ul>
                      @foreach ($file_doc as $doc)
                        <li><p><a target="_blank" href="{{ asset($doc->file_path) }}">{{ $doc->name }}</a></p></li><br>
                      @endforeach
                    </ul>
              </div>
 
            
        </div>
    </div>
              
    </form>

    </div>
</div>
        
@endsection