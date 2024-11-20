<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application For Trade License</title>
</head>

<body>
<table width="100%" border="none">
  <tr>
    <td><img width="121" src="{{asset('/latur_logo.png')}}" alt="image"></span></td>
    <td colspan="3"> <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:2.25pt;margin-right:  3.15pt;margin-bottom:.0001pt;margin-left:3.15pt;text-align:  center;line-height:14.1pt;'><strong><u><span style='font-size:19px;font-family:"Nirmala UI",sans-serif;'>नगर&nbsp;पंचायत&nbsp;बेसा -&nbsp;पिंपळा</span></u></strong></p>
                <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-right:14.75pt;text-align:  right;line-height:10.25pt;'><strong><em><span style="font-size:16px;font-family:Consolas;">No</span></em></strong><strong><span style='font-size:16px;font-family:"Nirmala UI",sans-serif;'>.&nbsp;</span></strong><strong><em><span style="font-size:16px;font-family:  Consolas;">{{$data->survey_app_no}}</span></em></strong></p>
                <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:0cm;margin-right:3.2pt;margin-bottom:.0001pt;margin-left:3.15pt;text-align:center;line-height:15.75pt;'><span style='font-size:16px;font-family:"Nirmala UI Semilight",sans-serif;'><b>व्यवसायिक आस्थापना सर्वेक्षण नमूना</b></p>
                <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;margin-top:3.25pt;margin-right:  6.65pt;margin-bottom:.0001pt;margin-left:3.15pt;text-align:  center;'>(महाराष्ट्र प्रांतिक महानगर- अधिनियम, १९४९ चे कलम ३८६ व प्रकरण १८ अंतर्गत)</p>
        </tr>
        <tr>
            <td width="100%" colspan="4" style="background: rgb(242, 242, 242);" align="center">
                <strong><span style="color:black;">Application For Trade License</span></strong></td>
  </tr>
  </table>
  <table width="100%" border="none">
  <tr>
    <td width="5%" align="center">1</td>
    <td width="25%">Name of Establishment</td>
    <td width="40%">&nbsp;{{ $data->establishment1 }}</td>
    <td rowspan="3"> 
    <label style="z-index: 1000; position:absolute;color:#FFFF00; margin-top:6.5%; margin-left:16%;font-size:12px;"><b>
      Lat: {{ $data->latitude }}<br/>
      Long: {{ $data->longitude }}<b></label>
    {{-- <img src="{{ asset('images/serve_photo/' . $data->photo) }}"
        style="height:120px;width:100%;" alt="" /></td> --}}

        <img src="{{ asset('images/' . $data->photo) }}"
        style="height:120px;width:100%;" alt="" /></td>
  </tr>
  <tr>
    <td width="5%" align="center">2</td>
    <td width="25%">Name of Business Owner</td>
    <td width="40%">&nbsp;{{ $data->bussiness_owner1 }}</td>
    
  </tr>
  <tr>
    <td width="5%" align="center">3</td>
    <td width="25%">Name of Contact Person</td>
    <td width="40%">&nbsp;{{ $data->contact_person1 }}</td>
   
  </tr>
   <tr>
   			 <td width="10%" align="center">4</td>
            <td width="90%" colspan="3" style="background: rgb(242, 242, 242);" align="center">
                <strong><span style="color:black;">Address</span></strong></td>
  </tr>
  <tr>
    <td width="5%" align="center">4.1</td>
    <td>Shop/House No.</td>
    <td colspan="2">&nbsp;{{ $data->shop_house_no1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.2</td>
    <td>Name of  Building</td>
    <td colspan="2">&nbsp;{{ $data->bulding1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.3</td>
    <td>Lane/Street Name</td>
    <td colspan="2">&nbsp;{{ $data->street_name1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.4</td>
    <td>Locality</td>
   <td colspan="2">&nbsp;{{ $data->locality1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.5</td>
    <td>Ward/Prabhag Name/ No.</td>
    <td colspan="2">&nbsp;{{ $data->prabhag_name1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.6</td>
    <td>Ward
   <td colspan="2">&nbsp;{{ $data->zone_no1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.7</td>
    <td>PIN Code</td>
    <td colspan="2">&nbsp;{{ $data->pincode1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.8</td>
    <td>Whtas App No</td>
    <td colspan="2">&nbsp;{{ $data->wht_app_no1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">4.9</td>
    <td>Email Id</td>
    <td colspan="2">&nbsp;{{ $data->email1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">5</td>
    <td>GST No.</td>
    <td colspan="2">&nbsp;{{ $data->gst_no1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">6</td>
    <td>Year of Starting of Business</td>
    <td colspan="2">&nbsp;{{ $data->year }}</td>
  </tr>
  {{-- <tr>
    <td width="5%" align="center">7</td>
    <td>Nature of Business</td>
   <td colspan="2">&nbsp;</td>
  </tr> --}}
  <tr>
    <td width="5%" align="center">8</td>
    <td>Type of Business</td>
    <td colspan="2">&nbsp;{{$data->type_of_bussiness_id=='Hotel' ?$data->type_of_bussiness_id : '' }}  {{ $data->type_of_bussiness_id1 }}<br/>&nbsp;
        {{-- No of Non AC Room: {{ $data->non_ac_room }}<br/>
        &nbsp; No of AC Room:  {{ $data->ac_room }}<br/> --}}
      </td>
  </tr>

  <tr>
    <td width="5%" align="center">8</td>
    <td>Nature of Business</td>
    <td colspan="2">&nbsp;{{$data->bussiness_name }}
      <br/>&nbsp;
 
      </td>
  </tr>
     

  <tr>
    <td>&nbsp;</td>
    <td>If any...</td>
    <td colspan="2">&nbsp;</td>
  </tr>
   </table>
  <table width="100%" border="none">
   <tr>
   			 <td width="10%" align="center">9</td>
            <td width="90%" colspan="3" style="background: rgb(242, 242, 242);" align="center">
                <strong><span style="color:black;">Enter the Registration No. Whichever is Applicable</span></strong></td>
  </tr>
  <tr>
    <td width="5%" align="center">9.1</td>
    <td>Shop & Commercial Establishment
ACT 1956</td>
    <td colspan="2">&nbsp;{{$data->type_of_licence_id=='Other' ?$data->type_of_licence_id : '' }}{{ $data->bussiness_reg_type1 }}  <br/> &nbsp;License Name: {{ $data->licence_name1 }} 
       </td>
  </tr>
  <tr>
    <td width="5%" align="center">9.2</td>
    <td>License No.</td>
     <td colspan="2">&nbsp;{{ $data->licence_no1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">10</td>
    <td>Number of Employees Working as on
date</td>
     <td colspan="2">&nbsp;{{ $data->no_of_employee_working1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">11</td>
    <td>Area of Business in square Feet</td>
     <td colspan="2">&nbsp;{{ $data->area_of_bussiness1 }}</td>
  </tr>
  <tr>
    <td width="5%" align="center">12</td>
    <td width="35%">Year of Starting of Business</td>
     <td colspan="2">&nbsp;{{ $data->year }}</td>
  </tr>
</table>
<label style="position:absolute; margin-top:6.5%; margin-left:80%;font-size:15px;"><b>Signature Of Establishment Owner</b>
</label>
</body>
</html>