<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
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
    // public function index()
    // {
    //     $query = $this->db->query("SELECT avg(rating) as rating FROM pengunjung");
    //     foreach ($query->result() as $row) {
    //         $data['rating'] = $row->rating;
    //     }
    //     $this->load->view('page_index', $data);
    // }
    function __construct()
	{
        parent::__construct();
        $this->load->model('list_model');
	}
    public function tampil()
    {
        $this->load->view('page_tampil');
    }
    public function rekap()
    {
        $query = $this->db->query("SELECT COUNT( pengunjung.jam ) AS jml FROM pengunjung");
        foreach ($query->result() as $row) {
            $data['jml'] = $row->jml;
        }
        $this->load->view('page_rekap', $data);
    }

    public function prosesnik(){
		// POST data
		$nik = $this->input->post('nik');
		// get data
		$data = $this->list_model->get_nik($nik);
		echo json_encode($data);
   }

   public function ceknik(){
    $this->load->view('page_ceknik');
}

    public function login()
    {
        $data['info'] = "";
        $this->load->view('view_main');
        $this->load->view('view_main_index', $data);
    }
    public function cek_login()
    {
        $token = $this->input->post('token');
        // call curl to POST request RECAPTCHA v3

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => '6Lec2KYpAAAAAFsaf1htoNZWKJ6OPV8sQlG8PUh-', 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);

        if ($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
            $this->load->helper('security');
            $this->form_validation->set_rules('txtusername', 'Email', 'trim|required|min_length[5]|valid_email');
            $this->form_validation->set_rules('txtpassword', 'Password', 'trim|required|min_length[5]|sha1');


            if ($this->form_validation->run() == FALSE) {
                $data['info']                 = "<div class=\"callout callout-danger\">" . validation_errors() . "</div>";
                $this->load->view('view_main');
                $this->load->view('view_main_index', $data);
                //$this->load->view('view_footer');

            } else {
                $query = $this->db->query("SELECT * FROM tbl_login WHERE username='" . $this->input->post('txtusername') . "' and password='" . $this->input->post('txtpassword') . "'");
                if ($query->num_rows() == 1) {
                    foreach ($query->result() as $row) {
                        $sess_data = array(
                            'sess_i' => $row->id,
                            'sess_l' => $row->level,
                            'sess_e' => md5($row->id . $row->level)
                        );
                        $this->session->set_userdata($sess_data);
                        redirect('priv/index');
                    }
                } else {
                    $data['info']                 = "<div class=\"callout callout-danger\">Username dan Password tidak bersesuaian</div>";
                    $this->load->view('view_main');
                    $this->load->view('view_main_index', $data);
                    //$this->load->view('view_footer');

                }
            }
        } else {
            $data['info']                 = "<div class=\"callout callout-danger\">PROTECTED</div>";
            $this->load->view('view_main');
            $this->load->view('view_main_index', $data);
            //$this->load->view('view_footer');
        }
    }
    public function qr2()
    {
        $ch = curl_init();

        // dimatikan dl
        //curl_setopt($ch, CURLOPT_URL, base_url('index.php/page/rand_me'));
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_exec($ch);
        //curl_close($ch);

        $query = $this->db->query("SELECT avg(rating) as rating FROM pengunjung");
        foreach ($query->result() as $row) {
            $data['rating'] = $row->rating;
        }

        $query = $this->db->query("SELECT code FROM tbl_token WHERE is_aktif='1'");
        foreach ($query->result() as $row) {
            $data['code_qr'] = $row->code;
        }
        $this->load->view('page_qr', $data);
    }
    public function index()
    {
        $ch = curl_init();

        // DIMATIKAN DL
        //curl_setopt($ch, CURLOPT_URL, base_url('index.php/page/rand_me'));
       // curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_exec($ch);
        //curl_close($ch);

        $query = $this->db->query("SELECT avg(rating) as rating FROM pengunjung");
        foreach ($query->result() as $row) {
            $data['rating'] = $row->rating;
        }

        $query = $this->db->query("SELECT code FROM tbl_token WHERE is_aktif='1'");
        foreach ($query->result() as $row) {
            $data['code_qr'] = $row->code;
        }
        
        $querynews = $this->db->query("SELECT nama, kesan FROM pengunjung");
        $kesan = "";
        foreach ($querynews->result() as $rownews) {
            $kesan .= "****".substr($rownews->nama,3,strlen($rownews->nama)).": ".$rownews->kesan." <span class=\"on\"><i class=\"fa fa-star\"></i></span> ";
        }
        $data['kesan'] = $kesan;
        $this->load->view('page_qr', $data);
    }
    public function daftar($token = null)
    {
        if ($token <> "") {
            //cek token status
            $data['secret'] = $token;
            $query = $this->db->query("SELECT id FROM tbl_token WHERE token='" . $token . "'");
            //echo "SELECT id FROM tbl_token WHERE token='" . $token . "'";
            if ($query->num_rows() > 0) {
                $this->load->view('page_daftar', $data);
            } else {
                $this->load->view('page_expired');
            }
        } else {
            $this->load->view('page_expired');
        }
    }
    public function rand_me()
    {
        $query = $this->db->query("SELECT code FROM tbl_token");
        $rand_token = array();
        foreach ($query->result() as $row) {
            $rand_token[] = $row->code;
        }
        $code = $rand_token[array_rand($rand_token)];
        //nol kan dulu semua
        $data = array('is_aktif' => '0');
        $this->db->update('tbl_token', $data);
        // is_aktif = 1 sesuai code
        $data2 = array('is_aktif' => '1');
        $this->db->where('code', $code);
        $this->db->update('tbl_token', $data2);
    }
    public function cek_daftar()
    {
        $token = $this->input->post('token');
        $this->config->set_item('language', 'indo');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => '6LeXAZIUAAAAAJIATj6gPmm5BoIK0XrE2JYqTCl4', 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);

       // if ($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.2) {
            if ($this->input->post('secret') <> "") {
                // cek dl tokennya masih aktif apa enggak
                $query = $this->db->query("SELECT id FROM tbl_token WHERE token='" . $this->input->post('secret') . "'");
                if ($query->num_rows() == 1) {
                    $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|exact_length[16]');
                    $this->form_validation->set_rules('txtnama', 'Nama Lengkap', 'trim|required|min_length[3]');
                    $this->form_validation->set_rules('txttelp', 'Nomor Telepon', 'trim|required|min_length[10]');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata('info', "<div class=\"alert alert-danger\"><small><b>Gagal!</b><br>" . validation_errors() . "</small></div>");
                        redirect('page/daftar/' . $this->input->post('secret'));
                    } else {
                        if (substr($this->input->post('txttelp'), 0, 1) == "0") {
                            $telp = "+62" . substr($this->input->post('txttelp'), 1, strlen($this->input->post('txttelp')) - 1);
                        } else {
                            $telp = $this->input->post('txttelp');
                        }
                            $nik = $this->input->post('nik');
                        
                        $query = $this->db->query("SELECT id FROM pengunjung WHERE nik='" . $nik . "'");
                        if ($query->num_rows() == 0) {
                            $code = "";

                            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            for ($i = 1; $i < 6; $i++) {
                                $code .= $characters[rand(0, strlen($characters) - 1)];
                            }
                            $tanggal = date('Y-m-d');
                            $jam = date('H:i:s');
                            $data = [
                                'id' => null,
                                'nik' => $this->input->post('nik'),
                                'nama' => $this->input->post('txtnama'),
                                'alamat' => $this->input->post('alamat'),
                                'kecamatan' => $this->input->post('kecamatan'),
                                'kelurahan' => $this->input->post('kelurahan'),
                                'rt' => $this->input->post('rt'),
                                'telp' => $telp,
                                'code' => $code,
                                'is_pemenang' => '0',
                                'tanggal' => $tanggal,
                                'jam'   => $jam,
                                'kunj'  => date('H')
                            ];
                            $query = $this->db->insert('pengunjung', $data);

                            $lastId = $this->db->insert_id();
                            $kode['id'] = $lastId;
                            $kode['nama'] = $this->input->post('txtnama');
                            $kode['code'] = $code;
                            $kode['tanggal'] = $tanggal;
                            $kode['jam'] = $jam;

                            $this->load->view('page_success', $kode);
                            
                            // $mess = "Selamat datang Bapak/Ibu, terima kasih atas kehadirannya di Pengajian & Buka Puasa Bersama Busu Edi Damansyah - Gus Miftah.
                            // Anda berkesempatan mendapatkan hadiah doorprize yang akan diundi pada akhir acara. (Ini adalah pesan yang dikirim oleh sistem, mohon untuk tidak membalas pesan ini.)."; //temporary   
                            
                            $mess = "Terima kasih Sdr/i *".$this->input->post('txtnama')."* atas kehadirannya di acara Pengajian & Buka Puasa Bersama *Busu Edi Damansyah - Gus Miftah*. Anda berkesempatan mendapatkan hadiah doorprize yang akan diundi pada akhir acara. Dengan nomor pendaftaran : *" .$lastId. "*, dan kode undian : *" .$code."*.  _`(Ini adalah pesan yang dikirim oleh sistem, mohon untuk tidak membalas pesan ini.).`_";

                            //preview WA
                            //"Terima kasih Sdr/i *Nama* atas kehadirannya di acara Pengajian & Buka Puasa Bersama dengan *Busu Edi Damansyah - Gus Miftah*. Anda berkesempatan mendapatkan hadiah doorprize yang akan diundi pada akhir acara. Dengan nomor pendaftaran : *1234*, dan kode undian : *QWERTY*  _``(Ini adalah pesan yang dikirim oleh sistem, mohon untuk tidak membalas pesan ini.).`_";
		                     
		                    $this->load->model("model_wa");
		                    $respon = $this->model_wa->get_token();
		                    if($respon->users[0]->token <> ""){
		                        $hasil = $this->model_wa->bukuexpo_general($telp, $mess, $respon->users[0]->token);
		                    }else{
		                        
		                        echo "Token Not Found";
		                    }
                        } else {
                            $this->load->view('page_expired');
                        }
                    }
                } else {
                    $this->load->view('page_expired');
                }
            } else {
                $this->load->view('page_expired');
            }
            
       // } else {
           // $this->load->view('page_expired');
       //    echo "PROTECTED";
      //  }
    }
    public function pengunjung()
    {

        $B = "[";
        $C = "[";
        $D = "[";
        $E = "[";
        $F = "[";
        $G = "[";
        $A = "[";
        $jamkunj = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'];

        //TANGGAL 2022-01-26
        foreach ($jamkunj as $key) {
            $queryA = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-26' and kunj='" . $key . "'");
            foreach ($queryA->result() as $rowA) {
                $A .= $rowA->jumlah . ",";
            }
        }
        $A = substr($A, 0, strlen($A) - 1) . "]";
        //TANGGAL 2022-01-27
        foreach ($jamkunj as $key) {
            $queryB = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-27' and kunj='" . $key . "'");
            foreach ($queryB->result() as $rowB) {
                $B .= $rowB->jumlah . ",";
            }
        }
        $B = substr($B, 0, strlen($B) - 1) . "]";
        //TANGGAL 2022-01-28
        foreach ($jamkunj as $key) {
            $queryC = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-28' and kunj='" . $key . "'");
            foreach ($queryC->result() as $rowC) {
                $C .= $rowC->jumlah . ",";
            }
        }
        $C = substr($C, 0, strlen($C) - 1) . "]";
        //TANGGAL 2022-01-29
        foreach ($jamkunj as $key) {
            $queryD = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-29' and kunj='" . $key . "'");
            foreach ($queryD->result() as $rowD) {
                $D .= $rowD->jumlah . ",";
            }
        }
        $D = substr($D, 0, strlen($D) - 1) . "]";
        //TANGGAL 2022-01-30
        foreach ($jamkunj as $key) {
            $queryE = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-30' and kunj='" . $key . "'");
            foreach ($queryE->result() as $rowE) {
                $E .= $rowE->jumlah . ",";
            }
        }
        $E = substr($E, 0, strlen($E) - 1) . "]";
        //TANGGAL 2022-01-31
        foreach ($jamkunj as $key) {
            $queryF = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-31' and kunj='" . $key . "'");
            foreach ($queryF->result() as $rowF) {
                $F .= $rowF->jumlah . ",";
            }
        }
        $F = substr($F, 0, strlen($F) - 1) . "]";
        //TANGGAL 2022-02-01
        foreach ($jamkunj as $key) {
            $queryG = $this->db->query("SELECT count(id) as jumlah FROM pengunjung WHERE tanggal='2024-03-01' and kunj='" . $key . "'");
            foreach ($queryG->result() as $rowG) {
                $G .= $rowG->jumlah . ",";
            }
        }
        $G = substr($G, 0, strlen($G) - 1) . "]";

        $data["A"] = $A;
        $data["B"] = $B;
        $data["C"] = $C;
        $data["D"] = $D;
        $data["E"] = $E;
        $data["F"] = $F;
        $data["G"] = $G;
        $this->load->view('page_pengunjung', $data);
    }
    public function hadiah()
    {
        $query = $this->db->query("SELECT * FROM view_hadiah ORDER BY hadiah DESC");
        $daftar = "";
        foreach ($query->result() as $row) {
            $daftar .= "<tr><td>" . $row->hadiah . "</td><td>" . $row->code . "</td><td>" . $row->nama . "</td><td><small>" . $row->alamat . $row->kelurahan . $row->kecamatan . "</small></td></tr>";
        }
        $data['daftar'] = $daftar;
        $this->load->view('page_hadiah', $data);
    }

    public function auto_hadiah(){
                            
                            
                           
                            for($j=1;$j<101;$j++){
                                $code = "";
                                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                for ($i = 1; $i < 6; $i++) {
                                $code .= $characters[rand(0, strlen($characters) - 1)];
                                    }
                                $data = [
                                'id' => null,
                                'secret' => $code,
                                'hadiah' => "Hadiah ".$j,
                                'level' => "1"
                                
                                ];
                                $query = $this->db->insert('tbl_hadiah', $data);
                            }
    }
    public function auto_pengunjung(){
                            
                           
                            for($j=3001;$j<4001;$j++){
                                $code = "";
                                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                for ($i = 1; $i < 6; $i++) {
                                $code .= $characters[rand(0, strlen($characters) - 1)];
                                    }
                                switch(strlen($j)){
                                    case 1: $nomor = "000".$j;break;
                                    case 2: $nomor = "00".$j;break;
                                    case 3: $nomor = "0".$j;break;
                                    case 4: $nomor = "".$j;break;
                                }
                                $data = [
                                'id' => $code,
                                'nama' => "Nomor ". $nomor,
                                'telp' => "+628115577590",
                                'kesan' => "Test",
                                'rating' => "5",
                                'code' => "Nomor ". $nomor,
                                'is_pemenang' => "0",
                                'tanggal' => date('Y-m-d'),
                                'jam'   => date('H:i:s'),
                                'kunj'  => date('H')
                                
                                
                                ];
                                $query = $this->db->insert('pengunjung', $data);
                            }
    }
    
}
