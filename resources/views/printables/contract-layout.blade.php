<p>Tabang System Serial No. {{ $contract->serial_no }}</p>

<p style="text-align:center;"><img src="{{ asset('tabang-logo/vector/default.png') }}" width="100px"></p>
<p style="text-align:center">
    <span style="font-size:22px">
        <strong>
            <span style="font-family:Arial,Helvetica,sans-serif">Department of Labor and Employment<br/>
                Philippine Overseas Employment Administration
            </span>
        </strong>
    </span>
</p>

<h3 style="text-align:center"><u><strong>STANDARD EMPLOYMENT CONTRACT FOR {{ $contract->name }}</strong></u></h3>
<h3 style="text-align:center"><strong>Contract Status is {{ strtoupper($contract->status) }}</strong></h3>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="border:0; width:500px">
    <thead>
    <tr>
        <th scope="col" style="text-align:left; width:200px"><span style="font-size:14px">Information:</span></th>
        <th scope="col" style="width:331px">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="width:200px"><strong>A. <u>EMPLOYER</u></strong></td>
        <td style="width:331px">&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:right; width:200px">Full name:&nbsp;</td>
        <td style="width:331px">&nbsp;{{ $details->employer_name }}</td>
    </tr>
    @isset($details->visa_no)
        <tr>
            <td style="text-align:right; width:200px">Visa No:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->visa_no }}</td>
        </tr>
    @endisset
    @isset($details->address)
        <tr>
            <td style="text-align:right; width:200px">Address:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->address_ph }}</td>
        </tr>
    @endisset
    @isset($details->employer_address)
        <tr>
            <td style="text-align:right; width:200px">Address:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->employer_address }}</td>
        </tr>
    @endisset
    @isset($details->po_box_no)
        <tr>
            <td style="text-align:right; width:200px">PO Box No.:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->po_box_no }}</td>
        </tr>
    @endisset
    <tr>
        <td style="text-align:right; width:200px">Telephone No.:&nbsp;</td>
        <td style="width:331px">&nbsp;{{ $details->telephone }}</td>
    </tr>
    @isset($details->fax)
        <tr>
            <td style="text-align:right; width:200px">Fax No.:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->fax }}</td>
        </tr>
    @endisset
    <tr>
        <td style="width:200px"><strong>B. <u>EMPLOYEE</u></strong></td>
        <td style="width:331px">&nbsp;</td>
    </tr>
    @isset($details->worker_name)
        <tr>
            <td style="text-align:right; width:200px">Full Name:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->worker_name }}</td>
        </tr>
    @endisset
    @isset($details->employee_name)
        <tr>
            <td style="text-align:right; width:200px">Full Name:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->employee_name }}</td>
        </tr>
    @endisset
    @isset($details->visa_no)
        <tr>
            <td style="text-align:right; width:200px">Visa No.:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->visa_no }}</td>
        </tr>
    @endisset
    @isset($details->address_ph)
        <tr>
            <td style="text-align:right; width:200px">Address:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->address_ph }}</td>
        </tr>
    @endisset
    @isset($details->employee_address)
        <tr>
            <td style="text-align:right; width:200px">Address:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->employee_address }}</td>
        </tr>
    @endisset
    @isset($details->cs_status)
        <tr>
            <td style="text-align:right; width:200px">Civil Status:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->cs_status }}</td>
        </tr>
    @endisset
    @isset($details->cs_worker)
        <tr>
            <td style="text-align:right; width:200px">Civil Status:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->cs_worker }}</td>
        </tr>
    @endisset
    <tr>
        <td style="text-align:right; width:200px">Passport No.:&nbsp;</td>
        <td style="width:331px">&nbsp;{{ $details->passport_no }}</td>
    </tr>
    <tr>
        <td style="text-align:right; width:200px">Date Of Issue (passport):&nbsp;</td>
        <td style="width:331px">&nbsp;{{ $details->date_issued }}</td>
    </tr>
    <tr>
        <td style="text-align:right; width:200px">Place Of Issue (passport):&nbsp;</td>
        <td style="width:331px">&nbsp;{{ $details->place_issued }}</td>
    </tr>
    @isset($details->employment_site)
        <tr>
            <td style="text-align:right; width:200px">Site Of Employment:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->employment_site }}</td>
        </tr>
    @endisset
    @isset($details->site_of_employment)
        <tr>
            <td style="text-align:right; width:200px">Site Of Employment:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->site_of_employment }}</td>
        </tr>
    @endisset
    @isset($details->employee_position)
        <tr>
            <td style="text-align:right; width:200px">Employee&#39;s Position:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->employee_position }}</td>
        </tr>
    @endisset
    <tr>
        <td style="text-align:right; width:200px">Basic Monthly Salary:&nbsp;</td>
        <td style="width:331px">&nbsp;{{ $details->salary }}</td>
    </tr>
    @isset($details->kin_name)
        <tr>
            <td style="text-align:right; width:200px">Next of Kin' Name:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->kin_name }}</td>
        </tr>
    @endisset
    @isset($details->kin_address)
        <tr>
            <td style="text-align:right; width:200px">Next of Kin's Address:&nbsp;</td>
            <td style="width:331px">&nbsp;{{ $details->kin_address }}</td>
        </tr>
    @endisset
    </tbody>
</table>
<div style="page-break-before:always">
    <p>Tabang System Serial No. {{ $contract->serial_no }}</p>

    <table align="center" border="0" cellpadding="1" cellspacing="1" style="border:0px; width:500px">
        <tbody>
        <tr>
            <td style="text-align:center"><strong>TERMS &amp; CONDITION</strong></td>
        </tr>
        <tr>
            <td>{!! $contract->requisition->content  !!}</td>
        </tr>
        </tbody>
    </table>
</div>
@isset($details->witness_day)
    <div style="page-break-before:always">
        <p>Tabang System Serial No. {{ $contract->serial_no }}</p>

        <table align="center" border="0" cellpadding="1" cellspacing="1" style="border:0; width:500px">
            <tbody>
            <tr>
                <td>IN WITNESS WHEREOF,&nbsp;</td>
            </tr>
            <tr>
                <td>we hereby sign this Contract this {{ $details->witness_day }} day of {{ $details->witness_month }}
                    , {{ $details->witness_year }} at {{ $details->witness_place }}
                </td>
            </tr>
            <tr>
                <td>REMARKS&nbsp;</td>
            </tr>
            <tr>
                <td>
                    {{ $details->remarks }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endisset
