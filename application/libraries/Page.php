<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page
{
    var $ci;
    function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->library('pagination');
    }
    /**
     * 分页
     * @param $base_url   连接地址
     * @param $total_rows 记录总数
     * @param $perpage  每页显示记录数
     * @param $uri_segment  分页数的在URI的位置
     * @return 分页字符串
     */
    function show($base_url, $perpage, $total_rows, $uri_segment)
    {
        $config['base_url'] =$base_url;
        $config['first_url'] =$base_url;
        $config['total_rows'] =$total_rows;
        $config['per_page'] = $perpage;
        $config['use_page_numbers']  = true;
        $config['num_links'] = 3;
        $config['uri_segment'] = $uri_segment;
        $config['anchor_next_class'] = 'class="next"';
        $config['anchor_prev_class'] = 'class="prev"';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['full_tag_open'] = '<div class="am-page"><div class="page-items">';
        $config['full_tag_close'] = '</div></div>';
        $config['cur_tag_open'] = ' <span>';
        $config['cur_tag_close'] = '</span>';
        $config['next_link'] = '»';
        $config['prev_link'] = '«';

        $this->ci->pagination->initialize($config);
        return $this->ci->pagination->create_links();
    }
}
