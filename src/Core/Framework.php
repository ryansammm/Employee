<?php

namespace Core;

use App\CmsBackground\Model\CmsBackground;
use App\CmsFonts\Model\CmsFonts;
use App\CmsKategoriStyle\Model\CmsKategoriStyle;
use App\CmsTitle\Model\CmsTitle;
use App\Media\Model\Media;
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

        // Get list of website main menu
        $menu_model = new Menu();
        function recursive_menu($parent_id, $menu_model)
        {
            $menus = [];
            $data_menu = $menu_model->where('parent_id', $parent_id)->get()->items;
            if (!empty($data_menu)) {
                foreach ($data_menu as $key => $value) {
                    $value['sub_menu'] = recursive_menu($value['id_cms_menu'], $menu_model);
                    $menus[] = $value;
                }
            }

            return $menus;
        }

        $menu_utama = recursive_menu('0', $menu_model);
        $GLOBALS['web_menu'] = $menu_utama;

        // Get website logo and title
        $cms_title = new CmsTitle();
        $data_cms_title = $cms_title->first();

        $media = new Media();
        $data_media_title = $media->where('jenis_dokumen', 'cms-title')->first();

        $GLOBALS['web_logo'] = $data_media_title;
        $GLOBALS['web_title'] = $data_cms_title;


        $urlTujuan = $request->getPathInfo();
        $explode_url = explode("/", $urlTujuan);
        $current_url = $explode_url[1];

        $GLOBALS['url'] = $urlTujuan;
        $GLOBALS['current_url'] = $current_url;

        // -----------------------------------

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
