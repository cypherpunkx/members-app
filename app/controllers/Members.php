<?php

class Members extends Controller
{
    public function index()
    {
        $data['title'] = 'Members';
        $data['members'] = $this->model('Members_model')->getMembers();
        $this->view('templates/header', $data);
        $this->view('members/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {

        $data['title'] = 'Member Detail';
        $data['members'] = $this->model('Members_model')->getMember($id);
        $this->view('templates/header', $data);
        $this->view('members/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Members_model')->addMember($_POST) > 0) {
            Flasher::setFlash('Added success', 'data has been created', 'success');
            header('Location: ' . BASEURL . 'members');
            exit;
        } else {
            Flasher::setFlash('added fail', 'failed', 'danger');
            header('Location: ' . BASEURL . 'members');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Members_model')->deleteMember($id) > 0) {
            Flasher::setFlash('Deleted success', 'data has been deleted', 'warning');
            header('Location: ' . BASEURL . 'members');
            exit;
        } else {
            Flasher::setFlash('Deleted fail', 'failed', 'danger');
            header('Location: ' . BASEURL . 'members');
            exit;
        }
    }

    public function getUpdate()
    {
        echo json_encode($this->model('Members_model')->getMember($_POST['id']));
    }

    public function update()
    {
        if ($this->model('Members_model')->updateMember($_POST) > 0) {
            Flasher::setFlash('Updated success', 'data has been update', 'success');
            header('Location: ' . BASEURL . 'members');
            exit;
        } else {
            Flasher::setFlash('Updated fail', 'failed', 'danger');
            header('Location: ' . BASEURL . 'members');
            exit;
        }
    }

    public function search()
    {
        $data['title'] = 'Members';
        $data['members'] = $this->model('Members_model')->searchMembers($_POST);
        $this->view('templates/header', $data);
        $this->view('members/index', $data);
        $this->view('templates/footer');
    }
}
