<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Resit Rasmi - As-Siraaj</title>
    <link rel="icon" type="image/svg" href="/images/logo-1.svg">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 40px;
            color: #333;
            background-color: #fff;
        }
        /* Header Section */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #065f46; /* Emerald-900 color */
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo-section {
            flex: 0 0 100px; /* Ruang untuk logo besar sikit*/
            margin-right: 20px;
        }
        .logo-placeholder {
            width: 100px;
            height: 100px;
            /* border: 1px dashed #ccc; Border sementara jika logo belum ada */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #ffffff;
        }
        .company-info {
            flex: 1;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #065f46;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .company-details {
            font-size: 11px;
            line-height: 1.5;
            color: #666;
        }
        .receipt-title {
            text-align: right;
            flex: 0 0 150px;
        }
        .title-text {
            font-size: 22px;
            font-weight: bold;
            color: #065f46;
        }
        
        /* Table Layout */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .info-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: 600;
            color: #4b5563;
            width: 35%;
            font-size: 13px;
        }
        .value {
            font-size: 14px;
            color: #1f2937;
        }

        /* Payment Summary Box */
        .summary-row {
            background-color: #f0fdf4; /* Light emerald */
            font-weight: bold;
        }
        .amount-big {
            font-size: 18px;
            color: #059669;
        }

        /* Footer Section */
        .footer {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .footer-note {
            font-size: 11px;
            color: #9ca3af;
            font-style: italic;
        }
        .signature-box {
            text-align: center;
            width: 250px;
        }
        .cursive-signature {
            font-family: 'Dancing Script', cursive;
            font-size: 20px;
            color: #1e293b;
            margin-bottom: 5px; /* Merapatkan dengan garisan */
        }
        .signature-line {
            border-top: 1px solid #333;
            margin-bottom: 5px;
        }
        .signature-text {
            font-size: 13px;
            font-weight: bold;
        }

        @media print {
            body { padding: 20px; }
            .no-print { display: none; }
            .header-container { border-bottom: 2px solid #000; }
        }
    </style>
</head>
<body>

<div class="header-container">
    <div class="logo-section">
        <img src="/images/logo-2.svg" alt="Logo" class="logo-placeholder" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
        <div class="logo-placeholder" style="display:none">LOGO</div>
    </div>
    <div class="company-info">
        <div class="company-name">Pusat Pengajian Quran As-Siraaj</div>
        <div class="company-details">
            قوست فغاجين القرآن السراج <br>
            No. Pendaftaran: 202103155457 (CA0325022-H) <br>
            No. 06-1, Tingkat Atas, Jalan Villa Tropika 1, Taman Villa Tropika<br>
            43000 Kajang, Selangor Darul Ehsan<br>
            Tel: 017-4763009 / 018-2763009 | Emel: assiraaj.edu@gmail.com
        </div>
    </div>
    <div class="receipt-title">
        <div class="title-text">RESIT RASMI</div>
        <div style="font-size: 12px; color: #666;">No. Resit: #{{ str_pad($bill->bill_id, 6, '0', STR_PAD_LEFT) }}</div>
    </div>
</div>

<table class="info-table">
    <tr>
        {{-- nama bill --}}
        <td class="label">Nama Bil</td>
        <td class="value">{{ $bill->salary->salary_name}} - SLIP GAJI</td>
    </tr>
    <tr>
        <td class="label">Nama Pengajar</td>
        <td class="value">{{ $bill->tutor->first_name }} {{ $bill->tutor->last_name }}</td>
    </tr>
    <tr>
        <td class="label">Tarikh Transaksi</td>
        <td class="value">{{ $bill->updated_at->format('d/m/Y H:i A') }}</td>
    </tr>
    <tr>
        <td class="label">Kaedah Bayaran</td>
        <td class="value">{{ ucfirst($bill->bill_type) }}</td>
    </tr>
    <tr>
        <td class="label">Status</td>
        <td class="value">
            <span style="color: {{ $bill->bill_status == 'Paid' ? '#059669' : '#dc2626' }}; font-weight: bold;">
                {{ strtoupper($bill->bill_status) }}
            </span>
        </td>
    </tr>
    <tr class="summary-row">
        <td class="label">JUMLAH BAYARAN</td>
        <td class="value amount-big">RM {{ number_format($bill->bill_amount, 2) }}</td>
    </tr>
</table>

<div class="footer">
    <div class="footer-note">
        * Ini adalah cetakan komputer. Tandatangan tidak diperlukan jika dibayar secara atas talian.
    </div>
    <div class="signature-box">
        <div class="cursive-signature">Ahmad Mustaqim</div>
        <div class="signature-line"></div>
        <div class="signature-text">Pentadbir Pusat Pengajian</div>
        <div style="font-size: 11px; color: #666;">PPQ AS-SIRAAJ</div>
    </div>
</div>

<div class="no-print" style="margin-top:40px; text-align: center;">
    <button onclick="window.print()" style="padding: 10px 25px; background-color: #059669; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
        Cetak / Simpan PDF
    </button>
</div>

</body>
</html>