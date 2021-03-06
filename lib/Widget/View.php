<?php
/**
 * Widget Framework
 *
 * @copyright   Copyright (c) 2008-2013 Twin Huang
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Widget;

use Widget\Stdlib\AbstractView;

/**
 * A widget that use to render PHP template
 *
 * @author      Twin Huang <twinhuang@qq.com>
 */
class View extends AbstractView
{
    /**
     * The template variables
     *
     * @var array
     */
    protected $vars = array();

    /**
     * Template directory
     *
     * @var string|array
     */
    protected $dirs = array('.');

    /**
     * Default template file extension
     *
     * @var string
     */
    protected $extension = '.php';

    /**
     * The layout configuration
     *
     * @var array|null
     */
    protected $layout;

    /**
     * The current render view name
     *
     * @var string
     */
    private $currentName;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);

        // Adds widget to template variable
        $this->assign('widget', $this->widget);
    }

    /**
     * Returns view widget or render a PHP template
     *
     * if NO parameter provied, the invoke method will return the viw widget.
     * otherwise, call the render method
     *
     * @param string $name The name of template
     * @param array $vars The variables pass to template
     *
     * @return View|string
     */
    public function __invoke($name = null, $vars = array())
    {
        if (0 === func_num_args()) {
            return $this;
        } else {
            return $this->render($name, $vars);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function render($name, $vars = array())
    {
        // Set extra view variables
        $vars = $vars ? $vars + $this->vars : $this->vars;

        // Assign $name to $this->currentName to avoid conflict with view parameter
        $this->currentName = $name;

        // Render view
        extract($vars, EXTR_OVERWRITE);
        ob_start();
        require $this->getFile($this->currentName);
        $content = ob_get_clean();

        // Render layout
        if ($this->layout) {
            $layout = $this->layout;
            $this->layout = null;
            $content = $this->render($layout['name'], array(
                $layout['variable'] => $content
            ) + $vars);
        }

        return $content;
    }

    /**
     * {@inheritdoc}
     */
    public function display($name, $vars = array())
    {
        echo $this->render($name, $vars);
    }

    /**
     * {@inheritdoc}
     */
    public function assign($name, $value = null)
    {
        if (is_array($name)) {
            $this->vars = $name + $this->vars;
        } else {
            $this->vars[$name] = $value;
        }

        return $this;
    }

    /**
     * Returns the variable value or null if not defined
     *
     * @param string $name The name of variable
     * @return mixed
     */
    public function get($name)
    {
        return isset($this->vars[$name]) ? $this->vars[$name] : null;
    }

    /**
     * Get the template file by name
     *
     * @param  string    $name The name of template
     * @return string    The template file path
     * @throws Exception When file not found
     */
    public function getFile($name)
    {
        foreach ($this->dirs as $dir) {
            if (is_file($file = $dir . '/' .  $name)) {
                return $file;
            }
        }

        throw new \RuntimeException(sprintf('Template "%s" not found in directories "%s"', $name, implode('", "', $this->dirs)), 404);
    }

    /**
     * Set layout for current view
     *
     * @param string $name The name of layout template
     * @param string $variable The variable name that
     * @return View
     */
    public function layout($name, $variable = 'content')
    {
        $this->layout = array(
            'name' => $name,
            'variable' => $variable
        );

        return $this;
    }

    /**
     * Set base directory for views
     *
     * @param string|array $dirs
     * @return View
     */
    public function setDirs($dirs)
    {
        $this->dirs = (array)$dirs;

        return $this;
    }
}
