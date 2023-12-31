<?php

class Anggota extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_backend');
		$this->load->model('M_transaksi');
		$this->load->model('M_akuntansi');
		$this->load->model('M_laporan');
		$this->load->model('M_akuntansi');
		$this->load->model('UserModel');
		$this->load->helper('authlogin');
		$this->load->library('form_validation');
		anggota();
	}

	public function index()
	{
		$id_anggota = $_SESSION['id_anggota'];
		$data['user'] = $_SESSION['nama'];
		$data['id_anggota'] = $id_anggota;
		$data['simpanan'] = $this->M_backend->count_simpanan_anggota($id_anggota);
		$pinjaman = $this->M_backend->count_pinjaman_anggota($id_anggota);

		if ($pinjaman==NULL) {
			$data['pinjaman'] = 0;
		}
		else{
			$id_pinjaman = $pinjaman['id_pinjaman'];
			$nominal = $pinjaman['pinjaman'];
			$angsuran = $this->M_backend->count_angsuran_anggota($id_pinjaman);
			$data['pinjaman'] = $nominal - $angsuran['angsuran'];
		}

		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('anggota/v_koperasi_anggota', $data);
		$this->load->view('tempanggota/footer');
	}

	// this function for change password user
	public function ubah_password()
	{
		$data['user'] = $_SESSION['nama'];
		$data['judul'] = "Ubah Password";
		$id_anggota = $_SESSION['id_anggota'];
		$data['dataAnggota'] =  $this->UserModel->getAnggotaArray($id_anggota);

		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('master-data/v_ubah_password_anggota', $data);
		$this->load->view('tempanggota/footer');
	}

	// this function for process 'ubah_password'
	public function proses_ubah_password()
	{
		$data['user'] = $_SESSION['nama'];
		$data['judul'] = "Ubah Password";
		$id_anggota = $_SESSION['id_anggota'];
		$data['dataAnggota'] =  $this->UserModel->getAnggotaArray($id_anggota);

		$this->form_validation->set_rules('passwordLama', 'Password Lama', 'required');
		$this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|min_length[3]|matches[ulangPasswordBaru]');
		$this->form_validation->set_rules('ulangPasswordBaru', 'Ulang Password Baru', 'required|min_length[3]|matches[passwordBaru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('tempanggota/header');
			$this->load->view('tempanggota/sidebar', $data);
			$this->load->view('master-data/v_ubah_password_anggota', $data);
			$this->load->view('tempanggota/footer');
		} else {
			$passwordLama = $this->input->post('passwordLama');
			$passwordBaru = $this->input->post('passwordBaru');
			// validate old password, user must know old password
			if (md5($passwordLama) != $data['dataAnggota']['password']) {
				$this->session->set_flashdata('pesan_sukses', 'Isikan password lama dengan benar!');
				redirect('anggota/ubah_password');
			} else {
				// 	// new password must not equal with old password
				if ($passwordLama == $passwordBaru) {
					$this->session->set_flashdata('pesan_sukses', 'Password baru sama dengan password lama!');
					redirect('anggota/ubah_password');
				} else {
					// insert password to database
					$md5_Password = md5($passwordBaru);
					$this->session->set_flashdata('pesan_sukses', 'Berhasil merubah password');
					$this->UserModel->ubahPassword($data['dataAnggota']['id_anggota'], $md5_Password);
					redirect('anggota');
				}
			}
		}
	}

	//====================================================MENAMPILKAN TRANSAKSI=========================================================
	public function tampil_simpanan()
	{
		$data['user'] = $_SESSION['nama'];
		$data['judul'] = "Simpanan Anggota";
		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('anggota/v_laporan_simpanan_anggota', $data);
		$this->load->view('tempanggota/footer');
	}

	public function lihat_simpanan_anggota()
	{
		$data['user'] = $_SESSION['nama'];
		$data['id'] = $_SESSION['id_anggota'];
		$data['tahun'] = $this->input->post('tahun');

		$id_anggota = $_SESSION['id_anggota'];
		$data['anggota'] = $this->M_laporan->tampil_simpanan_anggota($id_anggota);
		$data['anggota1'] = $this->M_laporan->tampil_simpanan_anggota1($id_anggota);

		if (strlen($data['tahun']) > 4) {
			$this->session->set_flashdata('pesan_error', 'Isikan tahun dengan benar!');
			redirect('anggota/tampil_simpanan');
		}

		if ($data['anggota'] == NULL) {
			$anggota = $this->M_backend->get_id_anggota($id_anggota);
			$flag = array();
			array_push($flag, array("tahun" => $this->input->post('tahun'), "id_anggota" => $anggota['id_anggota'], "nama" => $anggota['nama'], "simpanan_pokok" => 0, "simpanan_wajib" => 0, "simpanan_sukarela" => 0, "simpanan_lebaran" => 0));
			$data['anggota'] = $flag;
		}

		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('anggota/v_lihat_simpanan_anggota', $data);
		$this->load->view('tempanggota/footer');
	}

	public function tampil_pinjaman()
	{
		$data['user'] = $_SESSION['nama'];
		$data['judul'] = "Pinjaman Anggota";
		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('anggota/v_laporan_pinjaman_anggota', $data);
		$this->load->view('tempanggota/footer');
	}

	public function lihat_pinjaman_anggota()
	{
		$data['user'] = $_SESSION['nama'];
		$data['id'] = $_SESSION['id_anggota'];
		$data['tahun'] = $this->input->post('tahun');
		$id_anggota = $_SESSION['id_anggota'];
		$data['anggota'] = $this->M_laporan->tampil_pinjaman_anggota($id_anggota);

		if (strlen($data['tahun']) > 4) {
			$this->session->set_flashdata('pesan_error', 'Isikan tahun dengan benar!');
			redirect('anggota/tampil_simpanan');
		}

		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('anggota/v_lihat_pinjaman_anggota', $data);
		$this->load->view('tempanggota/footer');
	}

	public function lihat_angsuran_anggota()
	{
		$data['user'] = $_SESSION['nama'];
		$data['id'] = $_SESSION['id_anggota'];
		$id_anggota = $_SESSION['id_anggota'];

		$data['angsuran'] = $this->M_laporan->lihat_angsuran_anggota($id_anggota);

		$this->load->view('tempanggota/header');
		$this->load->view('tempanggota/sidebar', $data);
		$this->load->view('anggota/v_lihat_angsuran_anggota', $data);
		$this->load->view('tempanggota/footer');
	}
	//================================================END MENAMPILKAN TRANSAKSI===========================================================


	//====================================================KALKULATOR SIMULASI===========================================================
	public function sim_simpanan()
	{

		$data['user'] = $_SESSION['nama'];
		$data['judul'] = "Simulasi Simpanan";

		$this->form_validation->set_rules('simpanan', 'Simpanan', 'required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');

		if ($this->form_validation->run() ==  FALSE) {
			$data['simpanan'] = 0;
			$data['terima'] = 0;
			$data['jatuh_tempo'] = 0;
			$data['total'] = 0;
			$this->load->view('tempanggota/header');
			$this->load->view('tempanggota/sidebar', $data);
			$this->load->view('anggota/v_sim_simpanan', $data);
			$this->load->view('tempanggota/footer');
		} else {
			$simpanan = $this->input->post('simpanan');
			$bulan = $this->input->post('bulan');
			$b = $this->input->post('bunga');
			$bunga = $b / 100;
			$data['simpanan'] = $simpanan;

			if ($bulan != 12) {
				$temp = $bulan / 12 * $bunga;
				$data['terima'] = ceil($simpanan / $bulan * $temp);
				$data['jatuh_tempo'] = $simpanan + ceil($simpanan / $bulan * $temp);
				$data['total'] = ceil($simpanan + ($simpanan * $temp));
			} else {
				$data['terima'] = ceil($simpanan / $bulan * $bunga);
				$data['jatuh_tempo'] = $simpanan + ceil($simpanan / $bulan * $bunga);
				$data['total'] = ceil($simpanan + ($simpanan * $bunga));
			}

			$this->load->view('tempanggota/header');
			$this->load->view('tempanggota/sidebar', $data);
			$this->load->view('anggota/v_sim_simpanan', $data);
			$this->load->view('tempanggota/footer');
		}
	}

	public function sim_pinjaman()
	{

		$data['user'] = $_SESSION['nama'];
		$data['judul'] = "Simulasi Pinjaman";

		$this->form_validation->set_rules('pinjaman', 'Pinjaman', 'required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');

		if ($this->form_validation->run() ==  FALSE) {
			$data['bayar'] = 0;
			$data['pinjaman'] = 0;
			$this->load->view('tempanggota/header');
			$this->load->view('tempanggota/sidebar', $data);
			$this->load->view('anggota/v_sim_pinjaman', $data);
			$this->load->view('tempanggota/footer');
		} else {
			$pinjaman = $this->input->post('pinjaman');
			$bulan = $this->input->post('bulan');
			$bunga = $this->input->post('bunga');

			$bayar = ceil(($pinjaman / $bulan) + ($pinjaman * $bunga / 100));
			$data['bayar'] = angka_pembulatan($bayar, 4, 10000);
			$data['pinjaman'] = $pinjaman;

			$this->load->view('tempanggota/header');
			$this->load->view('tempanggota/sidebar', $data);
			$this->load->view('anggota/v_sim_pinjaman', $data);
			$this->load->view('tempanggota/footer');
		}
	}

	//================================================END KALKULATOR SIMULASI===========================================================
}
