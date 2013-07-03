<?php

/*
 * This file is part of the BITGoogleBundle package.
 *
 * (c) bitgandtter <http://bitgandtter.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace BIT\GoogleBundle\Twig\Extension;
use Symfony\Component\DependencyInjection\ContainerInterface;
use BIT\GoogleBundle\Templating\Helper\GoogleHelper;

class GoogleExtension extends \Twig_Extension
{
  protected $container;
  protected $helper;
  
  public function __construct( ContainerInterface $container )
  {
    $this->container = $container;
    $this->helper = $this->container->get( 'bit_google.helper' );
  }
  
  public function getFunctions( )
  {
    $functions = array( );
    $functions[ 'google_login_button' ] = new \Twig_Function_Method( $this, 'renderLoginButton');
    $functions[ 'google_login_url' ] = new \Twig_Function_Method( $this, 'renderLoginUrl');
    return $functions;
  }
  
  public function renderLoginButton( )
  {
    return $this->helper->loginButton( );
  }
  
  public function renderLoginUrl( )
  {
    return $this->helper->loginUrl( );
  }
  
  public function getName( )
  {
    return 'google';
  }
}
