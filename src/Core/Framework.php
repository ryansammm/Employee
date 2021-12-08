<?php

namespace Core;

use App\CmsFonts\Model\CmsFonts;
use App\CmsKategoriStyle\Model\CmsKategoriStyle;
use App\Menu\Model\Menu;
use App\SubMenu\Model\SubMenu;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\HttpKernel;

class Framework extends HttpKernel implements HttpKernelInterface
{
    private $matcher;
    private $controllerResolver;
    private $argumentResolver;

    public function __construct(UrlMatcher $matcher, ControllerResolver $controllerResolver, ArgumentResolver $argumentResolver)
    {
        $this->matcher = $matcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
    }

    public function handle(
        Request $request,
        $type = HttpKernelInterface::MASTER_REQUEST,
        $catch = true
    ) {
        $this->matcher->getContext()->fromRequest($request);
        $pathInfo = $request->getPathInfo();

        // Start the session
        SessionData::start();

        // !!!! Overriding Core Framework !!!!

        // Get data cms kategori and make it global

        $menu = new Menu();
        $data_menu = $menu->get();
        $sub_menu = new SubMenu();
        foreach ($data_menu->items as $key => $value) {
            $data_sub_menu = $sub_menu->where('parent_id', $value['id_cms_menu'])->first();
            $data_menu->items[$key]['sub_menu'][] = $data_sub_menu;
        }

        $GLOBALS['web_menu'] = $data_menu;



        // -----------------------------------

        $urlTujuan = $request->getPathInfo();

        $explode_url = explode("/", $urlTujuan);
        $current_url = $explode_url[1];

        $GLOBALS['url'] = $urlTujuan;
        $GLOBALS['current_url'] = $current_url;

        try {
            $request->attributes->add($this->matcher->match($pathInfo));

            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $exception) {
            return new Response('Not Found', 404);
        } catch (\Exception $exception) {
            return new Response('' . $exception, 500);
        }
    }
}
