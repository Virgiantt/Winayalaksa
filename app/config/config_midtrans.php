<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config["card_number"] = "4811111111111114";

// $env = parse_ini_file(str_replace("/api", "", str_replace("\api", "", FCPATH)) . ".env.production");

$config["card_exp_month"] = "2";
$config["card_exp_year"] = "2025";
$config["card_cvv"] = "123";
// $config["callback"] = "MidtransNew3ds.callback";
// $config["client_key"] = "SB-Mid-client-BxFFL0PcSrDj5Mvp&";
$config["client_key"] = env('midtrans_client_key');
// $config["server_key"] = "SB-Mid-server-No2z35Wz_TvP9ViA1V0wJxPD";
$config["server_key"] = env('midtrans_server_key');
$config["server_iris_key"] = env('midtrans_iris_server_key');
$config["approver_key"] = env('midtrans_iris_approver_key');

