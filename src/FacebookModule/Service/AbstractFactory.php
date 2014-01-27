<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
* "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
* LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
* A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
* OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
* SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
		* LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
		* DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
* THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
* OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
namespace FacebookModule\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Base ServiceManager factory to be extended
 * 
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @author Ricardo Viana <ricardovianasi@gmail.com>
 */
abstract class AbstractFactory implements FactoryInterface {
    
    /**
     * @var string
     */
    protected $configurationKey;
    
    /**
     * @var \Zend\Stdlib\AbstractOptions
     */
    protected $options;
    
    /**
     * @param string $name
     */
    public function __construct($configurationKey) {
        $this->configurationKey = $configurationKey;
    }
    
    /**
     * @return string
     */
    public function getConfigurationKey() {
        return $this->configurationKey;
    }
    
    /**
     * Gets options from configuration based on key name.
     *
     * @param  ServiceLocatorInterface      $sl
     * @param  string                       $key
     * @param  null|string                  $name
     * @return \Zend\Stdlib\AbstractOptions
     * @throws \RuntimeException
     */
    public function getOpitons(ServiceLocatorInterface $sl, $confKey=null) {
        
        if(null === $confKey) {
            $confKey = $this->getConfigurationKey();
        }
        
        $options = $sl->get('Configuration');
        $options = isset($options[$confKey]) ? $options[$confKey] : null;
        
        if(null === $options) {
            throw new \RuntimeException(sprintf(
	           'Options with name "%s" could not be found in "facebook.".',
                $confKey
            ));
        }
        
        return $options;
    }
}