<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Pagination
{
    protected $page_array = [];
    protected $page_num;
    protected $rows_per_page;
    protected $crumbs;
    protected $pagination;

    protected $first_link = '&lsaquo; First';
    protected $next_link  = '&gt;';
    protected $prev_link  = '&lt;';
    protected $last_link  = 'Last &rsaquo;';
    protected $page_delimiter = '/'; // use "/" or "?" for query string

    protected $theme = 'bootstrap';

    protected $classes = [
        'nav'    => 'pagination-nav',
        'ul'     => 'pagination-list',
        'li'     => 'pagination-item',
        'a'      => 'pagination-link',
        'active' => 'active',
        'disabled' => 'disabled'
    ];

    protected $LAVA;

    public function __construct()
    {
        $this->LAVA =& lava_instance();
        $this->LAVA->call->helper('language');
        $this->LAVA->call->library('session');

        $set_language = $this->LAVA->session->userdata('page_language') ?? config_item('language');
        language($set_language);

        foreach (['first_link', 'next_link', 'prev_link', 'last_link', 'page_delimiter'] as $key) {
            $this->$key = lang($key) ?? $this->$key;
        }

        $this->set_theme($this->theme);
    }

    public function set_theme($theme)
    {
        $this->theme = $theme;
        switch ($theme) {
            case 'bootstrap':
                $this->classes = [
                    'nav'    => 'd-flex justify-content-center',
                    'ul'     => 'pagination',
                    'li'     => 'page-item',
                    'a'      => 'page-link',
                    'active' => 'active',
                    'disabled' => 'disabled'
                ];
                break;
            case 'tailwind':
                $this->classes = [
                    'nav'    => 'flex justify-center mt-4',
                    'ul'     => 'inline-flex -space-x-px',
                    'li'     => '',
                    'a'      => 'inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 first:rounded-l-md last:rounded-r-md focus:outline-none focus:ring-2 focus:ring-indigo-500',
                    'active' => 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600 hover:bg-indigo-50',
                    'disabled' => 'opacity-50 cursor-not-allowed'
                ];
                break;
            case 'custom':
                break;
        }
    }

    public function set_custom_classes(array $classes)
    {
        $this->classes = array_merge($this->classes, $classes);
    }

    public function set_options(array $options)
    {
        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function initialize($total_rows, $rows_per_page, $page_num, $url, $crumbs = 5)
    {
        $this->crumbs = $crumbs;
        $this->rows_per_page = (int) $rows_per_page;
        $this->page_array['url'] = $url;

        $last_page = max(1, ceil($total_rows / $this->rows_per_page));
        $this->page_num = max(1, min($page_num, $last_page));

        $offset = ($this->page_num - 1) * $this->rows_per_page;
        $this->page_array['limit'] = 'LIMIT '.$offset.','.$this->rows_per_page;
        $this->page_array['current'] = $this->page_num;
        $this->page_array['previous'] = max(1, $this->page_num - 1);
        $this->page_array['next'] = min($last_page, $this->page_num + 1);
        $this->page_array['last'] = $last_page;
        $this->page_array['info'] = 'Page ('.$this->page_num.' of '.$last_page.')';
        $this->page_array['pages'] = $this->render_pages($this->page_num, $last_page);

        return $this->page_array;
    }

    protected function render_pages($page_num, $last_page)
    {
        $arr = [];
        if ($page_num == 1) {
            for ($i = 0; $i < min($this->crumbs, $last_page); $i++) {
                $arr[] = $i + 1;
            }
        } elseif ($page_num == $last_page) {
            $start = max(0, $last_page - $this->crumbs);
            for ($i = $start; $i < $last_page; $i++) {
                $arr[] = $i + 1;
            }
        } else {
            $start = max(0, $page_num - ceil($this->crumbs / 2));
            $end = min($last_page, $start + $this->crumbs);
            for ($i = $start; $i < $end; $i++) {
                $arr[] = $i + 1;
            }
        }
        return $arr;
    }

    public function paginate()
    {
        if (empty($this->page_array['pages'])) return '';

        $html = '<nav class="'.$this->classes['nav'].'" aria-label="Pagination">';
        $html .= '<ul class="'.$this->classes['ul'].'">';

        // First & Prev
        if ($this->page_num > 1) {
            $html .= $this->build_link(1, $this->first_link);
            $html .= $this->build_link($this->page_array['previous'], $this->prev_link);
        } else {
            $html .= $this->build_disabled($this->first_link);
            $html .= $this->build_disabled($this->prev_link);
        }

        // Page numbers
        foreach ($this->page_array['pages'] as $page) {
            $active = ($page == $this->page_array['current']) ? $this->classes['active'] : '';
            $html .= $this->build_link($page, $page, $active, $page == $this->page_array['current']);
        }

        // Next & Last
        if ($this->page_num < $this->page_array['last']) {
            $html .= $this->build_link($this->page_array['next'], $this->next_link);
            $html .= $this->build_link($this->page_array['last'], $this->last_link);
        } else {
            $html .= $this->build_disabled($this->next_link);
            $html .= $this->build_disabled($this->last_link);
        }

        $html .= '</ul></nav>';
        return $html;
    }

    protected function build_link($page, $label, $active_class = '', $is_current = false)
    {
        if ($this->page_delimiter === '?') {
            $url = site_url($this->page_array['url'].'?page='.$page);
        } else {
            $url = site_url($this->page_array['url'].$this->page_delimiter.$page);
        }

        $aria = $is_current ? ' aria-current="page"' : '';
        return '<li class="'.$this->classes['li'].'">
                    <a class="'.$this->classes['a'].' '.$active_class.'" href="'.$url.'"'.$aria.'>'.$label.'</a>
                </li>';
    }

    protected function build_disabled($label)
    {
        return '<li class="'.$this->classes['li'].' '.$this->classes['disabled'].'">
                    <span class="'.$this->classes['a'].'">'.$label.'</span>
                </li>';
    }
}
