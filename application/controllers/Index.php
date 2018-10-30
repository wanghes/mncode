<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index($page=1)
	{
		$totals = $this->article_model->totals();
		$perpage = 10;
		$offset = $page == 1 ? 0 : $perpage * ($page - 1);

		$list = $this->article_model->getItems($perpage, $offset);

		$data['pages'] = $this->page->show('/index/index', $perpage, $totals, 3);
		$data['data'] = $list;
		$hots = $this->article_model->getByPv(5);
		$footer['hots'] = $hots;

		$news = $this->article_model->getByCreatetime(5);

		$cates = $this->cate_model->getItems();
		$labels = $this->label_model->getItems();


		$header = [
			'title'=> '首页',
			'cates' => $cates,
			'labels' => $labels,
			'news' => $news
		];

		$this->load->view('inc/header', $header);
		$this->load->view('index', $data);
		$this->load->view('inc/footer', $footer);
	}



	public function cate($id, $page=1)
	{
		$totals = $this->article_model->totalsByCate($id);
		$perpage = 10;
		$offset = $page == 1 ? 0 : $perpage * ($page - 1);

		$list = $this->article_model->getItemsByCate($perpage, $offset, $id);

		$data['pages'] = $this->page->show('/index/cate/'.$id, $perpage, $totals, 4);
		$data['data'] = $list;
		$hots = $this->article_model->getByPv(5);
		$footer['hots'] = $hots;

		$cates = $this->cate_model->getItems();

		$cateObj = array_filter($cates, function($v, $k) use ($id) {
		    return $v['id'] == $id;
		}, ARRAY_FILTER_USE_BOTH);

		$cate = array_pop($cateObj);
		$labels = $this->label_model->getItems();

		$data['current_cate_name'] = $cate['name'];

		$news = $this->article_model->getByCreatetime(5);

		$header = [
			'title'=> $cate['name'],
			'current_cate' => $cate,
			'cates' => $cates,
			'labels' => $labels,
			'news' => $news
		];
		$this->load->view('inc/header', $header);
		$this->load->view('index', $data);
		$this->load->view('inc/footer', $footer);
	}

	public function label($id, $page=1)
	{
		$totals = $this->article_model->totalsByLabel($id);
		$perpage = 10;
		$offset = $page == 1 ? 0 : $perpage * ($page - 1);

		$list = $this->article_model->getItemsByLabels($perpage, $offset, $id);

		$data['pages'] = $this->page->show('/index/label/'.$id, $perpage, $totals, 4);
		$data['data'] = $list;
		$hots = $this->article_model->getByPv(5);
		$footer['hots'] = $hots;

		$cates = $this->cate_model->getItems();
		$labels = $this->label_model->getItems();

		$labelObj = array_filter($labels, function($v, $k) use ($id) {
		    return $v['id'] == $id;
		}, ARRAY_FILTER_USE_BOTH);

		$label = array_pop($labelObj);

		$data['current_cate_name'] = $label['name'];

		$news = $this->article_model->getByCreatetime(5);

		$header = [
			'title'=> $label['name'],
			'current_cate' => $label,
			'cates' => $cates,
			'labels' => $labels,
			'news' => $news
		];
		$this->load->view('inc/header', $header);
		$this->load->view('index', $data);
		$this->load->view('inc/footer', $footer);
	}

	public function detail($cid, $id='')
	{
		if (!isset($id)) return;
		$row = $this->article_model->getItem($id);


		$cates = $this->cate_model->getItems();

		$pv = $row['pv'] + 1;

		$this->article_model->pvPlus($pv, $id);

		$cateObj = array_filter($cates, function($v, $k) use ($cid) {
		    return $v['id'] == $cid;
		}, ARRAY_FILTER_USE_BOTH);

		$cate = array_pop($cateObj);

		$data['current_cate'] = $cate;

		$hots = $this->article_model->getByPv(5);
		$data['hots'] = $hots;

		$prev = $this->article_model->getPrev($id);
		$next = $this->article_model->getNext($id);

		$data['prev'] = $prev;
		$data['next'] = $next;

		$labels = $this->label_model->getItems();
		$data['labels'] = $labels;

		$arr = [];
		if (isset($row['label'])) {
			$arr = explode(',', $row['label']);
		}

		$temp = [];

		foreach ($arr as $value) {
			foreach ($labels as $item) {
				if ($value == $item['id']) {
					$temp[] = $item;
				}
			}

		}

		$row['selectLabels'] = $temp;


		$data['row'] = $row;

		$news = $this->article_model->getByCreatetime(5);

		$data['news'] = $news;

		$header = [
			'title'=> $row['title'],
			'keywords'=>$row['keywords'],
			'keycontents'=>$row['keycontents'],
			'cates' => $cates,
			'current_cate' => $cate
		];
		$this->load->view('inc/detail_header', $header);
		$this->load->view('detail', $data);
		$this->load->view('inc/detail_footer');
	}
}
