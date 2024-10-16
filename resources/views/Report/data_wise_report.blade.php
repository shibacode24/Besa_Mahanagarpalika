@extends('layout')
@section('content')

    <div class="page-wrapper">
        <div class="page-content">


            <div class="card">
                <div class="card-body">

                    
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <b style="color: #f01a1a"> Operation Manager</b>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form class="row g-2">

                                        <div class="col-md-3">
                                            <label>First Name : </label><b> {{ $preview->firstname }}</b>
                                        </div>


                                        <div class="col-md-3">
                                            <label>Middle Name :</label>
                                      <b> {{ $preview->middelname }}</b>
                                    </div>

                                        <div class="col-md-3">
                                            <label>Last Name : </label><b>{{ $preview->lastname }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Valuation Id :</label><b> {{ $preview->valuation_id }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Select Client: </label> <b>{{ $preview->bankname }}</b>
                                        </div>


                                        <div class="col-md-3">
                                            <label>Select Product: </label><b>{{ $preview->products }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Location: </label><b>{{ $preview->locations }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Area : </label><b>{{ $preview->area }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Field Executive:</label><b> {{ $preview->field_executive }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Assistant Valuer: </label><b>{{ $preview->assistant_valuer }}</b>
                                        </div>


                                        <div class="col-md-3">
                                            <label>Technical Manager:</label><b> {{ $preview->technical_manager }}</b>
                                        </div>


                                        <div class="col-md-3">
                                            <label>Technical Head:</label><b> {{ $preview->technical_head }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Contact Number: </label><b>{{ $preview->contact_no }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Alternate Number:</label><b> {{ $preview->contact_no }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Alternate Number:</label><b> {{ $preview->alt_cont_no }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Address of Individual Number: </label><b>{{ $preview->address }}</b>
                                        </div>


                                        <div class="col-md-3">
                                            <label>City: </label><b>{{ $preview->city }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>State:</label><b> {{ $preview->state }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Pincode:</label><b> {{ $preview->pincode }}</b>
                                        </div>


                                        <div class="col-md-3">
                                            <label>Longitude:</label><b> {{ $preview->longitude }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Latitude:</label><b> {{ $preview->latitute }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Due Date:</label><b> {{ date('d-m-Y', strtotime($preview->date)) }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Comments/Remarks: </label><b>{{ $preview->comment }}</b>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Status: </label><b>{{ $preview->status }}</b>
                                        </div>

                                        <table style="width:50%; margin-top:2%; border: 1px solid black; text-align:center;margin-left:25%;">
                                            <tr  style="border: 1px solid black;">
                                                <th  style="border: 1px solid black;">Documents Name</th>
                                                <th  style="border: 1px solid black;">Download Documents</th>
                                            </tr>
                                            <tr  style="border: 1px solid black;">
                                                @if (is_array($preview->document_name))
                                                @foreach ($preview->document_name as $demo)
                                                    <tr  style="border: 1px solid black;">
                                                        <div class="col-md-4">
                                    
                                                            <td>
                                                                <input type="hidden"
                                                                    value="{{ $preview->document_name[$loop->index] }}"
                                                                    name="document_name[]">
                                                                {{ $preview->document_name[$loop->index] }} 
                                                            </td>
                
                                                            <th  style="border: 1px solid black;">
                                                                <input type="hidden"
                                                                value="{{ isset($preview->image[$loop->index]) ? $preview->image[$loop->index] : '' }}"   name="old_image[]">
                                                                {{-- yaha hame old file ke liye input liya loop me hi isliye name array me liya --}}
                                                                @if(isset($preview->image[$loop->index]))
                                                                <a href="{{ asset('images/New-valuation/' . $preview->image[$loop->index]) }}"
                                                                    download data-bs-toggle="tooltip" data-bs-placement="right" title="Download">
                                                                    {{-- <img style="height:70px;width:auto;" src="{{ asset('images/New-valuation/' . $preview->image[$loop->index]) }}" readonly> --}}
                                                                    {{-- {{ $edit_data->image[$loop->index] }} only show name --}}
                                                                    {{ $edit_data->image[$loop->index] }}
                                                                </a>
                                                                @endif
                                                            </th>
                
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tr>
                                            
                                        </table>


                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
            
                        <h5 style="color: #116596;font-weight:bold">Field Executive</h5>
                    </div>
                    <hr>
            
                    <form class="row g-2">
            
                            <h6 style="color: #20c997;font-weight:bold">General Details</h6>
                       
            
                        <div class="col-md-4">
                            <label >Name of Owner As Per Site Visit:</label><span style="font-weight: bold"> {{ $fe_preview->name }}</span>
                        </div>
            
            
                        <div class="col-md-4">
                            <label>Person Met At Site:</label><span style="font-weight: bold"> {{ $fe_preview->person_met_at_site }}</span>
                        </div>
            
            
                        <div class="col-md-4">
                            <label>Property Type : </label><span style="font-weight: bold">{{ $fe_preview->property }}</span>
                        </div>
            
                        <div class="col-md-4">
                            <label>Relation With Owner: </label><b>{{ $fe_preview->relation_with_owner }}</b>
                        </div>
            
                        <div class="col-md-4">
                            <label>Electric Meter No. : </label><b> {{ $fe_preview->meter_no }}</b>
                        </div>

                        <div class="col-md-4">
            
                            <label>Date of Visit :</label><b> {{  date('d-m-Y', strtotime($fe_preview->date_of_visit)) }}</b>
                        </div>
            
                    </form>
            
            
                    <hr>
                    <form class="row g-2">
            
                    
                            <h6 style="color: #20c997;font-weight:bold">Address Info (As Per Site)</h6>
                       
            
            
                        <div class="col-md-3">
                            <label>House No/Plot No/Flat No:  </label><b>{{ $fe_preview->house_no }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Road Name/Galii no:  </label><b>{{ $fe_preview->road_name }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Building Name:  </label><b>{{ $fe_preview->building_name }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Wing/Block No.:  </label><b>{{ $fe_preview->wing_no }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Colony /Locality/Nagar:  </label><b>{{ $fe_preview->colony }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>Village/City/Town: </label><b> {{ $fe_preview->village_city }}</b>
                        </div>
                        <div class="col-md-2">
                            <label>State: </label><b> {{ $fe_preview->state }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>District: </label><b> {{ $fe_preview->district }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>Tehsil:  </label><b>{{ $fe_preview->tehsil }}</b>
                        </div>
            
            
            
                        <div class="col-md-3">
                            <label>Landmark:  </label><b>{{ $fe_preview->landmark }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>Pincode:  </label><b>{{ $fe_preview->pin_code }}</b>
                        </div>
            
            
            
                    </form>
                    <hr>
                    <form class="row g-2">
            
                    <h6  style="color: #20c997;font-weight:bold">Borders (As Per Site)</h6>
                      
            
                        <div class="col-md-3">
                            <label>East:  </label><b>{{ isset($fe_preview->four_borders[0]) ? $fe_preview->four_borders[0] : '' }}</b>
                        </div>
            
            
                        <div class="col-md-3">
                            <label>West : </label><b>{{ isset($fe_preview->four_borders[1]) ? $fe_preview->four_borders[1] : '' }}</b>
                        </div>
            
            
                        <div class="col-md-3">
                            <label>North :  </label><b>{{ isset($fe_preview->four_borders[2]) ? $fe_preview->four_borders[2] : '' }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>South:  </label><b>{{ isset($fe_preview->four_borders[3]) ? $fe_preview->four_borders[3] : '' }}</b>
                        </div>
                        {{-- <div class="col-md-3"></div> --}}
                        {{-- <h6  style="color: #20c997;font-weight:bold">Whether Boundaries Matching</h6> --}}
                        <div class="col-md-4">
                            <label>Whether Boundaries Matching:<b>{{ isset($fe_preview->whether_boundaries_matching[0]) ? $fe_preview->whether_boundaries_matching[0] : '' }}</b></label>
                        </div>
                        {{-- <div class="col-md-3">
                            <label><b>{{ isset($fe_preview->whether_boundaries_matching[0]) ? $fe_preview->whether_boundaries_matching[0] : '' }}</b></label>
                        </div>
                      --}}
            
                        <div class="col-md-4">
                            <label>Remark On Boundaries Matching:{{ $fe_preview->remark_on_boundaries_matching }}</label>
                        </div>
                    </form>
            
                    <hr>
                    <form class="row g-2">
            
                       <h6 style="color: #20c997;font-weight:bold">Land Area Details (As Per Site)</h6>
                       
                        <div class="col-md-2">
                            <label>Ground Floor: </label><b>
                                {{ isset($fe_preview->plot_area[0]) ? $fe_preview->plot_area[0] : '' }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>First Floor : </label><b>  {{ isset($fe_preview->plot_area[1]) ? $fe_preview->plot_area[1] : '' }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>Second Floor : </label><b>  {{ isset($fe_preview->plot_area[2]) ? $fe_preview->plot_area[2] : '' }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>Third Floor: </label><b>  {{ isset($fe_preview->plot_area[3]) ? $fe_preview->plot_area[3] : '' }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Land Area As Per Site: </label><b> {{ $fe_preview->land_area_per_site }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Land Area As Per Documents:  </label><b>{{ $fe_preview->land_area_per_documents }}</b>
                        </div>
                    </form>
                    <hr>
                    <form class="row g-2">
                   <h6  style="color: #20c997;font-weight:bold">Constuction Details (As Per Site)</h6>
                     
                        
                        <div class="col-md-3">
                            <label>Construction Area (In sqft): </label>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>G.F :  </label><b> {{ isset($fe_preview->construction_area[0]) ? $fe_preview->construction_area[0] : '' }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>F.F : </label><b>{{ isset($fe_preview->construction_area[1]) ? $fe_preview->construction_area[1] : '' }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>S.F: </label><b> {{ isset($fe_preview->construction_area[2]) ? $fe_preview->construction_area[2] : '' }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>T.F:  </label><b>{{ isset($fe_preview->construction_area[3]) ? $fe_preview->construction_area[3] : '' }}</b>
                        </div>
                        <br>
                        <div class="col-md-2">
                            <label>Construction Year: </b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>G.F :  </label><b>{{ $fe_preview->year }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>F.F : </label><b> {{ $fe_preview->FF }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>S.F: </label><b> {{ $fe_preview->SF }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>T.F:  </label><b>{{ $fe_preview->TF }}</b>
                        </div>
                        <br>
                        <div class="col-md-3">
                            <label>Type of Structure: </label><b> {{ $fe_preview->type_of_structure }}</b>
                        </div>
                      
            
                        <div class="col-md-3">
                            <label>Aminities (Select Appropriate): </label><b> {{ $fe_preview->aminities }}</b>
                        </div>
            
                        
            
                        <div class="col-md-4">
                            <label>Percentage Completion
                                As On Date %:  </label><b>{{ $fe_preview->percentage_completion }}</b>
                        </div>
                    </form>
                    <hr>
                    <form class="row g-2">
                   <h6  style="color: #20c997;font-weight:bold">Deviation (Select Appropriate)</h6>
                 
            
                        <div class="col-md-3">
                            <label>Deviation: </label><b>{{ $fe_preview->deviation }} </b>
                        </div>
            
                    </form>
            
                    <hr>
                    <form class="row g-2">
            
            
                            <h6  style="color: #20c997;font-weight:bold">Others</h6>
                     
            
                        <div class="col-md-2">
                            <label>Is construction As Per Sanction Plan:  </label><b>{{ $fe_preview->construction_plan }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>Is Property identified As Per Local Inquiry :  </label><b>{{ $fe_preview->property_inquiry }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>Road Width : </label><b> {{ $fe_preview->road_width_in_feet }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>Road Type :  </label><b>{{ $fe_preview->road_type }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>Occupancy Status :  </label><b>{{ $fe_preview->occupancy_status }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>Occupied By : </label><b> {{ $fe_preview->occupied_by }}</b>
                        </div>
            
            
                        <div class="col-md-4">
                            <label>Side Marginal Distance (Mesurement in Feet) </label>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>East : </label><b> {{ isset($fe_preview->side_marginal_distance_in_feet[0]) ? $fe_preview->side_marginal_distance_in_feet[0] : '' }}</b>
                        </div>
            
            
                        <div class="col-md-2">
                            <label>West : </label><b> {{ isset($fe_preview->side_marginal_distance_in_feet[1]) ? $fe_preview->side_marginal_distance_in_feet[1] : '' }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>North: </label><b> {{ isset($fe_preview->side_marginal_distance_in_feet[2]) ? $fe_preview->side_marginal_distance_in_feet[2] : '' }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>South: </label><b> {{ isset($fe_preview->side_marginal_distance_in_feet[3]) ? $fe_preview->side_marginal_distance_in_feet[3] : '' }}</b>
                        </div>
            
                    </form>
                   
                    <hr>
                    <form class="row g-2">
            
            
                            <h6  style="color: #20c997;font-weight:bold">Property Rate</h6>
                      
            
                        <div class="col-md-3">
                            <label>Land Rate Per Sqft:  </label><b>{{ $fe_preview->land_rate_per_sqft }}</b>
                        </div>
            
            
                        <div class="col-md-3">
                            <label>Land Rate Per Acre :  </label><b>{{ $fe_preview->land_rate_per_acre }}</b>
                        </div>
            
            
                        <div class="col-md-3">
                            <label>Land Rate Per Guntha : </label><b> {{ $fe_preview->land_rate_per_guntha }}</b>
                        </div>
            
                        <div class="col-md-4">
                            <label>Locality Price of Shop/ Flat /Row House : </label><b> {{ $fe_preview->locality_price }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Reference Type :  </label><b>{{ $fe_preview->reference_type }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Reference Name :  </label><b>{{ $fe_preview->reference_name }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Reference Mobile No. : </label><b> {{ $fe_preview->reference_mobile }}</b>
                        </div>
            
                        <div class="col-md-3">
                            <label>Reference Feedback : </label><b> {{ $fe_preview->reference_feedback }}</b>
                        </div>
                    </form>
            
                    <hr>
                    <form class="row g-2">
            
                  
            
                            <h6  style="color: #20c997;font-weight:bold">Remarks On Property</h6>
                     
                        <div class="col-md-12">
                            <label>Remark: </label><b> {{ $fe_preview->reason }}</b>
                        </div>
                    </form>
            
                    <hr>
                    <form class="row g-2">
            
                            <h6  style="color: #20c997;font-weight:bold">Geotag</h6>
                      
            
                        <div class="col-md-2">
                            <label>Latitude:  </label><b>{{ $fe_preview->lat }}</b>
                        </div>
            
                        <div class="col-md-2">
                            <label>Longitude:  </label><b>{{ $fe_preview->long }}</b>
                        </div>
            
                        
                    </form>
            
            
                    <hr>
            
                        <h6  style="color: #20c997;font-weight:bold">Capture Property Photos </h6>
                  
                    <table style="width:50%;  border: 1px solid black; text-align:center; margin-left:25%;margin-top:-15vh;">
                        <tr  style="border: 1px solid black;">
                            {{-- <th>Sr No</th> --}}
                            <th  style="border: 1px solid black;">Category</th>
                            <th  style="border: 1px solid black;">Tag</th>
                            <th  style="border: 1px solid black;">Download Images</th>
                        </tr>
        
                        <tr  style="border: 1px solid black;">
                            @if (is_array($fe_preview->category_id))
                                @foreach ($fe_preview->category_id as $cat)
                        <tr  style="border: 1px solid black;">
                            {{-- <div class="col-md-4"> --}}
                               
                                <td  style="border: 1px solid black;">
                                    {{ \App\Models\Masters\Category::find($fe_preview->category_id[$loop->index])->category }}
                                </td>

                                <td  style="border: 1px solid black;">  {{ \App\Models\Masters\Tags::find($fe_preview->tag_id[$loop->index])->tag }}
                                </td><br>
                                <td  style="border: 1px solid black;">
                                    @if(isset($fe_preview->image[$loop->index]))
                                    <a href="{{ asset('images/FE-valuation/' . $fe_preview->image[$loop->index]) }}"
                                        download>
                                        {{$fe_preview->image[$loop->index]}}
                                    </a>
                                    @endif
                                </td><br>
                                {{-- <div> --}}
                        </tr>
                        @endforeach
                        @endif

                        </tr>

                    </table>

                </div>

            </div>

        </div>
    </div>

 

@stop
