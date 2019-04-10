<?php
class Mainmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getAvailablecars(){
    	$this->db->where('status', 'available');
    	        // Run the query
        $query = $this->db->get('cardetails');
        return $query->result();
    }
    function getcardetail($id){
        $this->db->set('status', 'booking');
        $this->db->where('carId', $id);
        $this->db->where('status', 'available');
        $this->db->update('cardetails');  //table name
        // Run the query
        $this->db->where('carId', $id);
        $query = $this->db->get('cardetails');
        return $query->row();
    }
    function booking($data){
        
        $query = $this->db->get('bookingdetails');
        $sql="SELECT * FROM `bookingdetails` WHERE `carId` = '".$data['carId']."' AND (date('".$data['scheduledate']."')between date(`scheduledate`) and date(`dropat`) OR date('".$data['dropat']."') between date(`scheduledate`) and date(`dropat`))";
        $query = $this->db->query($sql);
        $count=$query->num_rows();
        
        if($count>0){
            $this->db->set('status', 'available');
            $this->db->where('carId', $data['carId']);
            return 'Already scheduled change Time or car';
             
        }else{
            $this->db->set('status', 'available');
            $this->db->where('carId', $data['carId']);
            $this->db->update('cardetails');
            $this->db->insert('bookingdetails',$data);
            $affected=$this->db->affected_rows();
            if ($affected != 1){
                return 'DatabaseError';
            }
            if($affected==1){
              return 'Inserted successfully';  
            }
            
        }
    }
    
}
    ?>