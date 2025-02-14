<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class BannerController extends BaseController
{
    public function index()
    {
        $bannerModel = new BannerModel();
        $data['banners'] = $bannerModel->findAll();
        return view('admin/banners/index', $data);
    }

    public function create()
    {
        return view('admin/banners/create');
    }

    public function store()
    {
        $bannerModel = new BannerModel();
        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/banners', $newName);
        } else {
            return redirect()->back()->with('error', 'Invalid file upload.');
        }

        $bannerModel->save([
            'image' => $newName,
            'link' => $this->request->getPost('link'),
            'alt_text' => $this->request->getPost('alt_text'),
            'width' => $this->request->getPost('width'),
            'height' => $this->request->getPost('height'),
            'position' => $this->request->getPost('position'),
        ]);

        return redirect()->to('/');
    }


    public function edit($id)
    {
        $bannerModel = new BannerModel();
        $data['banner'] = $bannerModel->find($id);
        return view('admin/banners/edit', $data);
    }

    public function update($id)
    {
        $bannerModel = new BannerModel();
        $file = $this->request->getFile('image');
        $banner = $bannerModel->find($id);
        
        if ($file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if (file_exists('uploads/banners/' . $banner['image'])) {
                unlink('uploads/banners/' . $banner['image']);
            }
            
            // Save new file
            $newName = $file->getRandomName();
            $file->move('uploads/banners', $newName);
        } else {
            $newName = $banner['image']; // Keep old image if no new upload
        }

        $bannerModel->update($id, [
            'image' => $newName,
            'link' => $this->request->getPost('link'),
            'alt_text' => $this->request->getPost('alt_text'),
            'width' => $this->request->getPost('width'),
            'height' => $this->request->getPost('height'),
            'position' => $this->request->getPost('position'),
        ]);

        return redirect()->to('/');
    }


    public function delete($id)
    {
        $bannerModel = new BannerModel();
        $bannerModel->delete($id);
        return redirect()->to('/');
    }
}
