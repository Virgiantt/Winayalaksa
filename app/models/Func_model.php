<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Func_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	/*
	* Get api token
	*/
	public function get_token()
	{
		$files = parse_ini_file(FCPATH . ".env.production");
		$api_app = $files['api_app'];
		$hasil = $this->curl_post("api/get_token", array('app' => $api_app));
		$data =	json_decode($hasil, true);
		foreach ($data['Data'] as $value) {
			$this->session->set_userdata('api_token', $value['api_token']);
		}
	}

	/*
	* cURL Post
	*/
	public function curl_post($url, $data = array())
	{
		$files = parse_ini_file(FCPATH . ".env.production");
		$api_app = $files['api_app'];
		$api_key = $files['api_key'];
		$api_url = $files['api_url'] . $url;

		$curl = curl_init();

		$token = get_uid();

		$options = [
			CURLOPT_URL        => $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST       => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				"authorization: Bearer " . $token,
				"Cookie: uid=" . $token
			),
			CURLOPT_SSL_VERIFYPEER => 0
		];

		curl_setopt_array($curl, $options);

		$result = curl_exec($curl);

		return $result;

		curl_close($curl);
	}

	/*
	* cURL Raja Ongkir Post
	*/
	public function curl_rajaongkir($method, $url, $data = "")
	{
		$files = parse_ini_file(FCPATH . ".env.production");
		$api_key = $files['rajaongkir_key'];
		if ($method == "GET") {
			$api_url = $files['rajaongkir_url'] . $url . "?" . $data;

			$curl = curl_init();

			$options = [
				CURLOPT_URL        => $api_url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_HTTPHEADER => array(
					'key: ' . $api_key
				),
				CURLOPT_SSL_VERIFYPEER => 0
			];

			curl_setopt_array($curl, $options);

			$result = curl_exec($curl);

			return $result;

			curl_close($curl);
		} else {
			$api_url = $files['rajaongkir_url'] . $url;

			$curl = curl_init();

			$options = [
				CURLOPT_URL        => $api_url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST       => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_POSTFIELDS => $data,
				CURLOPT_HTTPHEADER => array(
					'key: ' . $api_key
				)
			];

			curl_setopt_array($curl, $options);

			$result = curl_exec($curl);

			return $result;

			curl_close($curl);
		}
	}

	/*
	* CURL Midtrans
	*/
	public function midtrans_post($parameter)
	{
		$curl = curl_init();

		$url = $parameter['url'];
		$headers = $parameter['headers'];
		$data = $parameter['data'];

		$options = [
			CURLOPT_URL        => "https://api.sandbox.midtrans.com$url",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST       => true,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_HTTPHEADER => $headers
		];

		curl_setopt_array($curl, $options);

		$result = curl_exec($curl);

		return $result;

		curl_close($curl);
	}

	/*
	* Get profil user
	*/
	public function get_profil()
	{
		if (get_uid()) {
			$hasil = $this->curl_post("user/profil");
			$data =	json_decode($hasil, true);
			if ($data['Error']) {
				delete_cookie('uid');
				// header('location: '.base_url());
			}
			return $data['Data'];
		} else {
			return null;
		}
	}

	/*
	* Get profil sekolah
	*/
	public function get_profil_sekolah()
	{
		$hasil = $this->curl_post("sekolah/profil/get", array('user_id' => $this->session->user_id));
		$data =	json_decode($hasil, true);
		return $data['Data'];
	}

	/*
	* Get slide
	*/
	public function get_slide()
	{
		$hasil = $this->curl_post("admin/data_slide/list", array());
		$data =	json_decode($hasil, true);
		return $data['Data'];
	}

	/*
	* Get kategori
	*/
	public function get_kategori($id = null)
	{
		$hasil = $this->curl_post("kategori/list", array(
			'id' => $id
		));
		$data =	json_decode($hasil, true);
		return $data['Data'];
	}

	/*
	* Get blog
	*/
	public function get_blog($slug = null)
	{
		$hasil = $this->curl_post("blog/tampil", array(
			'slug' => $slug
		));
		$data =	json_decode($hasil, true);
		return $data;
	}

	public function get_kategori_mitra($slug)
	{
		$hasil = $this->curl_post("user/kategori_produk/", array(
			'slug' => $slug
		));
		$data =	json_decode($hasil, true);
		return $data['Data'];
	}

	/*
	* Get blog
	*/
	public function get_blog_footer()
	{
		$hasil = $this->curl_post("blog/blog_footer", array());
		$data =	json_decode($hasil, true);
		return $data;
	}

	/*
	* Cari produk
	*/
	public function cari_produk($cari, $kategori_id, $harga_minimum, $harga_maksimum, $page, $kelas, $user_id, $produksi = "")
	{
		$hasil = $this->curl_post("produk/cari_produk", array(
			'cari' => $cari,
			'kategori_id' => $kategori_id,
			'produksi' => $produksi,
			'harga_minimum' => $harga_minimum,
			'harga_maksimum' => $harga_maksimum,
			'user_id' => $user_id,
			'limit' => 10,
			'page' => $page,
			'kelas' => $kelas
		));
		$data =	json_decode($hasil, true);
		return $data;
	}

	/*
	* Cari mitra
	*/
	public function cari_mitra($cari, $kategori_id, $harga_minimum, $harga_maksimum, $page, $kelas, $user_id)
	{
		$hasil = $this->curl_post("produk/cari_mitra", array(
			'cari' => $cari,
			'kategori_id' => $kategori_id,
			'harga_minimum' => $harga_minimum,
			'harga_maksimum' => $harga_maksimum,
			'user_id' => $user_id,
			'limit' => 10,
			'page' => $page,
			'kelas' => $kelas
		));
		$data =	json_decode($hasil, true);
		return $data;
	}

	/*
	* Group by mitra
	*/
	function _group_by($array, $key)
	{
		$return = array();
		foreach ($array as $val) {
			$return[$val[$key]][] = $val;
		}
		return $return;
	}

	/*
	* Get kabupaten mitra for export excel
	*/
	public function kurir_kabupaten()
	{
		$hasil = $this->curl_post("mitra/kurir/get_kabupaten", array());
		$data =	json_decode($hasil, true);
		return $data;
	}

	/*
	* Get provinsi dari raja ongkir
	*/
	public function get_provinsi()
	{
		$hasil = $this->curl_rajaongkir("GET", "province");
		$data = json_decode($hasil, true);
		return $data['rajaongkir'];
	}

	/*
	* Get kabupaten dari raja ongkir
	*/
	public function get_kabupaten($provinsi_id = null)
	{
		$hasil = $this->curl_rajaongkir("GET", "city", "province=$provinsi_id");
		$data = json_decode($hasil, true);
		return $data['rajaongkir'];
	}

	/*
	* Get kecamatan dari raja ongkir
	*/
	public function get_kecamatan($kabupaten_id = null)
	{
		$hasil = $this->curl_rajaongkir("GET", "subdistrict", "city=$kabupaten_id");
		$data = json_decode($hasil, true);
		return $data['rajaongkir'];
	}

	/*
	* Get courier dari raja ongkir
	*/
	public function get_kurir($parameter)
	{
		$kurir = $parameter['kurir'];
		$asal = $parameter['asal'];
		$berat = $parameter['berat'];
		$tujuan = $parameter['tujuan'];
		// $origin_type = "city";
		$origin_type = "subdistrict";
		// $destination_type = "city";
		$destination_type = "subdistrict";

		if ($berat == 0) {
			$req_berat = 1000;
		} else {
			$req_berat = $berat;
		}

		$hasil = $this->curl_rajaongkir("POST", "cost", array(
			'origin' => $asal,
			'destination' => $tujuan,
			'weight' => $req_berat,
			'originType' => $origin_type,
			'destinationType' => $destination_type,
			'courier' => $kurir
		));
		$data = json_decode($hasil, true);


		$rajaongkir = $data['rajaongkir'];
		$status = $rajaongkir['status'];

		if ($status['code'] == 200) {
			$results = $rajaongkir['results'];
			$courier_code = $rajaongkir['query']['courier'];
			$courier_name = $results[0]['code'];
			$data = $results[0]['costs'];
			if ($data) {
				$result['Message'] = 'Success.';
				$result['Error'] = false;
				$costs = [];
				$no = 0;
				foreach ($data as $key) {
					if ($berat == 0) {
						$cost = [
							[
								'value' => 0,
								'etd' => '',
								'note' => ''
							]
						];
					} else {
						$cost = $key['cost'];
					}
					$costs[$no++] = [
						'description' => $key['description'],
						'service' => $key['service'],
						'code' => $courier_code,
						'cost' => $cost
					];
				}
				$result['Data'] = $costs;
				$result['name'] = $courier_name;
			} else {
				$result['Message'] = 'Kurir tidak tersedia';
				$result['Error'] = true;
			}
		} else {
			$result['Message'] = $status['description'];
			$result['Error'] = false;
		}

		return $result;
	}


	/*
	* Get courier dari gosend
	*/
	public function get_gosend($param)
	{

		$stream = $param['stream'];
		if ($stream == 'estimate') {

			$user = $this->get_profil()[0];
			$destination = $user['destination'];
			$url = "calculate/price?origin=" . $param['origin'] . "&destination=" . $destination . "&paymentType=" . 3;
		}

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => env('gosend_url') . $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Client-ID:' . env('gosend_Client-ID'),
				'Pass-Key:' . env('gosend_Pass-Key')
			),
		));

		$response = curl_exec($curl);

		$response = json_decode($response, true);

		curl_close($curl);
		return $response;
	}


	/*
	* Get produk per transaksi
	*/
	public function payment_produk($transaksi_id)
	{
		$hasil = $this->curl_post("sekolah/pembayaran/get_produk", array(
			"transaksi_id" => $transaksi_id
		));
		$data =	json_decode($hasil, true);
		return $data;
	}

	/*
	* Midtrans add transaksi
	*/
	public function midtrans_charge($token_id, $data)
	{
		$hasil = $this->midtrans_post(array(
			'url' => "/v2/charge",
			"headers" => array(
				"Content-Type" => "application/json",
				"Accept" => "application/json",
				"Authorization" => base64_encode($token_id),
			),
			"data" => $data
		));

		return json_decode($hasil, true);
	}

	/*
	* Mengambil profil sekolah berdasarkan id
	*/
	public function get_sekolah($id)
	{
		$hasil = $this->curl_post("admin/data_sekolah/list", array(
			"id" => $id
		));
		$data =	json_decode($hasil, true);
		return $data;
	}

	// public function sap_service

}

/* End of file Func_model.php */
/* Location: ./application/models/Func_model.php */