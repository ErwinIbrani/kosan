<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<p align="left"><button id="btnExportPKS" class="btn btn-success btn-md">Export to excel</button></p>
<table  id="test" border="0" style="table-layout:fixed;width:950px" class="well well-sm">
    <tr>
        <td>
            Mitra Kerja
            <table border="1" cellpadding="5">
                <tr>
                    <td></td>
                    <td style="font-weight: bolder">Nomor SIUP</td>
                    <td>Oke</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight: bolder">Nomor NPWP</td>
                    <td>Oke</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight: bolder">Nomor Ijin Disnaker</td>
                    <td>oke</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight: bolder">Akte Pendirian Perusahaan</td>
                    <td>oke</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight: bolder">Alamat</td>
                    <td>oke</td>
                </tr>
            </table>
            <br>
        </td>
    </tr>
    <tr>
        <td>
           <table border="1" cellpadding="5">
                <tr>
                    <th rowspan="2" halign="center" style="background-color: red; color: white;width:20px">No</th>
                    <th rowspan="2" halign="center" style="background-color: red; color: white;">Nomor PKS/PO/BAK*</th>
                    <th rowspan="2" halign="center" style="background-color: red; color: white;">Perjanjian Kerja Sama</th>
                    <th colspan="3" halign="center" style="background-color: red; color: white;">Lokasi</th>
                    <th colspan="2" halign="center" style="background-color: red; color: white;">Pelaporan PKS ke Disnaker</th>
                </tr>
                <tr>
                    <th halign="center" style="background-color: red; color: white;">Area</th>
                    <th halign="center" style="background-color: red; color: white;">Regional</th>
                    <th halign="center" style="background-color: red; color: white;">Kota</th>
                    <th halign="center" style="background-color: red; color: white;">Sudah****</th>
                    <th halign="center" style="background-color: red; color: white;">Nomor Bukti Lapor</th>
                </tr>
                    <tr>
                        <td>1</td>
                        <td>121321</td>
                        <td>Tes Aja</td>
                        <td>Oke</td>
                        <td>Oke</td>
                        <td>Tes</td>
                        <td>
                            Sudah
                        </td>
                        <td>
                            121313
                        </td>
                    </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td></td>
                    <td>
                        <br>Telkomsel<br><br>
                        <b><br>Tes
                        <br>Oke></b>
                    </td>
                    <td>
                        <br>
                       
                        <br>Oke<br>
                        <b><br>Oke
                        <br>Okee</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <hr>
                        <br>Keterangan:
                        <br>*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semua Perjanjian Kerjasama (PKS) baik yang ditanda tangani oleh Telkomsel Pusat maupun Area/Regional
                        <br>**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BPO - Perjanjian Pemborong Pekerjaan
                        <br>***&nbsp;&nbsp;&nbsp;&nbsp;LSO - Perjanjian Penyedia Jasa Pekerjaan
                        <br>****&nbsp;&nbsp;&nbsp;Jika pada pelaporan PKS diisi sudah, maka Nomor Bukti Lapor wajib diisi
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<script type="text/javascript">
$(document).ready(function() {
 $("#btnExportPKS").click(function(e) {
 e.preventDefault();

//getting data from our table
 var data_type = 'data:application/vnd.ms-excel';
 var table_div = document.getElementById('test');
 var table_html = table_div.outerHTML.replace(/ /g, '%20');

var a = document.createElement('a');
 a.href = data_type + ', ' + table_html;
 a.download = 'PKS_monitoring_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
 a.click();
 });

});
</script>
</body>
</html>