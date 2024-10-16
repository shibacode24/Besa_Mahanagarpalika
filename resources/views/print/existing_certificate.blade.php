<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>
<div >
<body  style="background-image: url('{{ asset('images/back3.png')}}');background-repeat:no-repeat; background-position:center;" >
 
  <table width="100%" border="none">
    <tr>
      <td>
      
        <p>
          <img src="{{asset('images/logo_Nanded_Lic.png')}}" alt="" style="width:100%;">
        </p>
        
    </tr>
    <tr>
      <td width="100%" colspan="4" style="background: rgb(242, 242, 242);" align="center">
        <strong><span style="color:black;">अनुज्ञप्ती</span></strong>



      </td>
    </tr>
  </table>


  <div class="container" style="border:1px solid black; padding-left: 2%; padding-right: 2%;">


    <p>अनुज्ञप्ती क्रमांक : BESA{{$data->survey_app_no}}{{date('mY')}}{{$zone}} </p>
    <p>आस्थापनेचे नाव : {{$data->establishment1}} </p>
    <p>मालकाचे नाव : {{$data->bussiness_owner1}} </p>
    <p>दूरध्वनी क्रमांक : {{$data->wht_app_no1}}</p>
    
    <p>व्यवसायाचा पत्ता : {{$data->shop_house_no1}} {{$data->bulding1}} {{$data->street_name1}} {{$data->locality1}}
</p>

    <p>व्यवसायाचा स्वरुप : {{$data->bussiness_name1 }}

    </p>

    <p style="font-size: 15px;">अनुज्ञप्ती धारकाचे नियमानुसार निर्धारित अनुज्ञप्ती शुल्क भरल्यावरून महाराष्ट्र प्रांतिक महानगर- अधिनियमातील तरतुदला अधीन राहून
      उपरोक्त व्यवसायकरिता दिनांक 01-04-2023 पासून ते दिनांक 31-03-{{date('Y') + $data->certificate_year}} पर्यंतच्या कालावधी करिता परवानगी देण्यात येत आहे.
    </p>


    <div>
      <table style="width:100%">
        <tr align="center">
          <td>अन . क्र . </td>
          <td>नूतनीकरणाचे वर्ष </td>
          <td>देय दिनांक </td>
          <td>नोंदणी वर्ष </td>
          <td>रक्कम </td>
        </tr>
        <tr align="center">
          <td>1</td>
          <td>{{date('Y')}}-{{date('Y') + $data->certificate_year}}
        </td>
          <td>{{date('d-m-Y', strtotime($data->date))}}</td>
          <td>{{$data->certificate_year}} वर्ष
          </td>
          <td>{{$data->pay_amount}}
        </td>
        </tr>
      </table>
    </div>

    <p>दिनांक : {{date('d-m-Y', strtotime($data->date))}}</p>
   <div align="right">
  <p style="text-align:center;width:300px;font-weight:bold;"> सहाय्यक आयुक्त <br>क्षेत्रीय कार्यालय क्र.{{$zone}},{{$data->zone_name}}<br> नगर पंचायत बेसा - पिंपळा 
    {{-- <img src="{{ $qrCodeUrl }}" alt="QR Code" height="100px" width="100px"> --}}
  </p>
</div>


    <p>०१. सदरील अनुज्ञप्ती व्यवसायाच्या ठिकाणी दर्शनी भागावर लावली पाहिजे व म. न. पा. अधिकाऱ्याने मागणी केल्यावर ती
      दाखवली पाहिजे. </p>
    <p>०२. अनुज्ञप्तीचे नूतनीकरण दरवर्षी एप्रिल महिन्यात करणे आवश्यक आहे व नूतनीकरण्याच्या वेळी हि अनुज्ञप्ती सादर करणे
      बंधनकारक राहील. </p>
    <p>०३. व्यवसाय बंद केल्यास महानगर-ेस ३० दिवसात लेखी स्वरूपात कळविणे बंधनकारक राहील तसेच अर्जासोबत हि अनुज्ञप्ती
      जमा करावी लागेल. </p>
    <p>०४. दुकानाची मालकी / भोगवटदार बदल असल्यास महानगर-ेला त्याची आगावू सूचना द्यावी . </p>
    <p>०५. मुदतीच्या आत नूतनीकरण न केल्यास दंड आकारण्यात येईल. </p>
    <p>०६. संबंधीत विभागाच्या आवश्यक ते लायसन्स मिळण्याच्या अधीन राहून व्यवसाय परवाना देण्यात येत आहे. </p>
    <p>०७. सुधारित दर लागू केल्यास त्या तारखेपासून पुढील दर लागू राहतील. </p>
    <p>०८. व्यवसाय परवाना हा मालकी हक्काचा पुरावा म्हणुन ग्राह्य धरण्यात येणार नाही.</p>
  </div>


</body>
</div>
</html>