<!DOCTYPE html>
<html >

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body style="font-family:Arial;font-size:11px">
  <div style="width:100%;font-size:15px">

    <table width="100%" >
      <tr>
        <td> <img src="{{ asset('images/img_01.png')}}" style="height:50%;width:30%;"></td>
        <td width="70%">    <h2 align="left">नगर पंचायत बेसा  - पिंपळा <br> <spam style="margin-left: 21%;"> </spam></h2></td>
      </tr>
    </table>
    
    <hr style="color: #000;">
    {{-- <p style="margin-left: 60%;">जा.क्र. नावाश मनपा/झोन न. ०१/ट्रेड लायसन्स/००१/२०२३ </p> --}}
    <p style="margin-left: 85%;">दिनाांक:{{date('d/m/Y')}}</p>
    <p style="margin-rigth: 85%;">जावक क्र.:Outward/BESA{{$data->survey_app_no}}{{date('mY')}}{{$zone}}</p>
    <h1 align="center">नोटीस-02</h1>
    <p>प्रती</p>
    <p><b>{{$data->bussiness_owner1}}</b></p>
    <p><b>{{$data->establishment1}}</b></p>
    <p><b>{{$data->shop_house_no1}} {{$data->bulding1}} {{$data->street_name1}} {{$data->locality1}}</b></p>
    <p><b>पिंपळा </b><p>
    <p><b>{{$data->wht_app_no1}}</b></p>

    <p>विषय: महाराष्ट्र महानगर-  अधिनियमाचे कलम ३७६ (अ) ३८६ अन्वये महानगर- बाजार व परवाना विभागाचा परवाना (Trade License) काढण्याबाबत.</p>
    <p>आपणास या दवारे सूचित करन्यात येते कि,  पिंपळा महानगर- क्षेत्रात आपण <b>{{$data->establishment1}}</b> या नावाने व्यवसाय करीत आहात. महाराष्ट्र महानगर- अधिनियमातील कलम ३८३ अंतर्गत आपले व्यवसायचा परवाना (Trade License) काढून घेणे अनिवार्य आहे.आपण अधाप परवाना  काढलेला नाही. या मध्ये आपण नियमाचे उलंघन केले असल्याचे सकृतदर्शनी दिसून येते.</p>
    <p>सबब, हि नोटीस मीळाल्यापासून सात(७) दिवसाचे आत आपण आपले व्यवसायचा परवाना काढून  घ्यावा / नुतनीकरण करन्यात यावे, अन्यथा. आपले विरुद्ध दंडात्मक अथवा दुकान/व्यवसाय सील करण्याबाबत नाईलाजास्तव कारवाई केल्या जाईल.</p>
    <p>आपण आपले व्यवसायचा परवाना काढून सहकार्य करावे व कारवाई पासुन मुक्त व्हावे, याची नोद घ्यावी.</p><br>
  
  <table width="90%" style="  border: 1px solid;" >
    <tbody>
      <tr style="  border: 1px solid black;">
        <th style="  border: 1px solid black;">अनु.क्र.</th>
        <th style="  border: 1px solid black;">व्यवसायचे स्वरूप</th>
        <th style="  border: 1px solid black;">भरावयाचे परवाना शुल्क (वर्ष {{(date("Y") - $data->past_year)}}-{{(date("Y") + $data->certificate_year)}} करिता)</th>
      </tr>
      <td style="  border: 1px solid black;text-align: center;">०१</td>
      <td style="  border: 1px solid black;text-align: center;">{{$data->bussiness_name1}}</td>
      
       {{-- @if (number_format($data->non_ac_room) <=10)
      @php
            $non_ac = 1000 ;
          @endphp
      @else
      @php
         $non_ac = 2500 ;
      @endphp
      @endif


      @if (number_format($data->ac_room) <=10)
      @php
            $ac = 2500;
          @endphp
      @else
      @php
         $ac = 5000 ;
      @endphp
      @endif --}}

      @php
      $ac =0 ;
    $non_ac =0 ;
   @endphp
   @if (number_format($data->non_ac_room) <=10 && number_format($data->non_ac_room) > 0)
   @php
         $non_ac = 1000 ;
       @endphp
   @endif
       @if(number_format($data->non_ac_room) >10)                                                                                   
   @php
      $non_ac = 2500 ;
   @endphp
   @endif

   @if (number_format($data->ac_room) <=10 && number_format($data->ac_room) > 0)
   @php
         $ac = 2500;
       @endphp
      @endif
   @if(number_format($data->ac_room) >10)
   @php
      $ac = 5000 ;
   @endphp
   @endif
    {{-- @json($data->non_ac_room)
    @json($data->ac_room)
    
    @json($non_ac)
    @json($ac) --}}
    {{-- @json( $non_ac + $ac ) --}}
{{-- @json($data->late) --}}
    <td style="  border: 1px solid black;text-align: center;">
      
      @if($data->type_of_bussiness_id=='Hotel')
      {{ ($non_ac + $ac) * ($data->past_year + $data->certificate_year) + $data->late_fee }}
     @else
     
     {{ ( ($data->reg_fee + $data->charges)  +  ($data->late_fee) * ($data->past_year + $data->certificate_year)) }}
     @endif
      
     
      </td>
      
      
      {{--<td style="  border: 1px solid black;text-align: center;">{{ $data->reg_fee + $data->charges }}.{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }}</td>--}}
    </tbody>
  </table>
<br><br><br>
<div align="right">
  <p style="text-align:center;width:300px;"> सहाय्यक आयुक्त <br>क्षेत्रीय कार्यालय क्र.{{ $zone }},
    {{$data->zone_name}}<br> नगर पंचायत बेसा  - पिंपळा </p>
</div>
<p>टीप:- नमूद नोटीस मिळाल्या पासून ०७ दिवसाच्या आत ट्रेड लायसन्स फी चा भरणा करण्यात यावा अन्यथा नियमानुसार दंड आकारण्यात येईल.<br>
  This is computer generated notice need not signed.</p>
</body>

</html>  

 {{-- @if ($data->zone == 'zone - 1')
    तरोडा-सांगवी
    @else
    अशोकनगर
    @endif --}}