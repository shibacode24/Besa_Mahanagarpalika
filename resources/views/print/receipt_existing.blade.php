{{-- <!DOCTYPE html>
<!--[if IE]>  <html class="stl_ie"> <![endif]--> --}}
{{-- <html>

<head>
    <meta charset="utf-8" />
    <title>
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('edit1_1_files/style.css') }}" />
</head>

<body>

        <a href="{{route('showserve')}}"> <button type="button" style="margin-left:70%;padding:10px">Back</button></a>
    <div class="stl_ stl_02">
        <div class="stl_03">
            <img src="{{ asset('edit1_1_files/img_01.png') }}" alt="" class="stl_04" />
        </div>
        <div class="stl_view">
            <div class="stl_05 stl_06">
                <div class="stl_01" style="left:22.2142em;top:4.8842em;z-index:62;"><span
                        class="stl_07 stl_08 stl_09">काꢀा</span><span class="stl_10 stl_08 stl_11">ा</span><span
                        class="stl_07 stl_08 stl_12" style="word-spacing:0.033em;">लꢀ ꢁत &nbsp;</span></div>
                <div class="stl_01" style="left:6.252em;top:6.9922em;"><span class="stl_13 stl_08 stl_14"
                        style="word-spacing:-0.0014em;">नगर पंचायत बेसा - </span><span
                        class="stl_15 stl_08 stl_16" style="word-spacing:-0.0016em;">, </span><span
                        class="stl_13 stl_08 stl_17">पिंपळा 
                        &nbsp;</span></div>
                <div class="stl_01" style="left:6.262em;top:8.2122em;"><span class="stl_13 stl_08 stl_18"
                        style="word-spacing:0.0034em;">बाजार व परवाना लवभागा &nbsp;</span></div>
                <div class="stl_01" style="left:3.12em;top:9.4222em;"><span
                        class="stl_15 stl_08 stl_18">__________________________________________________________________________________________________________________
                        &nbsp;</span></div>
                <div class="stl_01" style="left:13.7817em;top:11.4159em;"><span class="stl_07 stl_08 stl_19"
                        style="word-spacing:0.028em;">परवाना साठी नगदी रꢂम ꢁाꢃ झाꢄाची पोच पावती &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:14.7422em;z-index:261;"><span class="stl_13 stl_08 stl_20">अज
                        &nbsp; &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BESA{{$data->survey_app_no}}{{date('mY')}}</span></div>
                <div class="stl_01" style="left:3em;top:17.1722em;z-index:282;"><span class="stl_13 stl_08 stl_21"
                        style="word-spacing:0.0177em;">परवाना स्थापनेचे&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $data->establishment }}</span></div>
                <div class="stl_01" style="left:3em;top:19.6122em;"><span class="stl_13 stl_08 stl_22"
                        style="word-spacing:-0.003em;">ꢁवसाय नाव </span><span class="stl_15 stl_08 stl_23">:{{ $data->type_of_bussiness_id == 'Hotel' ? $data->type_of_bussiness_id : '' }}&nbsp;{{ $data->bussiness_type }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                {{-- No of Non AC Room: {{ $data->non_ac_room }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                No of AC Room: {{ $data->ac_room }} --}}
                        {{-- &nbsp;</span></div>
                <div class="stl_01" style="left:3.5695em;top:22.0547em;"><span class="stl_13 stl_08 stl_19"
                        style="word-spacing:0.0029em;">य रꢂम </span><span class="stl_15 stl_08 stl_23">:&nbsp;{{ $data->reg_fee + $data->charges }}.{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }}
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:24.4947em;"><span class="stl_13 stl_08 stl_24"
                        style="word-spacing:-0.0009em;">मोबाईि ꢀमाक </span><span class="stl_15 stl_08 stl_25">:{{ $data->wht_app_no }}
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3.7194em;top:26.9347em;"><span class="stl_13 stl_08 stl_26"
                        style="word-spacing:-0.0008em;">रा </span><span class="stl_15 stl_08 stl_25">:
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:29.3747em;"><span class="stl_13 stl_08 stl_18"
                        style="word-spacing:0.0146em;">पावती नं</span><span class="stl_27 stl_28 stl_16"
                        style="word-spacing:-0.0013em;">/ </span><span class="stl_13 stl_08 stl_23"
                        style="word-spacing:0.0007em;">चक </span><span class="stl_27 stl_28 stl_16"
                        style="word-spacing:-0.0013em;">/ </span><span class="stl_13 stl_08 stl_29"
                        style="word-spacing:-0.0006em;">डीडी ꢀमाक </span><span class="stl_15 stl_08 stl_23">:
                        &nbsp;{{$data->payment_mode}}</span></div>
                <div class="stl_01" style="left:3.5695em;top:31.8147em;"><span class="stl_13 stl_08 stl_16"
                        style="word-spacing:-0.0062em;">क </span><span class="stl_15 stl_08 stl_29">:
                        &nbsp;</span></div>
                <div class="stl_01" style="left:4.4094em;top:14.7422em;z-index:262;"><span
                        class="stl_30 stl_08 stl_16">ज</span></div>
                <div class="stl_01" style="left:4.7em;top:14.7422em;"><span class="stl_13 stl_08 stl_31"
                        style="word-spacing:-0.0002em;">ꢀमाक </span><span class="stl_15 stl_08 stl_32"
                        style="word-spacing:0.0113em;">:  &nbsp;</span></div>
                <div class="stl_01" style="left:8.7317em;top:17.1722em;z-index:283;"><span
                        class="stl_13 stl_08 stl_16">े</span></div>
                <div class="stl_01" style="left:9.0117em;top:17.1722em;"><span class="stl_13 stl_08 stl_33"
                        style="word-spacing:0.0068em;">नाव </span><span class="stl_15 stl_08 stl_21">: &nbsp;</span>
                </div>
                <div class="stl_01" style="left:3em;top:22.0547em;z-index:307;"><span class="stl_13 stl_08 stl_34">दे
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:26.9347em;z-index:335;"><span class="stl_13 stl_08 stl_35">शे
                        &nbsp;</span></div>
                <div class="stl_01" style="left:6.5018em;top:29.3747em;z-index:351;"><span
                        class="stl_13 stl_08 stl_16">े</span></div>
                <div class="stl_01" style="left:3em;top:31.8147em;z-index:369;"><span class="stl_13 stl_08 stl_36">बँ
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:34.2447em;"><span class="stl_13 stl_08 stl_37"
                        style="word-spacing:-0.0033em;">लदनाक </span><span class="stl_15 stl_08 stl_38">:{{date('d-m-Y',strtotime($data->date))}}
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:35.4547em;"><span
                        class="stl_15 stl_08 stl_18">__________________________________________________________________________________________________________________
                        &nbsp;</span></div>
                <div class="stl_01" style="left:12.7017em;top:38.6101em;z-index:548;"><span
                        class="stl_07 stl_08 stl_39">भ</span><span class="stl_10 stl_08 stl_40">व</span><span
                        class="stl_07 stl_08 stl_25" style="word-spacing:0.0446em;">वꢅातील संदभा</span><span
                        class="stl_10 stl_08 stl_11">ा</span><span class="stl_07 stl_08 stl_41"
                        style="word-spacing:0.0314em;">साठी अꢆ</span><span class="stl_10 stl_08 stl_42">ा</span><span
                        class="stl_07 stl_08 stl_43" style="word-spacing:0.0398em;">दाराने पोचपावती ꢆपून </span><span
                        class="stl_07 stl_08 stl_44">ठ</span><span class="stl_07 stl_08 stl_16"
                        style="word-spacing:-0.081em;">े </span><span class="stl_07 stl_08 stl_12">व</span><span
                        class="stl_07 stl_08 stl_45">ावी</span><span class="stl_46 stl_08 stl_47">. &nbsp;</span>
                </div> --}}
                {{-- <div class="stl_01 stl_48" style="left:3.54em;top:67.2267em;"><span class="stl_49 stl_50 stl_51"
                        style="word-spacing:0.0065em;">Pg no.1/AMC-MNL &nbsp;</span></div>
                <div class="stl_01 stl_52" style="left:30.4358em;top:67.2267em;"><a href="https://mnl.amcakola.org"
                        target="_blank"><span class="stl_53 stl_50 stl_54" style="word-spacing:0.0065em;">Report
                            generated on https://mnl.amcakola.org &nbsp;</span></a></div> --}}
            {{-- </div>
        </div>
    </div>
</body>

</html> --}}




{{-- <!DOCTYPE html> --}}
<!--[if IE]>  <html class="stl_ie"> <![endif]-->
{{-- <html>

<head>
    <meta charset="utf-8" />
    <title>
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('edit1_1_files/style.css') }}" />
</head>

<body> --}}

        {{-- <a href="{{route('showserve')}}"> <button type="button" style="margin-left:70%;padding:10px">Back</button></a> --}}
    {{-- <div class="stl_ stl_02">
        <div class="stl_03">
            <img src="{{ asset('edit1_1_files/img_01.png') }}" alt="" class="stl_04" />
        </div>
        <div class="stl_view">
            <div class="stl_05 stl_06">
                <div class="stl_01" style="left:22.2142em;top:4.8842em;z-index:62;"><span
                        class="stl_07 stl_08 stl_09"><b>Establishment</span><span class="stl_10 stl_08 stl_11"></span><span
                        class="stl_07 stl_08 stl_12" style="word-spacing:0.033em;"> Owner Copy </b>&nbsp;</span></div>
                <div class="stl_01" style="left:6.252em;top:6.9922em;"><span class="stl_13 stl_08 stl_14"
                        style="word-spacing:-0.0014em;">नगर पंचायत बेसा - </span><span
                        class="stl_15 stl_08 stl_16" style="word-spacing:-0.0016em;">, </span><span
                        class="stl_13 stl_08 stl_17">पिंपळा 
                        &nbsp;</span></div>
                <div class="stl_01" style="left:6.262em;top:8.2122em;"><span class="stl_13 stl_08 stl_18"
                        style="word-spacing:0.0034em;">बाजार व परवाना लवभागा &nbsp;</span></div>
                <div class="stl_01" style="left:3.12em;top:9.4222em;"><span
                        class="stl_15 stl_08 stl_18">__________________________________________________________________________________________________________________
                        &nbsp;</span></div>
                <div class="stl_01" style="left:13.7817em;top:11.4159em;"><span class="stl_07 stl_08 stl_19"
                        style="word-spacing:0.028em;">परवाना साठी नगदी रꢂम ꢁाꢃ झाꢄाची पोच पावती &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:14.7422em;z-index:261;"><span class="stl_13 stl_08 stl_20">अज
                        &nbsp; &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BESA{{$data->survey_app_no}}{{date('mY')}}</span></div>
                <div class="stl_01" style="left:3em;top:17.1722em;z-index:282;"><span class="stl_13 stl_08 stl_21"
                        style="word-spacing:0.0177em;">परवाना स्थापनेचे&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $data->establishment }}</span></div>
                <div class="stl_01" style="left:3em;top:19.6122em;"><span class="stl_13 stl_08 stl_22"
                        style="word-spacing:-0.003em;">ꢁवसाय नाव </span><span class="stl_15 stl_08 stl_23">:{{ $data->type_of_bussiness_id == 'Hotel' ? $data->type_of_bussiness_id : '' }}&nbsp;{{ $data->bussiness_type }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                {{-- No of Non AC Room: {{ $data->non_ac_room }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                No of AC Room: {{ $data->ac_room }} --}}
                        {{-- &nbsp;</span></div>
                <div class="stl_01" style="left:3.5695em;top:22.0547em;"><span class="stl_13 stl_08 stl_19"
                        style="word-spacing:0.0029em;">य रꢂम </span><span class="stl_15 stl_08 stl_23">:&nbsp;{{ $data->reg_fee + $data->charges }}.{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }}
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:24.4947em;"><span class="stl_13 stl_08 stl_24"
                        style="word-spacing:-0.0009em;">मोबाईि ꢀमाक </span><span class="stl_15 stl_08 stl_25">:{{ $data->wht_app_no }}
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3.7194em;top:26.9347em;"><span class="stl_13 stl_08 stl_26"
                        style="word-spacing:-0.0008em;">रा </span><span class="stl_15 stl_08 stl_25">:
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:29.3747em;"><span class="stl_13 stl_08 stl_18"
                        style="word-spacing:0.0146em;">पावती नं</span><span class="stl_27 stl_28 stl_16"
                        style="word-spacing:-0.0013em;">/ </span><span class="stl_13 stl_08 stl_23"
                        style="word-spacing:0.0007em;">चक </span><span class="stl_27 stl_28 stl_16"
                        style="word-spacing:-0.0013em;">/ </span><span class="stl_13 stl_08 stl_29"
                        style="word-spacing:-0.0006em;">डीडी ꢀमाक </span><span class="stl_15 stl_08 stl_23">:
                        &nbsp;{{$data->payment_mode}}</span></div>
                <div class="stl_01" style="left:3.5695em;top:31.8147em;"><span class="stl_13 stl_08 stl_16"
                        style="word-spacing:-0.0062em;">क </span><span class="stl_15 stl_08 stl_29">:
                        &nbsp;</span></div>
                <div class="stl_01" style="left:4.4094em;top:14.7422em;z-index:262;"><span
                        class="stl_30 stl_08 stl_16">ज</span></div>
                <div class="stl_01" style="left:4.7em;top:14.7422em;"><span class="stl_13 stl_08 stl_31"
                        style="word-spacing:-0.0002em;">ꢀमाक </span><span class="stl_15 stl_08 stl_32"
                        style="word-spacing:0.0113em;">:  &nbsp;</span></div>
                <div class="stl_01" style="left:8.7317em;top:17.1722em;z-index:283;"><span
                        class="stl_13 stl_08 stl_16">े</span></div>
                <div class="stl_01" style="left:9.0117em;top:17.1722em;"><span class="stl_13 stl_08 stl_33"
                        style="word-spacing:0.0068em;">नाव </span><span class="stl_15 stl_08 stl_21">: &nbsp;</span>
                </div>
                <div class="stl_01" style="left:3em;top:22.0547em;z-index:307;"><span class="stl_13 stl_08 stl_34">दे
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:26.9347em;z-index:335;"><span class="stl_13 stl_08 stl_35">शे
                        &nbsp;</span></div>
                <div class="stl_01" style="left:6.5018em;top:29.3747em;z-index:351;"><span
                        class="stl_13 stl_08 stl_16">े</span></div>
                <div class="stl_01" style="left:3em;top:31.8147em;z-index:369;"><span class="stl_13 stl_08 stl_36">बँ
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:34.2447em;"><span class="stl_13 stl_08 stl_37"
                        style="word-spacing:-0.0033em;">लदनाक </span><span class="stl_15 stl_08 stl_38">:{{date('d-m-Y',strtotime($data->date))}}
                        &nbsp;</span></div>
                <div class="stl_01" style="left:3em;top:35.4547em;"><span
                        class="stl_15 stl_08 stl_18">__________________________________________________________________________________________________________________
                        &nbsp;</span></div>
                <div class="stl_01" style="left:12.7017em;top:38.6101em;z-index:548;"><span
                        class="stl_07 stl_08 stl_39">भ</span><span class="stl_10 stl_08 stl_40">व</span><span
                        class="stl_07 stl_08 stl_25" style="word-spacing:0.0446em;">वꢅातील संदभा</span><span
                        class="stl_10 stl_08 stl_11">ा</span><span class="stl_07 stl_08 stl_41"
                        style="word-spacing:0.0314em;">साठी अꢆ</span><span class="stl_10 stl_08 stl_42">ा</span><span
                        class="stl_07 stl_08 stl_43" style="word-spacing:0.0398em;">दाराने पोचपावती ꢆपून </span><span
                        class="stl_07 stl_08 stl_44">ठ</span><span class="stl_07 stl_08 stl_16"
                        style="word-spacing:-0.081em;">े </span><span class="stl_07 stl_08 stl_12">व</span><span
                        class="stl_07 stl_08 stl_45">ावी</span><span class="stl_46 stl_08 stl_47">. &nbsp;</span>
                </div> --}}
                {{-- <div class="stl_01 stl_48" style="left:3.54em;top:67.2267em;"><span class="stl_49 stl_50 stl_51"
                        style="word-spacing:0.0065em;">Pg no.1/AMC-MNL &nbsp;</span></div>
                <div class="stl_01 stl_52" style="left:30.4358em;top:67.2267em;"><a href="https://mnl.amcakola.org"
                        target="_blank"><span class="stl_53 stl_50 stl_54" style="word-spacing:0.0065em;">Report
                            generated on https://mnl.amcakola.org &nbsp;</span></a></div> --}}
            {{-- </div>
        </div>
    </div>
</body>

</html> --}}


{{-- <!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body style="font-family:Arial;font-size:12px">
 
  <h3 align="center">कार्यालय प्रत</h3>
  <table>
    <tr>
      <td> <img src="{{ asset('images/img_01.png') }}" style="width:20%;height:40%"></td>
      <td style="width:80%">
        <h4>नादेड शहर  - नादेड </h4>
        <h5 style="color: #4c4b4b;">बाजार व परवाना विभाग</h5>
      </td>
    </tr>
  </table>
  <hr style="color: #000;">



  <h4 align="center">परवाना साठी नगदी रक्कम प्राप्त झाल्याची पोचपावती</h4>


<div style="background-image: url(images/img_01.png);">
  <p>अर्ज क्रमांक: BESA{{$data->survey_app_no}}{{date('mY')}}</p>
  <p>परवाना प्रतिष्ठानचे नाव: {{ $data->establishment1 }} </p>
  <p> व्यवसाय नाव: {{ $data->type_of_bussiness_id == 'Hotel' ? $data->type_of_bussiness_id : '' }}&nbsp;{{ $data->bussiness_type1 }} </p>
  <p> देय रक्कम: {{ $data->reg_fee + $data->charges }}.{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }} </p>
  <p>मोबाईल न.: {{ $data->wht_app_no }} </p>
  <p>शेरा: </p>
  <p> पावती/चेक/डीडी क्रमांक: {{$data->payment_mode}}</p>
  <p>बँक : </p>
  <p>दिनांक :{{date('d-m-Y',strtotime($data->date))}}</p>
  <hr>

  <p><b>भविष्यातील संदर्भासाठी अर्जदाराने पोचपावती जपून ठेवावी</b></p>
<hr>

<h4 align="center">परवाना साठी नगदी रक्कम प्राप्त झाल्याची पोचपावती</h4>

<p>अर्ज क्रमांक: BESA{{$data->survey_app_no}}{{date('mY')}}</p>
<p>परवाना प्रतिष्ठानचे नाव: {{ $data->establishment1 }} </p>
<p> व्यवसाय नाव: {{ $data->type_of_bussiness_id == 'Hotel' ? $data->type_of_bussiness_id : '' }}&nbsp;{{ $data->bussiness_type1 }} </p>
<p> देय रक्कम: {{ $data->reg_fee + $data->charges }}.{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }} </p>
<p>मोबाईल न.: {{ $data->wht_app_no }} </p>
<p>शेरा: </p>
<p> पावती/चेक/डीडी क्रमांक: {{$data->payment_mode}}</p>
<p>बँक : </p>
<p>दिनांक :{{date('d-m-Y',strtotime($data->date))}}</p>
  <hr>

  <p><b>भविष्यातील संदर्भासाठी अर्जदाराने पोचपावती जपून ठेवावी</b></p>
<hr>
</div>
</body>

</html> --}}


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
                {{-- .{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }} --}}
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
