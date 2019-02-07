<?php

const MAX_FILE_SIZE = 100000;

function isValidImageType(string $imageType):bool
{
  return $imageType === 'image/jpeg' || $imageType === 'image/png';
}

$hasImage = isset($_FILES) && isset($_FILES['image']);
if ($hasImage) {
 
  $image = $_FILES['image'];
 
  if ($image['size'] > MAX_FILE_SIZE) {
    die('error');
  }

  $imageType = $image['type'];
 
  if (isValidImageType($imageType)) {
    $imageFormat = explode('.', $image['name']);
    $imageFormat = $imageFormat[1];
    $imageFullName = './images/' . hash('crc32',time()) . '.' . $imageFormat;
    if (move_uploaded_file($image['tmp_name'],$imageFullName)) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
}
