<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Priv extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('sess_check');
        $this->load->library('datatables');
        $this->load->model('list_model');
        if (!$this->sess_check->index()) {
            redirect('page/login');
        } else {
        }
    }
    public function index()
    {
        $query = $this->db->query("SELECT * FROM tbl_hadiah WHERE id NOT IN (SELECT is_pemenang FROM pengunjung) AND level > 0 ORDER BY id DESC");
        if ($query->num_rows() > 0) {
            $hadiah = "";

            foreach ($query->result() as $row) {
                $hadiah .= "<option value=" . $row->id . ">" . $row->hadiah . "</option>";
            }
        } else {
            $hadiah = "";
        }
        $data['hadiah'] = $hadiah;
        $this->load->view('view_priv');
        $this->load->view('view_priv_index', $data);
    }
    public function cek_undi()
    {
        $id_hadiah = $this->input->post('slchadiah');
        if ($id_hadiah <> 0) {
            $data['id_hadiah'] = $id_hadiah;
            // ambil hadiah yg belum ada pemenangnya
            $query = $this->db->query("SELECT * FROM tbl_hadiah WHERE id='" . $id_hadiah . "'");
            foreach ($query->result() as $row) {
                $data['hadiah'] = $row->hadiah;
                $data['foto'] = $row->foto;
            }

            $this->load->view('view_priv');
            $this->load->view('view_priv_cek_undi', $data);
        } else {
            redirect('priv/index');
        }
    }
    public function undi_fix($id_hadiah)
    {
        $code = $this->input->post("slcidpnt");
        $data = array('is_pemenang' => $id_hadiah);
        $this->db->where('code', $code);
        $this->db->update('pengunjung', $data);


        // Kirim WA pemenang di nonaktifkan untuk undian Umroh

        // ambil data pengunjung TRUS kirim notif ke WA
        $query = $this->db->query("SELECT * FROM pengunjung WHERE code='" . $code . "'");
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $telp = '+6282156471103';
				$simbol  = array('_', '-');
				$text = $row->nama;
				$alamat = $row->alamat;
				$kecamatan = $row->kecamatan;
				$kelurahan = $row->kelurahan;
				$ganti = str_replace($simbol," ",$text);
				$kapital = strtoupper($ganti);
        //         // $mess = " Bapak/Ibu " . $row->nama . ", selamat anda mendapatkan doorprize dari acara Pengajian dan Buka Puasa Bersama Busu Edi Damansyah - Gus Miftah, dengan kode konfirmasi: " . $row->code . ". Ini adalah pesan yang dikirim oleh sistem, mohon untuk tidak membalas pesan ini.";
                
        //         // $mess = " Bapak/Ibu " . $row->nama . ", selamat anda mendapatkan doorprize dari Booth Expo Merah Putih Diskominfo, dengan kode konfirmasi: " . $row->code . ". Silahkan kunjungi kami untuk dapat mengambil doorprize. Ini adalah pesan yang dikirim oleh sistem, mohon untuk tidak membalas pesan ini.Konfirmasi lebih lanjut dapat menghubungi Ibu Susanti di Nomor Telp 081254699299";
                
        //         // $this->load->model("model_wa");
		//         // $respon = $this->model_wa->get_token();
		//         // if($respon->users[0]->token <> ""){
		//         //       $hasil = $this->model_wa->bukuexpo_general($telp, $mess, $respon->users[0]->token);
		//         // }else{
		// 		// 	  echo "Token Not Found";
		//         // }
            }
        }
            // ambil hadiah yg belum ada pemenangnya
            $query = $this->db->query("SELECT * FROM tbl_hadiah WHERE id='" . $id_hadiah . "'");
            foreach ($query->result() as $row) {
                $datas['hadiah'] = $row->hadiah;
                $datas['foto'] = $row->foto;
            }
		

        $datas['pemenang'] = $kapital;
        $datas['telp']  = $telp;
        $datas['alamat']  = $alamat;
        $datas['kecamatan']  = $kecamatan;
        $datas['kelurahan']  = $kelurahan;
        $this->load->view('view_priv');
        $this->load->view('view_priv_undi_fix', $datas);
    }

    public function pemenang()
    {
        $query = $this->db->query("SELECT * FROM view_hadiah");
        $daftar = "";
		$simbol  = array('_', '-');
        foreach ($query->result() as $row) {
			$text = strtoupper($row->nama);
			$ganti = str_replace($simbol," ",$text);
			$kapital = ($ganti);
            $daftar .= "<tr><td><img width='50px' class='text-center rounded mb-1'
			src=".base_url("assets/dist/img/prize/".$row->foto). "><br>".$row->hadiah."
			<td>" . $kapital . "</td>
			<td>" . $row->nik . "</td>
			<td>" . $row->code . "</td>
			<td>" . $row->telp . "</td>
			<td><small>" . $row->alamat . $row->kelurahan . $row->kecamatan. "</small></td></tr>";
        }
        $data['daftar'] = $daftar;
        $this->load->view('priv_hadiah', $data);
    }

    function pendaftar(){
        $x['pengunjung']=$this->list_model->get_list();
        $this->load->view('page_list',$x);
    }
   
    function get_json() { //get product data and encode to be JSON object
        header('Content-Type: application/json');
        echo $this->list_model->get_all_list();
    }
   
    function save(){ //insert record method
        $this->list_model->insert_list();
        redirect('list');
    }
   
    function update(){ //update record method
        $this->list_model->update_list();
    }
   
    function delete(){ //delete record method
        $this->list_model->delete_list();
        redirect('list');
    }

}
