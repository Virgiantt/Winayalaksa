<?php

include_once APPPATH . '/libraries/mpdf/autoload.php';

class Pdf {

   protected $fileName = "Dokumen.pdf";
   protected $autoDownload = "D";
   protected $css = "";
   protected $content = "";
   protected $output = "";

   public function config($params)
   {
      $this->fileName = $params['file'];
      $this->css = $params['css'];
      $this->autoDownload = $params['download'];
      $this->content = $params['content'];
   }

   public function run()
   {
      $mpdf = new \Mpdf\Mpdf();

      if(isset($this->css)) {
         $mpdf->WriteHTML($this->css, 1);
      }
      $mpdf->WriteHTML($this->content, 2);

      if ($this->autoDownload == true) {
         $mpdf->Output($this->fileName, "D");
      }else{
         $mpdf->Output($this->fileName, "I");
      }
   }
}
