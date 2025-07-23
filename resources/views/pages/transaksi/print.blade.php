<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        @page {
            margin: 20mm;
            size: A4;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        
        .company-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        
        .company-info {
            font-size: 11px;
            color: #666;
            margin-bottom: 3px;
        }
        
        .report-title {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 30px 0 20px 0;
            text-transform: uppercase;
            text-decoration: underline;
        }
        
        .report-info {
            margin-bottom: 25px;
        }
        
        .report-info table {
            width: 100%;
        }
        
        .report-info td {
            padding: 3px 0;
            vertical-align: top;
        }
        
        .report-info .label {
            width: 120px;
            font-weight: bold;
        }
        
        .transactions-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .transactions-table th,
        .transactions-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        
        .transactions-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .transactions-table .text-center {
            text-align: center;
        }
        
        .transactions-table .text-right {
            text-align: right;
        }
        
        .pemasukan {
            color: #28a745;
            font-weight: bold;
        }
        
        .pengeluaran {
            color: #dc3545;
            font-weight: bold;
        }
        
        .summary {
            margin-top: 20px;
            border: 2px solid #000;
            padding: 15px;
            background-color: #f9f9f9;
        }
        
        .summary table {
            width: 100%;
        }
        
        .summary td {
            padding: 5px 0;
            font-weight: bold;
        }
        
        .summary .label {
            width: 70%;
        }
        
        .summary .amount {
            text-align: right;
            width: 30%;
        }
        
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        
        .signature {
            margin-top: 60px;
            text-align: center;
        }
        
        .signature-line {
            border-bottom: 1px solid #000;
            width: 200px;
            margin: 0 auto 5px auto;
        }
        
        .print-date {
            position: fixed;
            bottom: 10mm;
            right: 10mm;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Header / Kop Surat -->
    <div class="header">
        <div class="company-name">{{ setting('site_company') ?? 'NAMA PERUSAHAAN' }}</div>
        <div class="company-info">{{ setting('site_address') ?? 'Alamat Perusahaan' }}</div>
        <div class="company-info">Telp: {{ $company['phone'] ?? '(021) 1234-5678' }} | Email: {{ $company['email'] ?? 'info@perusahaan.com' }}</div>
    </div>

    <!-- Judul Laporan -->
    <div class="report-title">Laporan Transaksi</div>

    <!-- Info Laporan -->
    <div class="report-info">
        <table>
            <tr>
                <td class="label">Periode</td>
                <td>: {{ $periode->tahun ?? 'Semua Periode' }}</td>
            </tr>
            <tr>
                <td class="label">Type Transaksi</td>
                <td>: {{ $transaction_type ?? 'Semua Transaksi' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Cetak</td>
                <td>: {{ date('d F Y H:i:s') }}</td>
            </tr>
        </table>
    </div>

    <!-- Tabel Transaksi -->
    <table class="transactions-table">
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 12%">Tanggal</th>
                <th style="width: 30%">Nama</th>
                <th style="width: 13%">Type</th>
                <th style="width: 25%">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($transactions) && count($transactions) > 0)
                @foreach($transactions as $index => $transaction)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($transaction['transaction_date'])) }}</td>
                    <td>{{ $transaction['name'] }}</td>
                    <td class="text-center">
                        <span class="{{ strtolower($transaction['type']) == 'pemasukan' ? 'pemasukan' : 'pengeluaran' }}">
                            {{ ucfirst($transaction['type']) == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                        </span>
                    </td>
                    <td class="text-right">Rp{{ number_format($transaction['amount'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center" style="padding: 20px; color: #666;">
                        Tidak ada data transaksi
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    @php
        $summary = [
            'total_pemasukan' => 0,
            'total_pengeluaran' => 0,
        ];

        foreach ($transactions as $transaction) {
            if (strtolower($transaction['type']) == 'income') {
                $summary['total_pemasukan'] += $transaction['amount'];
            } elseif (strtolower($transaction['type']) == 'expense') {
                $summary['total_pengeluaran'] += $transaction['amount'];
            }
        }
    @endphp

    <!-- Summary -->
    <div class="summary">
        <table>
            <tr>
                <td class="label">Total Pemasukan:</td>
                <td class="amount pemasukan">Rp {{ number_format($summary['total_pemasukan'] ?? 0, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Total Pengeluaran:</td>
                <td class="amount pengeluaran">Rp {{ number_format($summary['total_pengeluaran'] ?? 0, 0, ',', '.') }}</td>
            </tr>
            <tr style="border-top: 1px solid #000;">
                <td class="label">Saldo:</td>
                <td class="amount">Rp {{ number_format(($summary['total_pemasukan'] ?? 0) - ($summary['total_pengeluaran'] ?? 0), 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div style="margin-bottom: 20px;">
            {{ $company['city'] ?? 'Jakarta' }}, {{ date('d F Y') }}
        </div>
        
        <div class="signature">
            <div>Mengetahui,</div>
            <div style="margin-top: 60px;">
                <div class="signature-line"></div>
                <div>{{ $authorized_person ?? 'Nama Pejabat' }}</div>
                <div style="font-size: 11px;">{{ $authorized_position ?? 'Jabatan' }}</div>
            </div>
        </div>
    </div>

    <!-- Print Date -->
    <div class="print-date">
        Dicetak pada: {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>