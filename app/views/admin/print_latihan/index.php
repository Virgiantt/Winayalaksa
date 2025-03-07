<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <style type="text/css">
        *{
            font-family: 'Nunito', sans-serif;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        p{
            margin: 5px 0 0 0;
        }
        p.footer{
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
            display: block;
        }
        .bold{
            font-weight: bold;
        }

        #footer {
            clear: both;
            position: relative;
            height: 40px;
            margin-top: -40px;
        }
    </style>
</head>
<body style="font-size: 12px">



    <p align="center"> 
        <table width="100%">
            <tr>
                <td align="center">
                    <span style="font-size: 18px;font-weight: bold;">Hasil Evaluasi Pembelajaran</span>
                </td>
            </tr>    
        </table>
    </p>

    <hr>

    <p>
        <table>
            <tr>
                <th align="left">Paket Latihan</th>
                <td>:</td>
                <td><?= $question['title'] ?></td>
            </tr>
        </table>
    </p>

    <br>

    <p>
        <table style="border: 1px solid black;border-collapse: collapse;font-size: 11px" width="100%">
            <tr style="margin: 5px">
                <th width="5%" style="border: 1px solid black;">
                    Rank
                </th>
                <th width="13%" style="border: 1px solid black;">
                    Tanggal
                </th>
                <th style="border: 1px solid black;">
                    Nama User
                </th>
                <th align="center" style="border: 1px solid black;">
                    Total Nilai
                </th>
                <th style="border: 1px solid black;">
                    Keterangan
                </th>
            </tr>

            <?php foreach ($answer as $i => $val): ?>
                <tr style="margin: 5px">
                    <td style="border: 1px solid black;padding-left: 5px;"><?= $i+1 ?></td>
                    <td style="border: 1px solid black;padding-left: 5px;"><?= explode(' ',$val['date'])[0] ?></td>
                    <td style="border: 1px solid black;padding-left: 5px;"><?= $val['name'] ?></td>
                    <td align="center" style="border: 1px solid black;padding-left: 5px;"><?= $val['count_point'] ?></td>
                    <td style="border: 1px solid black;padding-left: 5px;"> </td>
                </tr>
            <?php endforeach ?>

        </table>


    </p>

    <br>  


</body>
</html>