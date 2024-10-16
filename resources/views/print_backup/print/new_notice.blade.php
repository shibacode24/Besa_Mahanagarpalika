<!DOCTYPE html>
<html >

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body style="font-family:Arial;font-size:12px">
  <div style="width:100%;font-size:12px">

    <table width="100%" >
      <tr>
        <td> <img src="{{ asset('images/img_01.png')}}" style="height:50%;width:30%;"></td>
        <td width="70%">    <h1>लातूर शहर महानगर पालिका लातूर <br> <spam style="margin-left: 21%;">परवाना विभाग </spam></h1></td>
      </tr>
    </table>
    <hr style="color: #000;">
    <p style="margin-left: 60%;">जा.क्र. नावाश मनपा/झोन न. ०१/ट्रेड लायसन्स/००१/२०२३ </p>
    <p style="margin-left: 85%;">दिनाांक {{date('d/m/Y')}}</p>

    <h1 align="center">नोटीस</h1>
    <p>प्रती</p>
    <p><b>{{$data->bussiness_owner1}}</b></p>
    <p><b>{{$data->establishment1}}</b></p>
    <p><b>{{$data->locality1}}</b></p>
    <p><<>लातूर < p>
    <p>विषय: महाराष्ट्र महानगरपालिका  अधिनियमाचे कलम ३७६ (अ) ३८६ अन्वये महानगरपालिका बाजार व परवाना विभागाचा परवाना (Trade License) काढण्याबाबत.</p>
    <p>आपणास या दवारे सूचित करन्यात येते कि,  लातूर महानगरपालिका क्षेत्रात आपण <b>{{$data->establishment1}}</b> या नावाने व्यवसाय करीत आहात. महाराष्ट्र महानगरपालिका अधिनियमातील कलम ३८३ अंतर्गत आपले व्यवसायचा परवाना (Trade License) काढून घेणे अनिवार्य आहे.आपण अधापि परवाना आढळून आले आहे या मध्ये आपण नियमाचे उलंघन केले असल्याचे सकृतदर्शनी दिसून येते.</p>
    <p>सबब, हि नोटीस मीळाल्यापासून सात(७) दिवसाचे आत आपण आपले व्यवसायचा परवाना काढून  घ्यावा / नुतनीकरण करन्यात यावे, अन्यथा. आपले विरुद्ध दंडात्मक अथवा दुकान/व्यवसाय सील करण्याबाबत नाईलाजास्तव कारवाई केल्या जाईल.</p>
    <p>आपण आपले व्यवसायचा परवाना काढून सहकार्य करावे व कारवाई पासुन मुक्त व्हावे, याची नोद घ्यावी.</p><br>

  
  <table width="90%" style="  border: 1px solid;" >
    <tbody>
      <tr style="  border: 1px solid black;">
        <th style="  border: 1px solid black;">अनु.क्र.</th>
        <th style="  border: 1px solid black;">व्यवसायचे स्वरूप</th>
        <th style="  border: 1px solid black;">भरावयाचे परवाना शुल्क (वर्ष २०२३-२०२४ करिता)</th>
      </tr>
      <td style="  border: 1px solid black;text-align: center;">०१</td>
      <td style="  border: 1px solid black;text-align: center;">{{$data->bussiness_name1}}</td>
      <td style="  border: 1px solid black;text-align: center;">{{ $data->reg_fee + $data->charges }}.{{ $data->non_ac_room * $data->Non_AC + $data->ac_room * $data->AC }}</td>
    </tbody>
  </table>
<br><br><br><br><br><br>
<p style="margin-left: 70%;">मा. सहा. आयुक्त (झोन न. ०१)
</p>
<p style="margin-left: 70%;">नाांवाश मनपा लातूर 
</p>
</body>

</html>  