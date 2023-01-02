<?php

class About extends Controller
{

    public function index($nama = "Rafly Mahendra", $profesi = "Web Developer")
    {
        $data['nama'] = $nama;
        $data['profesi'] = $profesi;
        $data['title'] = 'About';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['title'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
