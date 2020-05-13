<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('image_lib');
	}

	public function index()
	{

		if ($this->input->post('submit')) {
			$nmfile 						= time();
			$config['file_name'] 			= $nmfile;
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		          Gagal upload foto!
		        </div>');
				redirect(base_url());
			}
			else{
				// KOMPRESS
				$upload 	= $this->upload->data('file_name');
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/'.$upload;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['height'] = '800';
				$config['width'] = '800';

				// WATERMARK
				if ($this->input->post('watermark') == 1) {
			        $config['wm_type'] = 'overlay';
			        $config['wm_overlay_path'] = './uploads/wm.png'; //the overlay image
			        $config['wm_opacity'] = 50;
			        $config['wm_vrt_alignment'] = 'middle';
			        $config['wm_hor_alignment'] = 'center';
				}

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->watermark();


				// CREATE THUMBNAIL
				$upload 				= $this->upload->data('file_name');
				$con['image_library'] 	= 'gd2';
				$con['source_image'] 	= './uploads/'.$upload;
				$con['create_thumb'] 	= TRUE;
				$con['maintain_ratio'] 	= TRUE;
				$con['thumb_marker'] 	= '';
				$con['height'] 			= '200';
				$con['width'] 			= '200';
				$con['new_image'] 		= './thumbnails/';

			    $this->image_lib->initialize($con);
			    $this->image_lib->resize();

				$this->db->insert('foto', array('foto' => $upload));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		          Upload foto berhasil!
		        </div>');
				redirect(base_url());
			}
		}
		$data['foto'] = $this->db->order_by('id', 'desc')->limit(12)->get('foto')->result();
		$this->load->view('index', $data);
	}

	public function detail($id)
	{
		$data['foto'] = $this->db->get_where('foto', array('id' => $id))->row();
		$this->load->view('detail', $data);
	}
	public function delete($id)
	{
		$data = $this->db->get_where('foto', array('id' => $id))->row();
		$foto = $data->foto;
		unlink('./uploads/'.$foto);
		unlink('./thumbnails/'.$foto);
		$this->db->delete('foto', array('id' => $data->id));
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Berhasil dihapus!
        </div>');
		redirect(base_url());
	}
	public function delete_all()
	{
		$data = $this->db->get('foto')->result();
		foreach ($data as $foto) {
			unlink('./uploads/'.$foto->foto);
			unlink('./thumbnails/'.$foto->foto);
			$this->db->delete('foto', array('id' => $foto->id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	          Semua data berhasil dihapus!
	        </div>');
			
		}
		redirect(base_url());
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */