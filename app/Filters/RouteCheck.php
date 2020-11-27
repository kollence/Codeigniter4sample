<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RouteCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
        if (!session()->get('isLogged')) {
            if($uri->getSegment(1) == 'dashboard'){
            
                if($uri->getSegment(2) == 'create')
                  $segment = '/';
                else if($uri->getSegment(2) == 'edit')
                  $segment = '/';
                else
                  $segment = '/';
    
              return  redirect()->to($segment);    
            }
        }
          
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}