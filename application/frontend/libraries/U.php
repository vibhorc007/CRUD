<?php 

class U {
    
    var $image;
    var $ci;
    
    public function __construct() {
        $this->ci = &get_instance();
        if($this->ci->session->user_id){
            
            $this->ci->db->select('*');
            $this->ci->db->from('user');
            $this->ci->db->where('user_id',$this->ci->session->user_id);
            $query = $this->ci->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $this->image = ($row['file_name'] != '')? base_url('images').'/'.$row['file_name']:base_url('images/glyphicons_user.png');
            }
            
        }
    }
    
    public function getUserImage(){
        return $this->image;
    }
    
}