<?php
/**
 * Widget Framework
 *
 * @copyright   Copyright (c) 2008-2013 Twin Huang
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Widget;

/**
 * A widget to detect the environment name and load configuration by environment name
 *
 * The environment name detect order:
 *
 *     user defined $env > $envDetect callback > $envMap
 *
 * @author      Twin Huang <twinhuang@qq.com>
 * @property    Request $request A widget that handles the HTTP request Data
 */
class Env extends AbstractWidget
{
    /**
     * The environment name
     *
     * @var string
     */
    protected $env;

    /**
     * A callback to detect the environment name
     *
     * @var callable
     */
    protected $detector;

    /**
     * An associative array contains server ip and environment name pairs
     *
     * @var array
     */
    protected $envMap = array(
        '127.0.0.1' => 'dev'
    );

    /**
     * The configuration directory pattern
     *
     * @var string
     */
    protected $configDir = 'config/config_%env%.php';

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);

        // Load cli configuration when run in cli mode
        if (php_sapi_name() === 'cli') {
            $file = str_replace('%env%', 'cli', $this->configDir);
            $this->loadConfigFile($file);
        }

        // Detect environment name if not set
        if (!$this->env) {
            $this->detectEnvName();
        }

        // Load configuration by env
        $file = str_replace('%env%', $this->env, $this->configDir);
        $this->loadConfigFile($file);
    }

    /**
     * Returns the environment name
     *
     * @return string
     */
    public function __invoke()
    {
        return $this->env;
    }

    /**
     * Detect environment by server ip
     *
     * @return Env
     */
    public function detectEnvName()
    {
        if ($this->detector) {
            $this->env = call_user_func($this->detector);
        } else {
            $ip = $this->request->getServer('SERVER_ADDR');
            if (isset($this->envMap[$ip])) {
                $this->env = $this->envMap[$ip];
            } else {
                $this->env = 'prod';
            }
        }

        return $this;
    }

    /**
     * Check if in the development environment
     *
     * @return bool
     */
    public function inDev()
    {
        return $this->env === 'dev';
    }

    /**
     * Check if in the test environment
     *
     * @return bool
     */
    public function inTest()
    {
        return $this->env === 'test';
    }

    /**
     * Check if in the production environment
     *
     * @return bool
     */
    public function inProd()
    {
        return $this->env === 'prod';
    }

    /**
     * Returns the env string
     *
     * @return string
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * Set application environment name
     *
     * @param string $env
     * @return Env
     */
    public function setEnv($env)
    {
        $this->env = $env;

        return $this;
    }

    /**
     * Load widget config by specified file
     *
     * @param string $file
     */
    public function loadConfigFile($file)
    {
        if (!is_file($file)) {
            return;
        }

        $config = (array)require $file;
        $this->widget->config($config);
    }
}
