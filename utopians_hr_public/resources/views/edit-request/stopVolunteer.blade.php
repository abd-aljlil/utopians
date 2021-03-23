@extends('layouts.app')

@section('content')

<div class="wrapper rtl" id="wrapper" style="text-align:right;" >
    <div class="inner">
        
<form method="POST" enctype="multipart/form-data" action="updatestopvolunteer">
          @csrf
        <p style="text-align: center;"><img src="{{asset('logo.png')}}" height="150"></p>
        
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
         
		@foreach ( $details as $detail )
		
        <br><h3 id="ar">انهاء فترة الـتـطــوع</h3>
        <div> <input name="id" value="{{ $volunteer->id }}" hidden /> </div>
    
        <div class="section">
                <div class="six_section">
                  <div id="ar" class="section_name"> بيانات إنهاء فترة المتطوع </div>
                      <div class="form-holder">
                          <label id="ar"><b> القسم الذي كان مقبول المتطوع به</b> </label>
                          <input type="text" class="form-control" name="Accepting_Status" id="Accepting_Status" value="{{$detail->Accepting_Status}}" required>
                    </div>
					<div class="form-holder">
                        <label id="ar"><b>  تاريخ المتطوع في المبادرة </b></label>
                        <span class="lnr lnr-indent-increase"></span>
                        <div name="Volunteer_History" required>{!! $detail->Volunteer_History !!}</div>
                    </div>
                    <div class="form-holder">
                        <label id="ar"><b> ملاحظات </b></label>
                        <span class="lnr lnr-indent-increase"></span>
                        <input type="text" class="form-control" name="Notes" value="لا يوجد">{!! $detail->Notes !!}
                    </div>
                </div>
            </div>
    
        <button type="submit">
            <span id="ar"><b>إنهاء</b></span>
        </button>
		@endforeach
    <br>
        <div class="section">
            <div class="first_section">
                <div id="ar" class="section_name">  أولاً: المعلومات الشخصية </div> 
                <div id="en" class="section_name">  First: Personal Information </div> 
                <div class="form-holder">
                  <label id="ar"><b>  الاسم </b></label>
                  <label id="en"><b>  First Name: </b></label>
                  <span class="lnr lnr-user"></span>
                  <input type="text" class="form-control" id="first_name" name="First_Name"  value="{{ $volunteer->First_Name }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  اسم العائلة</b></label>
                  <label id="en"><b> Last Name:</b></label>
                  <span class="lnr lnr-user"></span>
                  <input type="text" class="form-control" id="family_name" name="Family_Name" value="{{ $volunteer->Family_Name }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  اسم الأب</b></label>
                  <label id="en"><b>  Father's name:</b></label>
                  <span class="lnr lnr-user"></span>
                  <input type="text" class="form-control"  id="father_name" name="Father_Name" value="{{ $volunteer->Father_Name }}"readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  تاريخ الميلاد</b></label>
                  <label id="en"><b>  Date of Birth:</b></label>
                  <span class="lnr lnr-calendar-full"></span>
                  <input type="date" class="form-control"  id="date_birth" name="Date_Of_Birth" value="{{ $volunteer->Date_Of_Birth }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>بلد الإقامة: (مثال: سوريا، فلسطين، ..)</b></label>
                  <label id="en"><b>  Country of residence: (Ex: Syria, Cairo, .. )</b></label>
                  <span class="lnr  lnr-map-marker"></span>
                  <input type="text" class="form-control" name="Current_Country" value="{{ $volunteer->Current_Country }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  اسم المدينة: (مثال: دمشق، حمص، القاهرة ...)</b></label>
                  <label id="en"><b>  City: (Ex: Aleppo, Homs, .. )</b></label>
                  <span class="lnr  lnr-map-marker"></span>
                  <input type="text" class="form-control" name="Current_City" value="{{ $volunteer->Current_City }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  الجنسية: (مثال: سوري، فلسطيني، ..)</b></label>
                  <label id="en"><b>  Nationality: (Ex: Syrian, Egyption, ..)</b></label>
                  <span class="lnr lnr-frame-expand"></span>
                  <input type="text" class="form-control" name="Nationality" value="{{ $volunteer->Nationality }}" readonly>
                </div>  
            </div>  
        </div>
          
        <div class="section">
            <div class="second_section">
                <div id="ar" class="section_name"> ثانياً: معلومات الاتصال </div>
                <div id="en" class="section_name"> Second: Contact Information </div>
                <div class="form-holder">
                  <label id="ar"><b>رقم الموبايل: (مثال: 00963935740646)</b></label>
                  <label id="en"><b>  Mobile Number: (Ex: 00963935740646) </b></label>
                  <span class="lnr lnr-phone-handset"></span>
                  <input type="text" class="form-control" name="Phone_Number" value="{{ $volunteer->Phone_Number }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  عنوان البريد الإلكتروني</b> </label>
                  <label id="en"><b>  Email Address:</b> </label>
                  <span class="lnr lnr-envelope"></span>
                  <input type="email" class="form-control" name="Email" value="{{ $volunteer->Email }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  رابط صفحتك الشخصية على فيسبوك</b></label>
                  <label id="en"><b>  Facebook Profile Link: </b></label>
                  <span class="fab fa-facebook"></span>
                  <input type="text" class="form-control" name="Facebook_Page" value="{{ $volunteer->Facebook_Page }}" readonly>
                </div>
            </div>
        </div>
          
        <div class="section">
            <div class="third_section">
                <div id="ar" class="section_name"> ثالثاً: المعلومات الأكاديمية </div>
                <div id="en" class="section_name"> Third: Academic Information </div>
                <div class="form-holder">
                  <label id="ar"><b>أخر شهادة علمية حاصل عليها</b> </label>
                  <label id="en"><b> What is your highest level of education?</b> </label>
                  <input type="text" class="form-control" id="degrees" name="Degree"  value="{{ $volunteer->Degree }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  التخصص الدراسي (مثال: اقتصاد) </b></label>
                  <label id="en"><b>  The field of study: (Ex: Economy) </b></label>
                  <span class="lnr lnr-pencil"></span>
                  <input type="text" class="form-control" name="Specialization" value="{{ $volunteer->Specialization }}" readonly>
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  اسم الجامعة، المعهد، المدرسة، الأكاديمية (مثال: جامعة دمشق،) </b></label>
                  <label id="en"><b> University, Institute, School (Ex: Damascus University)  </b></label>
                  <span class="lnr lnr-apartment"></span>
                  <input type="text" class="form-control" name="University" value="{{ $volunteer->University }}" readonly />
                </div>
                <div class="form-holder">
                  <label id="ar"><b>  مستوى اللغة الانجليزية </b></label>
                  <label id="en"><b>  English language level </b></label>
                    <br>
                  <input type="text" class="form-control" name="English_Level" value="{{ $volunteer->English_Level }}" readonly />
                </div>
            </div>
        </div>
          
        <div class="section">
            <div class="forth_section">
                <div id="ar" class="section_name"> رابعاً: الخبرة </div>
                <div id="en" class="section_name"> Fourth: Experience </div>
                <div class="form-holder">
                    <label id="ar"><b> المنصب الوظيفي: (مثال: مساعد موارد بشرية) </b></label>
                    <label id="en"><b> Job position: (Ex: Human Resources Assistant)  </b></label>
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" name="Position" value="{{ $volunteer->Position }}" readonly>
                </div>
                <div class="form-holder">
                    <label id="ar"><b>  اسم الشركة، المنظمة، المؤسسة التي عملت أو تطوعت بها</b></label>
                    <label id="en"><b>  Organization / company </b></label>
                    <span class="lnr lnr-frame-expand"></span>
                    <input type="text" class="form-control" name="Company" value="{{ $volunteer->Company }}" readonly>
                </div>
            </div>
        </div>
          
        <div class="section">
            <div class="fifth_section">
              <div id="ar" class="section_name"> خامساً: التطوع </div>
              <div id="en" class="section_name"> Fifth: Volunteering  </div>
                  <div class="form-holder">
                      <label id="ar"><b>  القسم المرغوب للتطوع</b> </label>
                      <label id="en"><b>  Desired Department</b> </label>
                      <input type="text" class="form-control" name="Department" value="{{ $volunteer->Department }}" id="departments" readonly>
                </div>
                <div class="form-holder">
                    <label id="ar"><b>  لماذا قمت باختيار هذا القسم؟ </b></label>
                    <label id="en"><b>  Why did you choose this department?</b></label>
                    <span class="lnr  lnr-indent-increase"></span>
                    <input type="text" class="form-control" name="Department_Reason" value="{{ $volunteer->Department_Reason }}" readonly>
                </div>
                <div class="form-holder">
                    <label id="ar"><b> لماذا ترغب التطوع في المبادرة؟ </b></label>
                    <label id="en"><b> Why do you wish to volunteer with Utopians? </b></label>
                    <span class="lnr  lnr-indent-increase"></span>
                    <input type="text" class="form-control" name="Voluntary_Reason" value="{{ $volunteer->Voluntary_Reason }}" readonly>
                </div>
                
                <div class="form-holder">
                  <label id="ar"><b>هل يمكنك الالتزام بالتطوع لمدة ستة أشهر على الأقل؟</b></label><br>
                  <label id="en"><b>Can you commitment for at least 6 months?   </b></label>
                      <input type="text" class="form-control" value="{{ $volunteer->Six_Months }}" name="Six_Months" readonly>
                </div>
                        
            </div>
        </div>
              
    </form>

    </div>
</div>
        
@endsection