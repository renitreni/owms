<html>

<body>
    <div id="app">
        <p style="text-align: center;"><strong>Cash Voucher</strong>
            <br />{{ $agency->name }}<br />
            {{ Carbon\Carbon::now()->format('F j, Y') }}
        </p>
        <table style="height: 72px; width: 100%; border-collapse: collapse;" border="0">
            <tbody>
                <tr style="height: 18px;">
                    <td style="width: 28.4672%; height: 18px; text-align: right;"><em><strong>Amount</strong></em>&nbsp;
                    </td>
                    <td style="width: 23.1751%; height: 18px; text-align: left;">&nbsp;{{ $results->amount }}</td>
                    <td style="width: 12.2263%; height: 18px; text-align: right;"><strong><em>Paid to</em></strong></td>
                    <td style="width: 36.1314%; text-align: left; height: 18px;">&nbsp;{{ $results->paid_to }}</td>
                </tr>
                <tr style="height: 18px;">
                    <td style="width: 28.4672%; height: 18px; text-align: right;"><em><strong>Prepared
                                by</strong></em>&nbsp;</td>
                    <td style="width: 23.1751%; height: 18px; text-align: left;">
                        &nbsp;{{ $results->information->name }}</td>
                    <td style="width: 12.2263%; text-align: left; height: 18px;">&nbsp;</td>
                    <td style="width: 36.1314%; text-align: left; height: 18px;">&nbsp;</td>
                </tr>
                <tr style="height: 18px;">
                    <td style="width: 28.4672%; height: 18px; text-align: right;"><em><strong>Particulars
                                by</strong></em>&nbsp;</td>
                    <td style="width: 23.1751%; height: 18px; text-align: left;">&nbsp;{{ $results->particulars }}
                    </td>
                    <td style="width: 12.2263%; text-align: left; height: 18px;">&nbsp;</td>
                    <td style="width: 36.1314%; text-align: left; height: 18px;">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px" border="0">
            <tbody>
                <tr>
                    <td style="width: 23.5402%; text-align: right;"><strong>Approved by</strong></td>
                    <td style="width: 23.7226%;">&nbsp;_____________</td>
                    <td style="width: 22.1716%; text-align: right;">&nbsp;<strong>Received by</strong></td>
                    <td style="width: 42.7007%;">&nbsp;_____________</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="width: 100%;text-align: center;">
        <input type="button" onclick="printing()" value="Print" style="text-align: center;background-color: #33cccc;color: #ffffff;margin-top:20px;padding: 5px;border-radius: 9px;font-size: large;"/>
    </div>
    <script>
        function printing() {
            var prtContent = document.getElementById("app");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
</body>

</html>
