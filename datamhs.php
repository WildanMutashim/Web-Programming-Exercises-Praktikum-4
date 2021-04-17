<html>
<body>
<center>
  <h1> DATA MAHASISWA</h1>
  <table border="1">
  <tr>
    <td>No</td>
    <td>NIM</td>
    <td>Nama</td>
    <td>Tanggal Lahir</td>
    <td>Tempat Lahir</td>
    <td>Usia</td>
  </tr>
</center>
<?php  
$namaFile = fopen("datamhs.dat", "r");

function hitungUsia($tgl1, $tgl2){
    
  // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
  // dari tanggal pertama
  
  $exp1 = explode("-", $tgl1);
  $dd1 = $exp1[2];
  $mm1 = $exp1[1];
  $yyyy1 = $exp1[0];
  
  // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
  // dari tanggal kedua
  
  $exp2 = explode("-", $tgl2);
  $dd2 = $exp2[2];
  $mm2 = $exp2[1];
  $yyyy2 =  $exp2[0];
  
  // menghitung JDN dari masing-masing tanggal
  
  $jd1 = GregorianToJD($mm1, $dd1, $yyyy1);
  $jd2 = GregorianToJD($mm2, $dd2, $yyyy2);
  
  // hitung selisih tahun kedua tanggal
  
  $usia = ceil(($jd2 - $jd1) / 365);
  return $usia;
}
$i=0;
while (!feof($namaFile) ) {
    $i++;
    $line_of_text = fgets($namaFile);
    $parts = explode('|', $line_of_text);
    echo "<tr><td>".$i."</td>
      <td>$parts[0]</td>
      <td>$parts[1]</td>
      <td>$parts[2]</td>
      <td>$parts[3]</td>
      <td>".hitungUsia($parts[2], date("Y-m-d"));"</td>
    </tr>";
    
}
fclose($namaFile);
?>  

</table>
<?php
echo "<br>";
echo "Jumlah Data : " .$i;
?>

</body>
</html>