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

                                <h6>APPLICATION ENTRY FORM</h6>
                            </div>
                            <hr>
                            <form class="row g-2" method="POST" action="{{ route('existingserveinsert') }}" id="form_id"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-2">
                                    <label class="form-label">Application No.</label>
                                    <input class="form-control " type="number" placeholder="Application No."
                                        aria-label="default input example" name="survey_app_no" id="serve" required>

                                </div>
                                {{-- @json($data1) --}}
                                <div class="col-md-2" style="margin-top:6vh;">
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
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Upload Photo</label>
                                    <input class="form-control " type="file" placeholder=""
                                        aria-label="default input example" name="image">

                                </div>
                                <div class="col-md-4">
                                    {{-- <label class="form-label">Upload Photo</label>
                                    <input class="form-control " type="file" placeholder=""
                                        aria-label="default input example"> --}}

                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Name of Establishment</label>
                                    <input class="form-control  from-text" type="text"
                                        placeholder="Name of Establishment" aria-label="default input example"
                                        name="establishment" id="establishment">

                                </div>


                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control  to-text" type="text" placeholder="स्थापनेचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="establishment1">

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
                                        name="bussiness_owner">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control   to-text " type="text" placeholder="व्यवसाय मालकाचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="bussiness_owner1">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Name of Contact Person</label>
                                    <input class="form-control from-text " type="text" placeholder="Name of Corporation"
                                        aria-label="default input example" name="contact_person">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control   to-text " type="text" placeholder="संपर्क व्यक्तीचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="contact_person1">
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Shop/House No</label>
                                    <input class="form-control mb-3 from-text" type="text" placeholder="Shop/House No"
                                        aria-label="default input example" name="shop_house_no">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3  to-text " type="text" placeholder="दुकान घर क्र."
                                        aria-label="default input example" style="margin-top:8px;" name="shop_house_no1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Name of Building</label>
                                    <input class="form-control mb-3  from-text" type="text"
                                        placeholder="Building Name" aria-label="default input example" name="bulding">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3  to-text " type="text" placeholder="इमारतीचे नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="bulding1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Lane/Street Name</label>
                                    <input class="form-control mb-3 from-text " type="text"
                                        placeholder="Lane/Street Name" aria-label="default input example"
                                        name="street_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3  to-text" type="text"
                                        placeholder="लेन रस्त्याचे नाव" aria-label="default input example"
                                        style="margin-top:8px;" name="street_name1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Locality</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Locality"
                                        aria-label="default input example" name="locality">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text" type="text" placeholder="परिसर"
                                        aria-label="default input example" style="margin-top:8px;" name="locality1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Prabhag Name</label>
                                    <input class="form-control mb-3 from-text" type="text" placeholder="Prabhag Name"
                                        aria-label="default input example" name="prabhag_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="प्रभाग नाव"
                                        aria-label="default input example" style="margin-top:8px;" name="prabhag_name1">
                                </div>
                                {{-- <div class="col-md-6">
                                    <label class="form-label">Wardabel>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Ward
                                        aria-label="default input example" name="zone_no">
                                </div> --}}
                               
                                
                                <div class="col-md-3">
                                    <label class="form-label">Ward</label>
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
                                        id="zones_id" >
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Pin Code</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Pin Code"
                                        aria-label="default input example" name="pincode">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="पिन कोड"
                                        aria-label="default input example" style="margin-top:8px;" name="pincode1">
                                </div>



                                <div class="col-md-3">
                                    <label class="form-label">Email ID</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Email ID"
                                        aria-label="default input example" name="email">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="ईमेल आयडी"
                                        aria-label="default input example" style="margin-top:8px;" name="email1">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Whatsapp No</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="Whatsapp No."
                                        aria-label="default input example" name="wht_app_no">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text"
                                        placeholder="व्हॉट्सअॅप नंबर" aria-label="default input example"
                                        style="margin-top:8px;" name="wht_app_no1">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">GST No</label>
                                    <input class="form-control mb-3 from-text " type="text" placeholder="GST"
                                        aria-label="default input example" name="gst_no">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text" placeholder="जीएसटी नंबर"
                                        aria-label="default input example" style="margin-top:8px;" name="gst_no1">
                                </div>



                                <div class="col-md-3">
                                    <label class="form-label">Type Of Business</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="bussiness_type" id="business_type_id">
                                        <option value="">Select</option>
                                        @foreach ($business_type as $business_type)
                                            <option value="{{ $business_type->id }}">{{ $business_type->business_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: 4.2vh">
                                    {{-- <label class="form-label">Type Of Business</label> --}}
                                    <input class="form-control to-text mb-3" type="text"
                                        placeholder="व्यवसायाचे प्रकार " aria-label="default input example"
                                        style="margin-top:8px;" name="bussiness_type1" id="bussiness_type1">

                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Nature Of Business</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="type_of_bussiness_id" id="bussiness">
                                        <option value="">Select</option>
                                        @foreach ($ty_bussiness as $ty_bussiness)
                                            <option value="{{ $ty_bussiness->id }}">{{ $ty_bussiness->bussiness_type }}
                                            </option>
                                        @endforeach
                                        <option value="Hotel">47 Hotel/Lodging/Hostel</option>

                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: 4.2vh">
                                    {{-- <label class="form-label">Nature Business</label> --}}
                                    <input class="form-control to-text mb-3" type="text"
                                        placeholder="व्यवसायाचे प्रकार " aria-label="default input example"
                                        style="margin-top:8px;" name="type_of_bussiness_id1" id="bussinesss">

                                </div>

                                <div class="row" id="other_hotel">

                                    <div class="col-md-3">
                                        <label class="form-label">No of Non AC Room</label>
                                        <input class="form-control from-text mb-3" type="text"
                                            placeholder="No Of Non Ac Room " aria-label="default input example"
                                            style="margin-top:8px;" name="non_ac_room" id="other36">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">No of Non AC Room</label>
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="एसी रूमची संख्या " aria-label="default input example"
                                            style="margin-top:8px;" name="ac_room1" id="other16">

                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">No of AC Room</label>
                                        <input class="form-control from-text  mb-3" type="text"
                                            placeholder="No Of Ac Room" aria-label="default input example"
                                            style="margin-top:8px;" name="ac_room" id="other6">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">No of AC Room</label>
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="नॉन एसी रूमची संख्या " aria-label="default input example"
                                            style="margin-top:8px;" name="non_ac_room1" id="other366">
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
                                        name="bussiness_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control  to-text mb-3" type="text" placeholder="व्यवसायाचे नाव"
                                        aria-label="default input example" style="margin-top:8px;"
                                        name="bussiness_name1">
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Type of License</label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example"
                                        name="type_of_licence_id" id="licence_id">
                                        <option value="">Select</option>
                                        @foreach ($ty_licence as $ty_licence)
                                            <option value="{{ $ty_licence->id }}">{{ $ty_licence->bussiness_reg_type }}
                                            </option>
                                        @endforeach
                                        <option value="Not Available">Not Available</option>
                                        <option value="Other">Other</option>

                                    </select>
                                </div>


                                <div class="col-md-3" style="margin-top: 4.2vh">
                                    {{-- <label class="form-label">Type of License</label> --}}
                                    <input class="form-control to-text mb-3 " type="text"
                                        placeholder="लायसन्सचा प्रकार " aria-label="default input example"
                                        style="margin-top:8px;" name="type_of_licence_id1" id="licencess_id">

                                </div>


                                <div class="row" id="other_div">

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License Name</label> --}}
                                        <input class="form-control from-text mb-3" type="text"
                                            placeholder="License Name " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_name" id="other">
                                    </div>

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License Name</label> --}}
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="लायसन्सचे नाव " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_name1" id="other1">

                                    </div>
                                </div>


                                <div class="row" id="not_avail_div">

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License No</label> --}}
                                        <input class="form-control from-text mb-3" type="text"
                                            placeholder="License No " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_no" id="other3">
                                    </div>

                                    <div class="col-md-3">
                                        {{-- <label class="form-label">License No</label> --}}
                                        <input class="form-control to-text mb-3" type="text"
                                            placeholder="लायसन्सचे क्रमांक " aria-label="default input example"
                                            style="margin-top:8px;" name="licence_no1" id="other4">

                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">No of Emp Working as on date </label>
                                    <input class="form-control mb-3 from-text " type="text"
                                        placeholder="Number of Employees Working as on date"
                                        aria-label="default input example" name="no_of_employee_working">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text " type="text"
                                        placeholder="आजपर्यंत काम करणाऱ्या कर्मचाऱ्यांची संख्या"
                                        aria-label="default input example" style="margin-top:8px;"
                                        name="no_of_employee_working1">
                                </div>


                                <div class="col-md-3">
                                    <label class="form-label">Area of Business in square Feet</label>
                                    <input class="form-control mb-3 from-text" type="text"
                                        placeholder="Area of Business in square Feet" aria-label="default input example"
                                        name="area_of_bussiness">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"></label>
                                    <input class="form-control mb-3 to-text" type="text"
                                        placeholder="व्यवसायाचे क्षेत्रफळ चौरस फुटात" aria-label="default input example"
                                        style="margin-top:8px;" name="area_of_bussiness1">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Year of Starting of
                                        Business</label>
                                    <input class="form-control mb-3" type="text"
                                        placeholder="Year of starting of Business" aria-label="default input example"
                                        name="year">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-5">
                                    <label>Select Document
                                  
                                    </label>
                                    <select class="form-select from-text mb-3" aria-label="Default select example" id="document_id" >
                                        <option disabled selected>Select</option>
                                        @foreach ($document_type as $document_types)
                                            <option value="{{ $document_types->id }}">{{ $document_types->document_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>File</label>
                                    <input type="file" class="form-control mb-3" id="document" placeholder=""
                                        value="">
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary px-5 add-row" style="margin-top: 3vh;"><i
                                            class="fa fa-plus " aria-hidden="true"></i>
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

                                        </tbody>


                                    </table>

                                </div>

                                <div class="col-md-12" style="text-align: center;">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5"> <i
                                                class="lni lni-circle-plus"></i>Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

@stop
@section('js')

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
                        document_id + '"><input type="text"  required="" style="border:none; width: 100%;" value="' +
                        document_name + '"></td>' + '<td><input name="document[]" type="hidden" value="' +
                    blob + '"><a target="_blank" href="' + image_src + '" >' + link + '</a></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row1"><i class="fa fa-trash-o"></i></button></td></tr>';

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

    {{-- <script>
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
    </script> --}}


    <script>
        const debounce = (func, delay) => {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        };
    
        $(document).on("keyup", ".from-text", debounce(function() {
            console.clear();
            let text = $(this).val(),
                translateFrom = 'en-GB',
                translateTo = 'mr-IN';

            console.log("Text to translate:", text);
            if (!text) return;
    
            let toTextField = $(this).parent().next().find('.to-text');
            toTextField.attr("placeholder", "Translating...");
    
            // let apiKey = 'actual API key';  // Replace with your actual API key
            // let apiUrl = `https://api.mymemory.translated.net/get?q=${text}&langpair=${translateFrom}|${translateTo}&key=${apiKey}`;


            let apiUrl = `https://api.mymemory.translated.net/get?q=${text}&langpair=${translateFrom}|${translateTo}`;
            fetch(apiUrl)
                .then(res => res.json())
                .then(data => {
                    if (data && data.responseData && data.responseData.translatedText) {
                        toTextField.val(data.responseData.translatedText);
                    } else {
                        console.warn("Translation failed or invalid data returned:", data);
                        toTextField.val("Translation error.");
                    }
                    toTextField.attr("placeholder", "Translation");
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                    toTextField.val("Translation error.");
                    toTextField.attr("placeholder", "Translation");
                });
        }, 500)); // Adjust debounce delay (500ms) as needed
    </script>


    <script>
        $(document).ready(function() {


            // alert(1);
            $("#search").on('click', function() {
                var serve = $("#serve").val()
                // var medicine=$("#medicine").val()
                if (serve == '') {}
                $.ajax({
                    url: "{{ route('get_form_data') }}",
                    type: 'get',
                    data: {

                        serve: serve,

                    },
                    cache: false,
                    success: function(result) {
                        console.log(result);
                        $("#photo").val(result.photo);
                        $("#photo").val(result.photo);
                    }
                });
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            // alert(1);
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
                        // $("#photo").val(result.photo);
                    }
                });
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            // alert(1);
            $("#bussiness_id").on('change', function() {
                var bussiness = $("#bussiness_id").val()
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
                        $("#bussinesss_id").val(result.bussiness_reg_type1);
                        // $("#photo").val(result.photo);
                    }
                });
            })
        })
    </script>
    {{-- <script>
															$(document).ready(function() {
																// alert(1);
															$("#serve").on('keyup',function(){
																var bussiness=$("#serve").val()
																// var medicine=$("#medicine").val()
																// if(serve==''){
																// }
															  $.ajax({
																url: "{{route('get_estab')}}",
																  type:'get',
																  data:{
																	
																	serve:$(this).val(),
																   
																	},
																  cache: false,
																  success: function(result){
																	console.log(result);
																	$("#establishment").val(result.establishment_name);
																	 $("#photo").val(result.photo);
																  }
																});
																			})
																		})
																			</script> --}}



    <script>
        $(document).ready(function() {
            // alert(1);
            $("#search_button").on('click', function() {
                var bussiness = $("#serve").val()
                // var medicine=$("#medicine").val()
                // if(serve==''){
                // }
                $.ajax({
                    url: "{{ route('get_estab') }}",
                    type: 'get',
                    data: {

                        serve: $("#serve").val(),
                        zone_no: $("#zone_id").val(),
                    },
                    cache: false,
                    success: function(result) {
                        console.log(result);
                        $("#establishment").val(result.establishment);
                        $("#photo2").val(result.photo);
                        $("#zone_id").val(result.zone_no);
                        $("#zones_id").val(result.zone1);
                        $("#establishment").keyup();
                        // let base_url = '{{ asset('images/serve_photo/') }}'; //local link
                        let base_url = '{{ asset('images/') }}'; //server link
                        console.clear();
                        console.log(base_url);
                        $("#photo").attr('src', base_url + '/' + result.photo);
                    }
                });
            })
        })
    </script>




    <script>
        $(document).ready(function() {
            // alert(1);
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
        $(document).ready(function() {


            $("#form_id").on('submit', function() {
                //alert('submit');
                $("#zone_id").prop('disabled', false);
            })
            // alert(1);
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


@stop
