<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Pagination
{
    protected $page_array = [];
    protected $page_num;
    protected $rows_per_page;
    protected $crumbs;

    protected $first_link = '&lsaquo; First';
    protected $next_link  = '&gt;';
    protected $prev_link  = '&lt;';
    protected $last_link  = 'Last &rsaquo;';
    protected $page_delimiter = '/'; // use "/" or "?" for query string

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

        $html = '<nav><ul>';

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
            $active = ($page == $this->page_array['current']) ? ' class="active"' : '';
            $html .= '<li'.$active.'>'.$this->build_link($page, $page).'</li>';
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

    protected function build_link($page, $label)
    {
        if ($this->page_delimiter === '?') {
            $url = site_url($this->page_array['url'].'?page='.$page);
        } else {
            $url = site_url($this->page_array['url'].$this->page_delimiter.$page);
        }
        return '<a href="'.$url.'">'.$label.'</a>';
    }

    protected function build_disabled($label)
    {
        return '<span>'.$label.'</span>';
    }
}
