
<?php
          // ob_start();
          $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
          $font_size = $pdf->pixelsToUnits('20');
          $pdf->SetFont ('helvetica', '', $font_size , '', 'default', true );
          $pdf->AddPage('P');
          $i=0;
          $tagihan = $data['tagihan'];

          $bank = $data['bank'];
          $data = $data['data'];
          $html='
            <h1 style="margin-left:20px">RINCIAN PIUTANG IURAN PERUSAHAAN</h1>
            <p>Periode: '.$tgl.'</p>
            <table bgcolor="#666666">
                      <tr bgcolor="#ffffff">
                        <th width="20%">Nama Perusahaan</th>
                        <th width="1%">:</th>
                        <th width="30%">'.$data->badan_usaha.'</th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="20%">NPP</th>
                        <th width="1%">:</th>
                        <th width="30%">'.$data->npp.'</th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="20%">BLTH Rekon</th>
                        <th width="1%">:</th>
                        <th width="30%">'.date("m-Y",strtotime($data->blth_posting)).'</th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="20%">AR</th>
                        <th width="1%">:</th>
                        <th width="30%"><b>'.$data->nama_pembina.' ('.$data->telepon.')'.'</b></th>
                      </tr>
              </table><br><br>
            <table cellspacing="1" border="0" bgcolor="#666666" cellpadding="2">
                      <tr bgcolor="#ffffff">

                      <th width="5%">NO</th>
                      <th width="20%" align="center">BULAN</th>
                      <th width="20%" align="center">IURAN</th>
                      <th width="10%" align="center">UMUR</th>
                      <th width="20%" align="center">DENDA</th>
                      <th width="25%" align="center">JUMLAH TUNGGAKAN</th>
                      </tr>';

          // die(var_dump($data['tagihan']));
          $total = 0;
          $total_denda = 0;
          $total_iuran = 0;
          foreach ($tagihan as $value)
              {
                $total+= $value['tunggakan'];
                $total_denda+=$value['denda'];
                $total_iuran += $value['iuran'];
                  $i++;
                  $html.='<tr bgcolor="#ffffff">
                        <td align="center">'.$i.'</td>
                        <td align="left">'.$value["bulan"].'</td>
                        <td align="center">'.number_format($value["iuran"], 2, '.', ',').'</td>
                        <td align="center">'.$value["umur"].'</td>
                        <td align="center">'.number_format($value["denda"], 2, '.', ',').'</td>
                        <td align="center">'.number_format($value["tunggakan"], 2, '.', ',').'</td>
                      </tr>';

              }
              $html.='<tr bgcolor="#ffffff">
                    <td align="center"></td>
                    <td align="left">TOTAL</td>
                    <td align="center">'.number_format($total_iuran, 2, '.', ',').'</td>
                    <td align="center"></td>
                    <td align="center">'.number_format($total_denda, 2, '.', ',').'</td>
                    <td align="center">'.number_format($total, 2, '.', ',').'</td>
                  </tr>';
          $html.='</table>';
          $html .= '<br><br><table bgcolor="#666666">
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%">'.date("d M Y",strtotime($tgl)).'</th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%">Yang Membuat</th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"></th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"></th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"></th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"></th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"></th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"><b>'.$data->nama_pembina.'</b></th>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <th width="70%"></th>
                        <th width="1%"></th>
                        <th width="30%"><b>'.$data->telepon.'</b></th>
                      </tr>
              </table><br><br>';

              $html .= '<br><br><table bgcolor="#666666">
                          <tr bgcolor="#ffffff">
                            <th width="70%">Keterangan</th>
                          </tr>
                          <tr bgcolor="#ffffff">
                            <th width="70%">*Perhitungan tersebut diatas dihitung berdasarkan pembayaran iuran bulan sebelumnya
</th>
                          </tr>
                          <tr bgcolor="#ffffff">
                            <th width="70%">* Apabila terdapat perubahan iuran yang disebabkan karena perubahan upah atau mutasi TK   akan dihitung kemudian

</th>
                          </tr>
                          <tr bgcolor="#ffffff">
                            <th width="70%">* Denda 2% (dua) persen setiap bulan keterlambatan</th>
                          </tr>
                  </table><br><br>';
                  $html .= '<table cellspacing="1" border="0" bgcolor="#666666" cellpadding="2">';
                  $html .= '<tr bgcolor="#ffffff">
                    <th colspan="4" width="60%"><b>KODE PEMBAYARAN</b></th>
                  </tr>';
                  // $html .= '<tr bgcolor="#ffffff">
                  //   <th>adada</th>
                  //   <th>dasda</th>
                  //   <th>ghghg</th>
                  //   <th>'.$val->ket.'</a></th>
                  // </tr>';
                  foreach ($bank_va as $val) {
                    $html .= '<tr bgcolor="#ffffff">
                      <th>'.$val->bank.'</th>
                      <th>'.$val->kode.'</th>
                      <th>'.$data->va.'</th>
                      <th>'.$val->ket.'</th>
                    </tr>';
                  }
                  $html .=  '</table>';
                  // die(var_dump($html));

          // die($image_path);
           // $print = '<p>some text here...</p>';
           // $html .= '<br><img src=" '. $image_path  .' ">';
          $pdf->writeHTML($html, true, false, true, false, '');
          if (!empty($bank_bayar)) {

            $panduan = json_decode($bank_bayar->panduan);
            // die(var_dump($bank_bayar->idbank));
            $pdf->AddPage();
            $html = "<br><br>";
            $html .="<h1>Panduan Pembayaran Di Bank ".$bank_bayar->bank."</h1><br>";
            $pdf->writeHTML($html, true, false, true, false, '');

            for ($i=0; $i < count($panduan) ; $i++) {
              if ($i!=0) {
                $pdf->AddPage();
                $html = "<br><br>";
                $pdf->writeHTML($html, true, false, true, false, '');

              }
              $image_path = 'http://kelana.onklinik.net/desain/'.$panduan[$i];
              $img = file_get_contents($image_path);
              $img = base64_encode($img);
              $imgdata = base64_decode($img);
              // $pdf->Image();
              // $html .= '<table cellspacing="1" border="0" bgcolor="#666666" cellpadding="2">';
              // $html .= '<tr bgcolor="#ffffff">
              //   <th colspan="4" width="100%"><b>KODE PEMBAYARAN</b></th>
              // </tr>';
              // foreach ($bank as $value) {
              //   $html .= '<tr bgcolor="#ffffff">
              //     <th>'.$value->bank.'</th>
              //     <th>'.$value->kode.'</th>
              //     <th>'.$value->va.'</th>
              //     <th><a href="http://kelana.onklinik.net/desain/bri.PNG">'.$value->ket.'</a></th>
              //   </tr>';
              // }
              // $html .=  '</table>';

              $pdf->Image('@'.$imgdata);


            }
          }
          ob_end_clean();
          $pdf->Output('tagihan.pdf', 'I');

?>
