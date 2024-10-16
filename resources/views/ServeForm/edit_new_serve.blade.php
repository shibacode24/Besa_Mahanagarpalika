@extends('layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">

        <div class="page-content">
            <div class="row">
                {{-- <div class="col-md-1"></div> --}}
                <div class="col-md-12" style="margin-left: -8%;">
                    {{-- @if (count($errors) > 0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                    @endif --}}
                   
                    <div class="card" style="margin-top:-4%;">
                        @include('alert')
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">

                                <h6>EXISTING APPLICATION FORM</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="post" action="{{ route('newserveupdate') }}"
                                enctype="multipart/form-data" id="form_id">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit_data->id }}">

                                <div class="col-md-2">
                                    <label class="form-label">Application No.</label>
                                    <input class="form-control " type="number" placeholder="Application No."
                                        aria-label="default input example" name="survey_app_no"
                                        value="{{ $edit_data->survey_app_no }}" id="serve" required>

                                </div>
                                {{-- @json($data1) --}}
                                {{-- <div class="col-md-2" style="margin-top:6vh;">
                                    <div class="col">

                                        <button type="button" id="search_button" class="btn btn-primary px-5"
                                            style=" height: 40px;"> <i class='bx bx-search'
                                                style="font-size: 110%; "></i></button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img src="" value="" class="logo-icon" alt="logo icon"
                                        style="height:100px; width: 200px;" id="photo">
                                    <input type="hidden" name="photo" id="photo2">
                                    {{-- <img src="{{ asset('images/serve_photo/' . $data1->photo) }}"
                                            style="height:100px;width:auto;" alt=""> --}}
                                {{-- <img src="{{ asset('images/serve_photo/' . $edit_data->photo) }}"
                                            style="height:100px;width:auto;" alt="">
                                </div> --}}
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <img src="{{ asset('images/' . $edit_data->photo) }}" style="height:100px;width:auto;"
                                        alt="">
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <label class="form-label">Upload Photo</label>
                                    <input class="form-control " type="file" placeholder=""
                                        aria-label="default input example" name="photo">

                                </div>

                                {{-- <div class="col-md-2">
                                    <label class="form-label">Upload Photo</label>
                                    <input class="form-control " type="file" placeholder=""
                                        aria-label="default input example" name="image">

                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('images/serve_photo/' . $edit_data->photo) }}"
                                    style="height:100px;width:auto;" alt="">
                                    {{-- <label class="form-label">Upload Photo</label>
                                    <input class="form-control " type="file" placeholder=""
                                        aria-label="default input example"> --}}

                                {{-- </div> --}}


                                <div class="col-md-3">
                                    <label class="form-label">Name of Establishment</label>
                                    <input class="form-control  from-text" type="text"
                                        placeholder="Name of Establishment" aria-label="default input example"
                                        name="establishment" id="establishment" value="{{ $edit_data->establishment }}">

                                </div>


                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control  to-text" type="text" placeholder="स्थापनेचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="establishment1"
                                        value="{{ $edit_data->establishment1 }}">

                                </div>

                                {{-- <div class="col-md-6">
                                    <label class="form-label">Application No.</label>
                                    <input class="form-control " type="number" placeholder="Application No."
                                        aria-label="default input example" name="survey_app_no">

                                </div> --}}

                                <div class="col-md-3">
                                    <label class="form-label">Name of Business Owner</label>
                                    <input class="form-control  from-text" type="text"
                                        placeholder="Name of Business Owner" aria-label="default input example"
                                        name="bussiness_owner" value="{{ $edit_data->bussiness_owner }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control   to-text " type="text" placeholder="व्यवसाय मालकाचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="bussiness_owner1"
                                        value="{{ $edit_data->bussiness_owner1 }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Name of Contact Person</label>
                                    <input class="form-control from-text " type="text" placeholder="Name of Corporation"
                                        aria-label="default input example" name="contact_person"
                                        value="{{ $edit_data->contact_person }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control   to-text " type="text" placeholder="संपर्क व्यक्तीचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="contact_person1"
                                        value="{{ $edit_data->contact_person1 }}">
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Shop/House No</label>
                                    <input class="form-control mb-3 from-text" type="text" placeholder="Shop/House No"
                                        aria-label="default input example" name="shop_house_no"
                                        value="{{ $edit_data->shop_house_no }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3  to-text " type="text" placeholder="दुकान घर क्र."
                                        aria-label="default input example" style="margin-top:8px;" name="shop_house_no1"
                                        value="{{ $edit_data->shop_house_no1 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Name of Building</label>
                                    <input class="form-control mb-3  from-text" type="text"
                                        placeholder="Building Name" aria-label="default input example" name="bulding"
                                        value="{{ $edit_data->bulding }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3  to-text " type="text" placeholder="इमारतीचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="bulding1"
                                        value="{{ $edit_data->bulding1 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Lane/Street Name</label>
                                    <input class="form-control mb-3 from-text " type="text"
                                        placeholder="Lane/Street Name" aria-label="default input example"
                                        name="street_name" value="{{ $edit_data->street_name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3  to-text" type="text"
                                        placeholder="लेन रस्त्याचे नाव" aria-label="default input example"
                                        style="margin-top:8px;" name="street_name1"
                                        value="{{ $edit_data->street_name1 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Locality</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Locality"
                                        aria-label="default input example" name="locality"
                                        value="{{ $edit_data->locality }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text" type="text" placeholder="परिसर"
                                        aria-label="default input example" style="margin-top:8px;" name="locality1"
                                        value="{{ $edit_data->locality1 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Prabhag Name</label>
                                    <input class="form-control mb-3 from-text" type="text" placeholder="Prabhag Name"
                                        aria-label="default input example" name="prabhag_name"
                                        value="{{ $edit_data->prabhag_name1 }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="प्रभाग नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="prabhag_name1"
                                        value="{{ $edit_data->zone_no1 }}">
                                </div>
                                {{-- <div class="col-md-6">
                                    <label class="form-label">Zone No.</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Zone No."
                                        aria-label="default input example" name="zone_no">
                                </div> --}}
                                <input type="hidden" id="change_zone"
                                    value="{{ Auth::guard('operator')->user()->zone_id }}">
                                <div class="col-md-3">
                                    <label class="form-label">Zone No.</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="zone_no" id="zone_id">
                                        <option value="">Select</option>
                                        @foreach ($zone as $zone)
                                            <option value="{{ $zone->id }}">{{ $zone->zone }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="झोन क्र."
                                        aria-label="default input example" style="margin-top:8px;" name="zone_no1"
                                        id="zones_id" readonly value="{{ $edit_data->zone_no1 }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Pin Code</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Pin Code"
                                        aria-label="default input example" name="pincode"
                                        value="{{ $edit_data->pincode }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="पिन कोड"
                                        aria-label="default input example" style="margin-top:8px;" name="pincode1"
                                        value="{{ $edit_data->pincode1 }}">
                                </div>



                                <div class="col-md-3">
                                    <label class="form-label">Email ID</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Email ID"
                                        aria-label="default input example" name="email"
                                        value="{{ $edit_data->email }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="ईमेल आयडी"
                                        aria-label="default input example" style="margin-top:8px;" name="email1"
                                        value="{{ $edit_data->email1 }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Whatsapp No</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Whatsapp No."
                                        aria-label="default input example" name="wht_app_no"
                                        value="{{ $edit_data->wht_app_no }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text"
                                        placeholder="व्हॉट्सअॅप नंबर" aria-label="default input example"
                                        style="margin-top:8px;" name="wht_app_no1"
                                        value="{{ $edit_data->wht_app_no1 }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">GST No</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="GST"
                                        aria-label="default input example" name="gst_no"
                                        value="{{ $edit_data->gst_no }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="जीएसटी नंबर"
                                        aria-label="default input example" style="margin-top:8px;" name="gst_no1"
                                        value="{{ $edit_data->gst_no1 }}">
                                </div>



                                <div class="col-md-3">
                                    <label class="form-label">Type Of Business</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="bussiness_type" id="business_type_id">
                                        <option value="">Select</option>
                                        @foreach ($business_type as $business_type)
                                            <option value="{{ $business_type->id }}"
                                                @if ($edit_data->bussiness_type_id == $business_type->id) selected @endif>
                                                {{ $business_type->business_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: 4.2vh">
                                    {{-- <label class="form-label">Type Of Business</label> --}}
                                    <input class="form-control to-text mb-3" type="text"
                                        placeholder="व्यवसायाचे प्रकार " aria-label="default input example"
                                        style="margin-top:8px;" name="bussiness_type1" id="bussiness_type1"
                                        value="{{ $edit_data->business_type1 }}">

                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Nature Of Business</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="type_of_bussiness_id" id="bussiness">
                                        <option value="">Select</option>
                                        @foreach ($ty_bussiness as $ty_bussiness)
                                            <option value="{{ $ty_bussiness->id }}"
                                                @if ($edit_data->type_of_bussiness_id == $ty_bussiness->id) selected @endif>{{ $ty_bussiness->id }}
                                            </option>
                                        @endforeach
                                        <option value="Hotel" @if ($edit_data->type_of_bussiness_id == 'Hotel') selected @endif>47
                                            Hotel/Lodging/Hostel</option>

                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: 4.2vh">
                                    {{-- <label class="form-label">Nature Business</label> --}}
                                    <input class="form-control to-text mb-3" type="text"
                                        placeholder="व्यवसायाचे प्रकार " aria-label="default input example"
                                        style="margin-top:8px;" name="type_of_bussiness_id1" id="bussinesss"
                                        value="{{ $edit_data->type_of_bussiness_id1 }}">

                                </div>

                                <div class="row" id="other_hotel">

                                    <div class="col-md-3">
                                        <label class="form-label">No of Non AC Room</label>
                                        <input class="form-control from-text mb-3" type="text"
                                            placeholder="No Of Non Ac Room " aria-label="default input example"
                                            style="margin-top:8px;" name="non_ac_room" id="other36"
                                            value="{{ $edit_data->non_ac_room }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">No of Non AC Room</label>
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="एसी रूमची संख्या " aria-label="default input example"
                                            style="margin-top:8px;" name="ac_room1" id="other16"
                                            value="{{ $edit_data->non_ac_room1 }}">

                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">No of AC Room</label>
                                        <input class="form-control from-text  mb-3" type="text"
                                            placeholder="No Of Ac Room" aria-label="default input example"
                                            style="margin-top:8px;" name="ac_room" id="other6"
                                            value="{{ $edit_data->ac_room }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">No of AC Room</label>
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="नॉन एसी रूमची संख्या " aria-label="default input example"
                                            style="margin-top:8px;" name="non_ac_room1" id="other366"
                                            value="{{ $edit_data->ac_room1 }}">
                                    </div>
                                    {{-- <div class="col-md-3">
									<label class="form-label">No Of Non Ac Room</label>
									<input class="form-control to-text mb-3" type="text" placeholder="नॉन एसी रूमची संख्या "
										aria-label="default input example" style="margin-top:8px;" name="non_ac_room1"
										id="other46">

								</div> --}}
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Nature Of Business</label>
                                    <input class="form-control from-text mb-3" type="text"
                                        placeholder="Nature Of Business" aria-label="default input example"
                                        name="bussiness_name" value="{{ $edit_data->bussiness_name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control  to-text mb-3" type="text" placeholder="व्यवसायाचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="bussiness_name1"
                                        value="{{ $edit_data->bussiness_name1 }}">
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Type of License</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="type_of_licence_id" id="licence_id">
                                        <option value="">Select</option>
                                        @foreach ($ty_licence as $ty_licence)
                                            <option value="{{ $ty_licence->id }}"
                                                @if ($edit_data->type_of_licence_id == $ty_licence->id) selected @endif>
                                                {{ $ty_licence->bussiness_reg_type }}
                                            </option>
                                        @endforeach
                                        <option value="Not Available" @if ($edit_data->type_of_licence_id == 'Not Available') selected @endif>Not
                                            Available</option>
                                        <option value="Other" @if ($edit_data->type_of_licence_id == 'Other') selected @endif>Other
                                        </option>

                                    </select>
                                </div>


                                <div class="col-md-3" style="margin-top: 4.2vh">
                                    {{-- <label class="form-label">Type of License</label> --}}
                                    <input class="form-control to-text mb-3 " type="text"
                                        placeholder="लायसन्सचा प्रकार " aria-label="default input example"
                                        style="margin-top:8px;" name="type_of_licence_id1" id="licencess_id"
                                        value="{{ $edit_data->type_of_licence_id1 }}">

                                </div>


                                <div class="row" id="other_div">

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License Name</label> --}}
                                        <input class="form-control from-text mb-3" type="text"
                                            placeholder="License Name " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_name" id="other"
                                            value="{{ $edit_data->licence_name }}">
                                    </div>

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License Name</label> --}}
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="लायसन्सचे नाव " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_name1" id="other1"
                                            value="{{ $edit_data->licence_name1 }}">

                                    </div>
                                </div>


                                <div class="row" id="not_avail_div">

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License No</label> --}}
                                        <input class="form-control from-text mb-3" type="text"
                                            placeholder="License No " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_no" id="other3"
                                            value="{{ $edit_data->licence_no }}">
                                    </div>

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License No</label> --}}
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="लायसन्सचे क्रमांक " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_no1" id="other4"
                                            value="{{ $edit_data->licence_no1 }}">

                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">No of Emp Working as on date </label>
                                    <input class="form-control mb-3 from-text " type="text"
                                        placeholder="Number of Employees Working as on date"
                                        aria-label="default input example" name="no_of_employee_working"
                                        value="{{ $edit_data->no_of_employee_working }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text"
                                        placeholder="आजपर्यंत काम करणाऱ्या कर्मचाऱ्यांची संख्या"
                                        aria-label="default input example" style="margin-top:8px;"
                                        name="no_of_employee_working1" value="{{ $edit_data->no_of_employee_working1 }}">
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Area of Business in square Feet</label>
                                    <input class="form-control mb-3 from-text" type="text"
                                        placeholder="Area of Business in square Feet" aria-label="default input example"
                                        name="area_of_bussiness" value="{{ $edit_data->area_of_bussiness }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text" type="text"
                                        placeholder="व्यवसायाचे क्षेत्रफळ चौरस फुटात" aria-label="default input example"
                                        style="margin-top:8px;" name="area_of_bussiness1"
                                        value="{{ $edit_data->area_of_bussiness1 }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Year of Starting of
                                        Business</label>
                                    <input class="form-control mb-3" type="text"
                                        placeholder="Year of starting of Business" aria-label="default input example"
                                        name="year" value="{{ $edit_data->year }}">
                                </div>
                                {{-- <div class="col-md-3"></div> --}}
                                <div class="col-md-3" style="margin-top: 2.2vh">
                                    <label>Select Document</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        id="document_id">
                                        <option disabled selected>Select</option>
                                        @foreach ($document_type as $document_types)
                                            <option value="{{ $document_types->id }}">
                                                {{ $document_types->document_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>File</label>
                                    <input type="file" class="form-control mb-3" id="document" placeholder=""
                                        value="">
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary px-5 add-row"
                                        style="margin-top: 3.8vh;"><i class="fa fa-plus " aria-hidden="true"></i>
                                        Add</button>
                                </div>


                                <div class="col-md-12" style="margin-top: 2vh;">
                                    <table width="100%" border="1">
                                        <tr style="background-color:#f0f0f0; height:30px;">
                                            <th width="20%" style="text-align:center">Document Name</th>
                                            <th width="20%" style="text-align:center">File</th>
                                            {{-- <th width="20%" style="text-align:center">Price</th> --}}
                                            <th width="20%" style="text-align:center">Action</th>
                                        </tr>
                                        <tbody class="add_more">
                                            @foreach ($all_document as $all_documents)
                                            <tr>
                                                <td><input type="hidden"  required=""
                                                        style="border:none; width: 100%;" value="{{$all_documents->document_id}}"><input
                                                        type="text" required="" style="border:none; width: 100%;text-align:center;"
                                                        value="{{$all_documents->get_document_name->document_name}}" readonly>
                                                </td>
                                                <td><a href="{{asset('images/document/'.$all_documents->document)}}" target="_blank"><input  type="text" value="{{$all_documents->document}}" style="border:none; width: 100%;text-align:center;" readonly></a></td>
                                                <td style="text-align:center; color:#FF0000"><button
                                                        class="delete-row1"><i class="fa fa-trash-o"></i></button></td>
                                            </tr>  
                                            @endforeach
                                           
                                        </tbody>


                                    </table>

                                </div>

                                <div class="col-md-12" style="text-align: center;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5"> <i
                                                class="lni lni-circle-plus"></i>Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>


            </div>

        </div>





    @stop
    @section('js');

        <script>
            $(document).ready(function() {
                var src;
                var blob;
                var fileExtension;
                var fileName;
                $("#document").on('change', function(e) {
                    src = URL.createObjectURL(e.target.files[0]);
                    let file = e.target.files[0];
                    fileExtension = file.name.split('.').pop();
                    fileName = file.name;
                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function(e) {
                        blob = e.target.result;
                    };
                })

                $(".add-row").click(function() {

                    var document_id = $('#document_id').val();
                    var document_name = $('#document_id option:selected').text();
                    var document = $('#document').val();
                    var image_src = src;
                    let link = '';
                    link = '<img style="height:70px;width:auto;" src="' + image_src + '">';
                    var markup =
                        '<tr><td><input type="hidden" name="document_id[]" required="" style="border:none; width: 100%;" value="' +
                        document_id +
                        '"><input type="text"  required="" style="border:none; width: 100%;text-align:center;" value="' +
                        document_name + '"></td>' + '<td><input name="document[]" type="hidden" value="' +
                        blob + '"><a target="_blank" href="' + image_src + '" >' + link + '</a></td>' +
                        '<td style="text-align:center; color:#FF0000"><button class="delete-row1"><i class="fa fa-trash-o"></i></button></td></tr>';
                        // <a target="_blank" href="' + image_src + '" >' + link + '</a>
                    $(".add_more").append(markup);

                    // Clear the input field

                    $('#document_id').val('');
                    $('#document').val('');
                    src = null;
                    blob = null;

                });

                // Find and remove selected table rows
                $("tbody").delegate(".delete-row1", "click", function() {
                    $(this).parents("tr").remove();
                });

            });
        </script>

        <script>
            const fromText = $(".from-text").val();
            //const toText = $(".to-text");

            $(document).on("keyup", ".from-text", function() {
                console.clear();
                console.log($(this).parent().next().find('.to-text'));
                let text = $(this).val(),
                    translateFrom = 'en-GB',
                    translateTo = 'mr-IN';
                console.log(text);
                if (!text)
                    return;
                $(this).parent().next().find('.to-text').attr("placeholder", "Translating...");
                let apiUrl =
                    `https://api.mymemory.translated.net/get?q=${text}&langpair=${translateFrom}|${translateTo}`;
                fetch(apiUrl).then(res => res.json()).then(data => {
                    $(this).parent().next().find('.to-text').val(data.responseData.translatedText);
                    data.matches.forEach(data => {
                        if (data.id === 0) {
                            $(this).parent().next().find('.to-text').val(data.translation);
                        }
                    });
                    $(this).parent().next().find('.to-text').attr("placeholder", "Translation");
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                // alert(1);
                $("#bussiness").trigger("change");
                $("#bussiness").on('change', function() {
                    var bussiness = $("#bussiness").val()
                    // var medicine=$("#medicine").val()
                    // if(serve==''){
                    // }
                    $.ajax({
                        url: "{{ route('get_busness') }}",
                        type: 'get',
                        data: {

                            serve: $(this).val(),

                        },
                        cache: false,
                        success: function(result) {
                            console.log(result);
                            $("#bussinesss").val(result.bussiness_type1);
                            //$("#bussiness").keyup();

                            // $("#photo").val(result.photo);
                        }
                    });
                })
            })
        </script>
        <script>
            $(document).ready(function() {
                // alert(1);
                $("#licence_id").trigger("change");
                $("#licence_id").on('change', function() {
                    var bussiness = $("#licence_id").val()
                    // var medicine=$("#medicine").val()
                    // if(serve==''){
                    // }
                    $.ajax({
                        url: "{{ route('get_licence_id') }}",
                        type: 'get',
                        data: {

                            serve: $(this).val(),

                        },
                        cache: false,
                        success: function(result) {
                            console.log(result);
                            $("#licencess_id").val(result.bussiness_reg_type1);
                            // $("#photo").val(result.photo);
                        }
                    });
                })
            })
        </script>
        <script>
            $("#other_div").hide();

            $(document).on('change', '#licence_id', function() {
                if ($(this).val() == 'Other') {
                    //$("#select_service").hide();
                    $("#other_div").show();
                } else {
                    //if ($(this).val() == 'service') {
                    //$("#select_service").show();
                    $("#other_div").hide();
                }

            })
        </script>


        <script>
            $("#not_avail_div").hide();

            $(document).on('change', '#licence_id', function() {
                if ($(this).val() == 'Not Available') {
                    //$("#select_service").hide();
                    $("#not_avail_div").hide();
                } else {
                    //if ($(this).val() == 'service') {
                    //$("#select_service").show();
                    $("#not_avail_div").show();
                }

            })
        </script>

        <script>
            $("#other_hotel").hide();

            $(document).on('change', '#bussiness', function() {
                if ($(this).val() == 'Hotel') {
                    //$("#select_service").hide();
                    $("#other_hotel").show();
                } else {
                    //if ($(this).val() == 'service') {
                    //$("#select_service").show();
                    $("#other_hotel").hide();
                }

            })
        </script>

        <script>
            $(document).ready(function() {
                // alert(1);

                $("#zone_id").val($("#change_zone").val());
                setTimeout(() => {
                    $("#zone_id").change();
                }, 1000);
                $("#zone_id").prop('disabled', true);


                $("#form_id").on('submit', function() {
                    //alert('submit');
                    $("#zone_id").prop('disabled', false);
                })

                // $("#zone_id").trigger("change");
                $("#zone_id").on('change', function() {
                    var bussiness = $("#zone_id").val()
                    // var medicine=$("#medicine").val()
                    // if(serve==''){
                    // }
                    $.ajax({
                        url: "{{ route('get_zone_id') }}",
                        type: 'get',
                        data: {

                            serve: $(this).val(),

                        },
                        cache: false,
                        success: function(result) {
                            console.log(result);
                            $("#zones_id").val(result.zone1);
                            // $("#photo").val(result.photo);
                        }
                    });
                })
            })
        </script>

        <script>
            $(document).ready(function() {
                // alert(1);

                setTimeout(() => {
                    $("#business_type_id").trigger("change");

                }, 1000);
                $("#business_type_id").on('change', function() {
                    var bussiness = $("#business_type_id").val()
                    // var medicine=$("#medicine").val()
                    // if(serve==''){
                    // }
                    $.ajax({
                        url: "{{ route('get_business_type') }}",
                        type: 'get',
                        data: {

                            serve: $(this).val(),

                        },
                        cache: false,
                        success: function(result) {
                            console.log(result);
                            $("#bussiness_type1").val(result.business_type1);
                            // $("#photo").val(result.photo);
                        }
                    });
                })
            })
        </script>
    @stop
