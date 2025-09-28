<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Pagination
{
    protected $options = [];
    protected $theme   = 'default';

    protected $total_rows;
    protected $per_page;
    protected $current_page;
    protected $base_url;

    public function __construct()
    {
        // Default options
        $this->options = [
            'first_link'     => 'First',
            'last_link'      => 'Last',
            'next_link'      => 'Next',
            'prev_link'      => 'Prev',
            'page_delimiter' => '&page='
        ];
    }

    /**
     * Set custom options
     */
    public function set_options(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * Set theme (default or custom)
     */
    public function set_theme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Initialize pagination
     */
    public function initialize($total_rows, $per_page, $current_page, $base_url)
    {
        $this->total_rows   = (int) $total_rows;
        $this->per_page     = (int) $per_page;
        $this->current_page = (int) $current_page;
        $this->base_url     = $base_url;
    }

    /**
     * Generate pagination links
     */
    public function paginate()
    {
        if ($this->per_page <= 0) return '';

        $total_pages = ceil($this->total_rows / $this->per_page);
        if ($total_pages <= 1) return '';

        $output = '<div class="pagination">';

        // First link
        if ($this->current_page > 1) {
            $output .= '<a href="'.$this->base_url.$this->options['page_delimiter'].'1">'.$this->options['first_link'].'</a>';
        }

        // Prev link
        if ($this->current_page > 1) {
            $prev = $this->current_page - 1;
            $output .= '<a href="'.$this->base_url.$this->options['page_delimiter'].$prev.'">'.$this->options['prev_link'].'</a>';
        }

        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $this->current_page) {
                $output .= '<span class="current">'.$i.'</span>';
            } else {
                $output .= '<a href="'.$this->base_url.$this->options['page_delimiter'].$i.'">'.$i.'</a>';
            }
        }

        // Next link
        if ($this->current_page < $total_pages) {
            $next = $this->current_page + 1;
            $output .= '<a href="'.$this->base_url.$this->options['page_delimiter'].$next.'">'.$this->options['next_link'].'</a>';
        }

        // Last link
        if ($this->current_page < $total_pages) {
            $output .= '<a href="'.$this->base_url.$this->options['page_delimiter'].$total_pages.'">'.$this->options['last_link'].'</a>';
        }

        $output .= '</div>';

        return $output;
    }
}
