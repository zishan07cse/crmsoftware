@extends('realestate.layouts.master')

<link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
<style>
    .contact {
        float: right;
    }

    #btnemail,
    #btnwhatsapp {
        display: inline-block;
        vertical-align: top;
    }

    #btnwhatsapp {
        margin-right: 20px;
    }

    .loader {
        border: 16px solid #DEDEDE;
        border-top: 16px solid #F5A623;
        border-radius: 50%;
        width: 120px;
        height: 120px;
    }

    .input-box {
        position: relative;
    }

    #recipient-number {
        display: block;
        border: 1px solid #d7d6d6;
        background: #fff;
        padding: 10px 10px 10px 40px;
        font-size: 15px;
        color: #000;
    }

    .unit {
        position: absolute;
        display: block;
        left: 5px;
        top: 10px;
        z-index: 9;
    }

    .without_ampm::-webkit-datetime-edit-ampm-field {
        display: none;
    }

    input[type=time]::-webkit-clear-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        -ms-appearance: none;
        appearance: none;
        margin: -10px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .sm-screen-mb {
        margin-bottom: 0px;
    }

    @media only screen and (min-width: 420px) {}

    @media (min-width:320px) {
        .sm-screen-mb {
            margin-bottom: 18px;
        }

    }
</style>
<script>
    $(function() {
        $("#datepicker").datepicker();

    });

    $(function() {
        $("#meetingdatepicker").datepicker();

    });

    $(function() {
        $("#followupdatepicker").datepicker();

    });

    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
</script>
@section('content')
    @php
        
        $country = [
            'AFG' => 'Afghanistan',
            'ALB' => 'Albania',
            'DZA' => 'Algeria',
            'ASM' => 'American Samoa',
            'AND' => 'Andorra',
            'AGO' => 'Angola',
            'AIA' => 'Anguilla',
            'ATA' => 'Antarctica',
            'ATG' => 'Antigua and Barbuda',
            'ARG' => 'Argentina',
            'ARM' => 'Armenia',
            'ABW' => 'Aruba',
            'AUS' => 'Australia',
            'AUT' => 'Austria',
            'AZE' => 'Azerbaijan',
            'BHS' => 'Bahamas',
            'BHR' => 'Bahrain',
            'BGD' => 'Bangladesh',
            'BRB' => 'Barbados',
            'BLR' => 'Belarus',
            'BEL' => 'Belgium',
            'BLZ' => 'Belize',
            'BEN' => 'Benin',
            'BMU' => 'Bermuda',
            'BTN' => 'Bhutan',
            'BOL' => 'Bolivia',
            'BES' => 'Bonaire, Sint Eustatius and Saba',
            'BIH' => 'Bosnia and Herzegovina',
            'BWA' => 'Botswana',
            'BVT' => 'Bouvet Island',
            'BRA' => 'Brazil',
            'IOT' => 'British Indian Ocean Territory',
            'BRN' => 'Brunei Darussalam',
            'BGR' => 'Bulgaria',
            'BFA' => 'Burkina Faso',
            'BDI' => 'Burundi',
            'CPV' => 'Cabo Verde',
            'KHM' => 'Cambodia',
            'CMR' => 'Cameroon',
            'CAN' => 'Canada',
            'CYM' => 'Cayman Islands',
            'CAF' => 'Central African Republic',
            'TCD' => 'Chad',
            'CHL' => 'Chile',
            'CHN' => 'China',
            'CXR' => 'Christmas Island',
            'CCK' => 'Cocos (Keeling) Islands',
            'COL' => 'Colombia',
            'COM' => 'Comoros (the)',
            'COD' => 'Congo (the Democratic Republic of the)',
            'COG' => 'Congo (the)',
            'COK' => 'Cook Islands',
            'CRI' => 'Costa Rica',
            'HRV' => 'Croatia',
            'CUB' => 'Cuba',
            'CUW' => 'Curaçao',
            'CYP' => 'Cyprus',
            'CZE' => 'Czechia',
            'CIV' => "Côte d'Ivoire",
            'DNK' => 'Denmark',
            'DJI' => 'Djibouti',
            'DMA' => 'Dominica',
            'DOM' => 'Dominican Republic',
            'ECU' => 'Ecuador',
            'EGY' => 'Egypt',
            'SLV' => 'El Salvador',
            'GNQ' => 'Equatorial Guinea',
            'ERI' => 'Eritrea',
            'EST' => 'Estonia',
            'SWZ' => 'Eswatini',
            'ETH' => 'Ethiopia',
            'FLK' => 'Falkland Islands',
            'FRO' => 'Faroe Islands',
            'FJI' => 'Fiji',
            'FIN' => 'Finland',
            'FRA' => 'France',
            'GUF' => 'French Guiana',
            'PYF' => 'French Polynesia',
            'ATF' => 'French Southern Territories',
            'GAB' => 'Gabon',
            'GMB' => 'Gambia',
            'GEO' => 'Georgia',
            'DEU' => 'Germany',
            'GHA' => 'Ghana',
            'GIB' => 'Gibraltar',
            'GRC' => 'Greece',
            'GRL' => 'Greenland',
            'GRD' => 'Grenada',
            'GLP' => 'Guadeloupe',
            'GUM' => 'Guam',
            'GTM' => 'Guatemala',
            'GGY' => 'Guernsey',
            'GIN' => 'Guinea',
            'GNB' => 'Guinea-Bissau',
            'GUY' => 'Guyana',
            'HTI' => 'Haiti',
            'HMD' => 'Heard Island and McDonald Islands',
            'VAT' => 'Holy See ',
            'HND' => 'Honduras',
            'HKG' => 'Hong Kong',
            'HUN' => 'Hungary',
            'ISL' => 'Iceland',
            'IND' => 'India',
            'IDN' => 'Indonesia',
            'IRN' => 'Iran (Islamic Republic of)',
            'IRQ' => 'Iraq',
            'IRL' => 'Ireland',
            'IMN' => 'Isle of Man',
            'ISR' => 'Israel',
            'ITA' => 'Italy',
            'JAM' => 'Jamaica',
            'JPN' => 'Japan',
            'JEY' => 'Jersey',
            'JOR' => 'Jordan',
            'KAZ' => 'Kazakhstan',
            'KEN' => 'Kenya',
            'KIR' => 'Kiribati',
            'PRK' => "Korea (the Democratic People's Republic of)",
            'KOR' => 'Korea (the Republic of)',
            'KWT' => 'Kuwait',
            'KGZ' => 'Kyrgyzstan',
            'LAO' => "Lao People's Democratic Republic",
            'LVA' => 'Latvia',
            'LBN' => 'Lebanon',
            'LSO' => 'Lesotho',
            'LBR' => 'Liberia',
            'LBY' => 'Libya',
            'LIE' => 'Liechtenstein',
            'LTU' => 'Lithuania',
            'LUX' => 'Luxembourg',
            'MAC' => 'Macao',
            'MDG' => 'Madagascar',
            'MWI' => 'Malawi',
            'MYS' => 'Malaysia',
            'MDV' => 'Maldives',
            'MLI' => 'Mali',
            'MLT' => 'Malta',
            'MHL' => 'Marshall Islands',
            'MTQ' => 'Martinique',
            'MRT' => 'Mauritania',
            'MUS' => 'Mauritius',
            'MYT' => 'Mayotte',
            'MEX' => 'Mexico',
            'FSM' => 'Micronesia',
            'MDA' => 'Moldova',
            'MCO' => 'Monaco',
            'MNG' => 'Mongolia',
            'MNE' => 'Montenegro',
            'MSR' => 'Montserrat',
            'MAR' => 'Morocco',
            'MOZ' => 'Mozambique',
            'MMR' => 'Myanmar',
            'NAM' => 'Namibia',
            'NRU' => 'Nauru',
            'NPL' => 'Nepal',
            'NLD' => 'Netherlands',
            'NCL' => 'New Caledonia',
            'NZL' => 'New Zealand',
            'NIC' => 'Nicaragua',
            'NER' => 'Niger',
            'NGA' => 'Nigeria',
            'NIU' => 'Niue',
            'NFK' => 'Norfolk Island',
            'MNP' => 'Northern Mariana Islands',
            'NOR' => 'Norway',
            'OMN' => 'Oman',
            'PAK' => 'Pakistan',
            'PLW' => 'Palau',
            'PSE' => 'Palestine',
            'PAN' => 'Panama',
            'PNG' => 'Papua New Guinea',
            'PRY' => 'Paraguay',
            'PER' => 'Peru',
            'PHL' => 'Philippines',
            'PCN' => 'Pitcairn',
            'POL' => 'Poland',
            'PRT' => 'Portugal',
            'PRI' => 'Puerto Rico',
            'QAT' => 'Qatar',
            'MKD' => 'Republic of North Macedonia',
            'ROU' => 'Romania',
            'RUS' => 'Russian Federation',
            'RWA' => 'Rwanda',
            'REU' => 'Réunion',
            'BLM' => 'Saint Barthélemy',
            'SHN' => 'Saint Helena, Ascension and Tristan da Cunha',
            'KNA' => 'Saint Kitts and Nevis',
            'LCA' => 'Saint Lucia',
            'MAF' => 'Saint Martin (French part)',
            'SPM' => 'Saint Pierre and Miquelon',
            'VCT' => 'Saint Vincent and the Grenadines',
            'WSM' => 'Samoa',
            'SMR' => 'San Marino',
            'STP' => 'Sao Tome and Principe',
            'SAU' => 'Saudi Arabia',
            'SEN' => 'Senegal',
            'SRB' => 'Serbia',
            'SYC' => 'Seychelles',
            'SLE' => 'Sierra Leone',
            'SGP' => 'Singapore',
            'SXM' => 'Sint Maarten (Dutch part)',
            'SVK' => 'Slovakia',
            'SVN' => 'Slovenia',
            'SLB' => 'Solomon Islands',
            'SOM' => 'Somalia',
            'ZAF' => 'South Africa',
            'SGS' => 'South Georgia and the South Sandwich Islands',
            'SSD' => 'South Sudan',
            'ESP' => 'Spain',
            'LKA' => 'Sri Lanka',
            'SDN' => 'Sudan (the)',
            'SUR' => 'Suriname',
            'SJM' => 'Svalbard and Jan Mayen',
            'SWE' => 'Sweden',
            'CHE' => 'Switzerland',
            'SYR' => 'Syrian Arab Republic',
            'TWN' => 'Taiwan',
            'TJK' => 'Tajikistan',
            'TZA' => 'Tanzania, United Republic of',
            'THA' => 'Thailand',
            'TLS' => 'Timor-Leste',
            'TGO' => 'Togo',
            'TKL' => 'Tokelau',
            'TON' => 'Tonga',
            'TTO' => 'Trinidad and Tobago',
            'TUN' => 'Tunisia',
            'TUR' => 'Turkey',
            'TKM' => 'Turkmenistan',
            'TCA' => 'Turks and Caicos Islands',
            'TUV' => 'Tuvalu',
            'UGA' => 'Uganda',
            'UKR' => 'Ukraine',
            'UAE' => 'United Arab Emirates',
            'GBR' => 'United Kingdom of Great Britain and Northern Ireland',
            'UMI' => 'United States Minor Outlying Islands',
            'USA' => 'United States of America',
            'URY' => 'Uruguay',
            'UZB' => 'Uzbekistan',
            'VUT' => 'Vanuatu',
            'VEN' => 'Venezuela (Bolivarian Republic of)',
            'VNM' => 'Viet Nam',
            'VGB' => 'Virgin Islands (British)',
            'VIR' => 'Virgin Islands (U.S.)',
            'WLF' => 'Wallis and Futuna',
            'ESH' => 'Western Sahara',
            'YEM' => 'Yemen',
            'ZMB' => 'Zambia',
            'ZWE' => 'Zimbabwe',
            'ALA' => 'Åland Islands',
        ];
    @endphp
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="page-title">
                                Customer Called Detail Form
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session('success'))
                                        <div class="alert alert-success mb-1 mt-1">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <form class="forms-sample" action="{{ url('/') }}/user/realestate/customer/callinfosubmit"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input id="type" type="hidden" class="form-control" name="customerid"
                                        value=" @php echo $realestate_customer->id @endphp ">
                                </div>
                                <div class="form-group">
                                    <input id="type" type="hidden" class="form-control" name="userid"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group">
                                    <input id="type" type="hidden" class="form-control" name="sectiontype"
                                        value="1">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Full Name:</label>
                                        <input class="form-control" name="fullname"
                                            value="@php echo $realestate_customer->fullname @endphp " />
                                    </div>
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Phone No.:</label>
                                        <input class="form-control" name="mobilenumber"
                                            value="@php echo $realestate_customer->mobilenumber @endphp " />
                                    </div>
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Landline No.:</label>
                                        <input class="form-control" name="landlinenumber"
                                            value="@php echo $realestate_customer->landlinenumber==0  ? '':$realestate_customer->landlinenumber @endphp " />
                                    </div>
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Email:</label>
                                        <input class="form-control" name="email"
                                            value="@php echo $realestate_customer->email @endphp " />
                                    </div>
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Address:</label>
                                        <input class="form-control" name="address"
                                            value="@php echo $realestate_customer->address @endphp " />
                                    </div>
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Profession:</label>
                                        <input class="form-control" name="profession"
                                            value="@php echo $realestate_customer->profession @endphp " />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Organization:</label>
                                        <input class="form-control" name="organization"
                                            value="@php echo $realestate_customer->organization @endphp" />
                                    </div>
                                    @php
                                        $origin = $realestate_customer->nationality;
                                        $current = $realestate_customer->country;
                                    @endphp
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Country of Origin:</label>
                                        <select class="form-control form-control-lg js-example-basic-single"
                                            id="nationality" name="nationality" required>
                                            @foreach ($country as $key => $countrycode)
                                                @if ($key == $origin)
                                                    <option value="@php echo $key @endphp" selected>@php echo $countrycode  @endphp
                                                    </option>
                                                @else
                                                    <option value="@php echo $key @endphp">@php echo $countrycode  @endphp
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2 sm-screen-mb">
                                        <label>Current Resident Country:</label>
                                        <select class="form-control form-control-lg js-example-basic-single" id="country"
                                            name="country" required>
                                            @foreach ($country as $key => $countrycode)
                                                @if ($key == $current)
                                                    <option value="@php echo $key @endphp" selected>@php echo $countrycode  @endphp
                                                    </option>
                                                @else
                                                    <option value="@php echo $key @endphp">@php echo $countrycode  @endphp
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h4 class="card-title">Customer Called Status</h4>
                                <div class="form-group row" style="margin-bottom:0px;">
                                    <div class="col-sm-2">
                                        <label>Status:</label>
                                        <select class="form-control form-control-lg" id="callstatus" name="callstatus"
                                            required onchange="checkstatus();">
                                            <option value="">Select Call Status</option>
                                            <option value="1">Disconnected</option>
                                            <option value="2">Busy</option>
                                            <option value="3">Switched Off</option>
                                            <option value="4">Not Answered</option>
                                            <option value="5">Wrong Number</option>
                                            <option value="6">Call Back</option>
                                            <option value="7">Interested</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="callbackdiv" class="mt-4" style="display:none;">
                                    <h4 class="card-title">Call Back Information</h4>
                                    <div class="form-group row" style="margin-bottom:0px;">
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Select Call Back Date:</label>
                                            <input class="form-control" id="datepicker" value=""
                                                name="calleddate" />
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Select Call Back Time:</label>
                                            <input class="form-control without_ampm" type="time" id="calledtime"
                                                name="calledtime">
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Any Remarks:</label>
                                            <input class="form-control" type="texarea" name="calledremark">
                                        </div>
                                    </div>
                                </div>

                                <div id="customerflatpreferance" class="mt-4" style="display:none;margin-bottom:0px;">
                                    <h4 class="card-title">Customer Property Requriement</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Have Flat in UAE?:</label>
                                            <select class="form-control form-control-lg" id="flatinuae" name="flatinuae">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Want to Buy Flat in UAE/India?:</label>
                                            <select class="form-control form-control-lg" id="prefercountry"
                                                name="prefercountry">
                                                <option value="uae">UAE</option>
                                                <option value="india">India</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Property Status:</label>
                                            <select class="form-control form-control-lg" id="propertystatus"
                                                name="propertystatus">
                                                <option value="invetsement"> Investment </option>
                                                <option value="enduser">Enduser</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Property Types:</label>
                                            <select class="form-control form-control-lg" id="propertytype"
                                                name="propertytype">
                                                <option value="residential">Residential Building</option>
                                                <option value="commercial">Commercial Building</option>
                                                <option value="flat">Flat</option>
                                                <option value="appartments">Appartment</option>
                                                <option value="duplex">Duplex</option>
                                                <option value="villas">Villa</option>
                                                <option value="showroom">Showroom</option>
                                                <option value="office">Office</option>
                                                <option value="factory">Factory</option>
                                                <option value="townhouse">Town House</option>
                                                <option value="penthouse">Pent House </option>
                                                <option value="plot">Plot</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Prefer City:</label>
                                            <select class="form-control form-control-lg" name="cityname" id="cityname">
                                                <option value="abudhabi">Abu Dhabi</option>
                                                <option value="dubai">Dubai</option>
                                                <option value="sarjah">Sarjah</option>
                                                <option value="sarjah">Ras Al Khaimah</option>
                                                <option value="fujairah">Fujairah</option>
                                                <option value="ajman">Ajman</option>
                                                <option value="alquwain">Umm Al Quwain</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Prefer Area:</label>
                                            <input type="text" class="form-control" name="areaname" id="areaname"
                                                placeholder="Area name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Payment Type:</label>
                                            <select class="form-control form-control-lg" id="paymenttype"
                                                name="paymenttype">
                                                <option value="cash">Cash</option>
                                                <option value="mortgage">Mortgage</option>
                                                <option value="paymentplan">Payment plan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Moveing Time:</label>
                                            <select class="form-control form-control-lg" id="movingtime"
                                                name="movingtime">
                                                <option value="readytomove">Ready to move </option>
                                                <option value="q1">Q1</option>
                                                <option value="q2">Q2</option>
                                                <option value="q3">Q3</option>
                                                <option value="q3">Q4</option>
                                                <option value="offplan">Off plan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Moveing Year:</label>
                                            <select class="form-control form-control-lg" id="movingyear"
                                                name="movingyear">
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label> Prefer Devloper Name:</label>
                                            <select class="form-control form-control-lg" id="developername"
                                                name="developername">
                                                <option value="1">Seventides - UP Side</option>
                                                <option value="2">Azizi</option>
                                                <option value="3">Danube </option>
                                                <option value="4">Emaar</option>
                                                <option value="5">Danube Aldar</option>
                                                <option value="6">Heart of Europe</option>
                                                <option value="7">Sobha</option>
                                                <option value="8">Devmark </option>
                                                <option value="9">Dubai Holding</option>
                                                <option value="10">Samana Developer</option>
                                                <option value="11">DMCC</option>
                                                <option value="12">Aqua Properties</option>
                                                <option value="13">DAMAC </option>
                                                <option value="14">MAG Properties</option>
                                                <option value="15">Nakheel</option>
                                                <option value="16">Sarjah Sustainable City</option>
                                                <option value="17">Alef Properties</option>
                                                <option value="18">OBG Fairmont</option>
                                                <option value="19">Refines</option>
                                                <option value="20">Meterora Properties</option>
                                                <option value="21">No Choice</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Specific Choice :</label>
                                            <input type="text" class="form-control" name="developernamebyus"
                                                id="developernamebyus" placeholder="Developer name" />
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Budget for Property:</label>
                                            <input type="text" class="form-control" name="totalbudget"
                                                id="totalbudget" placeholder="Budget" />
                                        </div>
                                    </div>
                                </div>

                                <div id="meetingdiv" style="display:none;margin-bottom:0px; ">
                                    <h4 class="card-title">Customer Meeting Information</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Select Meeting Date:</label>
                                            <input class="form-control" id="meetingdatepicker" name="meetingdate" />
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Select Meeting Time:</label>
                                            <input class="form-control without_ampm" type="time" name="meetingtime">
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Any Remarks:</label>
                                            <input class="form-control" type="texarea" name="meetingremark">
                                        </div>
                                    </div>
                                </div>
                                <div id="followupdiv" style="display:none;margin-bottom:0px;">
                                    <h4 class="card-title">Customer Followup Information</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Select Followup Date:</label>
                                            <input class="form-control" id="followupdatepicker" name="followupdate" />
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Select Followup Time:</label>
                                            <input class="form-control without_ampm" type="time" name="followuptime">
                                        </div>
                                        <div class="col-sm-2 sm-screen-mb">
                                            <label>Any Remarks:</label>
                                            <input class="form-control" type="texarea" name="followupremark">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <button type="submit" class="btn btn-success mr-2 ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-email" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="mail" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="sendEmail();">Send
                            Email</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-whatsapp" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">What's App</h5>
                        <button type="button" class="close" onclick="closemodal();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Clinet Number:</label>
                            <div class="input-box">
                                <input type="number" class="form-control" id="recipient-number">
                                <span class="unit">+971</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="submitwhatsapp();">Send Message</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    @endsection

    <script>
        function sendEmail() {
            var email = document.getElementById("recipient-name").value;
            var message = document.getElementById("message-text").value;
            $('#modal-email').modal('hide');
            $.ajax({
                type: 'POST',
                url: 'realestate/sendemail/',
                data: {
                    email: email,
                    message: message,
                    _token: '{!! csrf_token() !!}'
                },
                success: function(data) {
                    //console.log(data.message);

                    if (data.message == 'success') {

                        swal({
                            text: 'Email sent successfully',
                            button: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-primary"
                            }
                        })
                    }

                }
            });
        }

        function closemodal() {
            $('#modal-whatsapp').modal('hide');
        }

        function checkstatus() {
            status = document.getElementById("callstatus").value;
            if (status == "6") {
                document.getElementById("callbackdiv").style.display = "block";
                document.getElementById("customerflatpreferance").style.display = "none";
                document.getElementById("meetingdiv").style.display = "none";
                document.getElementById("followupdiv").style.display = "none";
            } else if (status == 7) {
                document.getElementById("callbackdiv").style.display = "none";
                document.getElementById("customerflatpreferance").style.display = "block";
                document.getElementById("meetingdiv").style.display = "block";
                document.getElementById("followupdiv").style.display = "block";
            } else {
                document.getElementById("callbackdiv").style.display = "none";
                document.getElementById("customerflatpreferance").style.display = "none";
                document.getElementById("meetingdiv").style.display = "none";
                document.getElementById("followupdiv").style.display = "none";

            }
        }

        function submitwhatsapp() {
            var number = document.getElementById("recipient-number").value;
            var mainnumber = '971' + number;
            var url = 'https://api.whatsapp.com/send?phone=' + mainnumber;
            window.open(url, "_blank");
            $('#modal-whatsapp').modal('hide');
            //  location.href = url;

        }



        $(document).ready(function() {
            $("input[type='radio']").click(function() {
                var radioValue = $("input[name='interest']:checked").val();

                if (radioValue) {
                    if (radioValue == 1) {
                        document.getElementById("customerflatpreferance").style.display = "block";
                        document.getElementById("meetingdiv").style.display = "block";
                        document.getElementById("followupdiv").style.display = "block";
                    } else if (radioValue == 0) {
                        document.getElementById("customerflatpreferance").style.display = "none";
                        document.getElementById("meetingdiv").style.display = "none";
                        document.getElementById("followupdiv").style.display = "none";
                    } else if (radioValue == 2) {
                        document.getElementById("customerflatpreferance").style.display = "none";
                        document.getElementById("meetingdiv").style.display = "none";
                        document.getElementById("followupdiv").style.display = "none";
                    }
                }
            });
        });
    </script>
