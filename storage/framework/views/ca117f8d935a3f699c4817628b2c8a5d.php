<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: 'Segoe UI', Helvetica, Arial, sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 15px rgba(0,0,0,0.1);">
                    
                    <tr>
                        <td align="center" style="background-color: #10b981; padding: 45px 20px;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 800; letter-spacing: -1px;">✅ Aspirasi Selesai</h1>
                            <p style="margin: 8px 0 0 0; color: #d1fae5; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 1.5px;">Sistem Aspirasi Sekolah Digital</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 30px;">
                            <p style="margin: 0; font-size: 18px; color: #0f172a;">Halo, <strong><?php echo e($aspirasi->full_name ?? 'Siswa'); ?></strong> 👋</p>
                            <p style="margin: 16px 0 24px 0; font-size: 16px; color: #475569; line-height: 1.6;">Laporan aspirasi Anda telah selesai diproses. Berikut adalah rincian penyelesaiannya:</p>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px;">
                                <tr>
                                    <td style="padding-bottom: 12px; border-bottom: 1px solid #f1f5f9;">
                                        <span style="display: block; font-size: 11px; color: #94a3b8; font-weight: 800; text-transform: uppercase; margin-bottom: 4px;">ID Aspirasi</span>
                                        <span style="font-size: 15px; color: #0f172a; font-weight: 700;">#<?php echo e($aspirasi->id_aspirasi); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #f1f5f9;">
                                        <span style="display: block; font-size: 11px; color: #94a3b8; font-weight: 800; text-transform: uppercase; margin-bottom: 4px;">Kategori</span>
                                        <span style="font-size: 15px; color: #0f172a; font-weight: 700;"><?php echo e($aspirasi->nama_kategori); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 12px;">
                                        <span style="display: block; font-size: 11px; color: #94a3b8; font-weight: 800; text-transform: uppercase; margin-bottom: 4px;">Status</span>
                                        <span style="font-size: 15px; color: #10b981; font-weight: 800;">✅ TERSELESAIKAN</span>
                                    </td>
                                </tr>
                            </table>

                            <?php if(isset($umpanBalik) && trim($umpanBalik) != ''): ?>
                            <div style="margin-top: 24px; padding: 20px; background-color: #eff6ff; border-radius: 16px; border-left: 5px solid #3b82f6;">
                                <strong style="display: block; font-size: 12px; color: #1d4ed8; margin-bottom: 6px; text-transform: uppercase;">💬 Tanggapan Admin</strong>
                                <p style="margin: 0; color: #1e40af; font-size: 15px; font-style: italic; line-height: 1.5;">"<?php echo e($umpanBalik); ?>"</p>
                            </div>
                            <?php endif; ?>

                            <p style="margin-top: 32px; font-size: 15px; color: #475569; text-align: center;">Terima kasih atas partisipasi Anda dalam membangun sekolah yang lebih baik.</p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 30px; background-color: #f8fafc; border-top: 1px solid #f1f5f9;">
                            <p style="margin: 0; font-size: 12px; color: #94a3b8;">&copy; <?php echo e(date('Y')); ?> <strong>Aspirasi Digital Sekolah</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html><?php /**PATH C:\asp\web\resources\views/emails/aspirasi-selesai.blade.php ENDPATH**/ ?>