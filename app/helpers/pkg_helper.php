<?php

if (!function_exists('app_url')) {
  function app_url($url = '')
  {
    return strip_slash(str_replace('api', '', base_url()) . $url);
  }
}

if (!function_exists('strip_slash')) {
  function strip_slash($text)
  {
    return preg_replace('/([^:])(\/{2,})/', '$1/', $text);
  }
}


if (!function_exists('slugify')) {
  function slugify($text)
  {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = preg_replace('~[^-\w]+~', '', $text);

    $text = trim($text, '-');

    $text = preg_replace('~-+~', '-', $text);

    $text = strtolower($text);

    return $text;
  }
}


if (!function_exists('make_pagination')) {
  function make_pagination($jml_data, $limit = 10, $page = 1)
  {
    $limit = !empty($limit) ? (int)$limit : 10;
    $page = !empty($page) ? (int)$page : 1;

    $jumlah_data = floatval($jml_data);
    $limit = floatval($limit);
    $jumlah_halaman = @ceil($jumlah_data / $limit);

    $start = ($limit * $page) - $limit;

    $start_plus = $start + 1;

    $show = "$start_plus - $limit";

    if ($start >= $limit || $jumlah_data < $limit) {
      $show = "$start_plus - $jumlah_data";
    }

    $page = (int)$page;

    $result['status'] = true;
    $result['mulai'] = $start;
    $result['limit'] = $limit;
    $result['halaman_aktif'] = $page;
    $result['jml_data'] = $jumlah_data;
    $result['jml_halaman'] = $jumlah_halaman;
    if ($page > $jumlah_halaman) {
      $result['info_halaman'] = "Menampilkan 0 - 0 dari $jumlah_halaman Halaman";
    } else {
      $result['info_halaman'] = "Menampilkan $show dari $jumlah_halaman Halaman";
    }

    if ($jumlah_data == 0) {
      $result['halaman_aktif'] = 0;
      $result['status'] = false;
      $result['info_halaman'] = "Tidak ada info";
    }

    if (empty($limit) || empty($page)) {
      $result['halaman_aktif'] = 0;
      $result['status'] = false;
      $result['info_halaman'] = "Tidak ada info";
    }
    return $result;
  }
}


// if(!function_exists('set_aktivitas')) {
//   function set_aktivitas($user_id)
//   {
//     $env = parse_ini_file(str_replace("\api", "", str_replace("/api", "", FCPATH)).".env.production");
//     $ci =& get_instance();
//     $url = str_replace('api/', '', $env['api_url']);
//     $headers = getallheaders();
//     $data['user_id'] = $user_id;
//     $data['url'] = str_replace($url,'',$headers['Referer']);
//     // $data['title'] = $headers['page_title'];
//     $data['ip_address'] = $ci->input->ip_address();
//     $data['kode'] = make_aktivitas_code();
//     // $ci->db->insert('data_aktivitas',$data);
//     return $ci->Func->set_aktivitas($data);
//   }
//   function make_aktivitas_code()
//   {
//     return strtoupper('A-'.uniqid());
//   }
// }


if (!function_exists('request_handle')) {
  function request_handle($text)
  {
    $ci = &get_instance();
    return $ci->db->escape_str($text);
  }
}

if (!function_exists('request_handlers')) {
  function request_handlers($array = '')
  {
    if (is_array($array)) {
      $no = 0;
      $result = [];
      foreach ($array as $key => $value) {
        $result[$key] = request_handle($value);
      }
      return $result;
    } else {

      return request_handle($array);
    }
  }
}

if (!function_exists('generate_token')) {
  function crypto_rand_secure($min, $max)
  {
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
      $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
      $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
  }

  function generate_token($length = 181)
  {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet);
    // md5(uniqid(rand(), true))
    for ($i = 0; $i < $length; $i++) {
      $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
    }
    return $token;
  }

  if (!function_exists('generate_id')) {
    function generate_id($length = 5)
    {
      mt_srand((float)microtime() * 10000);
      $charid = strtoupper(md5(uniqid(rand(), true)));
      $hyphen = chr(45);
      $uuid = substr($charid, 0, 8) . $hyphen;

      $ind = [
        0 => substr($charid, 8, 4),
        1 => substr($charid, 12, 6),
        2 => substr($charid, 16, 8),
        3 => substr($charid, 20, 10),
        4 => substr($charid, 24, 12)
      ];

      if ($length > 5) {
        $length = 5;
      }

      for ($i = 0; $i < $length; $i++) {
        $uuid .= $ind[$i];
        if ($i !== ($length - 1)) {
          $uuid .= $hyphen;
        }
      }

      return strtolower($uuid);
    }
  }

  function log_agregasi($data, $response, $url)
  {
    $ci = &get_instance();
    return $ci->db->insert("log_agregasi", ["data" => $data, "response" => $response, "url" => $url]);
  }
  /* agregasi*/
}



if (!function_exists('upload_base64')) {
  function upload_base64($path_upload, $file_base64)
  {
    $tipe = explode(';base64,', $file_base64);
    $tipe = explode('data:', $tipe[0]);
    $image = explode('image/', $tipe[1]);
    if (isset($image[1])) {
      $format_file = 'jpg';
      if ($image[1] == 'png') {
        $format_file = 'png';
      }
      // $tipe = $image;
    } else {
      $format_file = 'pdf';
      // $tipe = explode('application/',$tipe[1]);
    }
    $file_base64 = str_replace('data:' . $tipe[1] . ';base64,', '', $file_base64);
    $file_base64 = str_replace(' ', '+', $file_base64);
    $decode_data = base64_decode($file_base64);

    $ci = &get_instance();

    $filename = $ci->Func->guid() . '.' . $format_file;

    $lokasi_upload = FCPATH . "/$path_upload/";

    if (!file_exists(strip_slash($lokasi_upload))) {
      mkdir(strip_slash($lokasi_upload), 0777, true);
    }

    $lokasi_file_baru = $lokasi_upload . $filename;

    $upload = file_put_contents($lokasi_file_baru, $decode_data);

    if ($upload) {
      $res = [
        'status' => true,
        'path' => strip_slash($path_upload . '/' . $filename)
      ];
    } else {
      $res = [
        'status' => false,
        'path' => strip_slash($path_upload . '/' . $filename)
      ];
    }
    return $res;
  }

  function nama_sekolah($user_id)
  {

    $ci = &get_instance();
    $ci->db->select('nama');
    $ci->db->from('data_user_sekolah');
    $ci->db->where('user_id', $user_id);
    $sql = $ci->db->get()->row_array();
    return $sql['nama'];
  }


  function nama_penyedia($user_id)
  {

    $ci = &get_instance();
    $ci->db->select('nama_toko');
    $ci->db->from('data_user_mitra');
    $ci->db->join('data_user', 'data_user_mitra.user_id = data_user.id');
    $ci->db->where('data_user.id', $user_id);
    $sql = $ci->db->get()->row_array();
    return $sql['nama_toko'];
  }


  function sekolah_id($user_id)
  {

    $ci = &get_instance();
    $ci->db->select('sekolah_id');
    $ci->db->from('data_user');
    $ci->db->where('data_user.id', $user_id);
    $sql = $ci->db->get()->row_array();
    return $sql['sekolah_id'];
  }
}


if (!function_exists('upload_file_from_url')) {
  function upload_file_from_url($url, $path_upload, $prefix = '')
  {

    $filename = $prefix . '-' . generate_id(4) . '.jpg';

    $lokasi_upload = FCPATH . "/$path_upload/";

    if (!file_exists(strip_slash($lokasi_upload))) {
      mkdir(strip_slash($lokasi_upload), 0777, true);
    }

    $lokasi_file_baru = $lokasi_upload . $filename;

    $upload = file_put_contents($lokasi_file_baru, file_get_contents($url));

    if ($upload) {
      $res = [
        'status' => true,
        'path' => strip_slash($path_upload . '/' . $filename)
      ];
    } else {
      $res = [
        'status' => false,
        'path' => strip_slash($path_upload . '/' . $filename)
      ];
    }
    return $res;
  }
}
