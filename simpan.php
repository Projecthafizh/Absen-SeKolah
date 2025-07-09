<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
  echo json_encode(["status" => "error", "message" => "Data kosong"]);
  exit;
}

$file = 'data.json';
$existingData = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$existingData[] = $data;

file_put_contents($file, json_encode($existingData, JSON_PRETTY_PRINT));

echo json_encode(["status" => "success", "message" => "Data berhasil disimpan"]);