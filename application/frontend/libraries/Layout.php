<?php
class Layout {
    private $ci;
    // the title for the layout
    private $title_for_layout;
    // title separator
    // you can change this in the construct
    public $title_separator;
    // holds the css and js files
    private $includes;
    public function __construct() {
        
        $this->ci = &get_instance();
        $this->title_for_layout = NULL;
        $this->meta_description_for_layout = NULL;
        $this->title_separator = '';
        $this->includes = array();
    }

    public function set_title($title = NULL) {
        $this->title_for_layout = $title;
    }
    public function set_meta_description($description = NULL) {
        $this->meta_description_for_layout = $description;
    }

    public function add_includes($type, $file, $options = NULL, $prepend_base_url = TRUE) {
        if ($prepend_base_url) {
            $this->ci->load->helper('url');
            $file = base_url() . $file;
        }

        $this->includes[$type][] = array(
            'file' => $file,
            'options' => $options
        );

        // allows chaining
        return $this;
    }

    public function view($name, $data = array(), $layout = 'default') {
        // get the contents of the view and store it
        $view = $this->ci->load->view($name, $data, TRUE);
        // set the title
        $title = '';       

        if ($this->title_for_layout !== NULL) {
            $title = $this->title_for_layout . $this->title_separator;
        }
        
        // set meta description
        $meta_description_for_layout = '';
        if ($this->meta_description_for_layout !== NULL) {
            $meta_description_for_layout = $this->meta_description_for_layout;
        }

        $this->ci->load->view('layout/' . $layout, array(
            'title_for_layout' => $title,
            'meta_description_for_layout' => $meta_description_for_layout,
            'includes_for_layout' => $this->includes,
            'content_for_layout' => $view
        ));
    }

}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */