<?php
class Sess_check extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        if ($this->session->userdata('sess_e') != md5($this->session->userdata('sess_i') . $this->session->userdata('sess_l'))) {
            return FALSE;
        } else {
            if ($this->session->userdata('sess_l') == "1") {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
}
