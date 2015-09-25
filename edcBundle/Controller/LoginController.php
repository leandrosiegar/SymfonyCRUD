<?php
namespace edcBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use edcBundle\Entity\usuarios;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function indexAction($name)
    {
    	// return $this->render('edcBundle:Default:index.html.twig', array('name' => $name));
    }
    
    // ******************************************
    public function loginAction(Request $request)
    {
    	if($request->getMethod()=="POST")
    	{
    		$email = $request->get("correo");
    		$password = $request->get("pass");
    		//echo "correo=".$correo."<br>pass=".$pass;exit;
    		$user = $this->getDoctrine()->getRepository('edcBundle:usuarios')->findOneBy(array("correo"=>$email,"pass"=>$password));
    		if($user)
    		{
    			$session = $request->getSession();
    			$session->set("id", $user->getId());
    			$session->set("nombre", $user->getNombre());
    			//echo $session->get("nombre");exit;
    			return $this->redirect($this->generateUrl('listarPeliculas'));
    		}else
    		{
    			$this->get('session')->getFlashBag()->add(
    					'mensaje',
    					'Los datos ingresados para loguearte no son válidos'
    			);
    			return $this->redirect($this->generateUrl('login'));
    		}
    	}
    	return $this->render('edcBundle:Login:login.html.twig');
    }
    
    // *********************************************
    public function logoutAction(Request $request)
    {
    	$session = $request->getSession();
    	$session->clear();
    	$this->get('session')->getFlashBag()->add(
    			'mensaje',
    			'Se ha cerrado sessión exitosamente, gracias por visitarnos'
    	);
    	return $this->redirect($this->generateUrl('login'));
    }
 }