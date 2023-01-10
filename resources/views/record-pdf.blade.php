<!DOCTYPE html>
<html>

<head>
    <title>{{$Settings->title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>

    <!-- FONTS -->
    <link type="text/css" rel="stylesheet" href="https://www.dropbox.com/s/trsldt0me90jzs8/resume.css"/>
    <style>
                
        div
            {
            border-radius: 5px;
            }
        #header
        {
            position: fixed;
            z-index: 1;
            height:40px;
            width: 98%;
            background-color: #ffffff;
            margin-bottom: 10px
            }

        #name {
            float:left;
            margin-left: 20px;
            padding-bottom: 10px;
            font-size: 16px;
            font-family: Verdana, sans-serif;
            color: #ffffff;
        }

        #email{
            float:right;
            margin-right: 20px;
            padding-bottom: 10px;
            font-size: 16px;
            font-family: Verdana, sans-serif;
            color: #ffffff;
        }

        #contact
        {
            margin-left:45%;
            padding-bottom: 10px;
            font-size: 16px;
            font-family: Verdana, sans-serif;
            color: #ffffff;
            }

        a:hover {
            font-weight: bold;
        }

        .right
        {
            display: inline-block;
            padding-right:5px;
            height: auto;
            width: 45%;
        }

        .left
        {
            display: inline-block;
            padding-left:5px;
            height: auto;
            width: 45%;
        }
        table, td, th {
            border: 1px solid #000000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        h3
        {
            text-decoration: underline;
            }

        #job-responsibilities
        {
            padding: 1px;
            }
        .job-title
        {
            font-weight: bold;
            }


        #course-name
        {
            font-weight:bold;
            }

        #company-name
        {
            height:2px;
            text-decoration:underline;
            }
        #job-title
        {
            height: 5px;
            }
        .job-duration
        {
            float:right;
            }
        #heading
        {
        font-weight:bold;
        }
    </style>

</head>

<body>
    
    <div style="position: relative">
        <div class="right">
        <p><span id="course-name">Patient Name: </span> {{$record->patient_name}}</p>                    
        <p><span id="course-name">Husband name: </span> {{$record->husband_name}}</p>                    
        <p><span id="course-name">Referral dr: </span> {{$record->referral_dr}}</p>                    
        <p><span id="course-name">_ </span></p>                    
        </div>
        <div class="left">
        <p><span id="course-name">age: </span> {{$record->patient_age}}</p>              
        <p><span id="course-name">age: </span> {{$record->husband_age}}</p>              
        <p><span id="course-name">Sex selection: </span> {{$record->sex}}</p>              
        <p><span id="course-name">Retrieval date: </span> {{$record->retrieval_date}}</p>                          
        </div>
    </div>

    <div class="">
        <table>
            <tr>
                <th>Amps Name</th>
                <th>FSH</th>
                <th>HMG</th>
                <th>Triggering by</th>
                <th>E2</th>
                <th>P4</th>
            </tr>
            <tr>
                <td>Trade name</td>
                <td>{{\App\Models\Medicine::find($record->trade_fsh)->name ?? ''}}</td>
                <td>{{\App\Models\Medicine::find($record->trade_hmg)->name ?? ''}}</td>
                <td>{{\App\Models\Medicine::find($record->trade_triggering)->name ?? ''}}</td>
                <td>{{\App\Models\Medicine::find($record->trade_e2)->name ?? ''}}</td>
                <td>{{\App\Models\Medicine::find($record->trade_p4)->name ?? ''}}</td>
            </tr>
            <tr>
                <td>Number</td>
                <td>{{$record->number_fsh}}</td>
                <td>{{$record->number_hmg}}</td>
                <td>{{$record->number_triggering}}</td>
                <td>{{$record->number_e2}}</td>
                <td>{{$record->number_p4}}</td>
            </tr>
        </table>                
    </div>
    <br><br>
    <div class="">
        <table>
            <tr>
                <th>Semen</th>
                <th>vol</th>
                <th>count</th>
                <th>motility</th>
                <th>progressive motility</th>
                <th>abnormality</th>
            </tr>
            <tr>
                <td>Pre processing</td>
                <td>{{$record->vol}}</td>
                <td>{{$record->count}}</td>
                <td>{{$record->motility}}</td>
                <td>{{$record->progressive_motility}}</td>
                <td>{{$record->abnormality}}</td>
            </tr>
        </table>                
    </div>
    <br><br>
    <div class="">
        <table>
            <tr><th style="text-align:left;padding-left:5px;"><span id="course-name" style="padding-right:51px;">Oocyte no:</span> {{$record->oocyte_no}}</th></tr>
            <tr><th style="text-align:left;padding-left:5px;"><span id="course-name" style="padding-right:25px;">Total injected:</span> {{$record->total_injected}}</th></tr>
            <tr><th style="text-align:left;padding-left:5px;"><span id="course-name" style="padding-right:96px;">M2:</span> {{$record->m2}}</th></tr>
            <tr><th style="text-align:left;padding-left:5px;"><span id="course-name" style="padding-right:96px;">M1:</span> {{$record->m1}}</th></tr>
            <tr><th style="text-align:left;padding-left:5px;"><span id="course-name" style="padding-right:96px;">GV:</span> {{$record->gv}}</th></tr>
            <tr><th style="text-align:left;padding-left:5px;"><span id="course-name" style="padding-right:67px;">M2 abn:</span> {{$record->m2_abn}}</th></tr>
        </table>                
    </div>
    <div class="" style="margin-top:-15px;">
        <h4>Oocytes comment:</h4>
        <p style="margin-top:-15px;">{{$record->oocytes_comment ?? ''}}</p>                
    </div>
    @if($record->day3)
    <div class="">
        <h4>Day 3</h4>
        <p>{!! $record->day3 ?? '' !!}</p>               
    </div>
    @endif
    @if($record->day5)
    <div class="">
        <h4>Day 5</h4>
        <p>{!! $record->day5 ?? ''!!}</p>               
    </div>
    @endif
    @if($record->embryos)
    <div class="">
        <table>
            <tr>
                <th>Embryos</th>
                <th>Date</th>
                <th>Number of straws</th>
            </tr>
            <tr>
                <td>{{$record->embryos}}</td>
                <td>{{$record->date}}</td>
                <td>{{$record->straws}}</td>
            </tr>
        </table>              
    </div>
    @endif
    <div id="footer"></div>

</body>

</html>
