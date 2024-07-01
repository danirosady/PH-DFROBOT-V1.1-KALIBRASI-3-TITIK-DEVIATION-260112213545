<?php
class List_model extends CI_Model{
  //get all categories method
  function get_list(){
      $result=$this->db->get('pengunjung');
      return $result;
  }
  	 //get nik
     function get_nik($nik){
      $result=$this->db->select('code,jam,tanggal')
      ->where('nik',$nik)
      ->get('pengunjung');
      return $result->row();
  }
  //generate dataTable serverside method
  function get_all_list() {
      $this->datatables->select('id,nama,code,alamat,kecamatan,kelurahan,tanggal,jam,status,alasan');
      $this->datatables->from('pengunjung');
      // $this->datatables->where('id >' , '8300');
      $this->datatables->add_column('dis', '<p>$1 $2</p>', 'tanggal,jam');
      $this->datatables->add_column('toggle',['$1','$2','$3','$4'], 'id,code,status,alasan');
      $this->datatables->add_column('alamatlengkap','<small>$1, Kel.$2, Kec.$3</small>', 'alamat, kelurahan, kecamatan');
      return $this->datatables->generate();
  }
  //insert data method
  function insert_list(){
      $data=array(
        'nama'        => $this->input->post('nama'),
        'code'        => $this->input->post('code')
      );
      $result=$this->db->insert('pengunjung', $data);
      return $result;
  }

  //update data method
  function update_list(){
      $pengunjung_id=$this->input->post('regist_id');
      $status = $this->input->post('status');
      $alasan = $this->input->post('alasan');
      if ($status=="1"){
        $status_up = "0";
      } else {
        $status_up = "1";
      }
      $data=array(
        'status'         => $status_up,
        'alasan'         => $alasan
      );
      $this->db->where('id',$pengunjung_id);
      $result=$this->db->update('pengunjung', $data);
      return $result;
  }
  //delete data method
  function delete_list(){
      $pengunjung_id=$this->input->post('is');
      $this->db->where('id',$pengunjung_id);
      $result=$this->db->delete('pengunjung');
      return $result;
  }
}