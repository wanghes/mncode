<?php
class Article_model extends CI_Model {
    public $cate;
    public $title;
    public $content;
    public $keywords;
    public $keycontents;
    public $author;
    public $createtime;
    public $updatetime;

    public function __construct()
    {
        parent::__construct();

    }

    public function totals() {
        return $this->db->count_all('article');
    }

    public function totalsByCate($value='')
    {
        $query = $this->db->query("select * from article where cate = ".$value);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    public function totalsByLabel($value='')
    {
        $query = $this->db->query("SELECT * FROM article WHERE find_in_set('$value', label)");
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    public function getItems($perpage, $offset) {
        $this->db->limit($perpage, $offset);
        $this->db->order_by('updatetime', 'desc');
    	$query = $this->db->get("article");
    	return $query->result_array();
    }

    public function getByPv($value=5)
    {
        $this->db->select('id, cate, title');
        $this->db->limit($value);
        $this->db->order_by('pv', 'desc');
        // $this->db->order_by('updatetime', 'desc');
    	$query = $this->db->get("article");
    	return $query->result_array();
    }

    public function getByCreatetime($value=5)
    {
        $this->db->select('id, cate, title');
        $this->db->limit($value);
        $this->db->order_by('createtime', 'desc');
        // $this->db->order_by('updatetime', 'desc');
    	$query = $this->db->get("article");
    	return $query->result_array();
    }

    public function getItemsByCate($perpage, $offset, $cid)
    {
        $this->db->where('cate', $cid);
        $this->db->limit($perpage, $offset);
        $this->db->order_by('updatetime', 'desc');
    	$query = $this->db->get("article");
    	return $query->result_array();
    }

    public function getItemsByLabels($perpage, $offset, $value='')
    {
        if (!isset($value)) return;
        $where = "find_in_set('$value', label)";
        $this->db->where($where);
        $this->db->limit($perpage, $offset);
        $this->db->order_by('createtime', 'desc');
        $query = $this->db->get("article");
        $return = $query->result_array();
        return $return;
    }

    public function getItem($id)
    {
        if (!isset($id)) return;
        $query = $this->db->query("select * from article where id='$id'");
        $return = $query->row_array();
    	return $return;
    }

    public function getNext($id)
    {
        if (!isset($id)) return;
        $query = $this->db->query("SELECT id, title, cate FROM article WHERE id>'$id' ORDER BY id ASC LIMIT 1");
        $return = $query->row_array();
    	return $return;
    }

    public function getPrev($id)
    {
        if (!isset($id)) return;
        $query = $this->db->query("SELECT id, title, cate FROM article WHERE id<'$id' ORDER BY id DESC LIMIT 1");
        $return = $query->row_array();
    	return $return;
    }

    public function addContent($params) {
        $currenttime = time();
        $currenttime = date("Y-m-d H:i:s", $currenttime);
        $this->cate = $params['cate'];
        $this->title = $params['title'];
        $this->content = $params['content'];
        $this->createtime = $currenttime;
        $this->updatetime = $currenttime;
        $this->author = 'wang_hes';
        $this->keywords = $params['keywords'];
        $this->keycontents = $params['keycontents'];

        return $this->db->insert('article', $this);
    }

    public function update($params)
    {
        $query = $this->db->query("select * from article where id=".$params['id']);
        $return = $query->row_array();
        $this->createtime = $return['createtime'];
        $this->author = $return['author'];

        $currenttime = time();
        $currenttime = date("Y-m-d H:i:s", $currenttime);

        $this->cate = $params['cate'];
        $this->title    = $params['title'];
        $this->content  = $params['content'];
        $this->updatetime = $currenttime;
        $this->keywords = $params['keywords'];
        $this->keycontents = $params['keycontents'];

        return $this->db->update('article', $this, array('id' => $params['id']));
    }

    public function delete($value='')
    {
        $this->db->where('id',$value);
        return $this->db->delete('article');
    }

    public function pvPlus($pv, $id)
    {
        return $this->db->update('article', ['pv' => $pv], array('id' => $id));
    }
}

?>
