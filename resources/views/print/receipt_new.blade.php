
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body style="font-family:Arial;font-size:12px">

   
    <div
        style="background-image:url('images/img_01.png'); background-repeat:no-repeat; background-position:center; height: 1000px;">
        <table>
            <tr>
                <td> <img  align="center" src="{{ asset('images/img_01.png') }}" style="width:40%;height:60%"></td>
                <td style="width:80%">
                    <h4 align="center" style="padding-right:20%;">नगर पंचायत बेसा - पिंपळा</h4>
                    <h5 align="center" style="color: #4c4b4b;padding-right:20%;">Trade License Deparment</h5>
                </td>
                <td>
                       <a href="{{route('showserve')}}"> <button type="button" style="background-color: blue; color:#ffff;">Back</button></a>
                </td>
            </tr>
        </table>
        <hr style="color: #000;">
       <h3 align="center">कार्यालय प्रत</h3>



        <h4 align="center">परवाना साठी नगदी रक्कम प्राप्त झाल्याची पोचपावती</h4>


        <div style="background-image: url(images/img_01.png);">

            <p>अर्ज क्रमांक: {{ $data->survey_app_no }}</p>
            <p>प्रतिष्ठानचे नाव: {{ $data->establishment1 }} </p>
            <p> व्यवसायाचे प्रकार: {{$data->bussiness_name1}}
                {{-- {{ $data->type_of_bussiness_id == 'Hotel' ? $data->type_of_bussiness_id : '' }}&nbsp;{{ $data->bussiness_type1 }} --}}
                
            </p>
            <p> देय रक्कम: {{ $data->pay_amount }}
            </p>
            <p>मोबाईल न.: {{ $data->wht_app_no }} </p>
            <p>शेरा: </p>
            <p> बुक क्रमांक: {{ $data->book_no }}</p>
            <p> पावती/चेक/डीडी क्रमांक: {{ $data->receipt_no }}</p>
            <p>बँक : {{ $data->payment_mode }}</p>
            <p>दिनांक :{{ date('d-m-Y', strtotime($data->date)) }}</p>
            <hr>

            <p><b>भविष्यातील संदर्भासाठी अर्जदाराने पोचपावती जपून ठेवावी</b></p>
            <hr>
          <br><br><br><br>
          
           <table>
            <tr>
                <td> <img  align="center" src="{{ asset('images/img_01.png') }}" style="width:40%;height:60%"></td>
                <td style="width:80%">
                    <h4 align="center" style="padding-right:20%;">नगर पंचायत बेसा - पिंपळा</h4>
                    <h5 align="center" style="color: #4c4b4b;padding-right:20%;">Trade License Deparment</h5>
                </td>
            </tr>
        </table>
        <hr style="color: #000;">
          
          
          
            <h3 align="center">आस्थापना मालकाची प्रत</h3>

            <h4 align="center">परवाना साठी नगदी रक्कम प्राप्त झाल्याची पोचपावती</h4>

            <p>अर्ज क्रमांक: {{ $data->survey_app_no }}</p>
            <p>प्रतिष्ठानचे नाव: {{ $data->establishment1 }} </p>
            <p> व्यवसायाचे प्रकार:{{$data->bussiness_name1}}
                {{-- {{ $data->type_of_bussiness_id == 'Hotel' ? $data->type_of_bussiness_id : '' }}&nbsp;{{ $data->bussiness_type1 }} --}}
            </p>
            <p> देय रक्कम: {{ $data->pay_amount }}
                {{-- .{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }} --}}
            </p>
            <p>मोबाईल न.: {{ $data->wht_app_no }} </p>
            <p>शेरा: </p>
            <p> बुक क्रमांक: {{ $data->book_no }}</p>
            <p> पावती/चेक/डीडी क्रमांक: {{ $data->receipt_no }} </p>
            <p>बँक : {{ $data->payment_mode }}</p>
            <p>दिनांक :{{ date('d-m-Y', strtotime($data->date)) }}</p>
            <hr>

            <p><b>भविष्यातील संदर्भासाठी अर्जदाराने पोचपावती जपून ठेवावी</b></p>
            <hr>
        </div>
    </div>
</body>

</html>
