<style>
    thead {
        display: table-header-group
    }

    tfoot {
        display: table-row-group
    }

    tr {
        page-break-inside: avoid
    }
</style>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 11.778%;">
            <div style="text-align: center;"><span style="font-family: Tahoma,Geneva, sans-serif;"><img
                        src="{{ asset('tabang-logo/vector/default.png') }}" width="80px"></span></div>
        </td>
        <td style="width: 88.1087%;">
            <div style="text-align: center;"><span style="font-family: Tahoma,Geneva, sans-serif;"><strong><span
                            style="text-shadow: rgba(136, 136, 136, 0.8) 0px 0px 5px; color: rgb(84, 172, 210); font-size: 28px;">{{ $results->agency->name }}</span></strong><br><span
                        style="font-size: 15px;"><strong>{{ $results->agency->poea }}</strong></span></span></div>
            <p><span style="font-family: Tahoma,Geneva, sans-serif;"><br></span></p>
        </td>
    </tr>
    </tbody>
</table>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 15.7418%;">
            <div data-empty="true" style="text-align: center;">@isset($results->documentPic1x1->path) <img
                    src="{{ asset($results->documentPic1x1->path) }}" width="150px" height="150px">&nbsp;@endisset</div>
        </td>
        <td style="width: 84.1449%;">
            <table style="width: 100%;">
                <tbody>
                <tr>
                    <td style="width: 38.4615%; background-color: rgb(84, 172, 210);">
                        <div style="text-align: right;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                    style="color: rgb(239, 239, 239);">POSITIONS APPLIED</span>&nbsp;</span></div>
                    </td>
                    <td style="width: 61.4035%;"><span style="font-family: Tahoma,Geneva, sans-serif;">&nbsp;{{ $results->position_1 }}, {{ $results->position_2 }}, {{ $results->position_3 }}</span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 38.4615%; background-color: rgb(84, 172, 210);">
                        <div style="text-align: right;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                    style="color: rgb(239, 239, 239);">CIVIL STATUS</span>&nbsp;</span></div>
                    </td>
                    <td style="width: 61.4035%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->civil_status }}</span></td>
                </tr>
                <tr>
                    <td style="width: 38.4615%; background-color: rgb(84, 172, 210);">
                        <div style="text-align: right;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                    style="color: rgb(239, 239, 239);">RELIGION</span>&nbsp;</span></div>
                    </td>
                    <td style="width: 61.4035%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->religion }}</span></td>
                </tr>
                <tr>
                    <td style="width: 38.4615%; background-color: rgb(84, 172, 210);">
                        <div style="text-align: right;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                    style="color: rgb(239, 239, 239);">AGE</span>&nbsp;</span></div>
                    </td>
                    <td style="width: 61.4035%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ Carbon\Carbon::parse($results->birth_date)->age }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table style="width: 100%; margin-right: calc(1%);">
    <tbody>
    <tr>
        <td colspan="2" style="width: 60.1597%;">
            <table style="width: 99%; margin-right: calc(0%); margin-left: calc(1%);">
                <tbody>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;"><br>
                    </td>
                    <td style="width: 58.2542%; background-color: rgb(84, 172, 210);"><span
                            style="color: rgb(239, 239, 239); font-family: Tahoma, Geneva, sans-serif;"><strong>PERSONAL DETAILS</strong></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="font-family: Tahoma,Geneva, sans-serif;"><span style="color: rgb(239, 239, 239);">APPLICANT NAME&nbsp;</span></span>
                    </td>
                    <td style="width: 58.2542%;"><span style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->last_name }}, {{ $results->first_name }} {{ $results->middle_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="font-family: Tahoma, Geneva, sans-serif; color: rgb(239, 239, 239);">CONTACT NO.&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->contact_1 }}</span><br></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">E-MAIL</span>
                    </td>
                    <td style="width: 58.2542%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->email }}</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span
                            style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">FACEBOOK</span>
                    </td>
                    <td style="width: 58.2542%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->fb_account }}</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span
                            style="font-family: Tahoma, Geneva, sans-serif; color: rgb(239, 239, 239);">ADDRESS&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->address }}</span><br></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(255, 255, 255);"><span style="font-family: Tahoma,Geneva, sans-serif;">GENDER</span>&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->gender }}</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(255, 255, 255);"><span style="font-family: Tahoma,Geneva, sans-serif;">WEIGHT</span>&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->weight }}</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(255, 255, 255);"><span style="font-family: Tahoma,Geneva, sans-serif;">HEIGHT</span>&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->height }}</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="font-family: Tahoma, Geneva, sans-serif; color: rgb(239, 239, 239);">PLACE OF BIRTH&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span style="font-family: Tahoma,Geneva, sans-serif;"><span
                                style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->birth_place }}</span><br></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">DATE OF BIRTH&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span
                            style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->birth_date }}</span></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(239, 239, 239); font-family: Tahoma, Geneva, sans-serif;">NATIONALITY&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span style="font-family: Tahoma,Geneva, sans-serif;">FILIPINO</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 41.556%; background-color: rgb(84, 172, 210); text-align: right;">
                        <span style="color: rgb(239, 239, 239); font-family: Tahoma, Geneva, sans-serif;">EDUCATION&nbsp;</span>
                    </td>
                    <td style="width: 58.2542%;"><span style="font-family: Tahoma,Geneva, sans-serif;">{{ $results->education }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table style="width: 100%; margin-right: calc(0%);">
                <tbody>
                <tr>
                    <td colspan="2" style="width: 100%; background-color: rgb(84, 172, 210);">
                        <div style="text-align: center;"><span
                                style="color: rgb(239, 239, 239); font-family: Tahoma, Geneva, sans-serif;"><strong>SKILLS AND EXPERIENCE</strong></span>
                        </div>
                    </td>
                </tr>
                @foreach(json_decode($results->skills_other) as $key => $value)
                    <tr>
                        <td style="width: 50%; text-align: center; border: 1px solid rgb(0, 0, 0);">{{ $key }}</td>
                        <td style="width: 50%; text-align: center; border: 1px solid rgb(0, 0, 0);">{{ $value }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" style="width: 100%; text-align: center; background-color: rgb(84, 172, 210);">
                        <strong><span style="font-family: Tahoma, Geneva, sans-serif; color: rgb(239, 239, 239);">LANGUAGE SPOKEN</span></strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 100%; text-align: center;">{{ $results->language }}</td>
                </tr>
                </tbody>
            </table>
        </td>
        <td style="width: 30%;">
            <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(0, 0, 0);">
                <tbody>
                <tr>
                    <td colspan="2"
                        style="width: 100%; height:500px; border: 1px solid rgb(0, 0, 0);">@isset($results->documentPicFull->path)
                            <img src="{{ asset($results->documentPicFull->path) }}" width="100%" height="500px">
                            &nbsp;@endisset</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<p><br></p>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 100%; background-color: rgb(84, 172, 210);">
            <div style="text-align: center;"><span style="color: rgb(239, 239, 239);"><strong><span
                            style="font-family: Tahoma,Geneva, sans-serif;">PREVIOUS EMPLOYMENT ABROAD</span></strong></span>
            </div>
        </td>
    </tr>
    </tbody>
</table>
@foreach($results->employment as $value)
    <table style="width: 100%;">
        <tbody>
        <tr>
            <td style="width: 25%; background-color: rgb(84, 172, 210);">
                <div data-empty="true" style="text-align: center;"><span
                        style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">COUNTRY</span></div>
            </td>
            <td style="width: 25%; background-color: rgb(84, 172, 210);">
                <div data-empty="true" style="text-align: center;"><span
                        style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">POSITION</span>
                </div>
            </td>
            <td style="width: 25%; background-color: rgb(84, 172, 210);">
                <div data-empty="true" style="text-align: center;"><span
                        style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">YEAR</span></div>
            </td>
            <td style="width: 25%; background-color: rgb(84, 172, 210);">
                <div data-empty="true" style="text-align: center;"><span
                        style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">COMPANY</span></div>
            </td>
        </tr>
        <tr>
            <td style="width: 25.0000%;">
                <div style="text-align: center;">{{ $value->country }}</div>
            </td>
            <td style="width: 25.0000%;">
                <div data-empty="true" style="text-align: center;">{{ $value->position }}</div>
            </td>
            <td style="width: 25.0000%;">
                <div data-empty="true" style="text-align: center;">{{ $value->year }}</div>
            </td>
            <td style="width: 25.0000%;">
                <div data-empty="true" style="text-align: center;">{{ $value->company }}</div>
            </td>
        </tr>
        </tbody>
    </table>
@endforeach
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 100%; background-color: rgb(84, 172, 210);">
            <div style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;"><strong>PASSPORT DETAILS</strong></span>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">PASSPORT NO</span></div>
        </td>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">DATE ISSUED</span></div>
        </td>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">DATE OF EXPIRY</span>
            </div>
        </td>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><span
                        style="font-family: Tahoma,Geneva, sans-serif;">PLACE ISSUED</span></span></div>
        </td>
    </tr>
    <tr>
        <td style="width: 25.0000%;">
            <div style="text-align: center;">{{ $results->passport }}</div>
        </td>
        <td style="width: 25.0000%;">
            <div data-empty="true" style="text-align: center;">{{ $results->dos }}</div>
        </td>
        <td style="width: 25.0000%;">
            <div data-empty="true" style="text-align: center;">{{ $results->doe }}</div>
        </td>
        <td style="width: 25.0000%;">
            <div data-empty="true" style="text-align: center;">{{ $results->place_issue }}</div>
        </td>
    </tr>
    </tbody>
</table>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 100%; background-color: rgb(84, 172, 210);">
            <div style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;"><strong>NEXT OF KIN</strong></span>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><span
                        style="font-family: Tahoma,Geneva, sans-serif;">NAME</span></span></div>
        </td>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">RELATIONSHIP</span>
            </div>
        </td>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span
                    style="font-family: Tahoma, Geneva, sans-serif; color: rgb(255, 255, 255);">CONTACT NO</span></div>
        </td>
        <td style="width: 25%; background-color: rgb(84, 172, 210);">
            <div data-empty="true" style="text-align: center;"><span
                    style="color: rgb(255, 255, 255); font-family: Tahoma, Geneva, sans-serif;">ADDRESS</span></div>
        </td>
    </tr>
    <tr>
        <td style="width: 25.0000%;">
            <div style="text-align: center;">{{ $results->kin }}</div>
        </td>
        <td style="width: 25.0000%;">
            <div data-empty="true" style="text-align: center;">{{ $results->kin_relationship }}</div>
        </td>
        <td style="width: 25.0000%;">
            <div data-empty="true" style="text-align: center;">{{ $results->kin_contact }}</div>
        </td>
        <td style="width: 25.0000%;">
            <div data-empty="true" style="text-align: center;">{{ $results->kin_address }}</div>
        </td>
    </tr>
    </tbody>
</table>
<p><br></p>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 32.0498%; background-color: rgb(84, 172, 210);">
            <div style="text-align: center;"><span style="color: rgb(255, 255, 255);"><strong>REMARKS</strong></span>
            </div>
        </td>
        <td style="width: 67.8369%;">{{ $results->remarks }}</td>
    </tr>
    </tbody>
</table>
