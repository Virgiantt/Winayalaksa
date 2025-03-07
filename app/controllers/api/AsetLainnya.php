<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use Dompdf\Dompdf;
header('Content-type: application/json');
class AsetLainnya extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("Api/AsetLainnya_model","model");
	}

	public function index(){
		$request = $this->model->index($this->input->get());
		echo json_encode($request);
	}

	public function detail($id){
		$request = $this->model->detail($id);
		echo "Judul Nama = $request[judul_nama] \nJenis Nama Barang = $request[jenis_nama_barang] \nNomor Kode Barang = $request[nomor_kode_barang] \n";
	}

	public function print(){
		$request['data'] = $this->model->index($this->input->get());
		$pdf = $this->load->view("admin/aset_lainnya/print",$request,true);
      
       	$dompdf = new Dompdf();
		$dompdf->set_option('isRemoteEnabled', TRUE);
		$dompdf->loadHtml($pdf);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();

		$dompdf->stream('Aset_Lainnya.pdf',array('Attachment'=>0));
	}

	public function add(){
		$request = $this->model->add($this->input->post());
		echo json_encode($request);
	}

	public function update(){
		$request = $this->model->update($this->input->post());
		echo json_encode($request);
	}

	public function delete(){
		$request = $this->model->delete($this->input->post());
		echo json_encode($request);
	}
}