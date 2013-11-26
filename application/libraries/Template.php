<?php
/**/
class Template
{
    private $ext = '.php';
    private $cache_file = '';

    private $search = array(
        '/\(\(~[.\w]+\)\)/',
        '/\(\(\/[.\w]+\)\)/',
        '/\[\[\/[.\w]+\]\]/',
        '/\(\((\w+)\)\)/',
        '/\(\(\!(\w+)\)\)/',
        '/\[\[(\w+)\]\]/',
        '/\[\[(\w+)\s+[Aa][Ss]\s+(\w+)\]\]/',
        '/\{\{(\w+)\}\}/',
        '/\{\{\!(\w+)\}\}/',
        '/\{\{((?:\w+\.)*\w+)\.(\w+)\}\}/e',
        '/\{\{\!((?:\w+\.)*\w+)\.(\w+)\}\}/e',
        '/\(\(((?:\w+\.)*\w+)\.(\w+)\)\)/e',
        '/\(\(\!((?:\w+\.)*\w+)\.(\w+)\)\)/e',
        '/\[\[((?:\w+\.)*\w+)\.(\w+)\]\]/e',
        '/\[\{(\w+)\}\]/',
    );

    private  $replace = array(
        '<?php } else { ?>',
        '<?php } ?>',
        '<?php } ?>',
        '<?php if ($this->\1) { ?>',
        '<?php if (!$this->\1) { ?>',
        '<?php if (is_array($this->\1)) foreach ($this->\1 as &$\1) { ?>',
        '<?php if (is_array($this->\1)) foreach ($this->\1 as &$\2) { ?>',
        '<?php echo htmlspecialchars($this->\1, ENT_QUOTES); ?>',
        '<?php echo $this->\1; ?>',
        "'<?php if (isset(\\$'.str_replace('.', '_', '\\1').'[\'\\2\'])) echo htmlspecialchars(\\$'.str_replace('.', '_', '\\1').'[\'\\2\'], ENT_QUOTES); ?>'",
        "'<?php if (isset(\\$'.str_replace('.', '_', '\\1').'[\'\\2\'])) echo \\$'.str_replace('.', '_', '\\1').'[\'\\2\']; ?>'",
        "'<?php if (isset(\\$'.str_replace('.', '_', '\\1').'[\'\\2\']) && \\$'.str_replace('.', '_', '\\1').'[\'\\2\']) { ?>'",
        "'<?php if (!isset(\\$'.str_replace('.', '_', '\\1').'[\'\\2\']) || !\\$'.str_replace('.', '_', '\\1').'[\'\\2\']) { ?>'",
        "'<?php if (isset(\\$'.str_replace('.', '_', '\\1').'[\'\\2\']) && is_array(\\$'.str_replace('.', '_', '\\1').'[\'\\2\'])) foreach (\\$'.str_replace('.', '_', '\\1').'[\'\\2\'] as \\$'.str_replace('.', '_', '\\1_\\2').') { ?>'",
        '<?php if(is_array($this->\1)){ $i=0; while ($i < count($this->\1)) { echo $this->\1[$i]; $i++;}}?>'
    );

    function __construct()
    {
        $this->ci =& get_instance();
    }

    public function parse_view($view, $data=NULL, $return=FALSE)
    {
        if ($view == ''){
            return FALSE;
        }

        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->ci->$key = $value;
            }
        }

        $template = $this->_view_to_var($view);
        $new_template = preg_replace($this->search, $this->replace, $template);
        $_prepared = $this->_cache_file($view, $new_template);

        return $this->ci->load->view('../../' . $_prepared, $data, $return);
    }

    private function _view_to_var($view)
    {
        $template = file_get_contents(APPPATH . 'views/' . $view . $this->ext);
        return $template;
    }

    private function _cache_file($view, $new_template)
    {
        $this->cache_file = APPPATH . 'cache/' . md5($view);
        $this->save_path = $this->cache_file . $this->ext;

        if (!file_exists($this->save_path) || (md5($new_template) != hash_file('md5', $this->save_path))) {
            file_put_contents($this->save_path, $new_template);
        }

        return $this->cache_file;
    }
}