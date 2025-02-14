<?php

namespace App\Controllers;

use App\Models\BannerModel;
use CodeIgniter\RESTful\ResourceController;

class BannerController extends ResourceController
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }
    public function index()
    {

        $bannerModel = new BannerModel();
        return $this->respond($bannerModel->findAll());
    }

    public function show($id=null)
    {
        //die('---');
        if ($id === null) {
            return $this->failNotFound('No ID provided');
        }
        $bannerModel = new BannerModel();
        $banner = $bannerModel->find($id);

        if (!$banner) {
            return $this->failNotFound('Banner not found');
        }

        $banner['image_url'] = base_url('uploads/banners/' . $banner['image']); // Convert image path to URL

        return $this->respond($banner);
    }

}
