<style>
    .box {
        border: 1px solid;
        padding: 40px;
        display: flex;
        flex-direction: column;
    }

    .head h2 {
        text-align: center;
        font-weight: bold;
    }

    span.text {
        text-decoration: underline;
    }

    span.atas {
        border-top: 1px solid black;
    }
</style>
<div class="box">
    <div class="head">
        <h2>Kwitansi Pembayaran</h2>
    </div>
    <div class="body" style="margin-bottom: 40px;">
        <strong>No. </strong> <span class="text" style="width: 100% !important;"><?= $pay['id_transaction'] ?></span> <br>
        <strong>Telah terima dari </strong> <span class="text" style="width: 100% !important;"><?= $student['name'] ?></span> <br>
        <strong>Uang Sejumlah </strong> <span class="text" style="width: 100% !important;"><?= terbilang($pay['pay_amount']) ?> Rupiah</span> <br>
        <strong>Untuk Pembayaran </strong> <span class="text" style="width: 100% !important;">SPP Bulan <?= $pay['pay_month'] ?> <?= $pay['pay_year'] ?></span> <br>
    </div>
    <div class="ttd">
        <table style="width: 100%;">
            <tr>
                <td colspan="2" style="text-align: right;">
                    Payakumbuh, <?= $pay['paid_date'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right; padding-top: 50px;">

                </td>
            </tr>
            <tr>
                <td>
                    <div class="">
                        <span style="border-top: 1px solid black; border-bottom: 1px solid black; padding-top:5px; padding-bottom:5px; padding-right:20px;"><strong>Rp.</strong> <?= number_format($pay['pay_amount'], 0, ".",".") ?></span>
                    </div>
                </td>
                <td style="text-align: right;">
                    <?= $employee['name'] ?>
                </td>
            </tr>
        </table>
    </div>
</div>