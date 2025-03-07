<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QuestionDetail_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $id = $params['id'];
            $response = $this->db->query("SELECT * FROM question_detail where id = $id order by id desc")->row_array();
            $response['choice'] = $this->db->query("SELECT * FROM choice where question_detail_id = $response[id] order by 'order' desc")->result_array();
        }elseif(isset($params['question_id'])){
            $question_id = $params['question_id'];
            $response = $this->db->query("SELECT * FROM question_detail where question_id = $question_id order by id asc")->result_array();
        }elseif(isset($params['category_id'])){
            $category_id = $params['category_id'];
            $response = $this->db->query("SELECT * FROM question_detail where category_id = $category_id order by id asc")->result_array();
        }else{
            $response = $this->db->query("SELECT * FROM question_detail order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $response = $this->db->insert("question_detail",[
            "question_id" => $params['question_id'],
            "question" => $params['question'],
            "description" => $params['description'],
        ]);
        $insert_id = $this->db->insert_id();
        
        if(isset($_FILES["image"]['name'])){
            $config['upload_path']          = FCPATH.'/assets/img/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = time().$_FILES["image"]['name'];;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);
            if($this->upload->do_upload('image')){
                $filename = 'assets/img/'.$this->upload->data()['file_name'];

                $this->db->update('question_detail',[
                    'image' => $filename
                ],[
                    'id'=>$insert_id
                ]);
            }
        }


        $this->db->insert("choice",[
            "question_detail_id" => $insert_id,
            "order" => "A",
            "text" => $params['choice1'],
            "point" => $params['point1'],
        ]);

        $this->db->insert("choice",[
            "question_detail_id" => $insert_id,
            "order" => "B",
            "text" => $params['choice2'],
            "point" => $params['point2'],
        ]);

        $this->db->insert("choice",[
            "question_detail_id" => $insert_id,
            "order" => "C",
            "text" => $params['choice3'],
            "point" => $params['point3'],
        ]);

        $this->db->insert("choice",[
            "question_detail_id" => $insert_id,
            "order" => "D",
            "text" => $params['choice4'],
            "point" => $params['point4'],
        ]);

        $this->db->insert("choice",[
            "question_detail_id" => $insert_id,
            "order" => "E",
            "text" => $params['choice5'],
            "point" => $params['point5'],
        ]);

        return $response;
    }

    public function update($params){
        $getData = $this->db->get_where("question_detail",['id' => $params['id']])->row_array();

        $filename = $getData['image'];
        if(isset($_FILES["image"]['name'])){
            $config['upload_path']          = FCPATH.'/assets/img/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = time().$_FILES["image"]['name'];;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);
            if($this->upload->do_upload('image')){
                $filename = 'assets/img/'.  $this->upload->data()['file_name'];
            }
        }

        $response = $this->db->update("question_detail",[
            "question" => $params['question'],
            "image" => $filename,
            "description" => $params['description'],
        ],[
            "id" => $params['id']
        ]);

        $this->db->update("choice",[
            "text" => $params['choice1'],
            "point" => $params['point1'],
        ],[
            'id' => $params['id1']
        ]);

        $this->db->update("choice",[
            "text" => $params['choice2'],
            "point" => $params['point2'],
        ],[
            'id' => $params['id2']
        ]);

        $this->db->update("choice",[
            "text" => $params['choice3'],
            "point" => $params['point3'],
        ],[
            'id' => $params['id3']
        ]);

        $this->db->update("choice",[
            "text" => $params['choice4'],
            "point" => $params['point4'],
        ],[
            'id' => $params['id4']
        ]);

        $this->db->update("choice",[
            "text" => $params['choice5'],
            "point" => $params['point5'],
        ],[
            'id' => $params['id5']
        ]);

        return $response;
    }

    public function delete($params){
        $response = $this->db->delete("question_detail",[
            'id' => $params['id']
        ]);
        $this->db->delete("choice",[
            'question_detail_id' => $params['id']
        ]);
        $this->db->delete("answer_detail",[
            'question_detail_id' => $params['id']
        ]);


        return $response;
    }
}